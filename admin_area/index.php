<?php 
session_start();

include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');

if(!isset($_SESSION['user_email'])){
  echo "<script>window.open('login.php?not_admin=You are not Admin !','_self')</script>";
}else{



?>


<!DOCTYPE>


<html>
<head>
    <title>This is Admin  Panel</title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    </head>


<body>
        <div class="main_wrapper">
    <div id="header"></div>
    </div>
    
    <div id="right">
    
    <h2 style="text-align:center;">Menage Content</h2>
        <a href="index.php?insert_product">Insert Product</a>
        <a href="index.php?view_products">View All Product</a>
        <a href="index.php?insert_category">Insert New Category</a>
        <a href="index.php?view_categories">View All Categories</a>
        <a href="index.php?insert_brand">Insert Brand</a>
        <a href="index.php?view_brands">View All Brands </a>
        <a href="index.php?view_orders">View Orders</a>
        <a href="index.php?view_customers">View All Customers</a>
        <a href="index.php?view_payments">View Payments</a>
        <a href="logout.php">Admin Logout</a>
        
        
    
    </div>
    <div id="left">
    <?php
        if(isset($_GET['insert_product'])){
            include("insert_product.php");
            
        }
        
          if(isset($_GET['view_products'])){
            include("view_products.php");
            
        }

        if(isset($_GET['edit_pro'])){
          include("edit_pro.php");
        }

        if(isset($_GET['insert_category'])){
          include("insert_category.php");
        }
        
        if(isset($_GET['view_categories'])){
            include("view_cats.php");
        }
        if(isset($_GET['edit_cat'])){
            include("edit_cat.php");
        }
        if(isset($_GET['insert_brand'])){
            include("insert_brand.php");
        }
        
         if(isset($_GET['view_brands'])){
            include("view_brands.php");
         }
         if(isset($_GET['edit_brand'])){
            include("edit_brand.php");
         }
         if(isset($_GET['view_customers'])){
            include("view_customers.php");
         }

        ?>
    
    
    </div>
    
    
    
    </body>

</html>

<?php 
}
?>