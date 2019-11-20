<!DOCTYPE>
<?php
session_start();
include("classes/AbstractDatabaseConnection.php");
include("classes/Cart.php");
include("classes/Category.php");
include("classes/Brand.php");



$cart = new Cart();

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
			  
              <?php 
             $category = new Category();
             $category->getAllCatsFromDatabase();  
             ?>
              
			</ul>
            
                 <div id="sidebar_title">Brands</div>
            <ul id="cats">
              <?php 
              $brands = new Brand();
             $brands->getAllBrandsFromDatabase(); ?>
               
            </ul>
            
            </div>
            
            
            
            </div>
            
             <div id="content_area">

                  <?php
                    if(isset($_GET['add_cart'])){
                     $id = $_GET['add_cart']; 
                      $cart->getCart($catId); 
                   }
                   ?>
             <div id="shopping_cart">
            <span style="float:right">
                
                
                   <?php 
                   if(isset($_SESSION['customer_email'])){
                       echo"<b>Welcome</b> ".$_SESSION['customer_email']." <b style='colr:yellow;'>Your</b>";
                   }else{
                        echo "Welcome Guest !";    
                   }
                
                
                
                ?> 
                
                
                
                
                <b style="color:yellow">Shopping Cart -</b>Total Items:     <?php echo $cart->totalItems(); ?> Total Price: <?php echo $cart-> totalPrice(); ?> $ <a href="index.php" style="color:yellow"> Back to Shop </a>
                 
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
            <?php
            $cart->getFormCart();
             ?>         
            
            <?php 
              
         
                
            if(isset($_POST['continue'])){
                echo "<script>window.open('index.php','_self')</script>";
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