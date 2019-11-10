
<?php
$user =  $_SESSION['customer_email'];
                $get_customer = "SELECT * FROM customers WHERE customer_email='$user' "; 
                 $run_customer = mysqli_query($con,$get_customer);
                 $row_customer = mysqli_fetch_assoc($run_customer);
                 $name = $row_customer['customer_name'];
                 $email = $row_customer['customer_email'];
                 $pass = $row_customer['customer_pass'];
                 $country = $row_customer['customer_country'];
                 $city = $row_customer['customer_city'];
                 $image = $row_customer['customer_image'];
                 $contact = $row_customer['customer_contact'];
                  $address = $row_customer['customer_address'];
                 
                

?>
                 
           <form  method="post" enctype="multipart/form-data">
                 
                  <table align="center" width="900">
               
                      <tr align="center">
                       <td colspan="8"><h2>Edit an Account</h2></td>  
                      </tr> 

                      <tr>
                       <td align="right">Customer Name:</td>
                          <td><input type="text" name="c_name" value="<?php echo $name; ?>" required /></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Customer Email</td>
                          <td><input type="text" name="c_email" value="<?php echo $email; ?>"  required/></td>
                      </tr> 
                       <tr>
                       <td align="right">Cutomer Image</td>
                          <td><input type="file" name="c_image"   required /><img src="customer_images/<?php echo $image; ?>" width="50" height="50" /></td>
                      </tr>
                      
                       <tr>
                       <td align="right">Customer Country</td>
                          <td><select name="c_country" disabled>
                           <option><?php echo $country ?></option>
                              <option>Afganistan</option>
                              <option>India</option>
                              <option>Japan</option>
                              <option>Pakistan</option>
                              <option>Israel</option>
                              <option>United Arab Emirates</option>
                              <option>United States</option>
                              <option>United Kingdom</option>
                           </select>
                           </td>
                           
                      </tr>
                      
                       <tr>
                       <td align="right">Customer City</td>
                          <td><input type="text" name="c_city" value="<?php echo $city; ?>" /></td>
                      </tr> 
                      
                       <tr>
                       <td align="right">Customer Contact</td>
                          <td><input type="text" name="c_contact" value="<?php echo $contact; ?>" /></td>
                      </tr> 
                      
                       <tr>
                       <td align="right">Customer Adress</td>
                          <td><input type="text" name="c_adress" value="<?php echo $address; ?>" /></td>
                      </tr> 
               
                      <tr>
                      <td align="right"><input type="submit" name="regiester" value="Create Account" /></td>
                      </tr>
                     
               
               </table>               
                 
                 
                 </form>
        

   <?php 

if(isset($_POST['regiester'])){
    $ip = getIP();
 @    $c_name = $_POST['c_name'];
 @  $c_pass = $_POST['c_pass'];  
 @ $c_pass_hash = password_hash($c_pass, PASSWORD_DEFAULT);
 @ $c_country = $_POST['c_country'];
 @    $c_email = $_POST['c_email']; 
 @  $c_image = $_FILES['c_image']['name'];
 @ $c_image_tmp = $_FILES['c_image']['tmp_name'];
 @ $c_city = $_POST['c_city'];
 @ $c_contact = $_POST['c_contact']; 
 @ $c_adress = $_POST['c_adress']; 
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
     $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass_hash','$c_country','$c_city','$c_contact','$c_adress','$c_image')";
    
    
    $run_c = mysqli_query($con,$insert_c);
    
    $sel_cart = "SELECT * FROM cart WHERE  ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart == 0){
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created Sucesfully')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }else{
      $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Account has been created Sucesfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";   
    }
    
    
}


?>

        