<?php

namespace Models;


    class Show
    {
        
        private $id;
        private $day;
        private $hour;
        private $soldTickets;
        private $idMovie;
        private $idRoom;
        private $price;
        private $capacity;
        private $idCinema;

            public function __construct($day="",$hour="",$soldTickets="")
            {
                $this->day=$day;
                $this->hour=$hour;
                $this->soldTickets=$soldTickets;
            }

            /**
             */
            public function getId()
            {
                return $this->id;
            }
            /**
             */
            public function setId($id)
            {
                $this->id=$id;
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
            public function getDay()
            {
                return $this->day;
            }
            /**
             */
            public function setDay($day)
            {
                $this->day=$day;
            }
            /**
             */
            public function getHour()
            {
                return $this->hour;
            }
            /**
             */
            public function setHour($hour)
            {
                $this->hour=$hour;
            }
            /**
             */
            public function getSoldtickets()
            {
                return $this->soldTickets;
            }
            /**
             */
            public function setSoldtickets($soldTickets)
            {
                $this->soldTickets=$soldTickets;
            }
             /**
             */
            public function getIdmovie()
            {
                return $this->idMovie;
            }
            /**
             */
            public function setIdmovie($idMovie)
            {
                $this->idMovie=$idMovie;
            }
            /**
             */
            public function getIdroom()
            {
                return $this->idRoom;
            }
            /**
             */
            public function setIdroom($idRoom)
            {
                $this->idRoom=$idRoom;
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
             /**
             */
            public function getCapacity()
            {
                return $this->capacity;
            }
            /**
             */
            public function setCapacity($capacity)
            {
                $this->capacity=$capacity;
            }




    }



?>