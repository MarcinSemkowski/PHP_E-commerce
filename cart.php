<!DOCTYPE>
<?php
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
                        <td><input type="checkbox" name="remove[]"></td>  
                        <td><?php echo $product_title; ?><br> 
                          <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
                          </td>
                        <td><input type="text" size="3" name="qty" /></td>
                        <td><?php  echo $single_price." $" ?></td>  
                    </tr>
                
                    
                 <?php    }
                        
                        } ?>
                    <tr align="right">
                    <td colspan="4"><b>Sub Total:</b></td>
                    <td><?php echo  $total_p." $"  ?></td>
                    </tr>
                 </table>
            </form>
            </div>
        
        </div>
            
            </div >
            
            
        <div id="footer">
		<h2 style="text-align:center; padding-top:30px;">&copy; This website is creating with www.OnlineTuting.com</h2>
		</div>
    
    
    
    
    
    </body>
    
    
</html>