<form action="" method="post" align="center" style="margin: 150px;" >


<b>Insert New Category: </b>

<input type="text" name="new_cat" required />



<input type="submit" name="add_brand" value="Add Brand">


</form>

<?php 

if(isset($_POST['add_brand'])){
$newBrand = $_POST['new_cat'];

$brand = new Brand();

$brand->insertBrand($newBrand);	
}

?>