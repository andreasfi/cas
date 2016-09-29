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


    public function __construct($id = null, $description, $start_date, $end_date, $max_participants, $event_type, $owner, $title, $event_cat, $difficulty, $path)
    {
        $this->setId($id);
        $this->setDescription($description);
        $this->setStartDate($start_date);
        $this->setEndDate($end_date);
        $this->setMaxParticipants($max_participants);
        $this->setEventType($event_type);
        $this->setOwner($owner);
        $this->setTitle($title);
        $this->setEventCategory($event_cat);
        $this->setDifficulty($difficulty);
        $this->setPath($path);
    }


    /* GETTERS AND SETTERS */


    public function getId()
    {
        return $this->id;
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


    /**
     * Fetches all the events from the database
     * @return bool|User
     */
    static function fetch_all_events()
    {
        //0. Create a new list of events

        $events = array();


        $query = "SELECT
         EVENTS.idEvent,
  EVENTS.title,
  EVENTS.description,
  EVENTS.startDate,
  EVENTS.endDate,
  EVENTS.maxParticipants,
  eventtypes.type,
  eventcategory.category,
  difficulties.difficultyName,
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
  `events`.`fk_idOwner` = `users`.`idUser`
  AND `events`.`fk_idEventType` = `eventtypes`.`idEventType`
  AND `events`.`fk_idEventCategory` = `eventcategory`.`idEventCategory`
  AND `events`.`fk_idDifficulty` = `difficulties`.`id`
  AND `events`.`fk_idPath` = `paths`.`idPath`";

        $result = MySqlConn::getInstance()->selectDB($query);

        $rows = $result->fetchAll();

        foreach($rows as $r)
        {
            $owner = User::empty_construct();
            $owner->setFirstname($r['firstname']);
            $owner->setLastname($r['lastname']);
            $owner->setMail($r['mail']);
            $owner->setPhone($r['tel']);

            $event = new Event($r['idEvent'], $r['description'], $r['startDate'], $r['endDate'], $r['maxParticipants'], $r['type'], $owner,$r['title'], $r['category'], $r['difficultyName'], $r['coordinatesJSON']);

            //Add the event to the array
            array_push($events, $event);
        }
        return $events;
    }

    public function jsonSerialize() {
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
            'path' => $this->path);
    }
}