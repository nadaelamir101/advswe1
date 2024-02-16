<?php
    require_once("Model.php");
?>

<?php
    class productModel extends Model{
        private $id;
        private $product_name;
        private $product_price;
        private $product_qty;
        private $product_image;
        private $product_code;
        private $product_size;

        public function getId()
        {
            return $this->id;
        }
    
        public function setId($id)
        {
            $this->id = $id;
        }

        public function getProductName()
        {
            return $this->product_name;
        }
    
        public function setProductName($product_name)
        {
            $this->product_name = $product_name;
        }

        public function getProductPrice()
        {
            return $this->product_price;
        }
    
        public function setProductPrice($product_price)
        {
            $this->product_price = $product_price;
        }

        public function getProductQty()
        {
            return $this->product_qty;
        }
    
        public function setProductQty($product_qty)
        {
            $this->product_qty = $product_qty;
        }

        public function getProductImage()
        {
            return $this->product_image;
        }
    
        public function setProductImage($product_image)
        {
            $this->product_image = $product_image;
        }

        public function getProductCode()
        {
            return $this->product_code;
        }
    
        public function setProductCode($product_code)
        {
            $this->product_code = $product_code;
        }

         public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function getAttribute($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
    }
?>

