<!DOCTYPE>
<?php


$category = new Category();
$brand = new Brand();
if(isset($_GET['edit_pro'])){
$getProId = $_GET['edit_pro'];
$product = new Product();
$product->editProduct($getProId);
}
?>
<html>
<head>
    
    
    </head>

<body bgcolor="skyblue">
    <form action="" method="post" enctype="multipart/form-data">
    
    <table align="center" width="800" height="560" border="2" bgcolor="#187eae"
        
        <tr align="center">
        <td colspan="7"><h2>Update Product Here</h2> </td>
        </tr>
        <tr>
        <td align="center"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" value= "<?php echo $product->getTitle()  ?>" required /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Category:</b></td>
            <td>       <select name="product_cat" required>
                   <option><?php echo $product->getCat(); ?></option>             
                <?php $category->getAllCatsInOptionFromDatabase(); 
                ?>
                </select>    

                </td>
              
        </tr>
        
              <tr>
        <td align="center"><b>Product Brand:</b></td>
            <td>
               <select name="product_brand" required>
                   <option><?php echo $product->getBrand(); ?></option>             
                <?php  $brand->getAllBrandsInOptionFromDatabase();   
                ?>
                </select>    
            </td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Image:</b> </td>
            <td><input type="file" name="product_image" required /><img src="product_images/<?php echo $product->getImage(); ?>" width='60' height='60' /> </td>
        </tr>
        
              
        <td align="center"><b>Product Price:</b></td>
            <td><input type="text" name="product_price" value="<?php echo $product->getPrice(); ?>" required /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Description:</b></td>
            <td><textarea name="product_desc" cols="20" rows="10" required ><?php echo $product->getDesc(); ?></textarea></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Keywords:</b></td>
            <td><input type="text" name="product_keywords" size="50" value="<?php echo $product->getKeywords(); ?>" required /></td>
        </tr>
              <tr align="center">
            <td colspan="7"><input type="submit" name="update_product" value=" Update  Product Now " /> </td>
        </tr>
    
        
        
        
    </table>
        
    </form>
    </body>

</html>

<?php 

if(isset($_POST['update_product'])){
  $editProduct = new Product();

$product_title = $_POST['product_title'];
 $editProduct->setTitle($product_title);
  
  $product_cat = $_POST['product_cat'];
  $editProduct->setCat($product_cat); 
  
   $product_brand = $_POST['product_brand'];
   $editProduct->setBrand($product_brand);
   
   $product_price = $_POST['product_price'];
   $editProduct->setPrice($product_price);

    $product_desc = $_POST['product_desc'];
    $editProduct->setDesc($product_desc);
    
    $product_keywords = $_POST['product_keywords'];
    $editProduct->setKeywords($product_keywords);
    
    $product_image = $_FILES['product_image']['name'];
    $editProduct->setImage($product_image);
    
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    $editProduct->setImageTmp($product_image_tmp); 

    $updateId = $getProId;
 
    $editProduct->updateProduct($editProduct,$updateId);



}

?>

