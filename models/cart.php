<?php
  require_once("Model.php");
?>
<?php  

class cart extends Model
{
   private $id;
   private $product_name;
   private $product_price;
   private $product_image;
   private $qty;
   private $total_price;
   private $product_code;
   

   public function setId($id) {
    $this->id = $id;
}


public function getId() {
    return $this->id;
}

public function setProductName($product_name) {
    $this->product_name = $product_name;
}


public function getProductName() {
    return $this->product_name;
}


public function setProductPrice($product_price) {
    $this->product_price = $product_price;
}


public function getProductPrice() {
    return $this->product_price;
}


public function setProductImage($product_image) {
    $this->product_image = $product_image;
}


public function getProductImage() {
    return $this->product_image;
}


public function setQty($qty) {
    $this->qty = $qty;
}

public function getQty() {
    return $this->qty;
}


public function setTotalPrice($total_price) {
    $this->total_price = $total_price;
}


public function getTotalPrice() {
    return $this->total_price;
}


public function setProductCode($product_code) {
    $this->product_code = $product_code;
}


public function getProductCode() {
    return $this->product_code;
}
}
?>