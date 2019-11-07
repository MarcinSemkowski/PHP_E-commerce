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
            <span style="float:right">Welcome Guest ! <b style="color:yellow">Shopping Cart -</b>Total Items:     <?php echo  total_items(); ?> Total Price: <?php echo  total_price(); ?> $ <a href="cart.php" style="color:yellow"> Go to Cart ! </a></span>
            
                 </div> 
               
    
                 
            
        <div id="products_box">
            
             <form action="" method="post" enctype="multipart/form-data">
                <table align="center" width= "700" bgcolor="skyblue">   
                    <tr align="center">
                    <th>Remove</th>
                        <th>Product/s</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    
                    
                    <?php 

                    
                        global $con;

                        $total_p  = 0;

                        $ip = getIP();
                        $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";

                        $run_price = mysqli_query($con,$sel_price);

                        while($p_price = mysqli_fetch_array($run_price)){
                            $pro_id = $p_price['p_id'];
                            $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id' ";
                            $pro_query = mysqli_query($con,$pro_price);
                       
                            while($r_pro = mysqli_fetch_array($pro_query)){
                                $price_pro = array($r_pro['product_price']);
                                $product_title = $r_pro['product_title'];
                                $product_image = $r_pro['product_image'];
                                
                                $single_price = $r_pro['product_price'];
                                
                                
                                                       
                                $values = array_sum($price_pro);
                                $total_p += $values;
                            
                            
                
                         
                            ?>
                      <tr align="center">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>  
                        <td><?php echo $product_title; ?><br> 
                          <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
                          </td>
                        <td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty'] ?>" /></td>
                          
                        <?php
                           global $con;
                          if(isset($_POST['update_cart']))
                            if(isset($_POST['qty'])){
                              $qty = $_POST['qty'];
                            
                                $update_qty = "UPDATE cart set qty = '$qty'";
                                $run_qty = mysqli_query($con,$update_qty);
                                
                                $_SESSION['qty'] = $qty;
                                
                                $total_p *= $qty; 
                            }
                          ?>
                          
                          
                          
                        <td><?php  echo $single_price." $" ?></td>  
                    </tr>
                
                    
                 <?php    }
                        
                        } ?>
                    <tr align="right">
                    <td colspan="4"><b>Sub Total:</b></td>
                    <td><?php echo  $total_p." $"  ?></td>
                    </tr>
                    
                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
                    <td><input type="submit" name="continue" value="Continue Shopping" ></td>
                    <td><button><a href="checkout.php" style="text-decoration:none; color:black">Checkout</a></button></td>
                    <td></td>
                    
                 </table>
            </form>
            
            
            <?php 
               global $con;
                $ip = getIP();
            if(isset($_POST['update_cart'])){
                if(isset($_POST['remove'])){
                foreach($_POST['remove'] as $remove_id){
                 $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip'  ";     
                 $run_delete = mysqli_query($con,$delete_product);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                        
                    }
                }
            }
            }
                
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