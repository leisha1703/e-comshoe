<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>

h1{
	text-align:center;
	margin-top:20px;
	color:white;
}
.card{
	margin-left:590px;
	padding:15px ;
}
input[type=submit]{
	margin-top:10px;
	padding:10px;
	width:100%;
}
input[type=text]{
	margin-top:10px;
	padding:10px;
	width:100%;
}
body{
	background-image:linear-gradient(blue,skyblue);
}
</style>
</head>
<body>
<h1>Register here</h1>
<br>
<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">Enter Email Id</h5>
    <p class="card-text">Enter Email Id to check whether already registered!!</p>
	<form method="post" action="checksignup.php"><input type=text name=username1><input type=submit value="Check"></form>
    
  </div>
</div>

</body>
</html>