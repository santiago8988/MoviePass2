<?php

namespace DAO;

use Models\Cinema as Cinema;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;
use \PDO as PDO;

class cinemaDAO
{
    private $connection;

    public function __construct()
    {
        $connection= new Connection();
    }

    public function getAll()
    {
        $cinemaList=array();

        try
        {
            $sql="SELECT * FROM Cinema";

            $this->connection=Connection::GetInstance();
            $value = $this->connection->Execute($sql);

            

            foreach ($value as $fila)
            {
                $cinema = new Cinema();

                $cinema->setIdCinema($fila['id']);
                $cinema->setName($fila['nameCinema']);
                $cinema->setAdress($fila['adress']);

                array_push($cinemaList,$cinema);

            }
            return $cinemaList;
            
        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }

    public function Add($newCinema)
    {

        $sql="INSERT INTO Cinema(nameCinema,adress) values (:nameCinema,:adress)";
        $parameters["nameCinema"]=$newCinema->getName();
        $parameters["adress"]=$newCinema->getAdress();

        
        try
        {
            $this->connection= Connection::GetInstance();
           
           return $this->connection->ExecuteNonQuery($sql,$parameters);

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    
    }

    public function searchCinema($idCinema)
    {
        $sql= "SELECT * FROM cinema  WHERE id=".'"'.$idCinema.'";';

        try
        {
           
            $this->connection=Connection::GetInstance(); 
            
            
            $value= $this->connection->Execute($sql);
            
           
            $cinema = new Cinema();

            foreach($value as $valueArray)
            {
                $cinema->setIdCinema($valueArray['id']);
                $cinema->setName($valueArray['nameCinema']);
                $cinema->setAdress($valueArray['adress']);

            }

            return $cinema;


        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }

    public function delete($idCinema)
    {
        $sql=";"; //agregar un campo a Model\Cinema----->isActive, ya que no lo quiero borrar de la base de datos, solo no lo voy a querer mostrar.
    }

    public function updateCinema($idCinema,$name,$adress)
    {
        $sql="UPDATE cinema SET nameCinema=".'"'."$name".'"'.",adress=".'"'."$adress".'"'." WHERE id="."$idCinema".";";

        $parameters["nameCinema"]=$idCinema;
        $parameters["adress"]=$adress;


        try
        {
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