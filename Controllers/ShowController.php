<?php

namespace Controllers;

use DAO\movieDAO as movieDAO;
use Models\Show as Show;
use DAO\showDAO as showDAO;

class ShowController
{
    private $showDAO;

    public function __construct()
    {
        $this->showDAO=new showDAO();
    }


    public function ShowAddView($idCine,$idRo,$capaci,$pric)
    {
        $idCinema=$idCine;
        $idRoom=$idRo;
        $capacity=$capaci;
        $price=$pric;

      

        $movieDAO= new movieDAO();
        $movieList= $movieDAO->getAll();

        require_once(VIEWS_PATH."add-show.php");
    }

    public function ShowListView()
    {

        $showList= $this->showDAO->getAll();

        require_once(VIEWS_PATH."show-list.php");


    }

    public function Add($idCinema,$idRoom,$capacity,$price,$day,$hour,$idMovie)
    {
        $show= new Show();
        
        $show->setIdCinema($idCinema);
        $show->setDay($day);
        $show->setHour($hour);
        $show->setIdmovie($idMovie);
        $show->setIdroom($idRoom);
        $show->setPrice($price);
        $show->setCapacity($capacity);
        $show->setSoldtickets(0);

       

        $this->showDAO->Add($show);

        require_once(VIEWS_PATH."admin-view.php");


    }

}


?>