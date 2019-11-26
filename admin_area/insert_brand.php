<form action="" method="post" align="center" style="margin: 150px;" >


<b>Insert New Brand: </b>

<input type="text" name="new_brand" required />



<input type="submit" name="add_brand" value="Add Brand">


</form>

<?php 

if(isset($_POST['add_brand'])){
$newBrand = $_POST['new_brand'];

$brand = new Brand();

$brand->insertBrand($newBrand);	
}

?>