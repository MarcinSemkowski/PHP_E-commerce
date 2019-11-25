<?php 
include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');



if(isset($_GET['delete_cat'])){
	$category_id = $_GET['delete_cat'];
	$category = new  Category();

	$category->deleteCategory($category_id);
}



?>