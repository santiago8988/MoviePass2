<?php

namespace Controllers;



use DAO\gendreDAO as gendreDAO;
use DAO\movieDAO as movieDAO;
use DAO\gendermovieDAO as gendermovieDAO;


class movieController
{
    private $movieDAO;
    private $genderDAO;
    private $gendermovieDAO;

    public function __construct()
    {
        $this->movieDAO = new movieDAO();
        $this->genderDAO = new gendreDAO();
        $this->gendermovieDAO = new gendermovieDAO();
    }


    public function ShowAddView()
    {
        require_once(VIEWS_PATH."movie-add.php");

      
    }

    public function ShowListView()
    {
       
       
        $movieList = $this->movieDAO->getMovieswithGenders();
        
     

        require_once(VIEWS_PATH."movie-list.php");
        
    }


    public function Add()
    {
        $this->movieDAO->downloadData();
        $this->genderDAO->downloadData();
        $this->gendermovieDAO->downloadData();

      

        require_once(VIEWS_PATH."admin-view.php");
    }

    public function Search($nameMovie)
    {
        $movieDAO= new movieDAO();

        $movieList= $movieDAO->searchBar($nameMovie);

        require_once(VIEWS_PATH."movie-list.php");


    }

 
}

?>