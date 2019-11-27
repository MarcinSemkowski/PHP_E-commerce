<?php 
include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');



if(isset($_GET['delete_pro'])){
	$delete_id = $_GET['delete_pro'];
	$product = new  Product();

	$product->deleteProduct($product_id);
}



?>