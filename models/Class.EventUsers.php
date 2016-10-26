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

        $query = "SELECT * FROM `eventusers` WHERE fk_idEvent = $eventID ORDER BY fk_idUser ASC ";

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
}