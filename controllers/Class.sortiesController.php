<?php

/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 26.09.16
 * Time: 01:00
 */
class sortiesController extends Controller
{

    function sorties()
    {
        $this->vars['pageTitle'] = "Planning";
        $this->vars['pageMessage'] = "";
        $this->vars['propositions'] = json_encode(Event::fetch_all_events());
    }

    function saveNewStatuses()
    {
        //Only the trailmaster can access to this function
        $this->checkUser(3, "/error/http404");

        //If the user is not from the domain, redirect him to the landing page.
        if (!strpos($_SERVER['HTTP_REFERER'], SITE_NAME)) {
            $this->redirect('');
            exit();
        }

        $event_id = $_POST['event_id'];

        ksort($_POST);

        //Send e-mail to each person whose reservation was approved/rejected.

        $participating_users = EventUsers::getEventUsersByEventID($event_id);
        $event = Event::fetch_event_by_id($event_id);

        $modified_statuses = array(); //Contains the EventUsers where the statuses were modified.

        $array_keys = array_keys($_POST);

        $nbupdates = 0;
        $failed_deliveries = array();

        for ($i = 0; $i < sizeof($array_keys); $i++) {
            for ($j = 0; $j < sizeof($participating_users); $j++) {
                if ($array_keys[$i] == $participating_users[$j]->getUser()) {
                    //Check if the status was modified
                    if ($participating_users[$j]->getStatus() != $_POST[$array_keys[$i]]) {
                        $status_old = $participating_users[$j]->getStatus();
                        $participating_users[$j]->setStatus($_POST[$array_keys[$i]]);
                        $participating_users[$j]->updateStatus();

                        $USER = User::getUserFromId($participating_users[$j]->getUser());
                        $email_address = $USER->getMail();
                        $toCheck = explode('@', $email_address);

                        if(! checkdnsrr($toCheck[sizeof($toCheck) - 1], "MX"))
                        {
                            //The DNS entry doesn't exist. Add to failing list.
                            array_push($failed_deliveries, $email_address);
                            $nbupdates++;
                            continue;
                        }

                        $subject = '';
                        $status_old == 0 ? $subject = "Votre demande de participation a été traitée." : "Modification de votre participation.";


                        $accepted_message = "Votre demande a été acceptée par le guide.";
                        $accepted_msg_sms = "Votre demande pour l'événement ".$event->getDescription()." a été accepté par le guide.";
                        $refused_message = "Le guide a refusé votre demande. Un SMS ";
                        $refused_msg_mail = "";

                        $incfile = ROOT_DIR . "views/mail_trailconfirmation.inc";

                        switch ($participating_users[$j]->getStatus()) {
                            case 1 :
                                "Do nothing .. ";
                                break;
                            case 2 :
                                $template_message = $this::requireToVar($incfile, $subject, $accepted_message, $event);
                                $this->sendMail($USER->getMail(), $USER->getFirstname() . " " . $USER->getLastname(), $subject, $template_message, null);
                                $this->sendSms($USER->getPhone(), "Bonjour ".$USER->getFirstname()." ". $USER->getLastname() . " " . $accepted_message);
                                $nbupdates++;
                                break;
                            case 3 :
                                $template_message = $this::requireToVar($incfile, $subject, $refused_message, $event);
                                $this->sendMail($USER->getMail(), $USER->getFirstname() . " " . $USER->getLastname(), $subject, $template_message, null);
                                $this->sendSms($USER->getPhone(), "Bonjour ".$USER->getFirstname()." ". $USER->getLastname() . " " . $refused_message);
                                $nbupdates++;
                                break;
                        }
                    }
                }
            }
        }

        $msg = '';
        $nbupdates == 1 ? $msg = $nbupdates .' participant a été mis à jour dans la base de données ' : $msg = $nbupdates . ' participants ont été mis à jour dans la base de données';
        if($nbupdates == 0){ $msg = "Aucun changement détecté."; }

        $msg_err = '';
        if(sizeof($failed_deliveries) > 0)
        {
            $msg_err = "<b>Envoi de mail impossible aux adresses suivantes.</b></br>";

            foreach($failed_deliveries as $f)
            {
                $msg_err .= "</br>".$f;
            }

            $msg_err .= "<br/></br>Peut-être voudriez-vous informer cette/ces personne(s) par appel téléphonique";
        }

        $_SESSION['msg_err'] = $msg_err;
        $this->vars['msg_err'] = isset($_SESSION['msg_err']) ? $_SESSION['msg_err'] : '';;

        $_SESSION['msg'] = $msg ;
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

        $this->redirect('/sorties/details/' . $event_id);
    }

