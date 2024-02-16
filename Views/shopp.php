<?php
require_once("../models/productModel.php");
require_once("../controllers/productController.php");
require_once('../config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../uploads/3.png" type="image/x-icon">
  <title>𝓢ï𝓢𝓣𝓔𝓡𝓢' 𝓦𝓐𝓡𝓓𝓡𝓞𝓑</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="../css/style.css" rel="stylesheet" />
  <link href="../css/responsive.css" rel="stylesheet" />
</head>

<body>
<div class="hero_area">
    
    <?php include 'header-section.php'; ?>
   
  </div>



  


  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Shop</h2>
      </div>
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			
  			// $stmt = $conn->prepare('SELECT * FROM product');
  			// $stmt->execute();
  			// $result = $stmt->get_result();
  			// while ($row = $result->fetch_assoc()):
          $productModel = new productModel();
          $productController = new productController($conn);
          $products = $productController->viewProducts();

          foreach($products as $product):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="../<?= $product->getProductImage() ?>" class="img-box" height="250">
            <div class="card-body p-1">
              <h4 class="box"><?= $product->getProductName() ?></h4>
              <h5 class="box"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($product->getProductPrice(),2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $product->getProductQty() ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $product->getId() ?>">
                <input type="hidden" class="pname" value="<?= $product->getProductName() ?>">
                <input type="hidden" class="pprice" value="<?= $product->getProductPrice() ?>">
                <input type="hidden" class="pimage" value="<?= $product->getProductImage() ?>">
                <input type="hidden" class="pcode" value="<?= $product->getProductCode() ?>">
                <button class="btn btn-info btn-block addItemBtn"style = background-color:black><i class="fas fa-cart-plus" ></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
  </section>


 <!-- info section -->
 <?php include 'info-section.php'; ?>
  <!-- end info section -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>


  <script type="text/javascript">
  $(document).ready(function() {

  
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

 
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>