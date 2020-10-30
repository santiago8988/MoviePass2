<?php

namespace Controllers;

use Models\Show as Show;
use DAO\showDAO as showDAO;

class ShowController
{
    private $showDAO;

    public function __construct()
    {
        $this->showDAO=new showDAO();
    }


    public function ShowAddView()
    {
        require_once(VIEWS_PATH."add-show.php");
    }

    public function ShowListView()
    {
        $arrayShow= $this->showDAO->getAll();
    }

    public function Add($idCinema,$day,$hour,$idMovie,$idRoom,$price,$capacity)
    {
        $show= new Show();

        $show->setIdCinema($idCinema);
        $show->setDay($day);
        $show->setHour($hour);
        $show->setIdmovie($idMovie);
        $show->setIdroom($idRoom);
        $show->setPrice($price);
        $show->setCapacity($capacity);

        $this->showDAO->Add($show);

        $this->ShowAddView();
    }

}


?>