<?php 


include("classes/Customer.php");





?>
<div>

<form method="post" action="">
    
    
    
    <table width="500" align="center" bgcolor="skyblue">
    
      <tr align="center">
        <td colspan="4"><h2>Login or Regiester to Buy !</h2></td>
        </tr>
    
        <tr>
            <td align="center"><b>Email:</b></td>
         <td><input type="text" name="email" placeholder="enter email"  required /></td>   
        </tr>
        <tr>
        <td align="center"><b>Password:</b></td>
            <td><input type="password" name="pass" placeholder="enter password" required /></td>
        </tr>
        
        <tr align="center">
        <td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password ? </a></td>
        </tr>
        
        <tr align="center">
        <td colspan="4"><input type="submit" name="login" value="Login" /></td>
        </tr>
    
    </table>
    
    
    <h2 style="float:left padding-right:20px;"  ><a href="customer_register.php" style="text-decoration:none;">New ? Regiester Here</a></h2>
    
    
    </form>

<?php 
    
if(isset($_POST['login'])){
 $c_email = $_POST['email'];
$c_pass = $_POST['pass'];
    $customer = new Customer();
     $customer->loginCustomer($c_email,$c_pass);
    }
    

    
    
    
    ?>
</div>