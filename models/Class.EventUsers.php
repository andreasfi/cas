<?php

/**
 * Created by PhpStorm.
 * User: gueny_000
 * Date: 26/10/2016
 * Time: 15:50
 */
class EventUsers
{
    private $event;
    private $user;
    private $status;
    private $submit_date;
    private $nb_participants;

    public function __construct($event, $user, $status, $submit_date, $nb_participants)
    {
        $this->setEvent($event);
        $this->setUser($user);
        $this->setStatus($status);
        $this->setSubmitDate($submit_date);
        $this->setNbParticipants($nb_participants);
    }


    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSubmitDate()
    {
        return $this->submit_date;
    }

    /**
     * @param mixed $submit_date
     */
    public function setSubmitDate($submit_date)
    {
        $this->submit_date = $submit_date;
    }

    /**
     * @return mixed
     */
    public function getNbParticipants()
    {
        return $this->nb_participants;
    }

    /**
     * @param mixed $nb_participants
     */
    public function setNbParticipants($nb_participants)
    {
        $this->nb_participants = $nb_participants;
    }

    public static function getEventUsersByEventID($eventID)
    {
        $eventUsers = array();

        $query = "SELECT * FROM `eventusers` WHERE fk_idEvent = $eventID ORDER BY fk_idUser ASC";

        $result = MySqlConn::getInstance()->selectDB($query);
        $rows = $result->fetchAll();

        foreach($rows as $row)
        {
            $eu = new EventUsers();
            $eu->setEvent($row[0]);
            $eu->setUser($row[1]);
            $eu->setStatus($row[2]);
            $eu->setSubmitDate($row[3]);
            $eu->setNbParticipants($row[4]);
            array_push($eventUsers, $eu);
        }
        return $eventUsers;
    }

    /***
     * Returns the EventUsers with objects instead of fk.
     * @param $eventID
     */
    public static function getEventUsersByUserID_obj($userID)
    {
        //TODO : continue this query.
        $query = "SELECT * FROM eventusers, events, users, status WHERE eventusers.fk_idUser = users.idUser AND eventusers.fk_idEvent = events.idEvent AND eventusers.fk_idStatus = status.idStatus AND eventusers.fk_idUser = $userID ORDER BY events.startDate;";

        $result = MySqlConn::getInstance()->selectDB($query);
        $rows = $result->fetchAll();

        $eventUsers = array();

        foreach($rows as $row)
        {
            $USER = new User($row['idUser'], $row['firstname'], $row['lastname'], $row['mail'], $row['tel'], $row['fk_idUserTypes'], null);
            $EVENT = new Event($row['idEvent'], $row['description'], DateTime::createFromFormat('Y-m-d H:i:s', $row['startDate']), DateTime::createFromFormat('Y-m-d H:i:s', $row['endDate']), $row['maxParticipants'], $row['fk_idUserTypes'], $row['fk_idOwner'], $row['title'], $row['fk_idEventCategory'], $row['fk_idDifficulty'], null, $row['fk_idPath']);
            $STATUS = new Status($row['fk_idStatus'], $row['statusname']);

            $EventUsers = new EventUsers($EVENT, $USER, $STATUS, $row['submitDate'], $row['numberParticipants']);
            array_push($eventUsers, $EventUsers);
        }
        return $eventUsers;
    }

    public function updateStatus()
    {
        $query = "UPDATE `eventusers` SET `fk_idStatus`= $this->status WHERE `fk_idUser`= $this->user ORDER BY fk_idUser ASC ";
        MySqlConn::getInstance()->executeQuery($query);
    }
}