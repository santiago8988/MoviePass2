<?php

namespace Models;

class Cinema{

    private $idCinema;
    private $adress;
    private $name;
    private $room;
    private $price;

    public function __construct($idCinema=" ",$adress="",$name=" ",$room=" ",$price=" ")
    {   
        $this->idCinema=$idCinema;
        $this->adress=$adress;
        $this->name=$name;
        $this->room=$room;
        $this->price=$price;
    }

    /**
     */
    public function getIdCinema()
    {
        return $this->idCinema;
    }
    /**
     */
    public function setIdCinema($idCinema)
    {
        $this->idCinema=$idCinema;
    }
    /**
     */
    public function getAdress()
    {
        return $this->adress;
    }
    /**
     */
    public function setAdress($adress)
    {
        $this->adress=$adress;
    }
    /**
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     */
    public function setName($name)
    {
        $this->name=$name;
    }

    /**
     */
    public function getRoom()
    {
        return $this->room;
    }
    /**
     */
    public function setRoom($room)
    {
        $this->room=$room;
    }

    /**
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     */
    public function setPrice($price)
    {
        $this->price=$price;
    }

}

?>