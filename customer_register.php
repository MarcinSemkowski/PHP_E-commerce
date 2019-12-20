<!DOCTYPE>
<?php
session_start();

include("classes/AbstractDatabaseConnection.php");  
include("classes/Category.php");
include("classes/Brand.php");
include("classes/Product.php");
include("classes/Cart.php");
include("classes/Customer.php");


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
                   <li><a href="customer/my_account.php" >My Account</a> </li>
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

             $categories->getAllCatsFromDatabase();; 
              ?>
              
			</ul>
            
                 <div id="sidebar_title">Brands</div>
            <ul id="cats">
             <?php
              $brand = new Brand();
              $brand->getAllBrandsFromDatabase(); 
              ?>
               
            </ul>
            
            </div>
            
            
            
            </div>
            
             <div id="content_area">
                 <?php 
                 if(isset($_GET['add_cart'])){
                     $id = $_GET['add_cart']; 
                  $cart->getCart($Id); 
                    }
                   ?>
             <div id="shopping_cart">
           <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: <?php $cart->totalItems();?> Total Price: <?php $cart->totalPrice(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					
					
					</span>
            	


            	<form action="customer_register.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>
						
						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Image:</td>
							<td><input type="file" name="c_image" required/></td>
						</tr>
						
						
						
						<tr>
							<td align="right">Customer Country:</td>
							<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>
							
							</td>
						</tr>
						
						<tr>
							<td align="right">Customer City:</td>
							<td><input type="text" name="c_city" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Contact:</td>
							<td><input type="text" name="c_contact" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" required/></td>
						</tr>
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
                
        </div>
            
           
            </div>
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    </div>
    
    </body>
    
    
</html>

<?php 

if(isset($_POST['regiester'])){

  $customer = new Customer();

  $ip = $customer->getIP();

  $customer->setIP($ip);

 @    $c_name = $_POST['c_name'];
 $customer->setName($c_name);

 
 @  $c_pass = $_POST['c_pass'];
 $customer->setPass($c_pass);  

 
 @ $c_country = $_POST['c_country'];
 $customer->setCountry($c_country);

 
 @$c_email = $_POST['c_email'];
$customer->setEmail($c_email); 
 
 @  $c_image = $_FILES['c_image']['name'];
 $customer->setImage($c_image);
 
 @ $c_image_tmp = $_FILES['c_image']['tmp_name'];
 $customer->setImageTmp($c_image_tmp);
 
 @ $c_city = $_POST['c_city'];
 $customer->setCity($c_city);
 
 @ $c_contact = $_POST['c_contact'];
 $customer->setContact($c_contact); 
 
 @ $c_adress = $_POST['c_adress']; 
 $customer->setAdress($c_adress);
    
  

   $customer->insertCustomer($customer);
    
    
}


?>