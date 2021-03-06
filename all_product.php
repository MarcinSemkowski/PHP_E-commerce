
<!DOCTYPE>
<?php
include("classes/AbstractDatabaseConnection.php");  
include("classes/Category.php");
include("classes/Brand.php");
include("classes/Product.php");
include("classes/Cart.php");
include("classes/Customer.php");


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
                   <li><a href="customer/my_account.php" >My Account</a> </li>
                   <li><a href="customer_register.php" >Sign In</a> </li>
                   <li><a href="cart.php" >Shopping Cart</a> </li>
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
               $categories = new Category(); 
              $categories->getAllCatsFromDatabase();  ?>
              
			</ul>
            
                 <div id="sidebar_title">Brands</div>
            <ul id="cats">
              
               <?php
                $brands = new Brand();
               $brands->getAllBrandsFromDatabase();  ?>
               
            </ul>
            
            </div>
            
            
            
            </div>
            
           
             <div id="shopping_cart">
            <span style="float:right">Welcome Guest ! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="yellow"> Go to Cart ! </a></span>
            </div> 
               
            
        <div id="content_area">
        
         
            
            
        <div id="products_box">
         <?php 
         $product = new Product();
          $product->getAllProductFromDatabase();
            
            ?>
            </div>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>