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
            $sql="SELECT * FROM Movie;";

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
                        require_once(VIEWS_PATH."admin-view.php");  
                    }       
                  
        }

       
    }


    public function searchIdMovie($title)
    {
        
        $sql= "SELECT id FROM movie  WHERE title=".'"'.$title.'";';

        try
        {
           
            $this->connection=Connection::GetInstance(); 
            
            
            $value= $this->connection->Execute($sql);
            
           
            foreach ($value as $key =>$valueArray)
            {
                $id=$valueArray['id'];
            }

            return $id;

        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }


    
    public function searchMovie($idMovie)
    {
        
        $sql= "SELECT * FROM movie  WHERE id=".'"'.$idMovie.'";';

        try
        {
           
            $this->connection=Connection::GetInstance(); 
            
            
            $value= $this->connection->Execute($sql);
            
           
            $movie = new Movie();

            foreach($value as $valueArray)
            {

                $movie->setIdMovie($valueArray['id']);
                $movie->setMovieName($valueArray['title']);
                $movie->setPhoto($valueArray['poster']);
                $movie->setoverView($valueArray['overview']);
                $movie->setClassification($valueArray['classification']);
                $movie->setVoteAverage($valueArray['voteAverage']);
                $movie->setVoteCount($valueArray['voteCount']);
                $movie->setOriginalLanguage($valueArray['original_language']);
                $movie->setReleaseDate($valueArray['realeseDate']);
            }

            return $movie;


        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    public function getMovieswithGenders()
    {
      
        $moviegenderDAO= new gendermovieDAO();

        $value=$moviegenderDAO->getNameGendersxMovie();

        $movieList=$this->getAll();

        foreach($value as $gender)
        {
            $idMovie=$gender['idMovie'];
            $nameGender=$gender['nameGender'];

            foreach($movieList as $movie)
            {
                if($movie->getIdMovie() ==$idMovie)
                {
                    
                    $movie->setGender($nameGender);
                }
            }

        }

        return $movieList;
    }


    public function getMoviesVoteAverage()
    {
        $sql="SELECT * FROM movie ORDER BY voteAverage DESC;";

        $movieList=array();
        
        try
        {
                $this->connection=Connection::GetInstance();

                $value=$this->connection->Execute($sql);

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

    public function searchMoviesbyGender($nameGender)
    {
        $sql="SELECT * FROM movie as m INNER JOIN moviexgender as mxg ON m.id=mxg.idMovie INNER JOIN gender as g ON g.id=mxg.idGender WHERE (g.nameGender=".'"'.$nameGender.'"'.") GROUP BY mxg.idMovie;";
        
        $movieList=array();
        
        try
        {
                $this->connection=Connection::GetInstance();

                $value=$this->connection->Execute($sql);

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
                    $movie->setGender($nameGender);

                    array_push($movieList,$movie);
                }
                
                
                return $movieList;


        }
        catch(PDOException $e)
        {
                throw $e;
        }

    }

    public function getMoviesOrderByvoteCount()
    {
        $sql="SELECT * FROM movie ORDER BY voteCount DESC;";

        $movieList=array();

        
        try
        {
            $this->connection=Connection::GetInstance();
            
            $value=$this->connection->Execute($sql);
            
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



                $moviegenderDAO= new gendermovieDAO();
        
                $value=$moviegenderDAO->getNameGendersxMovie();
            
                foreach($value as $gender)
                {
                    $idMovie=$gender['idMovie'];
                    $nameGender=$gender['nameGender'];
        
                    foreach($movieList as $movie)
                    {
                        if($movie->getIdMovie() ==$idMovie)
                        {
                            
                            $movie->setGender($nameGender);
                        }
                    }
        
                }
                
                
                return $movieList;


        }
        catch(PDOException $e)
        {
                throw $e;
        }

    }

    public function searchBar($nameMovie)
    {
        $sql="SELECT * FROM movie as m WHERE m.title LIKE '%$nameMovie%';";

        
        $movieList = array();

        try
        {
            $this->connection=Connection::GetInstance();
            
            $value=$this->connection->Execute($sql);
            
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



                $moviegenderDAO= new gendermovieDAO();
        
                $value=$moviegenderDAO->getNameGendersxMovie();
            
                foreach($value as $gender)
                {
                    $idMovie=$gender['idMovie'];
                    $nameGender=$gender['nameGender'];
        
                    foreach($movieList as $movie)
                    {
                        if($movie->getIdMovie() ==$idMovie)
                        {
                            
                            $movie->setGender($nameGender);
                        }
                    }
        
                }
                
                
                return $movieList;



    }catch(PDOException $e)
    {
        throw $e;
    }
   

    }


}


?>