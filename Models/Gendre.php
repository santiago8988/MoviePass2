<?php

namespace Models;

class Gendre{

    private $idGender;
    private $nameGender;

    public function __construct($idGender="",$nameGender="")
    {
        $this->idGender=$idGender;
        $this->nameGender=$nameGender;
    }

    /**
     */
    public function getIdGender()
    {
        return $this->idGender;
    }
    /**
     */
    public function setIdGender($idGender)
    {
        $this->idGender=$idGender;
    }
    /**
     */
    public function getGenderName()
    {
        return $this->nameGender;
    }
    /**
     */
    public function setGenderName($nameGender)
    {
        $this->nameGender=$nameGender;
    }

}

?>