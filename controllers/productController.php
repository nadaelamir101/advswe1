<?php
require_once('../config.php');
require_once('../models/productModel.php');
require_once('Controller.php');

class productController extends Controller{
    private $conn;
    
    public function __construct($conn){
        $this->conn  = $conn;
    }

    public function addProduct($product_name,$product_price,$product_qty,$product_image,$product_code){
        $stmt = $this->conn->prepare('INSERT INTO product (product_name, product_price, product_qty, product_image, product_code) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('ssiss',$product_name, $product_price, $product_qty, $product_image, $product_code);

        if($stmt->execute()){
            return 'product added successfully';
        }else{
            return 'Failed to add product';
        }
    }

    public function deleteProduct($id){
        $stmt = $this->conn->prepare('DELETE FROM product WHERE id=?');

        if ($stmt->execute()) {
            return 'Product deleted successfully';
        } else {
            return 'Failed to delete product';
        }
    }

    public function viewProducts()
    {
        $products = array();

        $stmt = $this->conn->prepare('SELECT * FROM product');
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $product = new productModel();
            $product->setId($row['id']);
            $product->setProductName($row['product_name']);
            $product->setProductPrice($row['product_price']);
            $product->setProductQty($row['product_qty']);
            $product->setProductImage($row['product_image']);
            $product->setProductCode($row['product_code']);

            $products[] = $product;
        }

        return $products;
    }
}

?>