<!DOCTYPE>
<?php

$category = new Category();
$brand = new Brand()

if(isset['edit_pro']){
$getProId = $_GET['edit_pro'];
$product = new Product();
$product->editProduct($getProId);
}

?>
<html>
<head>
    
    
    </head>

<body bgcolor="skyblue">
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
    
    <table align="center" width="800" height="560" border="2" bgcolor="#187eae"
        
        <tr align="center">
        <td colspan="7"><h2>Edit & Update New Post Here</h2> </td>
        </tr>
        <tr>
        <td align="center"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" required /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Category:</b></td>
            <td>       <select name="product_cat" required>
                   <option>Select Category</option>             
                <?php $category->getAllCatsInOptionFromDatabase(); 
                ?>
                </select>    

                </td>
              
        </tr>
        
              <tr>
        <td align="center"><b>Product Brand:</b></td>
            <td>
               <select name="product_brand" required>
                   <option>Select Brand</option>             
                <?php  $brand->getAllBrandsInOptionFromDatabase();   
                ?>
                </select>    
            </td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Image:</b> </td>
            <td><input type="file" name="product_image" required /></td>
        </tr>
        
              
        <td align="center"><b>Product Price:</b></td>
            <td><input type="text" name="product_price" required /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Description:</b></td>
            <td><textarea name="product_desc" cols="20" rows="10" required ></textarea></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Keywords:</b></td>
            <td><input type="text" name="product_keywords" size="50" required /></td>
        </tr>
              <tr align="center">
            <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now " /> </td>
        </tr>
    
        
        
        
    </table>
        
    </form>
    </body>

</html>

<?php 


}

?>

