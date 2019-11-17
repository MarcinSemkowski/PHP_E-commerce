<!DOCTYPE>
<?php
include("../classes/DatabaseConnection.php");
$database = new DatabaseConnection();

?>
<html>
<head>
    
    
    </head>

<body bgcolor="skyblue">
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
    
    <table align="center" width="800" height="560" border="2" bgcolor="#187eae">
        
        <tr>
        <td colspan="7"><h2>Insert New Post Here</h2> </td>
        </tr>
        <tr>
        <td align="center"><b>Product Title:</b></td>
            <td><input type="text" name="product_title" size="60" required /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Category:</b></td>
            <td>       <select name="product_cat" required>
                   <option>Select Category</option>             
                <?php $database->getCatsInOption(); ?>
                </select>    

                </td>
              
        </tr>
        
              <tr>
        <td align="center"><b>Product Brand:</b></td>
            <td>
                  <select name="product_brand" required>
                   <option>Select Brand</option>             
                <?php  $database->getBrandsInOption();   ?>
                </select>    

                  
                  </td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Image:</b> </td>
            <td><input type="file" name="product_image" required /></td>
        </tr>
        
              <tr>
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

if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
    $product_image = $_FILES['product_image']['name'];
    
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
        
    move_uploaded_file($product_image_tmp,"product_images/$product_image");

     $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		 
		 $insert_pro = mysqli_query($con, $insert_product);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
    
 
}

?>

