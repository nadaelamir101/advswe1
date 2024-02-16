<?php
require_once("../models/cart.php");

interface CartControllerInterface{
    public function getCartItems();
    public function addToCart($pid, $pname, $pprice, $pimage, $pcode, $pqty);
    public function getCartItemCount();
    public function removeCartItem($id);
    public function clearCart();
    public function updateCartItems($qty,$pid,$pprice);
    public function placeOrder($name, $email, $phone, $address, $pmode, $products, $grand_total);
}
?>