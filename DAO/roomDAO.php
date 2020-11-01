<?php

namespace DAO;

use Models\Room as Room;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;

class roomDAO
{
    private $connection;


    public function getAll()
    {
        $roomList=array();

        try
        {
            $sql= "SELECT * FROM Room";

            $this->connection=Connection::GetInstance();
            $value=$this->connection->Execute($sql);

            foreach($value as $fila)
            {
                    $room=new Room();
                    $room->setId($fila['id']);
                    $room->setIdCinema($fila['idCinema']);
                    $room->setName($fila['nameRoom']);
                    $room->setPrice($fila['price']);

                    array_push($roomList,$room);
            }

            return $roomList;

        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }


    public function getroomXcinema($idCinema)
    {
        $sql = "SELECT * FROM Room WHERE idCinema=".$idCinema.";";
        
        $parameters['idCinema']=$idCinema;  

        
        try
        {   

              $this->connection=Connection::GetInstance();

              
              return $this->connection->Execute($sql);
      
  

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }


    public function Add($newRoom)
    {
        try
        {
            $sql="INSERT INTO Room(idCinema,nameRoom,capacity,price) values (:idCinema,:nameRoom,:capacity,:price)";
            $parameters["idCinema"]=$newRoom->getIdCinema();
            $parameters["nameRoom"]=$newRoom->getName();
            $parameters["capacity"]=$newRoom->getCapacity();
            $parameters["price"]=$newRoom->getPrice();
            
            $this->connection= Connection::GetInstance();
            return $this->connection->ExecuteNonQuery($sql,$parameters);

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
}

?>