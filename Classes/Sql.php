<?php

/**
 * Description of Sql
 *
 * @author Moises Pontes
 */
class Sql extends PDO {
    
    private $conn;
    
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7",'root','');
    }
    
    private function setParams($statment, $parameters = array()){
       
       foreach($parameters as $key => $value){
           
           $this->setParam($key, $value);
        } 
    }
    private function setParam($statment, $key, $value){
        $statment->bindParam($key,$value);
    }

    public function query($rawQuary, $params = array()){
        
        $stmt = $this->conn->prepare($rawQuary);
        
        $this->setParams($stmt,$params);
        $stmt->execute();
        return $stmt;
    }
    public function select($rowQuery, $params = array()){
        //echo 'Quary: ' . $rowQuery . '<br>';
        $stmt = $this->query($rowQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
