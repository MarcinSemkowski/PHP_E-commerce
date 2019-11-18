<?php 

class GetFromDatabase extends AbstractDatabaseConnection{





public function getCustomerImage($user){

     $get_image = "SELECT * FROM customers WHERE customer_email = '".$user."' "; 
    $run_image = mysqli_query($this->getCon(),$get_image);
        
     while($row_image=mysqli_fetch_array($run_image)){
       $c_name = $row_image['customer_name']; 
       $c_image = $row_image['customer_image']; 
         
        echo "<img src='customer_images/".$c_image."' width='150' height='150' ";
     
     }      
}



public function getCats(){
 
    
    
        
    $get_cats = "select * from categories"; 
    $run_cats = mysqli_query($this->getCon(),$get_cats);
        
     while($row_cats=mysqli_fetch_array($run_cats)){
       $cat_id = $row_cats['cat_id']; 
       $cat_title = $row_cats['cat_title']; 
         
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
     
	 }      
    
     
}


public function getBrands(){
 
    
    
        
    $get_brands = "select * from brands"; 
    $run_brands = mysqli_query($this->getCon(),$get_brands);
        
     while($row_brands=mysqli_fetch_array($run_brands)){
       $brand_id = $row_brands['brand_id']; 
       $brand_title = $row_brands['brand_title']; 
         
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
     
	 }      
    
     
}




public function getPro(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
   
 
    $get_products = "SELECT * FROM products order by RAND() LIMIT 0,6";
    
$run_products = mysqli_query($this->getCon(),$get_products);
    
    
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
        
   
 
    $get_cat_pro = "SELECT * FROM products WHERE product_cat= '$cat_id'";
    
$run_cat_pro = mysqli_query($this->getCon(),$get_cat_pro);
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
        
   
 
    $get_brand_pro = "SELECT * FROM products WHERE product_brand = '$brand_id'";
    
$run_brand_pro = mysqli_query($this->getCon(),$get_brand_pro);
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

 public function getBrandsInOption(){
 	      $get_brands = "select * from brands"; 
                        $run_brands = mysqli_query($this->getCon(),$get_brands);

                       while($row_brands=mysqli_fetch_array($run_brands)){
                       $brand_id = $row_brands['brand_id']; 
                       $brand_title = $row_brands['brand_title']; 

                        echo "<option value='$brand_id'>$brand_title</option>";

                       } 
 }



 public function getCatsInOption(){
  
                           $get_cats = "select * from categories"; 
                        $run_cats = mysqli_query($this->getCon(),$get_cats);

                       while($row_cats=mysqli_fetch_array($run_cats)){
                       $cat_id = $row_cats['cat_id']; 
                       $cat_title = $row_cats['cat_title']; 

                        echo "<option value='$cat_id'>$cat_title</option>";

                       }      


 }










}





?>