<?php 
include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');



if(isset($_GET['delete_customer'])){
	$delete_id = $_GET['delete_customer'];
	$customer = new  Customer();

	$customer->deleteCustomer($delete_id);
}



?>