    function details()
    {

        $this->checkUser(0, "/error/http404");
        $this->checkParam($GLOBALS['value'], "/home");

        $userId = null;
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']->getId();
        }

        // Get infos
        $result = Event::fetch_event_by_id($GLOBALS['value']);

        // Calcul de la distance
        $path = $result->getPath();
        $json = preg_replace('/([{,])(\s*)([A-Za-z0-9_\-]+?)\s*:/', '$1"$3":', $path); // Faire un json valide
        $pathArrays = json_decode($json);
        $pathDistance = 0;
        for ($i = 0; $i < count($pathArrays) - 1; $i++) { // incrementer la distance entre tous les points
            $pathDistance += $this->distance($pathArrays[$i]->lat, $pathArrays[$i]->lng, $pathArrays[$i + 1]->lat, $pathArrays[$i + 1]->lng);
        }

        // api transport
        $from = isset($_POST['from']) ? $_POST['from'] : false;
        $response = isset($_POST['response']) ? $_POST['response'] : false;
        $to = isset($_POST['to']) ? $_POST['to'] : false;
        $via = isset($_POST['via']) ? $_POST['via'] : false;
        $datetime = isset($_POST['datetime']) ? $_POST['datetime'] : '';
        $page = isset($_POST['page']) ? ((int)$_POST['page']) - 1 : 0;
        $c = isset($_POST['c']) ? (int)$_POST['c'] : false;
        $stationsFrom = [];
        $stationsTo = [];
        $search = $from && $to;
        $userLevel = isset($_SESSION['user']) ? $_SESSION['user']->getMemberType() : false;
        if ($search) {
            $query = [
                'from' => $from,
                'to' => $to,
                'page' => $page,
                'limit' => 6,
            ];
            if ($datetime) {
                $query['date'] = date('Y-m-d', strtotime($datetime));
                $query['time'] = date('H:i', strtotime($datetime));
            }
            if ($via) {
                $query['via'] = $via;
            }
            $url = 'http://transport.opendata.ch/v1/connections?' . http_build_query($query);
            $url = filter_var($url, FILTER_VALIDATE_URL);
            $response = json_decode(file_get_contents($url));
            if ($response->from) {
                $from = $response->from->name;
            }
            if ($response->to) {
                $to = $response->to->name;
            }
            if (isset($response->stations->from[0])) {
                if ($response->stations->from[0]->score < 101) {
                    foreach (array_slice($response->stations->from, 1, 3) as $station) {
                        if ($station->score > 97) {
                            $stationsFrom[] = $station->name;
                        }
                    }
                }
            }
            if (isset($response->stations->to[0])) {
                if ($response->stations->to[0]->score < 101) {
                    foreach (array_slice($response->stations->to, 1, 3) as $station) {
                        if ($station->score > 97) {
                            $stationsTo[] = $station->name;
                        }
                    }
                }
            }
        }
        if (isset($response)) {
            $this->vars['response'] = $response;
        } else {
            $response = null;
        }

        // Get who attends the event
        $participating = false;
        if ($userLevel >= 0) {
            $userByEvent = User::getUserByEventId($GLOBALS['value']);
            $this->vars['allParticipants'] = $userByEvent;

            foreach ($userByEvent as $item) {
                foreach ($item as $it) {
                    if ($it->getId() == $userId) {
                        $participating = true;
                        break 2;
                    }
                }
            }
        }

