<?php

namespace Controllers;

use Models\Cinema as Cinema;
use DAO\cinemaDAO as cinemaDAO;



class CinemaController
{
    private $cinemaDAO;


    public function __construct()
    {
        $this->cinemaDAO = new cinemaDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH."cinema-add.php");
        //falta vista agregar cine con formulario
    }

    public function ShowListView()
    {
        $cinemaList = $this->cinemaDAO->getAll();

        require_once(VIEWS_PATH."cinema-list.php");
        //falta vista listar los cines
    }

    public function Add($idCinema,$adress,$name,$room,$price)
    {
        $cinema= new Cinema();
        $cinema->setIdCinema($idCinema);
        $cinema->setAdress($adress);
        $cinema->setName($name);
        $cinema->setRoom($room);
        $cinema->setPrice($price);

        $this->cinemaDAO->Add($cinema);

        $this->ShowAddView();

    }

}




?>