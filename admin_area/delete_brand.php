<?php 
include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');



if(isset($_GET['delete_brand'])){
	$delete_id = $_GET['delete_brand'];
	$brand = new  Brand();

	$brand->deleteBrand($delete_id);
}



?>