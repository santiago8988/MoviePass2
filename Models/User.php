<?php

namespace Models;

class User {

    private $idUser;
    private  $email;
    private $userName;
    private $password;
    private $gender;
    private $isAdmin;
    private $birthday;
    private $photo;

        public function __construct ($email=" ",$userName=" ",$password=" ",$gender=" ",$birthday=" ",$photo=" ")
        {
            $this->email=$email;
            $this->userName=$userName;
            $this->password=$password;
            $this->gender=$gender;
            $this->birthday=$birthday;
            $this->photo=$photo;
            $this->isAdmin=false;
            
        }

        /**
         */
        public function getIdUser()
        {
            return $this->idUser;
        }

        /**
         */
        public function setIdUser($idUser)
        {
           $this->idUser=$idUser;
        }

        /**
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         */
        public function setEmail($email)
        {
           $this->email=$email;
        }

        /**
         */
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         */
        public function setUserName($userName)
        {
           $this->userName=$userName;
        }

        /**
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         */
        public function setPassword($password)
        {
           $this->password=$password;
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
        public function getBirthday()
        {
            return $this->birthday;
        }

        /**
         */
        public function setBirthday($birthday)
        {
           $this->birthday=$birthday;
        }

        /**
         */
        public function getIsAdmin()
        {
            return $this->isAdmin;
        }

        /**
         */
        public function setIsAdmin($isAdmin)
        {
           $this->isAdmin=$isAdmin;
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
}

?>