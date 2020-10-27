<?php

namespace Controllers;

    use Controllers\cinemaController as cinemaController;
   

    class AdminController{

        public function __construct()
        {
            
        }

        public function Index()
        {
            $cinemaController = new cinemaController();
               

               require_once(VIEWS_PATH."adminView.php");
          
        }

        

    }
?>