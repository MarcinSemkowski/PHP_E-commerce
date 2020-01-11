<?php 

class Cart extends AbstractDatabaseConnection{


 private $totalPrice;






public function getFormCart(){

  
  echo "<form action='' method='post' enctype='multipart/form-data'>
                <table align='center' width= '700' bgcolor='skyblue'>   
                    <tr align='center'>
                    <th>Remove</th>
                        <th>Product/s</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>";
                    
                    

                        $this->totalPrice  = 0;

                        $ip = $this->getIP();
                        $sel_price = "SELECT * FROM cart WHERE ip_add = '".$ip."'";

                        $run_price = mysqli_query($this->getCon(),$sel_price);

                        while($p_price = mysqli_fetch_array($run_price)){
                            $pro_id = $p_price['p_id'];
                            $pro_price = "SELECT * FROM products WHERE product_id = '".$pro_id."' ";
                            $pro_query = mysqli_query($this->getCon(),$pro_price);
                       
                            while($r_pro = mysqli_fetch_array($pro_query)){
                                $price_pro = array($r_pro['product_price']);
                                $product_title = $r_pro['product_title'];
                                $product_image = $r_pro['product_image'];
                                
                                $single_price = $r_pro['product_price'];
                                
                                
                                                       
                                $values = array_sum($price_pro);
                                $this->totalPrice += $values;
                            
                            
                
                         
                            
                    echo  " <tr align='center'>
                        <td><input type='checkbox' name='remove[]'' value='".$pro_id."'' ></td>  
                        <td>". $product_title."<br> 
                          <img src='admin_area/product_images/".$product_image."' width='60' height='60'/>
                          </td>
                        <td><input type='text' size='3' name='qty' value= ' ". @ $_SESSION['qty']."' /></td>";
                          
                        
                      
                          if(isset($_POST['update_cart']))
                            if(isset($_POST['qty'])){
                            	$qty = $_POST['qty'];
                               
                             $this->totalPrice = $this->qty($qty);

                            }
                          
                          
                          
                          
                     echo   "<td>".$single_price."$"."</td>".  
                    "</tr>";
                
                    
                     }
                        
                    }
                echo    "<tr align='right'>"
                ."<td colspan='4'><b>Sub Total:</b></td>"
                ."<td>".$this->totalPrice()." $"."</td>"
                    ."</tr>";
                    
                  echo  "<td colspan='2'><input type='submit' name='update_cart' value='Update Cart' /></td>
                    <td><input type='submit' name='continue' value='Continue Shopping' ></td>
                    <td><button><a href='checkout.php' style='text-decoration:none; color:black'>Checkout</a></button></td>
                    <td></td>
                    
                 </table>
            </form>";
            
                    
                    


}







public function removeFromCart(){
	       $ip = $this->getIP();
            
                if(isset($_POST['remove'])){
                foreach($_POST['remove'] as $remove_id){
                 $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip'  ";     
                 $run_delete = mysqli_query($this->getCon(),$delete_product);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                        
                    }
                }
            }
            
}




private function qty(  $qty)  {
    
                            
$update_qty = "UPDATE cart set qty = '$qty'";
$run_qty = mysqli_query($this->getCon(),$update_qty);
 $_SESSION['qty'] = $qty;
      @ $returnValue = $this->totalPrice * $qty;                       
return  $returnValue;  
}





public function getCart($pro_id){

    
    
   
        $ip = $this->getIP();
        
       
        $check_pro = "SELECT * FROM cart WHERE ip_add ='".$ip."' AND p_id = '".$pro_id."' ";
        
        $run_check = mysqli_query($this->getCon(),$check_pro);
        if(mysqli_num_rows($run_check) > 0){
         echo "";    
        } else{
         $insert_pro = "INSERT INTO cart(p_id,ip_add) VALUES('".$pro_id."','".$ip."')";    
        $run_pro = mysqli_query($this->getCon(),$insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }









public  function totalPrice(){
    
    
    $total  = 0;
    
    $ip = $this->getIP();
    $sel_price = "SELECT * FROM cart WHERE ip_add = '".$ip."'";
    
    $run_price = mysqli_query($this->getCon(),$sel_price);

    while($p_price = mysqli_fetch_assoc($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_qty = $p_price['qty'];
        $pro_price = "SELECT * FROM products WHERE product_id = '".$pro_id."' ";
        $pro_query = mysqli_query($this->getCon(),$pro_price);
        
        while($r_pro = mysqli_fetch_assoc($pro_query)){
           $productPrice = $r_pro['product_price'];
           
            $total += $productPrice * $pro_qty;
        }
    }

     return $total;
}



public  function totalItems(){
    
      $itemNum =0;
    
    if(isset($_GET['add_cart'])){
        $ip =  $this->getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '$ip' ";
        $run_items = mysqli_query($this->getCon(),$get_items);
          
          while ($fetchCart = mysqli_fetch_array($run_items)) {
             
             $qtyCartItem = $fetchCart['qty'];
            $itemNum += $qtyCartItem;
          }

        } else{
         $ip = $this->getIP();
        $get_items = "SELECT * FROM cart WHERE ip_add= '".$ip."' ";
        $run_items = mysqli_query($this->getCon(),$get_items);
        $count_items = mysqli_num_rows($run_items);
        
          while ($fetchCart =  mysqli_fetch_array($run_items)) {
             
             $qtyCartItem = $fetchCart['qty'];
            $itemNum += $qtyCartItem;
          }

    }
    
    return $itemNum;
}








}








?>