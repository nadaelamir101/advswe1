<?php
    require_once("../models/cart.php");
    require_once("CartControllerInterface.php");

    class CartDecorator implements CartControllerInterface{
        private $cartController;

        public function __construct(CartControllerInterface $cartController){
            $this->cartController = $cartController;
        }

        public function getCartItems(){
            return $this->cartController->getCartItems();
        }

        public function addToCart($pid, $pname, $pprice, $pimage, $pcode, $pqty){
            return $this->cartController->addToCart();
        }

        public function getCartItemCount(){
            return $this->cartController->getCartItemCount();
        }

        public function removeCartItem($id){
            return $this->cartController->removeCartItem();
        }

        public function clearCart(){
            return $this->cartController->clearCart();
        }

        public function updateCartItems($qty,$pid,$pprice){
            return $this->cartController->updateCartItems();
        }

        public function placeOrder($name, $email, $phone, $address, $pmode, $products, $grand_total){
            return $this->cartController->placeOrder();
        }
    }

?>