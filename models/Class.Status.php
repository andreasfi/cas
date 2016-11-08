<?php

/**
 * Created by PhpStorm.
 * User: gueny_000
 * Date: 08/11/2016
 * Time: 10:36
 */
class Status
{
    private $id;
    private $status_name;

    public function __construct($id = null, $status_name)
    {
        $this->id = $id;
        $this->status_name = $status_name;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStatusName()
    {
        return $this->status_name;
    }

    /**
     * @param mixed $status_name
     */
    public function setStatusName($status_name)
    {
        $this->status_name = $status_name;
    }
    


}