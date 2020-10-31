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
        $this->retrieveData();

        return $this->gendreList;
    }

    public function retrieveData()
    {
        $this->gendreList=array();

        if(file_exists(ROOT.'/Data/gendre.json'))
        {
            $jsonContent= file_get_contents(dirname(__DIR__).'/Data/gendre.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

            foreach ($arrayToDecode as $valueArray)
            {
                $gendre= new Gendre($valueArray['id'],$valueArray['name']);

                array_push($this->gendreList,$gendre);
            }
        }
    }

    public function saveData()
    {
        $arrayToEncode = array();

        foreach($this->gendreList as $gender)
        {
            $valueArray['id']=$gender->getIdGender();
            $valueArray['name']=$gender->getGenderName();
      

            array_push($arrayToEncode,$valueArray);

        }

        $jsonContent= json_encode($arrayToEncode,JSON_PRETTY_PRINT);

        file_put_contents(ROOT.'/Data/gendre.json',$jsonContent);
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
                    throw $e;
                }
            }

        }

        
    }

}



?>