<?php

abstract class AbstractDatabaseConnection {

private $con;


 public   function __construct(){


$this->con = mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error;
}

}



 
protected    function getIP(){
    $ipAdress = $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ipAdress = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];    
    }

 return $ipAdress;
}



protected function getCon(){
    return $this->con;
}




 
 






}



?>