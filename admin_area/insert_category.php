<form action="" method="post" align="center" style="margin: 150px;" >


<b>Insert New Category: </b>

<input type="text" name="new_cat" required />



<input type="submit" name="add_cat" value="Add Category">


</form>

<?php 

if(isset($_POST['add_cat'])){
$newCat = $_POST['new_cat'];

$category = new Category();

$category->insertCategory($newCat);	
}

?>