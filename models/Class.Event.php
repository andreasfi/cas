<?php

class Event implements JsonSerializable
{
    private $id;
    private $description;
    private $start_date;
    private $end_date;
    private $max_participants;
    private $event_type;
    private $owner;
    private $title;
    private $event_category;
    private $difficulty;
    private $path;
	private $pathId;


    public function __construct($id = null, $description, $start_date, $end_date, $max_participants, $event_type, $owner, $title, $event_cat, $difficulty, $path, $pathId)
    {
        $this->setId($id);
        $this->setDescription($description);
        $this->setStartDate($start_date->format('Y-m-d H:i:s'));
        $this->setEndDate($end_date->format('Y-m-d H:i:s'));
        $this->setMaxParticipants($max_participants);
        $this->setEventType($event_type);
        $this->setOwner($owner);
        $this->setTitle($title);
        $this->setEventCategory($event_cat);
        $this->setDifficulty($difficulty);
        $this->setPath($path);
		$this->setPathId($pathId);
    }


    /* GETTERS AND SETTERS */


    public function getId()
    {
        return $this->id;
    }

    public function save($owner)
    {
        $pathID = $this->savePath($this->path);
		$this->setPathId($pathID);
		
        $query = "INSERT INTO events(description, startDate, endDate, maxParticipants, fk_idEventType, fk_idOwner, title, fk_idEventCategory, fk_idDifficulty, fk_idPath) VALUES('$this->description', '$this->start_date','$this->end_date','$this->max_participants','$this->event_type', '$this->owner','$this->title','$this->event_category', '$this->difficulty','$pathID')";
        $event_id = MySqlConn::getInstance()->insertAndGetId($query);
		
		$owner->addUserToEvent($event_id, 0);
    }
	
	public function update($description, $startDate, $endDate, $maxParticipants, $title, $eventCategory, $difficulty, $path){
		//update l'objet
		
		$this->setDescription($description);
		$this->setStartDate($startDate->format('Y-m-d H:i:s'));
		$this->setEndDate($endDate->format('Y-m-d H:i:s'));
		$this->setMaxParticipants($maxParticipants);
		$this->setTitle($title);
		$this->setEventCategory($eventCategory);
		$this->setDifficulty($difficulty);
		$this->setPath($path);
		
		//update dans la base de données
		$this->updatePath($this->path);
		
		$query = "UPDATE events SET description = '$this->description', startDate = '$this->start_date', endDate = '$this->end_date', maxParticipants = '$this->max_participants', title = '$this->title', fk_idEventCategory = '$this->event_category', fk_idDifficulty = '$this->difficulty' WHERE events.idEvent = '$this->id';'";
		MySqlConn::getInstance()->executeQuery($query);
	}

    private function savePath($path)
    {
        $mysqlConnection = MySqlConn::getInstance();
        $query = "INSERT INTO paths(coordinatesJSON) VALUES('$this->path')";
        return $mysqlConnection->insertAndGetID($query);
    }
	
	private function updatePath($newPath)
    {
        $mysqlConnection = MySqlConn::getInstance();
        $query = "UPDATE paths SET coordinatesJSON = '$newPath' WHERE idPath = '$this->pathId';";
        $mysqlConnection->executeQuery($query);
    }
	
	public function delete(){
		$mysqlConnection = MySqlConn::getInstance();
        $query = "DELETE from events WHERE idEvent = '$this->id'";
        $mysqlConnection->executeQuery($query);
		$this->deletePath();
	}
	
