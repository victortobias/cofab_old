<?php

class Sql extends PDO {

    private $conn;

    public function __construct(){
        //setado o charset para UTF-8
        $this->conn = new PDO("mysql:host=localhost;dbname=dbname", "root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));


    }


    private function setParams($statment, $parameters = array()){

    	foreach ($parameters as $key => $value) {
        	
        	$this->setParam($statment, $key, $value);
    }

}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);

	}

    public function query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);

      	$this->setParams($stmt, $params);

      	$stmt->execute();

      	return $stmt;

        }
    
    public function select($rawQuery, $params = array()):array
    {

    	$stmt = $this->query($rawQuery, $params);

    	return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

}



?>
