
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
    

    $sel_c = "SELECT * FROM customers  WHERE customer_email = '$c_email' ";
    
    $run_c = mysqli_query($con,$sel_c);
    
    if(mysqli_num_rows($run_c) == 0){
        echo "<script>alert('Email is incorrect please try again !')</script>";
        exit();
    }else{
        $row_c = mysqli_fetch_assoc($run_c);
        $db_pass_hash = $row_c['customer_pass'];
        if(password_verify($c_pass,$db_pass_hash)){
            $ip = getIP();  
            $sel_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
                
            $run_cart = mysqli_query($con,$sel_cart);
            $check_cart = mysqli_num_rows($run_cart);
            
            if($check_cart == 0 ){
                $_SESSION['customer_email'] = $c_email;
                 echo "<script>alert('You logged in Succesfully !')</script>";
                 echo "<script>window.open('customer/my_account.php','_self')</script>";
            }else{
             $_SESSION['customer_email'] = $c_email;
                 echo "<script>alert('You logged in Succesfully !')</script>";
                 echo "<script>window.open('checkout.php','_self')</script>";
        }
            
        }else{
            echo "<script>alert('Password is incorrect please try again !')</script>";
         exit();
        }
            
        }
    }
    

    
    
    
    ?>
</div>