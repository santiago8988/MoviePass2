<?php

namespace DAO;

use \PDO as PDO;
use \Exception as Exception;
use DAO\QueryType as QueryType;

class Connection
{

    private $pdo=null;
    private $pdoStatement=null;
    private static $instance=null;


    public function __construct()
    {
        try
        {   
            $this->pdo = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
           echo "fallo en la conexion--->". $e->getMessage();
        }
    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new Connection();

        return self::$instance;
    }

    public function Execute($query, $parameters = array(),$queryType=QueryType::Query)
    {
        try
        {
            $this->pdoStatement = $this->pdo->prepare($query);
            foreach($parameters as $parameterName =>$value)
            {
                $this->pdoStatement->bindParam(":".$parameterName,$value);
            } 

            $this->pdoStatement->execute();

            return $this->pdoStatement->fetchAll();
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
    
    public function ExecuteNonQuery($query, $parameters = array(),$queryType=QueryType::Query)
    {            
        try
        {
            $this->pdoStatement = $this->pdo->prepare($query);
           
           foreach($parameters as $parameterName =>$value)
           {
               
               $this->pdoStatement->bindParam(":$parameterName",$parameters[$parameterName]);
           } 
            $this->pdoStatement->execute();

            return $this->pdoStatement->rowCount();
        }
        catch(Exception $e)
        {
            throw $e;
        }        	    	
    }
    
    private function Prepare($query)
    {
        try
        {
            $this->pdoStatement = $this->pdo->prepare($query);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
    
    private function BindParameters($parameters = array(), $queryType = QueryType::Query)
    {
        $i = 0;

        foreach($parameters as $parameterName => $value)
        {                
            $i++;

            if($queryType == QueryType::Query)
                $this->pdoStatement->bindParam(":".$parameterName, $parameters[$parameterName]);
            else
                $this->pdoStatement->bindParam($i, $parameters[$parameterName]);
        }
    }

}

?>