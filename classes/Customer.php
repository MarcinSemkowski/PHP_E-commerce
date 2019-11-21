<?php 

class Customer extends AbstractDatabaseConnection{

private  $ip;

private $name;
private $pass;
private $country;
private $email;
private $image;
private $imageTmp;
private $city;
private $contact;
private $adress;








//SETERS

public function setIP($ip){
  $this->ip = $ip;
}


public function setName($name){
  $this->name = $name;
}


public function setPass($pass){
  $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
  $this->pass = $pass_hash;
}


public function setCountry($country){
  $this->country = $country;
}

public function setEmail($email){
  $this->email = $email;
}

public function setImage($image){
  $this->image = $image;
}

public function setImageTmp($imageTmp){
  $this->imgTmp = $imageTmp;
}


public function setCity($city){
  $this->city = $city;
}

public function setContact($contact){
  $this->contact = $contact;
}

public function setAdress($adress){
  $this->adress = $adress;
}





//GETERS

public  function getIP(){
	return $this->ip;
} 


public function getName(){
	return $this->name;
}


public function getPass(){
	return $this->pass;
}

public function getCountry(){
	return $this->country;
}

public function getEmail(){
	return $this->email;
}


public function getImage(){
	return $this->image;
}

public function getImageTmp(){
	return $this->imageTmp;
}


public function getCity(){
	return $this->city;
}

public function getContact(){
	return $this->contact;
}

public function getAdress(){
	return $this->adress;
}





public function insertCustomer($customer){

 move_uploaded_file($customer->getImageTmp(),"customer/customer_images/".$customer->getImage());
    
     $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES (
     '".$customer->getIP()."','".
     $customer->getName()."','".
     $customer->getEmail()."','".
     $customer->getPass()."','".
     $customer->getCountry()."','".
  	  $customer->getCity()."','".
     $customer->getContact()."','".
     $customer->getAdress()."','".
     $customer->getImage()."')";
    
    move_uploaded_file($customer->getImageTmp, "customercustomer_images/".$customer->getImage());
    
    $run_c = mysqli_query($this->getCon(),$insert_c);
    
    $sel_cart = "SELECT * FROM cart WHERE  ip_add='$ip'";
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart == 0){
        $_SESSION['customer_email'] = $customer->getEmail();
        echo "<script>alert('Account has been created Sucesfully')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }else{
      $_SESSION['customer_email'] = $$customer->getEmail();
        echo "<script>alert('Account has been created Sucesfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";   
    }

}






public function getCustomerImage($user){

     $get_image = "SELECT * FROM customers WHERE customer_email = '".$user."' "; 
    $run_image = mysqli_query($this->getCon(),$get_image);
        
     while($row_image=mysqli_fetch_array($run_image)){
       $c_name = $row_image['customer_name']; 
       $c_image = $row_image['customer_image']; 
         
        echo "<img src='customer_images/".$c_image."' width='150' height='150' ";
     
     }      
}



public function loginCustomer($c_email,$c_pass){

    $sel_c = "SELECT * FROM customers  WHERE customer_email = '$c_email' ";
    
    $run_c = mysqli_query($this->getCon(),$sel_c);
    
    if(mysqli_num_rows($run_c) == 0){
        echo "<script>alert('Email is incorrect please try again !')</script>";
        exit();
    }else{
        $row_c = mysqli_fetch_assoc($run_c);
        $db_pass_hash = $row_c['customer_pass'];
        if(password_verify($c_pass,$db_pass_hash)){
            $ip = getIP();  
            $sel_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
                
            $run_cart = mysqli_query($this->getCon(),$sel_cart);
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



public  function editPassword($user,$current_pass,$new_pass,$new_again){



    
   $sel_pass = "SELECT * FROM customers WHERE customer_email ='$user' ";
    
    $run_pass = mysqli_query($this->getCon(),$sel_pass);
    
    if($run_pass){
        $db_pass = mysqli_fetch_assoc($run_pass);
        $customer_pass = $db_pass['customer_pass'];
        if(password_verify($current_pass,$customer_pass)){
            if($new_pass == $new_again){
                $new_pass_hash = password_hash($new_pass,PASSWORD_DEFAULT);
               $change_pass = "UPDATE customers SET customer_pass='$new_pass_hash' WHERE customer_email ='$user' ";
              $run_change_pass = mysqli_query($this->getCon(),$change_pass);
                if($run_change_pass){
                    echo "<script>alert('You Change Your Password !')</script>";
                    echo "<script>window.open('my_account.php','_self')</script>"; 
                }else{
                    echo "<script>alert('Sonething Wrong  !')</script>";
                    exit();
                }
            }else{
                 echo "<script>alert('New Password 1 and new Password 2 not the same  !')</script>";
              exit();
            }
        }else{
             echo "<script>alert('Current Password is Wrong !')</script>";
          exit();
        }
        
        
        
        
    }
    
    
}

















}

?>