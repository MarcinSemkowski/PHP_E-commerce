<table width="795" align ="center" bgcolor="pink" >

<tr>
    <td colspan="8"><h2>View All Brands Here</h2></td>
    
    </tr>
    <tr align="center"bgcolor="skyblue">
    <th>S.N</th>
     <th>Name</th>
     <th>Email</th>
     <th>Image</th>
        <th>Delete</th>
    
    </tr>

    <?php
    include("includes/db.php");
    $get_customers = "SELECT * FROM customers";
    
    $run_customers =  mysqli_query($con,$get_customers);
    
    $i = 0;
    
    
    while ($row_customer = mysqli_fetch_array($run_customers)){
        $customer_id = $row_customer['customer_id'];
        $customer_name = $row_customer['customer_name'];
        $customer_email = $row_customer['customer_email'];
        $customer_image = $row_customer['customer_image'];
        $i++;
        
    
    
    
    ?>
    
    
    <tr align="center">
    
    <td><?php echo $i; ?></td>
    <td><?php echo $customer_name; ?></td>
    <td><?php echo $customer_email; ?></td>
    <td><img src="../customer/customer_images/<?php echo $customer_image; ?>" width="60" height="60"></td>
    <td><a href="delete_customer.php?delete_customer=<?php echo $customer_id;  ?>">Delete</a></td>    
    
    </tr>
    
    
    <?php } ?>
    

</table>