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
  <title>Giftos</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
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

  <!-- shop section -->
  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Shop</h2>
      </div>
      <div class="row">
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

        // Retrieve products from the 'product' table
        $query = "SELECT * FROM product";
        $stmt = $db->query($query);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display products dynamically
        foreach ($products as $product) {
          $name = $product['product_name'];
          $price = $product['price'];
          $image = $product['product_image'];
          $id = $product['product_id'];
          echo '<div class="col-sm-6 col-md-4 col-lg-3">';
          echo '<div class="box" onclick="viewProduct(\'' . $name . '\', \'' . $price . '\')">';
          echo '<a href="product-page.php?product=' . urlencode($id) . '&price=' . urlencode($price) . '">';
          echo '<div class="img-box">';
          echo '<img src="' . $image . '" alt="">';
          echo '</div>';
          echo '<div class="detail-box">';
          echo '<h6>' . $name . '</h6>';
          echo '<h6>Price <span>$' . $price . '</span></h6>';
          echo '</div>';
          echo '<div class="new">';
          echo '</div>';
          echo '</a>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
      <div class="btn-box">
        <a href="#">View All Products</a>
      </div>
    </div>
  </section>
  <!-- end shop section -->

  <!-- info section -->
  <?php include 'info-section.php'; ?>
  <!-- end info section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>

  <script>
    function viewProduct(name, price) {
      sessionStorage.setItem('productName', name);
      sessionStorage.setItem('productPrice', price);
    }
  </script>
</body>
</html>