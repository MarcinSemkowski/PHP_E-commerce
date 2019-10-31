<!DOCTYPE>
<?php
include("includes/db.php");
?>
<html>
<head>
    
    
    </head>

<body bgcolor="skyblue">
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
    
    <table align="center" width="750" border="2" bgcolor="orange">
        
        <tr>
        <td colspan="7"><h2>Insert New Post Here</h2> </td>
        </tr>
        <tr>
        <td align="center"><b>Product Title:</b></td>
            <td><input type="text" name="product_titile" /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Category:</b></td>
            <td>       <select name="product_cat">
                   <option>Select Category</option>             
                <?php 

                           $get_cats = "select * from categories"; 
                        $run_cats = mysqli_query($con,$get_cats);

                       while($row_cats=mysqli_fetch_array($run_cats)){
                       $cat_id = $row_cats['cat_id']; 
                       $cat_title = $row_cats['cat_title']; 

                        echo "<option value='$cat_id'>$cat_title</option>";

                       }      

                          ?>
                </select>    

                </td>
              
        </tr>
        
              <tr>
        <td align="center"><b>Product Brand:</b></td>
            <td>
                  <select name="product_brand">
                   <option>Select Brand</option>             
                <?php 

                           $get_brands = "select * from brands"; 
                        $run_brands = mysqli_query($con,$get_brands);

                       while($row_brands=mysqli_fetch_array($run_brands)){
                       $brand_id = $row_brands['brand_id']; 
                       $brand_title = $row_brands['brand_title']; 

                        echo "<option value='$brand_id'>$brand_title</option>";

                       }      

                          ?>
                </select>    

                  
                  </td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Image:</b> </td>
            <td><input type="text" name="product_titile" /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Price:</b></td>
            <td><input type="text" name="product_titile" /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Description:</b></td>
            <td><input type="text" name="product_titile" /></td>
        </tr>
        
              <tr>
        <td align="center"><b>Product Keywords:</b></td>
            <td><input type="text" name="product_titile" /></td>
        </tr>
              <tr align="center">
            <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now " /> </td>
        </tr>
    
        
    </table>
        
    </form>
    </body>


















</html>