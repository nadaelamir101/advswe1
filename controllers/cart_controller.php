<?php
    session_start();

    require_once('Controller.php');
    require_once('../models/cart.php');
    require_once('../config.php');
    require_once('CartControllerInterface.php');
    
    class cartController extends Controller implements CartControllerInterface{
        private $conn;
        private $cartModel;
    
        public function __construct($conn) {
            $this->conn = $conn;
            $this->cartModel = new cart();
            
        }
        public function getCartItems()
        {
            $stmt = $this->conn->prepare('SELECT * FROM cart');
            $stmt->execute();
            $result = $stmt->get_result();
            $cartItems = [];
    
            while ($row = $result->fetch_assoc()) {
                $cartItems[] = $row;
            }
    
            return $cartItems;
        }
        public function addToCart($pid, $pname, $pprice, $pimage, $pcode, $pqty){
            if (isset($_POST['pid'])) {
                $pid = $_POST['pid'];
                $pname = $_POST['pname'];
                $pprice = $_POST['pprice'];
                $pimage = $_POST['pimage'];
                $pcode = $_POST['pcode'];
                $pqty = $_POST['pqty'];
                $total_price = $pprice * $pqty;
          
                $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
                $stmt->bind_param('s',$pcode);
                $stmt->execute();
                $res = $stmt->get_result();
                $r = $res->fetch_assoc();
                $code = $r['product_code'] ?? '';
          
                if (!$code) {
                  $query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
                  $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
                  $query->execute();
          
                  echo '<div class="alert alert-success alert-dismissible mt-2">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Item added to your cart!</strong>
                                  </div>';
                } else {
                  echo '<div class="alert alert-danger alert-dismissible mt-2">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Item already added to your cart!</strong>
                                  </div>';
                }
              }
          
        }
        public function getCartItemCount(){
            if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $stmt->store_result();
                $rows = $stmt->num_rows;
          
                echo $rows;
              }
        }
        public function removeCartItem($id){
            if (isset($_GET['remove'])) {
                $id = $_GET['remove'];
                $conn = new mysqli("localhost","root","","swe");
                $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
                $stmt->bind_param('i',$id);
                $stmt->execute();
          
                $_SESSION['showAlert'] = 'block';
                $_SESSION['message'] = 'Item removed from the cart!';
                header('location:cart.php');
              }
          
        }
        public function clearCart(){
            if (isset($_GET['clear'])) {
                $conn = new mysqli("localhost","root","","swe");
                $stmt = $conn->prepare('DELETE FROM cart');
                $stmt->execute();
                $_SESSION['showAlert'] = 'block';
                $_SESSION['message'] = 'All Item removed from the cart!';
                header('location:cart.php');
              }
        }
        public function updateCartItems($qty,$pid,$pprice){
            if (isset($_POST['qty'])) {
                $qty = $_POST['qty'];
                $pid = $_POST['pid'];
                $pprice = $_POST['pprice'];
          
                $tprice = $qty * $pprice;
          
                $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
                $stmt->bind_param('isi',$qty,$tprice,$pid);
                $stmt->execute();
              }
        }
        public function placeOrder($name, $email, $phone, $address, $pmode, $products, $grand_total){
            if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $products = $_POST['products'];
                $grand_total = $_POST['grand_total'];
                $address = $_POST['address'];
                $pmode = $_POST['pmode'];
          
                $data = '';
          
                $stmt = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
                $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
                $stmt->execute();
                $stmt2 = $conn->prepare('DELETE FROM cart');
                $stmt2->execute();
                $data .= '<div class="text-center">
                                          <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                                          <h2 class="text-success">Your Order Placed Successfully!</h2>
                                          <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
                                          <h4>Your Name : ' . $name . '</h4>
                                          <h4>Your E-mail : ' . $email . '</h4>
                                          <h4>Your Phone : ' . $phone . '</h4>
                                          <h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
                                          <h4>Payment Mode : ' . $pmode . '</h4>
                                    </div>';
                echo $data;
              }
        }
    }

?>