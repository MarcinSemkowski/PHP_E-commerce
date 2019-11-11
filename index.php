<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("admin_area/includes/db.php")
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
                  <li><a href="index.php" >Home</a> </li>
                   <li><a href="all_product.php" >All Products</a> </li>
                   <li><a href="customer/my_account.php" >My Account</a> </li>
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
            
             <div id="content_area">
                 <?php cart(); ?>
             <div id="shopping_cart">
            <span style="float:right font-size:15px; padding 5px; line-height: 40px;" f>
                
               <?php 
                   if(isset($_SESSION['customer_email'])){
                       echo"<b>Welcome</b> ".$_SESSION['customer_email']." <b style='colr:yellow;'>Your</b>";
                   }else{
                        echo "Welcome Guest !";    
                   }
                
                
                
                ?> 
                 
                
                
                
                <b style="color:yellow">Shopping Cart -</b>Total Items:     <?php echo  total_items(); ?> Total Price: <?php  echo  total_price(); ?> $ <a href="cart.php" style="color:yellow"> Go to Cart ! </a>
                 
                 <?php 
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php' style='color:orange'>Login</a>";
                }else{
                    echo "<a href='logout.php' style='color:orange'>Logout</a>";
                }
                
                
                ?>
                 
                 
                 </span>
                 
                   
            
                 </div> 
               
    
                 
            
        <div id="products_box">
            
            <?php  getPro();?>
             <?php  getCatPro(); ?>
            <?php getBrandPro(); ?>
            </div>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>