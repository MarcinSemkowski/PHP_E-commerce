<!DOCTYPE>
<?php
include("functions/functions.php");
include("admin_area/includes/db.php");


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
            <span style="float:right">Welcome Guest ! <b style="color:yellow">Shopping Cart -</b>Total Items:     <?php echo  total_items(); ?> Total Price: <?php  echo  total_price(); ?> $ <a href="cart.php" style="color:yellow"> Go to Cart ! </a></span>
            
                 </div> 
               
    
                 
           <form  method="post" enctype="multipart/form-data">
                 
                  <table align="center" width="900">
               
                      <tr align="center">
                       <td colspan="8"><h2>Create an Account</h2></td>  
                      </tr> 

                      <tr>
                       <td align="right">Customer Name:</td>
                          <td><input type="text" name="c_name" required /></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Customer Email</td>
                          <td><input type="text" name="c_email"  required/></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Cutomer Password</td>
                          <td><input type="password" name="c_pass" required /></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Cutomer Image</td>
                          <td><input type="file" name="c_image" required /></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Customer Country</td>
                          <td><select name="c_country" required>
                           <option>Select a Country</option>
                              <option>Afganistan</option>
                              <option>India</option>
                              <option>Japan</option>
                              <option>Pakistan</option>
                              <option>Israel</option>
                              <option>United Arab Emirates</option>
                              <option>United States</option>
                              <option>United Kingdom</option>
                           </select>
                           </td>
                           
                      </tr>
                      
                       <tr>
                       <td align="right">Customer City</td>
                          <td><input type="text" name="c_city" /></td>
                      </tr> 
                      
                       <tr>
                       <td align="right">Customer Contact</td>
                          <td><input type="text" name="c_contact" /></td>
                      </tr> 
                      
                       <tr>
                       <td align="right">Customer Adress</td>
                          <td><input type="text" name="c_adress" /></td>
                      </tr> 
               
                      <tr>
                      <td align="right"><input type="submit" name="regiester" value="Create Account" /></td>
                      </tr>
                     
               
               </table>               
                 
                 
                 </form>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>

<?php 

if(isset($_POST['regiester'])){
    $ip = getIP();
 @    $c_name = $_POST['c_name'];
  @  $c_pass = $_POST['c_pass'];
   @ $c_pass_hash = password_hash($c_pass, PASSWORD_DEFAULT);
   @ $c_country = $_POST['c_country'];
 @    $c_email = $_POST['c_email']; 
  @  $c_image = $_FILES['c_image']['name'];
   @ $c_image_tmp = $_FILES['c_image']['tmp_name'];
    @ $c_city = $_POST['c_city'];
 @    $c_contact = $_POST['c_contact']; 
  @  $c_adress = $_POST['c_adress']; 
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
     $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass_hash','$c_country','$c_city','$c_contact','$c_adress','$c_image')";
    
    
    $run_c = mysqli_query($con,$insert_c);
    
    if($run_c){
        echo "<script>alert(' Registration Sucesfull')</script>";
    }
    
}


?>