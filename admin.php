<?php 
session_start();
if(!isset($_SESSION["sess_id"]))
header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
require 'vendor/autoload.php';
$client = new MongoDB\Client(
    'mongodb+srv://harsh:harsh@cluster0.rohs6.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

$db = $client->complain;
$tb=$db->complain;

if(isset($_GET["obj"]))
{
    $single=$_GET['obj'];
    
    if(isset($_POST["check{$single}"]))
    $stat="resolved";
    else
    $stat="pending";
        $newdata = array('$set' => array("comment" => $_POST["comment{$single}"], "status" => $stat, "emergency" => "false"));

        $condition = array("_id" => new MongoDB\BSON\ObjectID($single));
        
        if($tb->updateMany($condition, $newdata))
        {
            echo '<p style="color:green;">Record updated successfully</p>';
        }
        else
        {
            echo '<p style="color:red;">Error in update</p>';

        }
    }
?>
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="allcomplains.css">
<title>Admin portal</title>
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
      <a class="nav-item nav-link active mx-2" href="logout.php" style="color: white;">Log out </a>
		  </div>
		</div>
	  </nav>

<!-- Main -->
<table class="table table-sm my-5" >
    <thead style="color: white; background-color: #008080;"> 
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Contact</th>
    <th>Location</th>
    <th>Pin-code</th>
    <th>Complaint</th>
    <th>Status</th>
    <th>Comments</th>
    <th>Update</th>
</tr>
</thead>
<tbody style="color: #008080;">
<?php

$query=$db->complain->find();
$c=0;
foreach($query as $single)
{
    if($single->status=="pending")
    echo"<form action=\"admin.php?obj={$single->_id}\" method=\"post\" ><tr class=\"$single->emergency\">";
    else
    echo"<form action=\"admin.php?obj={$single->_id}\" method=\"post\" ><tr class=\"table-success\" style=\"color: #008080;\">";

    echo "<td>{$single->_id}</td><td>{$single->name}</td><td>{$single->phone}</td><td>{$single->location}</td><td>{$single->pincode}</td><td>{$single->complaint}</td><td>";
    if($single->status=="pending")
    echo "<input  type=\"radio\" class=\"{$single->_id} form-check-input\" name=\"check{$single->_id}\">";
    else
    echo "<input type=\"radio\" name=\"check{$single->_id}\" checked=true class=\"{$single->_id} form-check-input\" id=\"check{$single->_id}\">";
    echo"</td><td>";
    if($single->comment=="null")
    echo"<input type=\"text\" name=\"comment{$single->_id}\"id=\"comment{$single->_id}\" class=\"{$single->_id}\">";
    else
    echo "$single->comment";
    echo"</td>";
    if($single->status=="pending")
    echo "<td><input type=\"submit\" value=\"update\" class=\"{$single->_id} btn resolved\"></td></tr>";
    else
    echo "<td><input type=\"submit\" value=\"update\" class=\"{$single->_id} btn resolved\" disabled></td></tr>";
    
    echo"</form>";
}
?>
</tbody>
</table>


<!-- Footer -->
<footer class="page-footer font-small teal pt-4" style="z-index: 1; margin-bottom:0px;" >
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
