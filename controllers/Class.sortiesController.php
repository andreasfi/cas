<?php
/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 26.09.16
 * Time: 01:00
 */


class sortiesController extends Controller{
    function sorties(){

    }
    function propositions(){
        
        $this->vars['propositions'] = json_encode(Event::fetch_all_events());

    }
    function details(){
        // Get infos
        $result = Event::fetch_event_by_id($GLOBALS['value']);
        // Variables depuis BD

        $description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

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
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['pageTitle'] = "Details";
        $this->vars['pageMessage'] = "Détails concernant la sortie";


        // Calcul de la distance
        $path = $result->getPath();
        // Faire un json valide
        $json = preg_replace('/([{,])(\s*)([A-Za-z0-9_\-]+?)\s*:/','$1"$3":',$path);
        $pathArrays = json_decode($json);
        $pathDistance = 0;
        // incrementer la distance entre tous les points
        for($i = 0; $i < count($pathArrays)-1; $i++){
            $pathDistance += $this->distance($pathArrays[$i]->lat, $pathArrays[$i]->lng, $pathArrays[$i+1]->lat, $pathArrays[$i+1]->lng);
        }
        $this->vars['distance'] = $pathDistance;

        // Calcul du denivele

    }
    function distance($lat1, $lon1, $lat2, $lon2) {
        // function de calcul de la distance entre deux points
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $km = $dist * 60 * 1.1515;

        return ($km * 1.609344);
    }
    function inscription(){

    }
	
	function ajoutsortie(){
		
	}
    
}