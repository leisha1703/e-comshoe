<?php
session_start();
$connect=mysqli_connect("localhost","root","","mycart");

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
.card{
	margin-bottom:50px;
	
	margin-top:55px;
	
}
.card-body{
	height:150px;

}
.card-img-top{
	height:285px;
	width:285px;
}
</style>
</head>
<body >
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
		  <li class="nav-item">
            <a class="nav-link" href="billing.php">Billing</a>
          </li>
		 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Products
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="men.php">Men</a></li>
              <li><a class="dropdown-item" href="women.php">Women</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
		
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
		<div class="container mt-3">
  
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
    Sign - in
  </button>
</div>
      </div>
    </div>
  </div>
</nav><br><br><br>
<div class ="cart">
<a href="billing.php" class="btn btn-outline-success" style="margin-left:1300px;">Add to cart(0)</a>
</div>

<div class="container">
    <div class="row">
        <?php
        $carts = [
            ['name' => 'Cart 1', 'price' => 750, 'image' => '1.jpg'],
            ['name' => 'Cart 2', 'price' => 250, 'image' => '2.jpg'],
            ['name' => 'Cart 3', 'price' => 360, 'image' => '3.jpg'],
            ['name' => 'Cart 4', 'price' => 390, 'image' => '4.jpg'],
            ['name' => 'Cart 5', 'price' => 400, 'image' => '5.jpg'],
            ['name' => 'Cart 6', 'price' => 400, 'image' => '6.jpg'],
			['name' => 'Cart 7', 'price' => 500, 'image' => '2.jpg'],
			['name' => 'Cart 8', 'price' => 600, 'image' => '3.jpg'],
			['name' => 'Cart 9', 'price' => 300, 'image' => '1.jpg'],
        ];

        echo '<h2>Carts</h2>';
        echo '<br>';
        echo '<div class="row">';

        $i = 0;
        while ($i < count($carts)) {
			
            echo '<div class="col-lg-4" style="text-align:center;margin-bottom:40px;">';
            echo '<img src="' . $carts[$i]['image'] . '" alt="' . $carts[$i]['name'] . '" style="width: 300px; height: 300px;">';
            echo '<br>';
            echo '<strong>' . $carts[$i]['name'] . '</strong>';
            echo '<br>';
            echo 'Price: $' . $carts[$i]['price'];
            echo '<br>';
            echo '<button type="submit" name="Add_to_cart" class="btn btn-primary">Buy Now</button>';
			
            echo '</div>';

            $i++;
        }
       
        echo '</div>';
        ?>
    </div>
</div>


<!--<div class="container">
<div class="row">
<div class="col-lg-3">
<form action="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 1</h5>
    <p class="card-text">Price: Rs 450</p>
    <button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
	<input type="hidden" name="Item_name" value="Shoes 1">
	<input type="hidden" name="Price" value="450">
  </div>
</div>
</form>
</div>
<div class="col-lg-3">
<form action="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 2</h5>
    <p class="card-text">Price: Rs 750</p>
    <button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
	<input type="hidden" name="Item_name" value="Shoes 2">
	<input type="hidden" name="Price" value="750">
  </div>
</div>
</form>
</div>
<div class="col-lg-3">
<form action="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 3</h5>
    <p class="card-text">Price: Rs 350</p>
    <button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
	<input type="hidden" name="Item_name" value="Shoes 3">
	<input type="hidden" name="Price" value="350">
  </div>
</div>
</form>
</div>
<div class="col-lg-3">
<formaction="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="4.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 4</h5>
    <p class="card-text">Price: Rs 650</p>
    <button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
	<input type="hidden" name="Item_name" value="Shoes 4">
	<input type="hidden" name="Price" value="650">
  </div>
</div>
</form>
</div>
<div class="col-lg-3">
<form action="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="5.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 5</h5>
    <p class="card-text">Price: Rs 550</p>
<button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
<input type="hidden" name="Item_name" value="Shoes 5">
	<input type="hidden" name="Price" value="550">
  </div>
</div>
</form>
</div>
<div class="col-lg-3">
<form action="cart.php" method="POST">
<div class="card" style="width: 18rem;">
  <img src="6.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Shoes 6</h5>
    <p class="card-text">Price: Rs 350</p>
    
	<button type="submit" name="Add_to_cart" class="btn btn-primary" >Add to cart</button>
	<input type="hidden" name="Item_name" value="Shoes 6">
	<input type="hidden" name="Price" value="350">
  </div>
</div>
</form>
</div>
</div>
</div>
</form>
</div>-->
</body>
</html>