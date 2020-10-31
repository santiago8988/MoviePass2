<?php

namespace Controllers;

use Models\Room as Room;
use DAO\roomDAO as roomDAO;
use Controllers\CinemaController as CinemaController;

class RoomController
{
    private $roomDAO;


    public function __construct()
    {
        $this->roomDAO= new roomDAO();
    }

    public function ShowAddView($idCinema)
    {

        $idCinema=$idCinema;
        require_once(VIEWS_PATH."add-room.php");
        
    }


    public function ShowListView()
    {
        $roomList=$this->roomDAO->getAll();

        require_once(VIEWS_PATH."room-list.php");
        
    }

    public function ShowListViewxCinema($id,$name)
    {   
        $cinemaName=$name;
        $idCinema=$id;
        $roomList=array();

        $roomDAO= new roomDAO();

        $value=$roomDAO->getroomXcinema($idCinema);

        

        if(!empty($value))
        {
            foreach($value as $fila)
            {
              $room=new Room();
              $room->setId($fila['id']);
              $room->setIdCinema($fila['idCinema']);
              $room->setName($fila['nameRoom']);
              $room->setPrice($fila['price']);
              $room->setCapacity($fila['capacity']);

              array_push($roomList,$room);
              
            }

          }

   
       
        require_once(VIEWS_PATH."roomXcinema.php");
    }


    public function Creat($idCinema,$name,$capacity,$price)
    {
        $room= new Room();

        $room->setIdCinema($idCinema);
        $room->setName($name);
        $room->setCapacity($capacity);
        $room->setPrice($price);

        $this->roomDAO->Add($room);

        $cinemaController = new CinemaController();
        $cinemaController->ShowListView();
       

    }
}


?>