<?php 

include("Customer.php");

class InsertToDatabase extends AbstractDatabaseConnection{




public function insertProduct($product){
	
    
    move_uploaded_file($product->getImageTmp(),"product_images/$product_image");

     $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('"
     .$product->getCat()."','".
     $product->getBrand()."','".
     $product->getTitle()."','".
     $product->getPrice()."','".
     $product->getDesc()."','".
     $product->getImage()."','".
     $product->getKeywords()."')";
		 
		 $insert_pro = mysqli_query($this->getCon(), $insert_product);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
    
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





}








?>