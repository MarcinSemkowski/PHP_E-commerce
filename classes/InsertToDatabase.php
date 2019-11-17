<?php 
include("AbstractDatabseConnection.php");

class InsertToDatabase extends AbstractDatabseConnection{




public function insertProduct($product){
	
    
    move_uploaded_file($product->getImageTmp(),"product_images/$product_image");

     $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('"
     .$product->getCat()."','".
     $product->getBrand()."','".
     $product->getTitle()."','".
     $product->getPrice()."','".
     $product->getDesc()."','".
     $product->getImage()."','".
     $product->getKeywords()."'");
		 
		 $insert_pro = mysqli_query($this->getCon(), $insert_product);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
    
}










?>