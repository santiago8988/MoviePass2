<?php

namespace DAO;

use Models\Movie as Movie;
use DAO\gendreDAO as gendreDAO;
use Models\Gendre as Gendre;

class movieDAO
{
    private $movieList=array();


    public function getAll ()
    {
        $this->retrieveData();

        

        return $this->movieList;
    }

    public function retrieveData()
    {
        $this->movieList=array();

        if(file_exists(ROOT.'Data/movies.json'))
        {
            $jsonContent= file_get_contents(ROOT.'Data/movies.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();


            foreach ($arrayToDecode as $valueArray)
            {
                $movie= new Movie($valueArray['title'],$valueArray['poster_path'],
                                    $valueArray['overview'],$valueArray['adult'],$valueArray['vote_average'],$valueArray['vote_count'],
                                    $valueArray['original_language'],$valueArray['release_date'],$valueArray['id']);

                $movie->setGender($valueArray['gender']);

                array_push($this->movieList,$movie);
            }
        }
    }

    public function saveData()
    {
        $arrayToEncode = array();

        foreach($this->movieList as $movie)
        {
            $valueArray['title']=$movie->getMovieName();
            $valueArray['poster_path']="http://image.tmdb.org/t/p/w500".$movie->getPhoto();
            $valueArray['overview']=$movie->getOverview();
            $valueArray['adult']=$movie->getClassification();
            $valueArray['vote_average']=$movie->getVoteAverage();
            $valueArray['vote_count']=$movie->getVoteCount();
            $valueArray['original_language']=$movie->getOriginalLanguage();
            $valueArray['release_date']=$movie->getReleaseDate();
            $valueArray['id']=$movie->getIdMovie();
            $valueArray['gender']=$movie->getGender();

            array_push($arrayToEncode,$valueArray);

        }

        $jsonContent= json_encode($arrayToEncode,JSON_PRETTY_PRINT);

        file_put_contents(ROOT.'Data/movies.json',$jsonContent);
    }

    public function downloadData()
    {
        $this->movieList=array();

        $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=".API_KEY."&language=en-US&page=1",true);


        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true):array();
        
        foreach ($arrayToDecode['results'] as $valueArray)
        {
            
                $movie = new Movie();
               
                $movie->setMovieName($valueArray['title']);
                $movie->setPhoto($valueArray['poster_path']);
                $movie->setOverview($valueArray['overview']);
                $movie->setClassification($valueArray['adult']);
                $movie->setVoteAverage($valueArray['vote_average']);
                $movie->setVoteCount($valueArray['vote_count']);
                $movie->setOriginalLanguage( $valueArray['original_language']);
                $movie->setReleaseDate($valueArray['release_date']);
                $movie->setIdMovie($valueArray['id']);
               
                $gender_IDS=array();
                $gender_IDS=$valueArray['genre_ids'];

                $genderDAO= new gendreDAO();
                $genderList= $genderDAO->getAll();

                foreach ($gender_IDS as $genderID)
                {
                    foreach ($genderList as $gender)
                    {
                        if($genderID==$gender->getIdGender())
                        {
                            $array=$movie->getGender();
                            array_push($array,$gender->getGenderName());
                            $movie->setGender($array);

                        }
                    }
                }

                array_push($this->movieList,$movie);
                  
        }

       $this->saveData();
    }


}


?>