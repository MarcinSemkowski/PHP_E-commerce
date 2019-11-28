<?php 

/**
 * 
 */
class Admin extends AbstractDatabaseConnection
{
	
	public function login($email,$password){
      $loginQuery = "SELECT * FROM admins WHERE user_email = '$email' AND user_pass='$password' ";
      $runLogin = mysqli_query($this->getCon(), $loginQuery);
      $check_user =  mysqli_num_rows($runLogin);

      if($check_user==1){
	
	$_SESSION['user_email']= $email; 
	
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	
	}
	
	
	}


}








?>