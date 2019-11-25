<?php 

if(isset($_GET['edit_cat'])){
	$editCatId = $_GET['edit_cat'];
	$category = new Category();
	   


}



?>



<form action="" method="post" align="center" style="margin: 150px;" >

<b>Insert New Category: </b>

<input type="text" name="new_cat" value="<?php echo    $category->editCategory($editCatId);  ?>" required />



<input type="submit" name="add_cat" value="Add Category">


</form>

<?php 

if(isset($_POST['update_cat'])){
$newCat = $_POST['new_cat'];


$category->updateCategory($newCat);	
}

?>