<!DOCTYPE>
<html>
<head>
<title>Admin Login </title>
<link rel="stylesheet" type="text/css" href="styles/login_style.css">
</head>




<div class="login">
	<h2 style="color: white; text-align: center;"><?php  echo $_GET['not_admin'] ?> </h2> 
	<h1> Admin Login</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>