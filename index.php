

<html>

<head>

<title>
My Website

</title>
<style>

.copyright {
  padding: 0.3em 1em;
  background-color: #25262e;
}
.footer-menu{
  float: left;
    margin-top: 10px;
}
.footer-menu a{
  color: #cfd2d6;
  padding: 6px;
  text-decoration: none;
}
.footer-menu a:hover, .social i:hover{
  color: #c7940a;
}
.copyright p {
  font-size: 0.9em;
  text-align: right;
}

  .product-box {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
    background-color: white;
  }

  .product-box:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .product-image {
    max-width: 100%;
    height: auto;
  }

  .product-title {
    font-size: 18px;
    margin-top: 10px;
  }

  .product-description {
    font-size: 14px;
    color: #666;
  }

  .product-price {
    font-size: 16px;
    font-weight: bold;
    margin-top: 5px;
  }




#reviewsCarousel {
  margin-top: 20px;
}

.card {
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  padding: 15px;
  
}

.card-title {
  font-size: 18px;
  margin-bottom: 10px;
}

.card-text {
  font-size: 14px;
  color: #666;
}


.carousel-control-prev,
.carousel-control-next {
  color: #000;
  background-color: #000;
  opacity: 0.7;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  filter: invert(100%);
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
  opacity: 1;
}



</style>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body >
<div class="container" >
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GoShop.</a>
	
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Search here</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
		  
         
        </ul>
		
       
		<div class="container mt-3">
  
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
    Sign - in
  </button>
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal2">
    System Admin Login
  </button>
</div>
      </div>
    </div>
  </div>
</nav>
<br><br>
<!--<h1 style="margin-left:80px;margin-top:200px;color:white;font-size:60px">Love the planet <br>we walk on!</h1>
<p style="margin-left:80px;margin-top:10px;color:white;">Bibendum fermentum, aenean donec pretium aliquam blandit <br>tempor imperdiet arcu arcu ut nunc in dictum mauris at ut</p>-->
<!--<div class="container mt-3">
  
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Sign - in
  </button>
</div>-->

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img4.jpg" alt="Image 1" style="width:100%;height:100%;">
    </div>
    <div class="carousel-item">
      <img src="img2.jpg" alt="Image 2" style="width:100%;height:100%;">
    </div>
    <div class="carousel-item">
      <img src="bg.jpg" alt="Image 3" style="width:100%;height:100%;">
    </div>
	<div class="carousel-item">
      <img src="img1.jpg" alt="Image 3" style="width:100%;height:100%;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<section class="container mt-5">
  <h2 class="text-center">Featured Products</h2><hr style="width:40%;margin-left:29%;">
  <div class="row">
    <div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="2.jpg" class="product-image" alt="Product 1">
        <div class="product-info">
          <h5 class="product-title">Product 1</h5>
          <p class="product-description">Synthetic| Lightweight| Premiun| Comfort| Summer Tendy| Outdoor| Loafer Loafers For Men 
</p>
          <p class="product-price">Price: Rs 400</p>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
    Buy Now
  </button>
  </div>
      </div>
    </div>

    <div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="8.jpg" class="product-image" alt="Product 2">
        <div class="product-info">
          <h5 class="product-title">Product 2</h5>
          <p class="product-description">New Design Lightweight Stylish and Trendy walking shoes Walking Shoes </p>
          <p class="product-price">Price: Rs 600</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
   Buy Now
  </button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="7.jpg" class="product-image" alt="Product 2">
        <div class="product-info">
          <h5 class="product-title">Product 3</h5>
          <p class="product-description">Casuals For Women</p>
          <p class="product-price">Price: Rs 700</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
    Buy Now
  </button>
        </div>
      </div>
    </div>
	
	<div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="4.jpg" class="product-image" alt="Product 2">
        <div class="product-info">
          <h5 class="product-title">Product 4</h5>
          <p class="product-description">	
Power by Bata Men's Black Running Shoes</p>
          <p class="product-price">Price: Rs 750</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
  Buy Now
  </button>
        </div>
      </div>
    </div>
	
	<div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="9.jpg" class="product-image" alt="Product 2">
        <div class="product-info">
          <h5 class="product-title">Product 5</h5>
          <p class="product-description">Sneakers For Men  (White)</p>
          <p class="product-price">Price: Rs 500</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
   Buy Now
  </button>
        </div>
      </div>
    </div>
	
	<div class="col-md-4 mt-3">
      <div class="product-box">
        <img src="10.jpg" class="product-image" alt="Product 2">
        <div class="product-info">
          <h5 class="product-title">Product 6</h5>
          <p class="product-description">New Design Lightweight Stylish and Trendy walking shoes Walking Shoes </p>
          <p class="product-price">Price: Rs 450</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="signin-btn">
    Buy Now
  </button>
        </div>
      </div>
    </div>

  </div>
</section>
<br><br>
  <h2 class="text-center">About Us</h2>
      <hr style="width: 40%; margin-left: 30%;">
