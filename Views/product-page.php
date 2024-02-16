<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <title>Product Page</title>
  
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header-section.php'; ?>
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="product_detail">
            <div class="row">
              <div class="col-md-6">
                <div class="product_img">
                  <?php
                  // Replace 'your_database_name', 'your_username', and 'your_password' with your actual database credentials
                  $host = "localhost";
                  $dbname = "swe";
                  $username = "root";
                  $password = "";

                  // Connect to the database
                  try {
                    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                  }

                  // Check if the 'product' parameter is set in the URL
                  if (isset($_GET['product'])) {
                    // Retrieve product details from the 'product' table
                    $query = "SELECT * FROM product WHERE product_id = :product_id";
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':product_id', $_GET['product'], PDO::PARAM_INT);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Check if the product exists
                    if (!$product) {
                      die("Product not found.");
                    }
                  } else {
                    die("Product parameter not provided.");
                  }

                  // Display product image
                  echo '<img src="' . $product['product_image'] . '" alt="">';
                  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="product_info">
                  <?php
                  // Display product name and price
                  echo '<h2>' . $product['product_name'] . '</h2>';
                  echo '<h3>' . $product['price'] . '</h3>';
                  echo '<p>' . $product['product_desc'] . '</p>';
                  ?>

                  <div class="select_size">
                    <label for="size">Select Size:</label>
                    <select id="size" name="size">
                      <?php
                      // Retrieve available sizes from the 'sizes' table
                      $query = "SELECT * FROM sizes";
                      $stmt = $db->query($query);
                      $sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      // Display available sizes in the select list
                      foreach ($sizes as $size) {
                        echo '<option value="' . $size['size'] . '">' . $size['size'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="btn-box">
                    <button class="add-to-cart-btn" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-image="<?php echo $product['product_image']; ?>">Add to Cart</button>
                    <a href="#">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end product section -->

  <!-- info section -->
  <?php include 'info-section.php'; ?>
 To store the product information into the "ordersss" table in the "swe" database when the "Add to Cart" button is pressed, you can modify the code as follows:


<!-- ... existing code ... -->

<body>
  <!-- ... existing code ... -->

  <div class="btn-box">
    <button class="add-to-cart-btn" data-product-id="<?php echo $product['product_id']; ?>" data-product-name="<?php echo $product['product_name']; ?>" data-product-image="<?php echo $product['product_image']; ?>">Add to Cart</button>
    <a href="#">Buy Now</a>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- end product section -->

<!-- ... existing code ... -->

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>

<script>
  $(document).ready(function() {
    $('.add-to-cart-btn').click(function() {
      var productId = $(this).data('product-id');
      var productName = $(this).data('product-name');
      var productImage = $(this).data('product-image');

      // AJAX request to send the data to the server
      $.ajax({
        url: 'add_to_cart.php',
        method: 'POST',
        data: {
          product_id: productId,
          product_name: productName,
          product_image: productImage
        },
        success: function(response) {
          // Handle the response from the server
          console.log(response);
          alert('Product added to cart successfully!');
        },
        error: function(xhr, status, error) {
          // Handle the error
          console.error(error);
          alert('Error occurred. Please try again.');
        }
      });
    });
  });
</script>
</body>
</html>