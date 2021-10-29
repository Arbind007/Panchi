
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain Status</title>
    <?php
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb+srv://harsh:harsh@cluster0.rohs6.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

$db = $client->complain;
$tb=$db->complain;
?>
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="search.css">
	<title>Complain status</title>
</head>
<body>


<!-- Navbar Goes Here -->
<nav class="navbar navbar-expand-lg navbar-dark " style=" background-color:#008080 ;">
  <a class="navbar-brand" href="#" style="color: white;">Panchi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon ">
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" >
    <a class="nav-item nav-link active mx-2" href="home.html" style="color: white;">Home </a>
    <a class="nav-item nav-link active mx-2" href="complain.php" style="color: white;">Complain </a>
    <a class="nav-item nav-link active mx-2" href="admin.php" style="color: white;">Admin Login </a>
    <a class="nav-item nav-link active mx-2" href="#" style="color: white;">Complain Status </a>
    </div>
  </div>
  </nav>
<!--Form body-->


<form action="status.php" class="main" method="POST" >
<div class="search row align-items-center" >
    <input type="text" placeholder="Search" name="complaint" id="complaint" class=" form-control form-rounded input" style="width: 500px;  color: #008080;">
</div>
<input type="submit" value="submit" class="btn searchicon">
</form>



<!-- Footer -->
<footer class="page-footer font-small teal pt-4" >
	<div class="container-fluid text-center text-md-left" style="background-color: #008080;">
	  <div class="row" style="color: white;">
		<div class="col-md-6 mt-md-0 mt-3">
		  <h5 class="text-uppercase font-weight-bold">About Us</h5>
		  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
			repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
			harum esse fugiat. Itaque, culpa?</p>
  
		</div>
		<hr class="clearfix w-100 d-md-none pb-3">
		<div class="col-md-6 mb-md-0 mb-3">
		  <h5 class="text-uppercase font-weight-bold">Connect With Us</h5>
		  <ul class="list-unstyled">
			<li>
			  <a href="#" style="color: white;">Link 1</a>
			</li>
			<li>
			  <a href="#!" style="color: white;">Link 2</a>
			</li>
			<li>
			  <a href="#!" style="color: white;">Link 3</a>
			</li>
			<li>
			  <a href="#!" style="color: white;">Link 4</a>
			</li>
		  </ul>
		  </div>
	  </div>
	</div>
	<div class="footer-copyright text-center py-3" style="color: #008080; font-size: 20px;">© 2020 Copyright:
	  <a href="#" style="color: #008080;"> Panchi</a>
	</div>
</footer>

</body>
</html>
