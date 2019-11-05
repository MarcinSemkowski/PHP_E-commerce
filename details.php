<!DOCTYPE>
<?php
include("functions/functions.php");
?>


<html>
    

<head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" type="text/css" >
    </head>

<body>
    
    <div class="main_wrapper">
    
        <div class="header_wrapper">
        
            <img id="logo" src="images/logo.gif"/>
            <img id="banner" src="images/ad_banner.gif"/>
            
            
            
            <div class="menubar">
              <ul id="menu">
                  <li><a href="#" >Home</a> </li>
                   <li><a href="#" >All Products</a> </li>
                   <li><a href="#" >My Account</a> </li>
                   <li><a href="#" >Sign In</a> </li>
                   <li><a href="#" >Shopping Cart</a> </li>
                   <li><a href="#" >Contact Us</a> </li>
                
                
                </ul>
            
                <div id="form">
                 <form  method="get" action="results.php" enctype="multipart/form-data">
                    
                    <input type="text" name="user_query" placeholder="Search" />
                    <input type="submit" name="search" value="Search" />
                     </form>
                </div>
            </div>
            
        
        </div>
        <div class="content_wrapper">
        <div id="sidebar">
            
            <div id="sidebar_title">Categories</div>
            <ul id="cats">
			  
             <?php getCats();  ?>
              
			</ul>
            
                 <div id="sidebar_title">Brands</div>
            <ul id="cats">
             <?php getBrands(); ?>
            </ul>
            
            </div>
            
            
            
            </div>
            
           
             <div id="shopping_cart">
            <span style="float:right">Welcome Guest ! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="yellow"> Go to Cart ! </a></span>
            </div> 
               
            
        <div id="content_area">
        
         
            
            
        <div id="products_box">
            
            <?php 
            if(isset($_GET['pro_id'])){
                $product_id = $_GET['pro_id'];
            
            $get_products = "SELECT * FROM products WHERE product_id = '$product_id' ";
    
$run_products = mysqli_query($con,$get_products);
    
    
    while($row_products= mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_desc = $row_products['product_desc'];
        $pro_image = $row_products['product_image']; 
         echo "
				<div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
				
					<h3>$pro_title</h3>
					
					<img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='400' height='300' />
					<p style= 'text-align: center;'><b> $ $pro_price</b></p>
                    <a href='index.php' style='float:left;'>Go Back</a>
                    </br>
                    <p>$pro_desc</p>
                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>";
    }
            }
            
            ?>
            
            </div>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>