<?php
$con = mysqli_connect("localhost","root","","ecommerce");

function getCats(){
 
    global $con;
    
        
    $get_cats = "select * from categories"; 
    $run_cats = mysqli_query($con,$get_cats);
        
     while($row_cats=mysqli_fetch_array($run_cats)){
       $cat_id = $row_cats['cat_id']; 
       $cat_title = $row_cats['cat_title']; 
         
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
     
	 }      
    
     
}


function getBrands(){
 
    global $con;
    
        
    $get_brands = "select * from brands"; 
    $run_brands = mysqli_query($con,$get_brands);
        
     while($row_brands=mysqli_fetch_array($run_brands)){
       $brand_id = $row_brands['brand_id']; 
       $brand_title = $row_brands['brand_title']; 
         
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
     
	 }      
    
     
}



function getPro(){
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
					<p style= 'text-align: center;'><b> $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
    
    
    }
    }
}
     
    



 function getCatPro(){
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
					<p style= 'text-align: center;'><b> $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
    
    
    }
    }

     
    
    
   
    







