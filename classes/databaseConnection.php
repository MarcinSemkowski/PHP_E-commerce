<?php

class DatabaseConnection{

private $conn;


public function __construct(){
$conn = mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error;
}

}


function getIP(){
    $ip = $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];    
    }

 return $ip;
}



function cart(){

    global $con;
    
    if(isset($_GET['add_cart'])){
        $ip = getIP();
        
        $pro_id = $_GET['add_cart'];
        $check_pro = "SELECT * FROM cart WHERE ip_add ='$ip' AND p_id = '$pro_id' ";
        
        $run_check = mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check) > 0){
         echo "";    
        } else{
         $insert_pro = "INSERT INTO cart(p_id,ip_add) VALUES('$pro_id','$ip')";    
        $run_pro = mysqli_query($con,$insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}






}



?>