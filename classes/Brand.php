<?php 

class Brand extends AbstractDatabaseConnection{

private $id;

private $title;




public function getAllBrandsFromDatabase(){
 
    
    
        
    $get_brands = "select * from brands"; 
    $run_brands = mysqli_query($this->getCon(),$get_brands);
        
     while($row_brands=mysqli_fetch_array($run_brands)){
       $brand_id = $row_brands['brand_id']; 
       $brand_title = $row_brands['brand_title']; 
         
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
     
	 }      
    
     
}




 public function getAllBrandsInOptionFromDatabase(){
 	      $get_brands = "select * from brands"; 
                        $run_brands = mysqli_query($this->getCon(),$get_brands);

                       while($row_brands=mysqli_fetch_array($run_brands)){
                       $brand_id = $row_brands['brand_id']; 
                       $brand_title = $row_brands['brand_title']; 

                        echo "<option value='$brand_id'>$brand_title</option>";

                       } 
 }



 public function insertBrands($newBrand){
   $insertBrandQuery = "INSERT INTO brands(brand_title) VALUES ('".$newBrand."')";
   $runBrand = mysqli_query($this->getCon(),$insertBrandQuery);
   if($runBrand){
    echo "<script>alert('New Brand has been inserted !')</script>";
  echo "<script>window.open('index.php?view_brands','_self')</script>";
   }
 }



}
























?>