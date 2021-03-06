<?php 



class Product extends AbstractDatabaseConnection {
   private $title;
   private  $cat;
   private  $brand;
    private  $price;
    private  $desc;
    private  $keywords;
    
   private  $image;
    
   private  $imageTmp;






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


public function deleteProduct($product_id){
 $deletePro = "DELETE  FROM products WHERE product_id='".$product_id."' ";
 $runDelete = mysqli_query($this->getCon(),$deletePro);
if($runDelete){
  echo "<script>alert('A product has been deleted !')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";

}
}


public function editProduct($editProId){
  $getProduct = "SELECT * FROM products WHERE product_id = ".$editProId;
  $runProducts = mysqli_query($this->getCon(),$getProduct);
   $rowPro = mysqli_fetch_array($runProducts);
  $this->title = $rowPro['product_title'];
  $this->image = $rowPro['product_image'];
  $this->price = $rowPro['product_price'];
  $this->desc = $rowPro['product_desc'];
  $this->keywords =  $rowPro['product_keywords'];
  $getCat = $rowPro['product_cat'];
  $this->cat = $this->getCatById($getCat);
  $getBrand = $rowPro['product_brand'];
  $this->brand = $this->getBrandById($getBrand);
}


public function updateProduct($product,$product_id){
    $updateProductQuery = "UPDATE products SET 
    product_cat = '".$product->getCat()."', 
     product_brand = '".$product->getBrand()."',    
     product_title = '".$product->getTitle()."', 
     product_price = '".$product->getPrice()."',
     product_desc = '".$product->getDesc()."',
     product_image = '".$product->getImage()."',
     product_keywords = '".$product->getKeywords()."'
    WHERE product_id = ".$product_id." 
    ";

  $update_pro = mysqli_query($this->getCon(),$updateProductQuery);

  if($update_pro){
     echo "<script>alert('A product has been updated ! !')</script>";
  echo "<script>window.open('index.php?view_products','_self')</script>";
  }

}


private function getCatById($id){
 $catQuery = "SELECT * FROM categories WHERE cat_id = ".$id;
  $runQueryCat = mysqli_query($this->getCon(),$catQuery);
  $getCatRow = mysqli_fetch_array($runQueryCat);
  $getCatTitle = $getCatRow['cat_title'];
  return $getCatTitle; 
}


private function getBrandById($id){
 $brandQuery = "SELECT * FROM brands WHERE brand_id = ".$id;
  $runQueryBrand = mysqli_query($this->getCon(),$brandQuery);
  $getBrandRow = mysqli_fetch_array($runQueryBrand);
  $getBrandTitle = $getBrandRow['brand_title'];
  return $getBrandTitle; 
}








public function getAllProductFromDatabase(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
   
 
    $get_products = "SELECT * FROM products order by RAND() LIMIT 0,6";
    
$run_products = mysqli_query($this->getCon(),$get_products);
    
    
    while($row_products= mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_cat = $row_products['product_cat'];
        $pro_brand = $row_products['product_brand'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_desc = $row_products['product_desc'];
        $pro_image = $row_products['product_image']; 
         echo "
        <div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
        
          <h3>$pro_title</h3>
          
          <img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p style= 'text-align: center;'><b> Price: $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
        
        </div>";
    }
    
    
    }
    }
}
     


public  function getProductByCategoryFromDatabase($cat_id){
   
       
        
   
 
    $get_cat_pro = "SELECT * FROM products WHERE product_cat= '".$cat_id."'";
    
$run_cat_pro = mysqli_query($this->getCon(),$get_cat_pro);
 $count_cats = mysqli_num_rows($run_cat_pro);
        
        if($count_cats==0){
            echo "<h2>There is no product in this category !</h2> ";
        }
    
    
    while($row_cat_pro= mysqli_fetch_array($run_cat_pro)){
        $pro_id = $row_cat_pro['product_id'];
        $pro_cat = $row_cat_pro['product_cat'];
        $pro_brand = $row_cat_pro['product_brand'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_desc = $row_cat_pro['product_desc'];
        $pro_image = $row_cat_pro['product_image']; 
         echo "
        <div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
        
          <h3>$pro_title</h3>
          
          <img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p style= 'text-align: center;'><b>Price: $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
        
        </div>";
    }
    
    
    }
    

public  function getProductByBrandFromDatabase($brand_id){
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        
   
 
    $get_brand_pro = "SELECT * FROM products WHERE product_brand = '".$brand_id."'";
    
$run_brand_pro = mysqli_query($this->getCon(),$get_brand_pro);
 $count_brands = mysqli_num_rows($run_brand_pro);
        
        if($count_brands==0){
            echo "<h2>There is no product in this brand !</h2> ";
        }
    
    
    while($row_brand_pro= mysqli_fetch_array($run_brand_pro)){
        $pro_id = $row_brand_pro['product_id'];
        $pro_cat = $row_brand_pro['product_cat'];
        $pro_brand = $row_brand_pro['product_brand'];
        $pro_title = $row_brand_pro['product_title'];
        $pro_price = $row_brand_pro['product_price'];
        $pro_desc = $row_brand_pro['product_desc'];
        $pro_image = $row_brand_pro['product_image']; 
         echo "
        <div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
        
          <h3>$pro_title</h3>
          
          <img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p style= 'text-align: center;'><b> Price $ $pro_price</b></p>
                    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                    
                    <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
        
        </div>";
    }
    
    
    }
    }


    public function productDescription($productId){

        
            
            $get_products = "SELECT * FROM products WHERE product_id = '".$productId."' ";
    
$run_products = mysqli_query($this->getCon(),$get_products);
    
    
    while($row_products= mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_desc = $row_products['product_desc'];
        $pro_image = $row_products['product_image']; 
         echo "
        <div style='display: inline-block; margin-left:30px; padding:10px;' id='single_product' >
        
          <h3>$pro_title</h3>
          
          <img style=' border: 2px solid black;' src='admin_area/product_images/$pro_image' width='400' height='300' />
          <p style= 'text-align: center;'><b> $ $pro_price</b></p>
                    <a href='index.php' style='float:left;'>Go Back</a>
                    </br>
                    <p>$pro_desc</p>
                    <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
        
        </div>";
    }
            

    }







     // GETTERS
   public function getTitle(){
    return $this->title;
   }

    public function getCat(){
    return $this->cat;
   }

   public function getBrand(){
    return $this->brand;
   }



    public function  getPrice(){
    return $this->price;
   }

    public function  getDesc(){
    return $this->desc;
   }

    public function  getKeywords(){
    return $this->keywords;
   }
    
     public function  getImage(){
    return $this->image;
   }

    public function  getImageTmp(){
    return $this->imageTmp;
   }




    // SETTERS
   public function  setTitle($title){
     $this->title = $title;
   }
   public function  setCat($cat){
     $this->cat = $cat;
   }
      public function setBrand($brand){
    $this->brand = $brand;
   }



   public function  setPrice($price){
     $this->price = $price;
   }


  public function  setDesc($desc){
     $this->desc = $desc;
   }

public function  setKeywords($keywords){
     $this->keywords = $keywords;
   }


    public function  setImage($image){
     $this->image = $image;
   }

    
   public function  setImageTmp($imageTmp){
     $this->imageTmp = $imageTmp;
   }














}




?>