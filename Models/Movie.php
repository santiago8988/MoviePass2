<?php

    namespace Models;

    class Movie
    {

        private $idMovie;
        private $movieName;
        private $photo;
        private $overView;
        private $classification;
        private $voteAverage;
        private $voteCount;
        private $originalLanguage;
        private $realeseDate;
        private $gender;


        public function __construct($movieName="",$photo="",$overView="",$classification="",$voteAverage="",$voteCount="",$originalLanguage="",$realeseDate="",$idMovie="")
        {
            $this->idMovie=$idMovie;
            $this->movieName=$movieName;
            $this->photo=$photo;
            $this->resume=$overView;
            $this->classification=$classification;
            $this->voteAverage= $voteAverage;
            $this->voteCount=$voteCount;
            $this->originalLanguage=$originalLanguage;
            $this->realeseDate=$realeseDate;
            $this->gender=array();
        }


        /**
         */
        public function getIdMovie()
        {
            return $this->idMovie;
        }

        /**
         */
        public function setIdMovie($idMovie)
        {
            $this->idMovie=$idMovie;
        }

        /**
         */
        public  function getMovieName()
        {
            return $this->movieName;
        }

        /**
         */
        public function setMovieName($movieName)
        {
            $this->movieName=$movieName;
        }

        /**
         */
        public function getDuration()
        {
            return $this->duration;
        }

        /**
         */
        public function setDuration($duration)
        {
            $this->duration=$duration;
        }

        /**
         */
        public function getDirector()
        {
            return $this->director;
        }

        /**
         */
        public function setDirector($director)
        {
            $this->director=$director;
        }

        /**
         */
        public function getPhoto()
        {
            return $this->photo;
        }

        /**
         */
        public function setPhoto($photo)
        {
            $this->photo=$photo;
        }

        /**
         */
        public function getoverView()
        {
            return $this->overView;
        }

        /**
         */
        public function setoverView($overView)
        {
            $this->overView=$overView;
        }

        /**
         */
        public function getClassification()
        {   if ($this->classification == false)
            return "Mayores";
            else { return "ATP";}
        }

        /**
         */
        public function setClassification($classification)
        {
            $this->classification=$classification;
        }



        /**
         */
        public function getVoteAverage()
        {
            return $this->voteAverage;
        }

        /**
         */
        public function setVoteAverage($voteAverage)
        {
            $this->voteAverage=$voteAverage;
        }

        /**
         */
        public function getVoteCount()
        {
            return $this->voteCount;
        }

        /**
         */
        public function setVoteCount($voteCount)
        {
            $this->voteCount=$voteCount;
        }

        /**
         */
        public function getOriginalLanguage()
        {
            return $this->originalLanguage;
        }

        /**
         */
        public function setOriginalLanguage($originalLanguage)
        {
            $this->originalLanguage=$originalLanguage;
        }

        /**
         */
        public function getReleaseDate()
        {
            return $this->realeseDate;
        }

        /**
         */
        public function setReleaseDate($realeseDate)
        {
            $this->realeseDate=$realeseDate;
        }


        /**
         */
        public function getGender()
        {
            return $this->gender;
        }

        /**
         */
        public function setGender($gender)
        {
            $this->gender=$gender;
        }
        /**
         */
        public function printGender()
        {
            
            $array=$this->getGender();

           $implodeArray = implode(",",$array);

           echo $implodeArray;
            

        }
    

     }

?>