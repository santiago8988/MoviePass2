<?php

namespace DAO;

use Models\Gendre as Gendre;

class gendreDAO
{

    private $gendreList;

    public function __construct()
    {
        $this->gendreList=array();
    }

    public function getGenderList()
    {
        return $this->gendreList;
    }

    public function getAll ()
    {
        $this->retrieveData();

        return $this->gendreList;
    }

    public function retrieveData()
    {
        $this->gendreList=array();

        if(file_exists(dirname(__DIR__).'/Data/gendre.json'))
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

        file_put_contents(dirname(__DIR__).'/Data/gendre.json',$jsonContent);
    }

    public function downloadData()
    {
        

        $jsonContent = file_get_contents("https://api.themoviedb.org/3/genre/movie/list?api_key=".API_KEY."&language=en-US",true);

        $arrayToDecode=($jsonContent) ? json_decode($jsonContent,true) : array();


        foreach ($arrayToDecode['genres'] as $valueArray)
        {
            $gender = new Gendre ($valueArray['id'],$valueArray['name']);

            array_push($this->gendreList,$gender);
        }

         $this->saveData();
    }

}



?>