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

        //falta vista 
    }

    public function ShowListView()
    {
        $movieList = $this->movieDAO->getAll();
        $genderList = $this->genderDAO->getAll();

        require_once(VIEWS_PATH."movie-list.php");
        //falta vista listar las pelis
    }


    public function Add()
    {
        $this->movieDAO->downloadData();
        $this->genderDAO->downloadData();

        $this->ShowAddView();
    }
}

?>