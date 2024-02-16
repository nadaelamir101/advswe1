<?php
  require_once("Model.php");
?>

<?php  

class orders extends Model
{
   private $order_id;
   private $user_id;
   private $delivered_to;
   private $phone_no;
   private $deliver_address;
   private $pay_method;
   private $pay_status;
   private $order_status;
   private $order_date;
   

   function set_order_id($order_id)
   {
       $this->order_id= $order_id;
   }

   function get_order_id()
   {
       return  $this->order_id ;
   }


   function set_user_id($user_id){
       $this->user_id=$user_id;
   }

function get_user_id()
   {
       return  $this->user_id ;
   }

   function set_delivered_to($delivered_to)
   {
       $this->delivered_to = $delivered_to;
   }

   function get_delivered_to()
   {
       return  $this->delivered_to ;
   }
   function set_phone_no($phone_no)
   {
       $this->phone_no = $phone_no;
   }

   function get_phone_no()
   {
       return  $this->phone_no;
   }


   function set_deliver_address($deliver_address)
   {
       $this->deliver_address = $deliver_address;
   }

   function get_deliver_address()
   {
       return  $this->deliver_address;
   }
  
   function set_pay_method($pay_method)
   {
       $this->pay_method = $pay_method;
   }

   function get_pay_method()
   {
       return  $this->pay_method ;
   }
   function set_pay_status($pay_status)
   {
       $this->pay_status = $pay_status;
   }

   function get_pay_status()
   {
       return  $this->pay_status ;
   }
   function set_order_status($order_status)
   {
       $this->order_status = $order_status;
   }

   function get_order_status()
   {
       return  $this->order_status ;
   }
   function set_order_date($order_date)
   {
       $this->order_date = $order_date;
   }

   function get_order_date()
   {
       return  $this->order_date ;
   }
}

?>