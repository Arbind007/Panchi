<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>
    <?php
	session_start();
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb+srv://harsh:harsh@cluster0.rohs6.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

$db = $client->complain;
$tb=$db->complain;
/*$result = $tb->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
echo "Inserted with Object ID '{$result->getInsertedId()}'";*/

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="complain.css">
<title>Login Page</title>
<style>
input[type="checkbox"]
  {
    cursor:pointer;
  }
  </style>
	
	  <?php  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
$_SESSION["ip"]=$ip;

?>  
</head>
<body>


<!--Navbar goes here-->
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
    <a class="nav-item nav-link active mx-2" href="checkstatus.php" style="color: white;">Complain Status </a>
    </div>
  </div>
  </nav>


  <?php
  if(isset($_GET["sd"]))
  {
    $v=$_GET["sd"];
    if($v=="Police")
    $n=100;
    elseif($v=="Ambulance")
    $n=101;
    else
    $n=123;

    echo "<script>
    function call() {
        window.open('tel:' + {$n});
    }
    call();
</script>";
  }
  ?>
<!--Body goes here -->
<div class="text-right">
  <form action="complain.php" method="get">
  <label for="sd">Speed dial:</label>
<select name="sd" id="sd">
<option value="Police">Police</option>
<option value="Ambulance">Ambulance</option>
<option value="Transport">Transport</option>
</select>
<input type="submit" value="Dial" class=" btn-sm btn-outline-primary" style="height:2.5rem; padding:2px; width:6rem;" >
</form>
</div>


<div class="container-fluid form-main" >
        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
                <div class="row">
                    <h2>Complain</h2>
                </div>
                <div class="row">
    <form action="registered.php" class="main form-group" method="POST">
    <div class="row">    
    
    <input type="text" name="name" class="form__input" id="name username" placeholder="Enter your name">
    </div>
    
    <div class="row">
    
    <input type="phonenumber" name="phone" class="form__input" id="phone number" placeholder="Your phone number">
</div>
    
    <div class="row">
   
    <input type="text" name="complaint" class="form__input" id="complaint complain" placeholder="Complaint details">
</div>
<div class="row">
  <label for="emergency" style="display:inline-block; width:50%; margin-right:0px;" >Need assistance on the spot?</label>
  <input type="checkbox" name="emergency"  id="emergency" style="width:5%; display:inline-block; padding:0px;">
</div>

<div class="row button">
    <input type="submit" value="submit" class="btn">
</div>
    </form>
    <?php if(isset($_GET['id'])) echo "<p style=\"color:green\">Your complaint ID is: '{$_GET['id']}'</p>"; ?>


    </div>
                
            </div>
        </div>
    </div>
</div>




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