<?php

namespace Controllers;
use DAO\movieDAO as movieDAO;
use DAO\gendermovieDAO as gendermovieDAO;
use DAO\gendreDAO as genderDAO;

class HomeController
{
    public function __construct()
    {
        
    }

    public static function Index ()
    {
        ///////////////USER VIEW///////////////
                /*$movieDAO= new movieDAO();
                $movieList= $movieDAO->getMoviesVoteAverage();
                require_once(VIEWS_PATH."index.php");*/

        /////////CARGAR BASE DE DATOS///////////////
                /*$movieDAO=new movieDAO();
                $genderDAO=new genderDAO();
                $gendermovieDAO=new gendermovieDAO();
                $movieDAO->downloadData();
                $genderDAO->downloadData();
                $gendermovieDAO->downloadData();*/

        ///////////////ADMIN VIEW//////////////////
                require_once(VIEWS_PATH."admin-view.php");
    }

}

?>