<?php 

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



 public function getCatsInOption(){
  
                           $get_cats = "SELECT * FROM categories"; 
                        $run_cats = mysqli_query($this->getCon(),$get_cats);

                       while($row_cats=mysqli_fetch_array($run_cats)){
                       $this->id = $row_cats['cat_id']; 
                       $this->title = $row_cats['cat_title']; 

                        echo "<option value='".$this->id."'>".$this->title."</option>";

                       }      


 }






}




?>