        // Pass variables from db to the view
        $this->vars['eventId'] = $result->getId();
        $this->vars['title'] = $result->getTitle();
        $this->vars['startDate'] = $result->getStartDate();
        $this->vars['maxParticipants'] = $result->getMaxParticipants();
        $this->vars['owner'] = $result->getOwner();
        $this->vars['eventCategory'] = $result->getEventCategory();
        $this->vars['difficulty'] = $result->getDifficulty();
        $this->vars['path'] = $result->getPath();
        $this->vars['description'] = $result->getDescription();
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msg_err'] = isset($_SESSION['msg_err']) ? $_SESSION['msg_err'] : '';
        $this->vars['pageTitle'] = $result->getTitle();
        // Formate dates
        $this->vars['endDate'] = date('m.d.y',strtotime($result->getEndDate()));
        $this->vars['pageMessage'] = date('m.d.y, H:i',strtotime($result->getStartDate()));

        $this->vars['participating'] = $participating;

        // API transport
        $this->vars['from'] = $from;
        $this->vars['to'] = $to;
        $this->vars['via'] = $via;
        $this->vars['datetime'] = $datetime;
        $this->vars['c'] = $c;
        $this->vars['stationsFrom'] = $stationsFrom;
        $this->vars['stationsTo'] = $stationsTo;
        $this->vars['search'] = $search;
        $this->vars['userLevel'] = $userLevel;

        $this->vars['distance'] = $pathDistance;

