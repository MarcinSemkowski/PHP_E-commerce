<!DOCTYPE>
<?php
session_start();
include("../classes/AbstractDatabaseConnection.php");  
include("../classes/Category.php");
include("../classes/Brand.php");
include("../classes/Product.php");
include("../classes/Cart.php");
include("../classes/Customer.php");


$cart = new Cart();
$customer = new Customer();
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
                  <li><a href="../index.php" >Home</a> </li>
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
                      if(isset($_SESSION['customer_email'])){
                
                    
                
                    $user =  $_SESSION['customer_email'];
                  $customer->getCustomerImage($user);
                }





                ?>
                <?php
             
           if(isset($_SESSION['customer_email'])){
            echo "<li><a href='my_account.php?my_orders'>My Orders</a></li>
                 <li><a href='my_account.php?edit_account'>Edit Account</a></li>
                 <li><a href='my_account.php?change_pass'>Change Password</a></li>
                 <li><a href='my_account.php?delete_account'>Delete Account</a></li>";
              }else{
                echo "<p style='color:white;'>Pls Sign in </p>";
              }
                 
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
            <span style="float:right font-size:15px; padding 5px; line-height: 40px;" >
                
               <?php 


                   if(isset($_SESSION['customer_email'])){
                       echo"<b>Welcome</b> ".$_SESSION['customer_email'];
                   }
                
                
                
                ?> 
                 
                
                 
                 </span>
                 
                   
            
                 </div> 
               
    
                 
            
        <div id="products_box">
           
              <?php 

                 if(!isset($_SESSION['customer_email'])){
          
          echo "<a href='../  checkout.php' style='color:orange; font-size:50px;'>Login</a>";
           exit();
          }
          else {
          echo "<a href='logout.php' style='color:orange;'>Logout</a>";
             exit();         
          }
 


                ?>
            

            <?php 
            if(!isset($_GET['my_orders'])){
               if(!isset($_GET['edit_account'])){
                   if(!isset($_GET['change_pass'])){
                       if(!isset($_GET['delete_account'])){
                          echo "<h2 style='padding:20px;'>Welcome:".$_SESSION['customer_email']. "  </h2>";
                           echo " <b>You can see your orders progress by clicking this<a href='my_account.php?my_orders'>link</a> </b>";           
                       }
                       
                   }
                   
               }
               
                  
            }
            
            ?>

                 
            
            <?php
            
            if(isset($_GET['my_orders'])){
                include("my_orders.php");   
            }
            if(isset($_GET['edit_account'])){
                include("edit_account.php");
            }
            if(isset($_GET['change_pass'])){
                include("change_pass.php");
            }
               if(isset($_GET['delete_account'])){
                include("delete_account.php");
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




<!-- EDIT PASSWORD -->
<?php 


if(isset($_POST['change_password'])){
@    $user = $_SESSION['customer_email'];   
@    $current_pass = $_POST['current_pass'];
 @   $new_pass = $_POST['new_pass'];
  @  $new_again = $_POST['new_pass_again'];
    
    
   $sel_pass = "SELECT * FROM customers WHERE customer_email ='$user' ";
    
    $run_pass = mysqli_query($con,$sel_pass);
    
    if($run_pass){
        $db_pass = mysqli_fetch_assoc($run_pass);
        $customer_pass = $db_pass['customer_pass'];
        if(password_verify($current_pass,$customer_pass)){
            if($new_pass == $new_again){
                $new_pass_hash = password_hash($new_pass,PASSWORD_DEFAULT);
               $change_pass = "UPDATE customers SET customer_pass='$new_pass_hash' WHERE customer_email ='$user' ";
              $run_change_pass = mysqli_query($con,$change_pass);
                if($run_change_pass){
                    echo "<script>alert('You Change Your Password !')</script>";
                    echo "<script>window.open('my_account.php','_self')</script>"; 
                }else{
                    echo "<script>alert('Sonething Wrong  !')</script>";
                    exit();
                }
            }else{
                 echo "<script>alert('New Password 1 and new Password 2 not the same  !')</script>";
              exit();
            }
        }else{
             echo "<script>alert('Current Password is Wrong !')</script>";
          exit();
        }
        
        
        
        
    }
    
    
}




?>


<!-- DELETE ACCOUNT  -->

<?php
$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])){
 $delete_customer = "DELETE FROM customers WHERE customer_email= '$user'";
  $run_customer =  mysqli_query($con,$delete_customer);
    
    echo "<script>alert('We are really sorry your account has been deleted !')</script>";
   echo "<script>window.open('../index.php','_self')</script>";
}

if(isset($_POST['no'])){
     echo "<script>alert('oh ! do not joke again')</script>";
   echo "<script>window.open('my_accont.php','_self')</script>";
}

?>




<!-- EDIT ACCOUNT  -->
   <?php 

if(isset($_GET['c_id'])){
if(isset($_POST['update'])){
    @ $customer_id = $_GET['c_id'];
    $ip = getIP();
 @    $c_name = $_POST['c_name'];
 @  $c_pass = $_POST['c_pass'];  
 @ $c_pass_hash = password_hash($c_pass, PASSWORD_DEFAULT);
 @ $c_country = $_POST['c_country'];
 @    $c_email = $_POST['c_email']; 
 @  $c_image = $_FILES['c_image']['name'];
 @ $c_image_tmp = $_FILES['c_image']['tmp_name'];
 @ $c_city = $_POST['c_city'];
 @ $c_contact = $_POST['c_contact']; 
 @ $c_adress = $_POST['c_adress']; 
    
    move_uploaded_file($c_image_tmp,"customer_images/$c_image");
    
     $update_c = "UPDATE customers SET customer_name='$c_name',customer_email='$c_email',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_adress', customer_image='$c_image'  WHERE customer_id='$customer_id' ";
    
    $run_c = mysqli_query($con,$update_c);
    
    if($run_c){
        echo "<script>alert('You update your Acount sussesfully !')</script>";
         echo "<script>window.open('my_account.php','_self')</script>";
    }
        else{
            
        }
    }
    
    
    
}


?>

        