<?php

namespace Controllers;



use DAO\gendreDAO as gendreDAO;
use DAO\movieDAO as movieDAO;


class movieController
{
    private $movieDAO;
    private $genderDAO;

    public function __construct()
    {
        $this->movieDAO = new movieDAO();
        $this->genderDAO = new gendreDAO();
    }


    public function ShowAddView()
    {
        require_once(VIEWS_PATH."movie-add.php");

      
    }

    public function ShowListView()
    {
       $this->movieDAO->downloadData();
       $this->genderDAO->downloadData();
       $movieList = $this->movieDAO->getAll();
       
       //$genderList = $this->gendreDAO->getAll();

        require_once(VIEWS_PATH."movie-list.php");
        
    }


    public function Add()
    {
        $this->movieDAO->downloadData();
        $this->genderDAO->downloadData();

        $this->ShowAddView();
    }
}

?>