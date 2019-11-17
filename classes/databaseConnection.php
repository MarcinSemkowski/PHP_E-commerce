<?php

class DatabaseConnection {

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



public function cart(){

    
    
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


 
 public  function total_price(){
    
    
    $total  = 0;
    
    $ip = getIP();
    $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
    
    $run_price = mysqli_query($con,$sel_price);

    while($p_price = mysqli_fetch_array($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id' ";
        $pro_query = mysqli_query($con,$pro_price);
        
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
        $ip = getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '$ip' ";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
        } else{
         $ip = getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '$ip' ";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    
    return $count_items;
}


public function getCats(){
 
    
    
        
    $get_cats = "select * from categories"; 
    $run_cats = mysqli_query($con,$get_cats);
        
     while($row_cats=mysqli_fetch_array($run_cats)){
       $cat_id = $row_cats['cat_id']; 
       $cat_title = $row_cats['cat_title']; 
         
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
     
	 }      
    
     
}

public function getBrands(){
 
    global $con;
    
        
    $get_brands = "select * from brands"; 
    $run_brands = mysqli_query($con,$get_brands);
        
     while($row_brands=mysqli_fetch_array($run_brands)){
       $brand_id = $row_brands['brand_id']; 
       $brand_title = $row_brands['brand_title']; 
         
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
     
	 }      
    
     
}

public function getPro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
    global $con;
 
    $get_products = "SELECT * FROM products order by RAND() LIMIT 0,6";
    
$run_products = mysqli_query($con,$get_products);
    
    
    while($row_products= mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_cat = $row_products['product_cat'];
        $pro_brand = $row_products['product_brand'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_desc = $row_products['product_desc'];
        $pro_image = $row_products['product_image']; 
         echo "
				<div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
				
					<h3>$pro_title</h3>
					
					<img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
					<p style= 'text-align: center;'><b> Price: $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
    
    
    }
    }
}
     

public  function getCatPro(){
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        
    global $con;
 
    $get_cat_pro = "SELECT * FROM products WHERE product_cat= '$cat_id'";
    
$run_cat_pro = mysqli_query($con,$get_cat_pro);
 $count_cats = mysqli_num_rows($run_cat_pro);
        
        if($count_cats==0){
            echo "<h2>There is no product in this category !</h2> ";
        }
    
    
    while($row_cat_pro= mysqli_fetch_array($run_cat_pro)){
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_desc = $row_cat_pro['product_desc'];
        $pro_image = $row_cat_pro['product_image']; 
         echo "
				<div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
				
					<h3>$pro_title</h3>
					
					<img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
					<p style= 'text-align: center;'><b>Price: $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
    
    
    }
    }




public  function getBrandPro(){
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        
    global $con;
 
    $get_brand_pro = "SELECT * FROM products WHERE product_brand = '$brand_id'";
    
$run_brand_pro = mysqli_query($con,$get_brand_pro);
 $count_brands = mysqli_num_rows($run_brand_pro);
        
        if($count_brands==0){
            echo "<h2>There is no product in this brand !</h2> ";
        }
    
    
    while($row_brand_pro= mysqli_fetch_array($run_brand_pro)){
        $pro_id = $row_brand_pro['product_id'];
        $pro_cat = $row_brand_pro['product_cat'];
        $pro_brand = $row_brand_pro['product_brand'];
        $pro_title = $row_brand_pro['product_title'];
        $pro_price = $row_brand_pro['product_price'];
        $pro_desc = $row_brand_pro['product_desc'];
        $pro_image = $row_brand_pro['product_image']; 
         echo "
				<div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
				
					<h3>$pro_title</h3>
					
					<img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
					<p style= 'text-align: center;'><b> Price $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
    
    
    }
    }



public function __destruct()
{
    ;
}



}



?>