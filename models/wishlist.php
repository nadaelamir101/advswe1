<?php
  require_once(__ROOT__ . "model/Model.php");
?>
 

<?php  

class wishlist extends Model
{
   private $wish_id;
   private $user_id;
   private $product_id;

   


   function set_wish_id($wish_id)
   {
       $this->wish_id = $wish_id;
   }

   function get_wish_id()
   {
       return  $this->wish_id ;
   }


   function set_user_id($user_id){
       $this->user_id=$user_id;
   }

function get_user_id()
   {
       return  $this->user_id ;
   }

   function set_product_id($product_id)
   {
       $this->product_id = $product_id;
   }

   function get_product_id()
   {
       return  $this->product_id;
   }

 

   
}

?>