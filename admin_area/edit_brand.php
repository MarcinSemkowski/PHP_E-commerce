<?php 

if(isset($_GET['edit_brand'])){
	$editBrandId = $_GET['edit_brand'];
	$brand = new Brand();
	   


}



?>



<form action="" method="post" align="center" style="margin: 150px;" >

<b>Insert New Brand: </b>

<input type="text" name="new_brand" value="<?php echo    $brand->editBrand($editCatId);  ?>" required />



<input type="submit" name="update_brand" value="Update Brand">


</form>

<?php 

if(isset($_POST['update_brand'])){
$newBrand = $_POST['new_brand'];

$brand->updateBrand($newBrand,$editBrandId);	

}

?>