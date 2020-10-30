<?php

namespace Models;

class Cinema{

    private $idCinema;
    private $adress;
    private $name;
    
    

    public function __construct($adress="",$name=" ")
    {   
        $this->name=$name;
        $this->adress=$adress;
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

    

}

?>