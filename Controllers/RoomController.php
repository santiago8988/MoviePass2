<?php

namespace Controllers;

use Models\Room as Room;
use DAO\roomDAO as roomDAO;

class RoomController
{
    private $roomDAO;


    public function __construct()
    {
        $this->roomDAO= new roomDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH."add-room.php");
        
    }


    public function ShowListView()
    {
        $roomList=$this->roomDAO->getAll();

        require_once(VIEWS_PATH."room-list.php");
        
    }

    public function ShowListViewxCinema($idCinema)
    {
        $roomList=$this->roomDAO->getroomXcinema($idCinema);
        require_once(VIEWS_PATH."roomXcinema.php");
    }


    public function Add($idCinema,$name,$capacity,$price)
    {
        $room= new Room();

        $room->setIdCinema($idCinema);
        $room->setName($name);
        $room->setCapacity($capacity);
        $room->setPrice($price);

        $this->roomDAO->Add($room);

    }
}


?>