<?php

namespace Models;



class Room
{
    private $idCinema;
    private $idRoom;
    private $name;


    public function __construct($idCinema=" ",$idRoom =" ",$name=" ")
    {
        $this->idCinema=$idCinema;
        $this->idRoom=$idRoom;
        $this->name=$name;
    }

    /**
     */
    public function getidCinema()
    {
        return $this->idCinema;
    }
    /**
     */
    public function setidCinema($idCinema)
    {
        $this->idCinema=$idCinema;
    }
    /**
     */
    public function getidRoom()
    {
        return $this->idRoom;
    }
    /**
     */
    public function setidRoom($idRoom)
    {
        $this->idRoom=$idRoom;
    }
    /**
     */
    public function getname()
    {
        return $this->name;
    }
    /**
     */
    public function setname($name)
    {
        $this->name=$name;
    }




}


?>