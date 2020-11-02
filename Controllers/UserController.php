<?php


namespace Controllers;

use DAO\userDAO as userDAO;
use Models\User as User;

use Models\Cinema as Cinema;
use Models\Movie as Movie;
use Models\Room as Room;

use Controllers\ShowController as ShowController;
use DAO\showDAO as showDAO;
use DAO\cinemaDAO as cinemaDAO;
use DAO\movieDAO as movieDAO;
use DAO\roomDAO as roomDAO;
use DAO\gendreDAO as genderDAO;

class UserController
{



    public function __construct()
    {
        
    }

    public function Home()
    {
        require_once(VIEWS_PATH."index.php");
    }

    public function ShowsView()
    {
        $date=getdate();

        $fecha=$date['year']."-".$date['mon'];

        if($date['mday']<10)
        {
            $fecha=$fecha."-"."0".$date['mday'];
        }
        else
        {
            $fecha=$fecha."-".$date['mday']; 
        }

        
        
        $showDAO= new showDAO();
        $showList= $showDAO->getShowbyDate($fecha);


        $cinemaDAO=new cinemaDAO();
        $movieDAO=new movieDAO();
        $roomDAO= new roomDAO();

        $cinema= new Cinema();
        $movie= new Movie();
        $room = new Room();


        require_once(VIEWS_PATH."cartelera.php");
    }


    public function showGenderView()
    {
        $genderDAO= new genderDAO();

        $genderList= $genderDAO->getAll();

        require_once(VIEWS_PATH."genderList.php");
    }

    public function showMovieGender($gender)
    {
        $movieDAO= new movieDAO();

        $movieList= $movieDAO->searchMoviesbyGender($gender);

        require_once(VIEWS_PATH."movie-list.php");
    }


    public function showViewAverage()
    {
        $movieDAO = new movieDAO();

        $movieList=$movieDAO->getMoviesOrderByvoteCount();

        require_once(VIEWS_PATH."movie-list.php");
    }
}


?>