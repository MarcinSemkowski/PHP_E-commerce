
<?php

                $user =  $_SESSION['customer_email'];
                $get_customer = "SELECT * FROM customers WHERE customer_email='$user' "; 
                 $run_customer = mysqli_query($con,$get_customer);
                 $row_customer = mysqli_fetch_assoc($run_customer);
                 $id = $row_customer['customer_id'];  
                 $name = $row_customer['customer_name'];
                 $email = $row_customer['customer_email'];
                 $pass = $row_customer['customer_pass'];
                 $country = $row_customer['customer_country'];
                 $city = $row_customer['customer_city'];
                 $image = $row_customer['customer_image'];
                 $contact = $row_customer['customer_contact'];
                  $address = $row_customer['customer_address'];
                 
                

?>
                 
           <form  action="my_account.php?c_id= <?php echo $id; ?>" method="post" enctype="multipart/form-data">
                 
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
                      <td align="right"><input type="submit" name="update" value="Create Account" /></td>
                      </tr>
                     
               
               </table>               
                 
                 
                 </form>
        

