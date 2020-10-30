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
        require_once(VIEWS_PATH."add-cinema.php");
        
    }

    public function ShowListView()
    {
        $arrayCinemas = $this->cinemaDAO->getAll();

        require_once(VIEWS_PATH."cinema-list.php");
        
    }

    public function Add($name,$adress)
    {
        $cinema= new Cinema();
        
       
        $cinema->setAdress($adress);
        $cinema->setName($name);

        $this->cinemaDAO->Add($cinema);
        

        
        $this->ShowAddView();

    }

    public function Remove($idCinema)
    {
        $this->cinemaDAO->delete($idCinema);
        
      $this->ShowListView();
    }

    public function Edit($idCinema)
    {
        $cinema = $this->cinemaDAO->searchCinema($idCinema);

        require_once(VIEWS_PATH."editCinema.php");
    }

    public function update($id,$name,$adress,$room,$price)
    {
        $this->cinemaDAO->updateCinema($id,$name,$adress,$room,$price);

        $this->ShowListView();
    }

}




?>