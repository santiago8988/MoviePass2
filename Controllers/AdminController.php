<?php

namespace Controllers;

use Controllers\cinemaController as cinemaController;
use DAO\cinemaDAO as cinemaDAO;
   

    class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
            
               
            require_once(VIEWS_PATH."admin-view.php");
          
        }

        public function adminCinemas()
        {
            
            require_once(VIEWS_PATH."admin-cinema.php");
        }

        public function movieList()
        {
            require_once(VIEWS_PATH."movie-list.php");
        }

        public function Add()
        {
            
            require_once(VIEWS_PATH."add-cinema.php");
        }

        public function cinemaList()
        {
            $cinemaDAO= new cinemaDAO();
            $arrayCinemas= $cinemaDAO->getAll();
            require_once(VIEWS_PATH."cinema-list.php");
        }

        

    }
?>