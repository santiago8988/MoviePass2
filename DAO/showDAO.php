<?php

namespace DAO;

use Models\Show as Show;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;

class showDAO
{
    private $connection;



    public function Add($newShow)
    {

        try
        {
            $sql= "INSERT INTO Show (show_day,hour,soldTickets,idMovie,idRoom,idCinema,price,capacity) values (:show_day,:hour,:soldTickets,:idMovie,:idRoom,:idCinema,:price,:capacity)";

            $parameters['show_day']=$newShow->getDay();
            $parameters['hour']=$newShow->getHour();
            $parameters['soldTickets']=0;
            $parameters['idMovie']=$newShow->getIdMovie();
            $parameters['idRoom']=$newShow->getIdRoom();
            $parameters['idCinema']=$newShow->getIdCinema();
            $parameters['price']=$newShow->getPrice();
            $parameters['capacity']=$newShow->getCapacity();
            
            $this->connection= Connection::GetInstance();

            return $this->connection->ExecuteNonQuery($sql,$parameters)

        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }


    public function getAll()
    {
        $showList=array();


        try
        {
            $sql= "SELECT * FROM Show";

            $this->connection=Connection::GetInstance();

            $value=$this->connection->Execute($sql);

            foreach($value as $fila)
            {
                $show= new Show();

                $show->setId($fila['id']);
                $show->setDay($fila['show_day']);
                $show->setHour($fila['hour']);
                $show->setSoldtickets($fila['soldTickets']);
                $show->setIdmovie($fila['idMovie']);
                $show->setIdroom($fila['idRoom']);
                $show->setIdCinema($fila['idCinema']);
                $show->setPrice($fila['price']);
                $show->setCapacity($fila['capacity']);

                array_push($showList,$show);
            }

            return $showList;


        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }

}


?>