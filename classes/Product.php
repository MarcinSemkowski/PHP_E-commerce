<?php 


class Product {
   private $title;
   private  $cat;
   private  $brand;
    private  $price;
    private  $desc;
    private  $keywords;
    
   private  $image;
    
   private  $imageTmp;




   public getTitle(){
   	return $this->title;
   }

    public getCat(){
   	return $this->cat;
   }

    public getPrice(){
   	return $this->price;
   }

    public getDesc(){
   	return $this->desc;
   }

    public getKeywords(){
   	return $this->keywords;
   }
    
     public getImage(){
   	return $this->image;
   }

    public getImageTmp(){
   	return $this->imageTmp;
   }





   public setTitle($title){
   	 $this->title = $title;
   }
public setCat($cat){
   	 $this->cat = $cat;
   }


   public setPrice($price){
   	 $this->price = $price;
   }


  public setDesc($desc){
   	 $this->desc = $desc;
   }

public setKeywords($keywrds){
   	 $this->keywords = $keywords;
   }


    public setImage($image){
   	 $this->image = $image;
   }

    
     public getImage(){
   	return $this->image;
   }
public setImageTmp($imageTmp){
   	 $this->imageTmp = $imageTmp;
   }









}




?>