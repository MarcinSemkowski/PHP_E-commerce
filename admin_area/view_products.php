<table width="795" align ="center" bgcolor="pink" >

<tr>
    <td colspan="6"><h2>View all Product Here</h2></td>
    
    </tr>
    <tr align="center"bgcolor="skyblue">
    <th>S.N</th>
     <th>Title</th>
         <th>Image</th>
         <th>Price</th>
         <th>Edit</th>
        <th>Delete</th>
    
    </tr>

    <?php
    include("includes/db.php");
    $get_pro = "SELECT * FROM products";
    
    $run_pro =  mysqli_query($con,$get_pro);
    
    $i = 0;
    
    
    while ($row_pro = mysqli_fetch_array($run_pro)){
        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];
        $pro_price = $row_pro['product_price'];
        $i++;
        
    
    
    
    ?>
    
    
    <tr>
    
    <td><?php echo $i; ?></td>
    <td><?php echo $pro_title; ?></td>
    <td><?php echo $pro_image; ?></td>
    <td><img src="product_images/<?php echo $pro_image?>" width="60" height="60" /></td>
    <td><?php echo $pro_price; ?></td>    
    <td><a href="index.php?edit_pro">Edit</a></td>
    <td><a href="delete_pro.php">Delete</a></td>    
    
    </tr>
    
    
    <?php } ?>
    

</table>