<section class="container mt-5">
  <div style="display: flex; align-items: center;">
    <img src="about.jpg" style="width:40%; height:60%; margin-top:15px;">
    <div style="margin-left: 30px;">
      
      <p>GoShop. is home to a multitude of leading international and national brands footwear to the needs of the entire family. We aspire to provide our customers a memorable international shopping experience. We are one of the largest chain of department stores across India.</p>
      
      <h5>Our Vision Is,</h5>
      <p>“To be an inspirational and trusted brand, transforming customers' lives through fashion and delightful shopping experience every time. We have a team of professional associates who strive endlessly to provide the best shopping experience to each of our customers. We have adopted a new philosophy of 'Start Something New' to give retail a new dimension, and innovation is our key driver to attain excellence in customer service.”</p>
    </div>
  </div>
</section>
<br><br>
<h2 class="text-center">Reviews</h2>
<hr style="width: 40%; margin-left: 30%;">

<div id="reviewsCarousel" class="carousel slide mt-5 " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-md-4">
		
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">“I recently purchased a Bata shoes, and I couldn’t be happier with my online shopping experience. Their website was user-friendly, making it easy to find the perfect item. The checkout process was smooth, and I received my order promptly. The [product] arrived in excellent condition, exactly as described on their website. I’m thrilled with the quality and will definitely shop again in the future. Highly recommended!”</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jane Smith</h5>
              <p class="card-text">“I got a pair of boots and I’m very satisfied. They are high-quality and worth the money. The store also offered free shipping at that price so that’s a plus!”</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Alice Johnson</h5>
              <p class="card-text">Aenean tristique elit eget turpis pellentesque, vel scelerisque nisi pulvinar.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bob Williams</h5>
              <p class="card-text">Vestibulum nec velit eu nunc sollicitudin faucibus. Ut vulputate odio non mauris porttitor, eu congue nisl laoreet.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Michael Brown</h5>
              <p class="card-text">“I recently purchased a Bata shoes, and I couldn’t be happier with my online shopping experience. Their website was user-friendly, making it easy to find the perfect item. The checkout process was smooth, and I received my order promptly. The [product] arrived in excellent condition, exactly as described on their website. I’m thrilled with the quality and will definitely shop again in the future. Highly recommended!”</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Emily Davis</h5>
              <p class="card-text">“I got a pair of boots and I’m very satisfied. They are high-quality and worth the money. The store also offered free shipping at that price so that’s a plus!”</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>




<!-- The Modal 2-->
<div class="modal fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"> 
        <h4 class="modal-title">Admin Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<form method=post action="admindashboard.php"> 
		
		<h6>Enter Email Id:</h6><input required type=email class="form-control" name=adminusername><br>
		<h6>Enter Password:</h6><input type=password class="form-control" required name=adminpassword><br>
		<h6>Status:</h6><input type=text class="form-control" required value=Active readonly><br>
		<input type=submit class="btn btn-success" value="Signin" style="margin-left:35%;width:150px;">
	
		</form>
      </div>

      

    </div>

	
  </div>
</div>


</div>
<br><br>
<footer class="container-fluid bg-dark text-white py-4">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Information</h4>
        <p>Email: leisha1703@gmail.com</p>
        <p>Phone: +91 6239338632</p>
      </div>
      <div class="col-md-6">
        <h4>Quick Links</h4>
        <ul class="list-unstyled">
          <li><a href="index.php" style="text-decoration:none;color:white;">Home</a></li>
          <li><a href="about.php" style="text-decoration:none;color:white;">About</a></li>
          <li><a href="faq.php" style="text-decoration:none;color:white;">F.A.Q</a></li>
          <li><a href="privacyPolicy.php" style="text-decoration:none;color:white;">Cookies Policy</a></li>
          <li><a href="termsConditions.php" style="text-decoration:none;color:white;">Terms Of Service</a></li>
          <li><a href="support.php" style="text-decoration:none;color:white;">Support</a></li>
          <li><a href="track.php" style="text-decoration:none;color:white;">Track customer queries</a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-0">&copy; 2023 My Website. All rights reserved.</p>
      </div>
    </div>
  </footer>




</body>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header"> 
        <h4 class="modal-title">Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<form method=post action="checkuser.php"> <!-- study about get and post and action method-->
       
		<h6>Enter Email Id:</h6><input required type=email class="form-control" name=username ><br>
		<h6>Enter Password:</h6><input type=password class="form-control" required name=userpass>
		<br>
		<input type=submit class="btn btn-success" value="Signin" style="margin-left:35%;width:150px;">
		<!--<td ><a href="updatepass.php" style="text-decoration:none;">Forgot Username or Password?</a></td></tr>-->
		
		</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">Not have an account? <a href="signup.php" style="text-decoration:none;">Register here</a> 
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
      </div>

    </div>

	
  </div>
</div>

</html>