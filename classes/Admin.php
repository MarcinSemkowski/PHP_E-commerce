<?php 

/**
 * 
 */
class Admin extends AbstractDatabaseConnection
{
	
	public function login($email,$password){
      $loginQuery = "SELECT * FROM admins WHERE user_email = '$email' AND user_pass='$password' ";
      $runLogin = mysqli_query($this->getCon(), $loginQuery);
      $numRows =  mysqli_num_rows($runLogin);

      if($numRows == 0){
       	echo "<script>alert('Password or Email is wrong,try again')</script>";   
      }else{
      
      	$_SESSION['user_email'] = $email;
         echo "<script>window.open('index.php?loged_in=You successfuly loged in','_self')</script>";
      }
	}


}








?>