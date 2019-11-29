<?php 
session_start();
session_destroy();

 echo "<script>alert('You logged out !')</script>";
        echo "<script>window.open('login.php','_self')</script>";

?>