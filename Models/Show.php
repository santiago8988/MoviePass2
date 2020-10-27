<?php

namespace Models;

class Show
{
    private $idShow;
    private $day;
    private $hourStart;
    private $idRoom;
    private $idMovie;

    public function __construct($idShow=" ",$day=" ",$hourStart =" ",$idRoom=" ",$idMovie=" ")
    {
        $this->idShow=$idShow;
        $this->day=$day;
        $this->hourStart=$hourStart;
        $this->idRoom=$idRoom;
        $this->idMovie=$idMovie;


    }

    /**
     */
    public function getidShow()
    {
        return $this->idShow;
    }
    /**
     */
    public function setidShow($idShow)
    {
        $this->idShow=$idShow;
    }
    /**
     */
    public function getday()
    {
        return $this->day;
    }
    /**
     */
    public function setday($day)
    {
        $this->day=$day;
    }
    /**
     */
    public function gethourStart()
    {
        return $this->hourStart;
    }
    /**
     */
    public function sethourStart($hourStart)
    {
        $this->hourStart=$hourStart;
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
    public function getidMovie()
    {
        return $this->idMovie;
    }
    /**
     */
    public function setidMovie($idMovie)
    {
        $this->idMovie=$idMovie;
    }


}

?>