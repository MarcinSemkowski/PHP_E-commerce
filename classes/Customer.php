<?php 

class Customer{

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




}




?>