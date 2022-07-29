<?php include ('dbconnection.php') ?> 
<?php
 
  session_start(); 

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
    header('location: firstpg.php');
  }
  
  ?> 

<!DOCTYPE html>
<html>
<head>
  	<title>About us</title>

  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
	
</head>
<body id="aboutusbg">



<?php

$username = $_SESSION['username']; 

$q = "SELECT username from users where username='$username'";
$run=mysqli_query($db,$q);
$user=mysqli_fetch_assoc($run);

if (isset($user)) {
  include 'header.php';
}else
  include 'dheader.php';

 ?>




	
	<div class="container-fluid mt-4">
	<h1 class="text-center text-warning font-italic" style="font-size: 100px"><b>About Us!</b></h1>	
    </div><br><br><br>
   
   <div class="container">
   	   <h2><b>Who We Are</b></h2>
   	   <h4 class="text-success"><b>Though there are few applications who provides some weight reduce diets and tips in Sri Lanka most of them depend on money. As well as there are no profesional input, and not Sri lankan friendly. Therefore we create this web application which can easily register and this is provide absoulotly free and Srilankan friendly process</b></h4><br><br>

   	   <h2 class="text-danger"><b>Our mission is "Make our motherland a healthier place" </b></h2><br>

   	    <h4><b>If you are a overweight or obese Sri Lankan, you MUST try this. ENJOY! </b></h4><br>
   </div>

 






<br><br><br><br>
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>  
  
  </body>
  </html>