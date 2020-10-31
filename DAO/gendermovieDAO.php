<?php

namespace DAO;

use Models\Movie as Movie;
use DAO\movieDAO as movieDAO;
use Models\Gendre as Gendre;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;
use \PDO as PDO;

use Models\GenderMovie as GenderMovie;


class gendermovieDAO
{
    private $connection;


    public function __construct()
    {
        
    }


    public function downloadData()
    {
        $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=".API_KEY."&language=en-US&page=1",true);


        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true):array();
        
        foreach ($arrayToDecode as $key =>$valueArray)
        {
            foreach($valueArray as $key =>$value)
            {
                $movieTitle= $value['title'];
                $genderIDSarray= $value['genre_ids'];

                

                $movieDAO=new movieDAO();
            

                $value=$movieDAO->searchIdMovie($movieTitle);
              
           

                        foreach ($value as $key =>$valueArray)
                        {
                            $idMovie=$valueArray['id'];
                        }

                        echo "idMovie despues del search: ". $idMovie."//////";
                    
                        
                        $parameters['idMovie']=$idMovie;

                        foreach($genderIDSarray as $genderID)
                        {
                            $parameters['idGender']= $genderID;

                        

                            $this->Add($idMovie,$genderID);
                            

                        }
            }
        }
    }


    public function Add($idMovie,$idGender)
    {
        $sql="INSERT INTO MovieXGender(idMovie,idGender) values (:idMovie ,:idGender)";
                  
            $parameters['idMovie']=$idMovie;
            $parameters['idGender']=$idGender;
                    try
                    {
                        $this->connection = Connection::GetInstance();

                        return $this->connection->ExecuteNonQuery($sql,$parameters);
                        
                    }
                    catch(PDOException $e)
                    {
                        throw $e;   
                    }    
    }


}


?>