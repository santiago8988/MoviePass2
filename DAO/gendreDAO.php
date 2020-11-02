<?php

namespace DAO;

use Models\Gendre as Gendre;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;
use \PDO as PDO;


class gendreDAO
{

    private $connection;

    public function __construct()
    {
        
    }


    public function getAll ()
    {
      $sql="SELECT * FROM gender;";

        $genderList=array();

        try
        {

            $this->connection=Connection::GetInstance();
            $value=$this->connection->Execute($sql);

            foreach ($value as $valueArray)
            {
                $gender=new Gendre();

                $gender->setIdGender($valueArray['id']);
                $gender->setGenderName($valueArray['nameGender']);

                array_push($genderList,$gender);
            }
            return $genderList;
        }
        catch(PDOException $e)
        {
            throw $e;
        }

    }

 

 

    public function downloadData()
    {
        

        $jsonContent = file_get_contents("https://api.themoviedb.org/3/genre/movie/list?api_key=".API_KEY."&language=en-US",true);

        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true) : array();


        
        foreach ($arrayToDecode  as $key=> $valueArray)
        {   
            
            foreach($valueArray as $key => $gender)
            {
                
                $sql= "INSERT INTO Gender (id,nameGender) values(:id,:nameGender)";
                $parameters['id']=$gender['id'];
                $parameters['nameGender']=$gender['name'];

                try
                {
                    $this->connection=Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($sql,$parameters);
                }
                catch(PDOException $e)
                {   
                    require_once(VIEWS_PATH."admin-view.php");  
                }
            }

        }

        
    }

    

}



?>