<?php 
include("../classes/AbstractDatabaseConnection.php");
include('../classes/Cart.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('../classes/Product.php');
include('../classes/Admin.php');
?>


<!DOCTYPE>
<html>
<head>
<title>Admin Login </title>
<link rel="stylesheet" type="text/css" href="styles/login_style.css">
</head>

<body>


<div class="login">
	
	<h1> Admin Login</h1>
    <form method="post" action="">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <input type="submit" class="btn btn-primary btn-block btn-large" name="login" value="Login">
    </form>
</div>

</body>

<?php

if(isset($_POST['login'])){
 $email =  $_POST['email'];
 $pass = $_POST['password'];
 $admin  = new Admin();
  $admin->login($email,$pass);
}


?>