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
        $movieDAO= new movieDAO();

        $movieList= $movieDAO->moviesSlider();
         require_once(VIEWS_PATH."index.php");

        /*$movieDAO=new movieDAO();
        $genderDAO=new genderDAO();
        $gendermovieDAO=new gendermovieDAO();
        $movieDAO->downloadData();
        $genderDAO->downloadData();
        $gendermovieDAO->downloadData();*/

       //require_once(VIEWS_PATH."admin-view.php");
    }

}

?>