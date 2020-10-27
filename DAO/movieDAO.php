<?php

namespace DAO;

use Models\Movie as Movie;

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
                $movie= new Movie($valueArray['title'],$valueArray[''],$valueArray[''],$valueArray['poster_path'],
                                    $valueArray['overview'],$valueArray['adult'],$valueArray['vote_average'],$valueArray['vote_count'],
                                    $valueArray['original_language'],$valueArray['release_date'],$valueArray['id'],$valueArray['gender']);

                array_push($this->movieList,$movie);
            }
        }
    }

    public function saveData()
    {
        $arrayToEncode = array();

        foreach($this->movieList as $movie)
        {
            $valueArray['title']=$movie->getTitle();
            $valueArray['']=$movie->getDuration();
            $valueArray['']=$movie->getDirector();
            $valueArray['poster_path']="http://image.tmdb.org/t/p/w500".$movie->getPhoto();
            $valueArray['overview']=$movie->getOverview();
            $valueArray['adult']=$movie->getClassification();
            $valueArray['vote_average']=$movie->getVoteAverage();
            $valueArray['vote_count']=$movie->getVoteCount();
            $valueArray['original_language']=$movie->getOriginalLanguage();
            $valueArray['release_date']=$movie->getReleaseDate();
            $valueArray['id']=$movie->getId();

            array_push($arrayToEncode,$valueArray);

        }

        $jsonContent= json_encode($arrayToEncode,JSON_PRETTY_PRINT);

        file_put_contents(ROOT.'Data/movies.json',$jsonContent);
    }

    public function downloadData()
    {
        $this->movieList=array();

        $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=".API_KEY."&language=en-US&page=1",true);

        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true) : array();

        foreach ($arrayToDecode['movies'] as $valueArray)
        {
            $movie = new Movie($valueArray['title'],$valueArray[''],$valueArray[''],$valueArray['poster_path'],
            $valueArray['overview'],$valueArray['adult'],$valueArray['vote_average'],$valueArray['vote_count'],
            $valueArray['original_language'],$valueArray['release_date'],$valueArray['id'],$valueArray['gender']);

            array_push($this->movieList,$movie);
        }

        $this->saveData();
    }


}


?>