	private function deletePath(){
		$mysqlConnection = MySqlConn::getInstance();
        $query = "DELETE from paths WHERE idPath = '$this->pathId'";
        $mysqlConnection->executeQuery($query);
	}

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }
	
	public function getStartDateFormattedJS()
    {
        $output = DateTime::createFromFormat('Y-m-d H:i:s', $this->start_date);
		return $output->format('Y/m/d H:i');
    }
	public function getEndDateFormattedJS()
    {
        $output = DateTime::createFromFormat('Y-m-d H:i:s', $this->end_date);
		return $output->format('Y/m/d H:i');
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    public function getMaxParticipants()
    {
        return $this->max_participants;
    }

    public function setMaxParticipants($max_participants)
    {
        $this->max_participants = $max_participants;
    }

    public function getEventType()
    {
        return $this->event_type;
    }

    public function setEventType($event_type)
    {
        $this->event_type = $event_type;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getEventCategory()
    {
        return $this->event_category;
    }

    public function setEventCategory($event_category)
    {
        $this->event_category = $event_category;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }
    public function getPathId()
    {
        return $this->pathId;
    }

    public function setPathId($pathId)
    {
        $this->pathId = $pathId;
    }
	


    /**
     * Fetches all the events from the database
     * @return bool|User
     */

    static function fetch_all_events()
    {
        //0. Create a new list of events

        $events = array();


        $query = "SELECT
         events.idEvent,
  events.title,
  events.description,
  events.startDate,
  events.endDate,
  events.maxParticipants,
  eventtypes.type,
  eventcategory.category,
  difficulties.differenceName,
  users.firstname,
  users.lastname,
  users.mail,
  users.tel,
  paths.coordinatesJSON,
  events.fk_idPath
FROM
  `events`,
  `users`,
  `eventcategory`,
  `eventtypes`,
  `paths`,
  `difficulties`
WHERE
  `events`.`fk_idOwner` = `users`.`idUser`
  AND `events`.`fk_idEventType` = `eventtypes`.`idEventType`
  AND `events`.`fk_idEventCategory` = `eventcategory`.`idEventCategory`
  AND `events`.`fk_idDifficulty` = `difficulties`.`id`
  AND `events`.`fk_idPath` = `paths`.`idPath`";

        $result = MySqlConn::getInstance()->selectDB($query);

        $rows = $result->fetchAll();

        foreach ($rows as $r) {
            $owner = User::empty_construct();
            $owner->setFirstname($r['firstname']);
            $owner->setLastname($r['lastname']);
            $owner->setMail($r['mail']);
            $owner->setPhone($r['tel']);

            $event = new Event($r['idEvent'], $r['description'],  DateTime::createFromFormat('Y-m-d H:i:s', $r['startDate']), DateTime::createFromFormat('Y-m-d H:i:s', $r['endDate']), $r['maxParticipants'], $r['type'], $owner, $r['title'], $r['category'], $r['differenceName'], $r['coordinatesJSON'], $r['fk_idPath']);

            //Add the event to the array
            array_push($events, $event);
        }

        return $events;
        /* add to sortiesController details method
        if($userLevel >= 0){
            $userByEvent = User::getUserByEventId(2);
            $this->vars['allParticipants'] = $userByEvent;
            //var_dump($userByEvent);

            foreach ($userByEvent as $temp){
                echo $temp->getFirstname()."ad";
            }
        }*/
    }

    public function jsonSerialize()
    {

        return array('id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'owner' => $this->owner,
            'max_participants' => $this->max_participants,
            'event_type' => $this->event_type,
            'event_category' => $this->event_category,
            'difficulty' => $this->difficulty,
            'path' => json_decode($this->path));
    }


    /***
     * @param $user_id
     * @return array
     * Returns an array of events.
     */
    static function fetch_events_for_user($user_id)
    {
        $events = array();

        $query = "SELECT idEvent, startDate, endDate, title, description FROM `events`, `eventusers` WHERE `eventusers`.`fk_idEvent` = idEvent AND `eventusers`.`fk_idUser` = $user_id;";

        $result = MySqlConn::getInstance()->selectDB($query);
        $rows = $result->fetchAll();

        /*''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
         * Data needed for the event
         * '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
         * 1. event_ID
         * 2. start date of the event
         * 3. end date of the event
         * 4. event_status TODO : Add status
         * 5. title
         * 6. description
         *'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''*/

        foreach ($rows as $r) {
            $e = new Event($r['idEvent'], $r['description'], DateTime::createFromFormat('Y-m-d H:i:s', $r['startDate']), DateTime::createFromFormat('Y-m-d H:i:s', $r['endDate']), null, null, null, $r['title'], null, null, null, null);
            array_push($events, $e);
        }
        return $events;
    }


    static function fetch_event_by_id($id)
    {


        $query = "SELECT
          events.idEvent,
          events.title,
          events.description,
          events.startDate,
          events.endDate,
          events.maxParticipants,
		  events.fk_idPath,
          eventtypes.type,
          eventcategory.category,
          difficulties.differenceName,
          users.idUser,
          users.firstname,
          users.lastname,
          users.mail,
          users.tel,
          paths.coordinatesJSON
        FROM
          `events`,
          `users`,
          `eventcategory`,
          `eventtypes`,
          `paths`,
          `difficulties`
        WHERE
          `events`.`idEvent` = '$id'
          AND `events`.`fk_idOwner` = `users`.`idUser`
          AND `events`.`fk_idEventType` = `eventtypes`.`idEventType`
          AND `events`.`fk_idEventCategory` = `eventcategory`.`idEventCategory`
          AND `events`.`fk_idDifficulty` = `difficulties`.`id`
          AND `events`.`fk_idPath` = `paths`.`idPath`";

        $result = MySqlConn::getInstance()->selectDB($query);

        $r = $result->fetch();

        $owner = User::empty_construct();
        $owner->setId($r['idUser']);
        $owner->setFirstname($r['firstname']);
        $owner->setLastname($r['lastname']);
        $owner->setMail($r['mail']);
        $owner->setPhone($r['tel']);

        $event = new Event($r['idEvent'], $r['description'], DateTime::createFromFormat('Y-m-d H:i:s', $r['startDate']), DateTime::createFromFormat('Y-m-d H:i:s', $r['endDate']), $r['maxParticipants'], $r['type'], $owner, $r['title'], $r['category'], $r['differenceName'], $r['coordinatesJSON'], $r['fk_idPath']);

        return $event;
    }
    static function updateUserEvent($eventId, $status, $iduser){
        $status += 1;
        $query = "UPDATE eventusers SET fk_idStatus = '$status' WHERE fk_idEvent = '$eventId' AND fk_idUser = '$iduser';";
        MySqlConn::getInstance()->executeQuery($query);
    }
}