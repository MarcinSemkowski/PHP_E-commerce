,<?php 

class Category extends AbstractDatabaseConnection{


private $id;

private $title;


public function getAllCatsFromDatabase(){
 
    
    
        
    $get_cats = "select * from categories"; 
    $run_cats = mysqli_query($this->getCon(),$get_cats);
        
     while($row_cats=mysqli_fetch_array($run_cats)){
       $this->id = $row_cats['cat_id']; 
       $this->title = $row_cats['cat_title']; 
         
        echo "<li><a href='index.php?cat=".$this->id."'>".$this->title."</a></li>";
     
	 }      
    
     
}



 public function getAllCatsInOptionFromDatabase(){
  
                           $get_cats = "SELECT * FROM categories"; 
                        $run_cats = mysqli_query($this->getCon(),$get_cats);

                       while($row_cats=mysqli_fetch_array($run_cats)){
                       $this->id = $row_cats['cat_id']; 
                       $this->title = $row_cats['cat_title']; 

                        echo "<option value='".$this->id."'>".$this->title."</option>";

                       }      


 }


public function insertCategory($categoryTitle){
 $newCat = $_POST['new_cat'];

 $insertCat = "INSERT INTO categories (cat_title) VALUES ('".$categoryTitle."')  ";
 $runCat = mysqli_query($this->getCon(),$insertCat);
 if($runCat){
  echo "<script>alert('New Category has been inserted !')</script>";
  echo "<script>window.open('index.php?view_categories','_self')</script>";
 }
}


public function deleteCategory($delete_id){
  $deleteCategoryQuery = "DELETE FROM categories WHERE cat_id = '".$delete_id."' ";
  $runDelete = mysqli_query($this->getCon(),$deleteCategoryQuery);
  if($runDelete){
     echo "<script>alert(' Category has been deleted !')</script>";
  echo "<script>window.open('index.php?view_categories','_self')</script>";
  }
}

public function editCategory($id){
  $editCategoryQuery = "SELECT * FROM categories WHERE cat_id = '".$id."'";
  $runCat = mysqli_query($this->getCon(),$editCategoryQuery);
  $rowEditCat = mysqli_fetch_array($runCat);
  $editCatTitle = $rowEditCat['cat_title'];

  return $editCatTitle;
}

public function updateCategory($titleCat,$idCat){
 $updateCatQuery = "UPDATE categories SET cat_title = '$titleCat' WHERE cat_id = '$idCat'";
 $runUpdateCat = mysqli_query($this->getCon(),$updateCatQuery);
 if($runUpdateCat){
   echo "<script>alert(' Category has been updated !')</script>";
  echo "<script>window.open('index.php?view_categories','_self')</script>";
 }
}





}




?>