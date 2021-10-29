
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>
    <?php
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb+srv://harsh:harsh@cluster0.rohs6.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

$db = $client->complain;
$tb=$db->complain;

$name=$_POST['name'];
$ph=&$_POST["phone"];
$comp=$_POST["complaint"];
$emer=isset($_POST["emergency"])?"true":"false";
if($emer=="true")
{
	//$PublicIP = $_SERVER['REMOTE_ADDR'];
	$PublicIP="47.9.171.77";

	/*CHANGE THE $PUBLICIP VARIABLE TO THE LINE ABOVE ONCE HOSTED*/
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$location  = $json['loc'];
$pin=$json['postal'];
}
else
{
	$pin="";
	$location="";
}
$result = $tb->insertOne( [ 'name' => $name, 'phone' => $ph, 'complaint' => $comp, 'emergency' => $emer, 'status' => "pending",'location' => $location, 'pincode' => $pin, 'comment'=>'null' ] );

?>
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
			<a class="nav-item nav-link active mx-2" href="login.php" style="color: white;">Admin Login </a>
			<a class="nav-item nav-link active mx-2" href="checkstatus.php" style="color: white;">Complain Status </a>
		  </div>
		</div>
	  </nav>

<!-- Main -->


<?php header("Location:complain.php?id={$result->getInsertedId()}"); ?>
</body>
</html>
