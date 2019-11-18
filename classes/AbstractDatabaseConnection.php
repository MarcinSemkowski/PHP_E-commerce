<?php

abstract class AbstractDatabaseConnection {

private $con;


 public   function __construct(){


$this->con = mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error;
}

}



 
private   function getIP(){
    $ipAdress = $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ipAdress = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ipAdress = $_SERVER['HTTP_X_FORWARDED_FOR'];    
    }

 return $ipAdress;
}



public function cart(){

    
    
    if(isset($_GET['add_cart'])){
        $ip = getIP();
        
        $pro_id = $_GET['add_cart'];
        $check_pro = "SELECT * FROM cart WHERE ip_add ='$ip' AND p_id = '$pro_id' ";
        
        $run_check = mysqli_query($this->con,$check_pro);
        if(mysqli_num_rows($run_check) > 0){
         echo "";    
        } else{
         $insert_pro = "INSERT INTO cart(p_id,ip_add) VALUES('$pro_id','$ip')";    
        $run_pro = mysqli_query($this->con,$insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


 
 public  function total_price(){
    
    
    $total  = 0;
    
    $ip = $this->getIP();
    $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
    
    $run_price = mysqli_query($this->con,$sel_price);

    while($p_price = mysqli_fetch_array($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id' ";
        $pro_query = mysqli_query($this->con,$pro_price);
        
        while($r_pro = mysqli_fetch_array($pro_query)){
            $price_pro = array($r_pro['product_price']);
          $values = array_sum($price_pro);
            $total += $values;
        }
    }
     return $total;
}


public  function total_items(){
    
      
    
    if(isset($_GET['add_cart'])){
        $ip =  $this->getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '$ip' ";
        $run_items = mysqli_query($this->con,$get_items);
        $count_items = mysqli_num_rows($run_items);
        } else{
         $ip = $this->getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '$ip' ";
        $run_items = mysqli_query($this->con,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    
    return $count_items;
}


protected function getCon(){
    return $this->con;
}




public function __destruct(){
    
}





}



?>