<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="../css/style.css" rel="stylesheet" />
  <link href="../css/responsive.css" rel="stylesheet" />
  <link href="../css/header.css" rel="stylesheet" />
</head>
<body>
<div class="hero_area">
 
  <header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="/r-n/index.php">
        <span>
        𝓢ï𝓢𝓣𝓔𝓡𝓢' 𝓦𝓐𝓡𝓓𝓡𝓞𝓑
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/r-n/index.php">𝓗𝓸𝓶𝓮 <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/r-n/Views/shopp.php">
            𝓼𝓱𝓸𝓹
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/r-n/Views/why.php">
            𝒘𝒉𝒚 𝒖𝒔

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/r-n/Views/testimonial.php">
            𝑻𝒆𝒔𝒕𝒊𝒎𝒐𝒏𝒊𝒂𝒍
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/r-n/Views/contact.php">𝒄𝒐𝒏𝒕𝒂𝒄𝒕 𝒖𝒔</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="/r-n/Views/cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/r-n/Views/logout.php">
        Logout
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/r-n/Views/profile.php">
        Profile
        </a>
        </li>
        </ul>
       
      </div>
    </nav>
  </header>
 
</div>
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

