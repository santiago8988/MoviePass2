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
        $this->connection=new Connection();
    }


    public function getAll()
    {
        $gendermovieList=array();

        try
        {
            $sql="SELECT * FROM moviexgender;";

            $this->connection=Connection::GetInstance();
            $value = $this->connection->Execute($sql);

            

            foreach ($value as $fila)
            {
                $gendermovie = new GenderMovie();

                $gendermovie->setIdGender($fila['idGender']);
                $gendermovie->setIdMovie($fila['idMovie']);
                

                array_push($gendermovieList,$gendermovie);

            }
            return $gendermovieList;
            
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }


    public function downloadData2()
    {
        $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=".API_KEY."&language=en-US&page=1",true);


        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true):array();


        foreach ($arrayToDecode['results'] as $valueArray)
        {

            
            $movieTitle = $valueArray['title'];
            $genderArray=$valueArray['genre_ids'];

            $movieDAO= new movieDAO();

            $idMovie =$movieDAO->searchIdMovie($movieTitle);


            foreach($genderArray as $gender)
            {
                $this->Add($idMovie,$gender);
            }

            

        }

    }


    public function Add($idMovie,$idGender)
    {
        $sql="INSERT INTO MovieXGender(idMovie,idGender) values (:idMovie ,:idGender);";
                  
            $parameters['idMovie']=$idMovie;
            $parameters['idGender']=$idGender;
                    try
                    {
                        $this->connection = Connection::GetInstance();

                       $this->connection->ExecuteNonQuery($sql,$parameters);
                        
                    }
                    catch(PDOException $e)
                    {
                        require_once(VIEWS_PATH."admin-view.php");   
                    }    
    }


    public function getNameGendersxMovie()
    {
        $sql="SELECT mxg.idMovie,g.nameGender FROM `moviexgender` as mxg INNER JOIN `gender` as g ON mxg.idGender=g.id ORDER BY mxg.idMovie ASC;";
       

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


}


?>