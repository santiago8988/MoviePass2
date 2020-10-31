<?php

namespace DAO;

use Models\Movie as Movie;
use Models\Gendre as Gendre;
use PDOException;
use DAO\Connection as Connection;
use DAO\QueryType as QueryType;
use \PDO as PDO;
use DAO\gendreDAO as gendreDAO;
use DAO\gendermovieDAO as gendermovieDAO;

class movieDAO
{
    private $connection;

    public function __construct()
    {
        
    }


    public function getAll ()
    {
        $movieList=array();

        try
        {
            $sql="SELECT * FROM Movie";

            $this->connection=Connection::GetInstance();
            $value = $this->connection->Execute($sql);

            foreach ($value as $fila)
            {
                $movie = new Movie();

                $movie->setIdMovie($fila['id']);
                $movie->setMovieName($fila['title']);
                $movie->setPhoto($fila['poster']);
                $movie->setoverView($fila['overview']);
                $movie->setClassification($fila['classification']);
                $movie->setVoteAverage($fila['voteAverage']);
                $movie->setVoteCount($fila['voteCount']);
                $movie->setOriginalLanguage($fila['original_language']);
                $movie->setReleaseDate($fila['realeseDate']);

                array_push($movieList,$movie);

            }
            return $movieList;
            
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    public function downloadData()
    {
        

        $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=".API_KEY."&language=en-US&page=1",true);


        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true):array();
        
        foreach ($arrayToDecode['results'] as $valueArray)
        {
            $sql= "INSERT INTO Movie (title,poster,overview,classification,voteAverage,voteCount,original_language,duration,realeseDate) 
                               values(:title,:poster,:overview,:classification,:voteAverage,:voteCount,:original_language,:duration,:realeseDate)";
              

                $parameters['title']=$valueArray['title'];
                $parameters['poster']=$valueArray['poster_path'];
                $parameters['overview']=$valueArray['overview'];
                $parameters['classification']=$valueArray['adult'];
                $parameters['voteAverage']=$valueArray['vote_average'];
                $parameters['voteCount']=$valueArray['vote_count'];
                $parameters['original_language']=$valueArray['original_language'];
                $parameters['duration']=0;
                $parameters['realeseDate']=$valueArray['release_date'];

              
                try
                {
                    $this->connection = Connection::GetInstance();
                     $this->connection->ExecuteNonQuery($sql,$parameters);
                    
                        
                    }
                    catch(PDOException $e)
                    {
                        throw $e;   
                    }       
                  
        }

       
    }


    public function searchIdMovie($title)
    {

        $sql= "SELECT * FROM Movie  WHERE title='$title'";
        
        try
        {
           
            $this->connection=Connection::GetInstance(); 
            return $this->connection->Execute($sql);
     
            
           /* foreach ($value as $key =>$valueArray)
            {
                $id=$valueArray['id'];
            }
            
            return $id;*/

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }


}


?>