        // Log message
        if (isset($_POST['numParticipants'])) {

            $_SESSION['user']->addUserToEvent($this->vars['eventId'], $_POST['numParticipants']);

            $this->vars['msg'] = "VOUS AVEZ ETE INSCRIT";
        }

    }

    function distance($lat1, $lon1, $lat2, $lon2)
    {
        // function de calcul de la distance entre deux points
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $km = $dist * 60 * 1.1515;

        return ($km * 1.609344);
    }

    function inscription()
    {

        $this->vars['pageTitle'] = "Inscription";
        $this->vars['pageMessage'] = "";

        // Get infos
        $result = Event::fetch_event_by_id($GLOBALS['value']);

        $_SESSION['difficulty'] = $result->getDifficulty();

        if (!isset($_Session['user'])) {
            $_SESSION['msg'] = '<span class="error">Vous devez vous connecter pour vous inscrire à une sortie</span>';
            $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
            //$this->redirect('../../login'); //too many redirects

        }

        if($_SESSION['difficulty'] == 'très avancé' || $_SESSION['difficulty'] == 'professionnel')
        {
            $_SESSION['msg'] = '<span class="error">Haute difficulté</span>';
            $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        }


        $this->vars['eventId'] = $result->getId();
        $this->vars['title'] = $result->getTitle();
        $this->vars['startDate'] = $result->getStartDate();
        $this->vars['endDate'] = $result->getEndDate();
        $this->vars['maxParticipants'] = $result->getMaxParticipants();
        $this->vars['owner'] = $result->getOwner();
        $this->vars['eventCategory'] = $result->getEventCategory();
        $this->vars['difficulty'] = $result->getDifficulty();
        $this->vars['path'] = $result->getPath();
        $this->vars['description'] = $result->getDescription();

        if (isset($_POST['numPeople'])) {
            var_dump($_POST);
        }

        $this->checkUser(2, "/error/http404");
    }

    function updateParticipant()
    {
        // Check if its the owner
        $owner = $_POST['owner'];
        // The event id
        $this->checkParam($GLOBALS['value'], "/home");
        $idevent = $GLOBALS['value'];
        // get the total of userevent to update
        $countparticipant = $_POST['countparticipant'];
        // status, iduser


        $participants = Array();
        $eventusers = Array();

        if ($this->checkEventOwner($owner, "/sorties/details/" . $idevent)) {
            // Since each userevent comes in as a post (1,2,3...), we need to iterate all of them
            echo $countparticipant . "<br>";
            for ($i = 0; $i <= $countparticipant + 1; $i++) {
                if (isset($_POST['participant' . $i])) {
                    $participants[$i] = $_POST['participant' . $i];
                    $eventusers[$i] = $_POST['status' . $i];
                    //echo "nb ".$i." for ".$participants[$i]." and ".$eventusers[$i].". <br>";

                    Event::updateUserEvent($idevent, $eventusers[$i], $participants[$i]);
                }

            }
            // update userevent where idevent and user
        }

        $_SESSION['msg'] = '<span class="error">Les participants ont été mis à jour</span>';
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->redirect('/sorties/details/' . $idevent);
    }

    function ajoutsortie()
    {

        $this->checkUser(3, "/error/http404");
        if (!isset($_SESSION['user'])) {
            $_SESSION['msg'] = '<span class="error">Vous devez vous connecter pour créer un évenement</span>';
            $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

            $this->redirect('../login');
        } else if (($_SESSION['user']->getMemberType()) != 3) {
            $_SESSION['msg'] = '<span class="error">Vous ne possedez pas les droits pour creer un evenement</span>';
            $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

            $this->redirect('../login/welcome');

        }
        /*
             else if($_SESSION['user']->getMemberType !=2){
                 var_dump("hello");
                $_SESSION['msg'] = '<span class="error">Vous ne possédez pas les droits pour créer un évenement</span>';
                $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
                $this->redirect('/login/welcome');
            }
        */

        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['pageTitle'] = "Ajouter une course";
        $this->vars['pageMessage'] = "";


        if (!empty($_POST)) {
            if (isset($_POST['id'])) {
                //pour charger l'event dans le mode édition. on charge un objet event dans la session.
                $result = Event::fetch_event_by_id($_POST['id']);
                $_SESSION['event'] = $result;

            } else if (isset($_POST['delete_event'])) {
                $event = Event::fetch_event_by_id($_POST['delete_event']);
                $event->delete();

                $_SESSION['msg'] = '<span class="success">Evenement suprimmé</span>';
                $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

                $this->redirect('/home' . $_POST['edit_event']);
            } else {

                //sinon on est en mode submit. décoder l'info.
                $description = htmlentities(str_replace("\n", " ", $_POST['description']), ENT_QUOTES);
                var_dump($description);
                $start_date = DateTime::createFromFormat('Y/m/d H:i', $_POST['startDate']);
                // j'ai supprime cette ligne pour que $start_date soit un DATETIME
                //$start_date = $start_date->format('Y-m-d H:i:s');
                $end_date = DateTime::createFromFormat('Y/m/d H:i', $_POST['endDate']);
                // j'ai supprime cette ligne pour que $start_date soit un DATETIME
                //$end_date = $end_date->format('Y-m-d H:i:s');
                $max_participants = $_POST['maxParticipants'];
                $event_type = 1;
                $owner = $_SESSION['user']->getId();
                $title = htmlentities(str_replace("\n", " ", $_POST['title']), ENT_QUOTES);
                $event_cat = $_POST['category'];
                $difficulty = $_POST['difficulty'];
                $path = $_POST['JSON'];

                //regarde les dates pour déterminer si c'est une rando ou une sortie
                if ($start_date->format('d') != $end_date->format('d'))
                    $event_type = 2;
                else
                    $event_type = 1;

                if (isset($_POST['edit_event'])) {
                    $event = Event::fetch_event_by_id($_POST['edit_event']);
                    //si on était en mode édition, on fait un update, et non pas un insert
                    $event->update($description, $start_date, $end_date, $max_participants, $title, $event_cat, $difficulty, $path);

                    $_SESSION['msg'] = '<span class="success">Evenement modifié</span>';
                    $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

                    $this->redirect('/sorties/details/' . $_POST['edit_event']);
                } else {
                    //si on était en mode création, on insert l'event.
                    $event = new Event($id = null, $description, $start_date, $end_date, $max_participants, $event_type, $owner, $title, $event_cat, $difficulty, $path, null);
                    $event->save($_SESSION['user']);


                    $_SESSION['msg'] = '<span class="success">Evenement cree</span>';
                    $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

                    $this->redirect('/login/welcome');
                }
            }

        }
        function alreadyParticipating()
        {
            $userId = $_SESSION['user']->getId();


        }
    }

    function proximite()
    {
        $events = Event::fetch_all_events();
        $this->vars['events'] = json_encode($events);
    }
}