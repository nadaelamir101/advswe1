<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php  

class sizes extends Model
{
   private $size_id;
   private $size_name;
   


   function set_size_id($size_id)
   {
       $this->size_id = $size_id;
   }

   function get_size_id()
   {
       return  $this->size_id ;
   }


   function set_size_name($size_name){
       $this->size_name=$size_name;
   }
   function get_size_name()
   {
       return  $this->size_name;
   }

}

?>