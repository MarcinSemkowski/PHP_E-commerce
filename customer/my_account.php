<!DOCTYPE>
<?php
session_start();
include("../functions/functions.php");
include("../admin_area/includes/db.php")
?>


<html>
    

<head>
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" type="text/css" >
    </head>

<body>
    
    <div class="main_wrapper">
    
        <div class="header_wrapper">
        
            <img id="logo" src="../images/logo.gif"/>
            <img id="banner" src="../images/ad_banner.gif"/>
            
            
            
            <div class="menubar">
              <ul id="menu">
                  <li><a href="index.php" >Home</a> </li>
                   <li><a href="../all_product.php" >All Products</a> </li>
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
            
            <div id="sidebar_title">My Account</div>
            <ul id="cats">
			  
             <?php 
               $user =  $_SESSION['customer_email'];
                $get_img = "SELECT * FROM customers WHERE customer_email='$user' "; 
                 $run_img = mysqli_query($con,$get_img);
                 $row_img = mysqli_fetch_assoc($run_img);
                 $c_image = $row_img['customer_image'];
                 $c_name = $row_img['customer_name'];
                 echo "<img src='customer_images/$c_image' width='150' height='150'/>";
                ?>   
                
                
             <li><a href="my_account.php?my_orders">My Orders</a></li>
                 <li><a href="my_account.php?edit_account">Edit Account</a></li>
                 <li><a href="my_account.php?change_pass">Change Password</a></li>
                 <li><a href="my_account.php?delete_account">Delete Account</a></li>
              
			</ul>
            
            </div>
            
            
            
            </div>
            
             <div id="content_area">
                 <?php cart(); ?>
             <div id="shopping_cart">
            <span style="float:right font-size:15px; padding 5px; line-height: 40px;" >
                
               <?php 
                   if(isset($_SESSION['customer_email'])){
                       echo"<b>Welcome</b> ".$_SESSION['customer_email'];
                   }
                
                
                
                ?> 
                 
                
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
            <h2 style="padding:20px;">Welcome:<?php echo $c_name ?></h2>
            <b>You can see your orders progress by clicking this<a href="my_account.php"?my_orders>link</a></b>
            </div>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>