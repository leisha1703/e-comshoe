<?php
include('cart.php');
 ?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
body{
	
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
</nav>

<div class="container">
<div class="row">
<div class="col-lg-12" style="text-align:center;margin-top:100px;margin-bottom:50px;">
<h1>MY CART</h1>
</div>
<div class="col-lg-8" style="margin-left:250px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr no.</th>
      <th scope="col">Item name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if(isset($_SESSION['cart']))
  {
  foreach($_SESSION['cart'] as $key => $value){
	  echo"
	  <tr>
	  <td>1</td>
	  <td>$value[Item_name]</td>
	  <td>$value[Price]</td>
	  <td><input class='text-center' type='number' value='$value[Quantity]' min='1' max='10'></td>
	  <td><button class='btn btn-sm btn-outline-danger'>REMOVE</button></td>
	  </tr>
	  ";
  }
  }
  ?>
    
    
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>