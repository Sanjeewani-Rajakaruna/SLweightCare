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
	<title>Meet Dieticians</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="chatbg">

<?php include('header.php') ?>

<div class="container-fluid">
<div class="header text-center text-danger font-italic mt-5 ">
	<h1 style="font-size: 60px"><b>You can see here all the dieticians who has join us!</b></h1>
</div><hr>
</div>

<?php
 
require_once('dbconnection.php');
$sql = "SELECT * FROM dieticians";
$resultset = mysqli_query($db, $sql);
while( $record = mysqli_fetch_assoc($resultset) ) {
?> 



<div class="container">
    <div class="card bg-success col-md-8 mx-auto">
	  <img class="card-img-top  mt-2" src="images/pro1.png" alt="Card image">
	  <div class="card-body text-white">
	    <h2 class= "text font-italic text-center"><b>Dr. <?php echo $record['firstname'];?> <?php echo $record['lastname'];?></b> </h2>
	  </div>

	  <p class="card-text">
	  	<h5><b class="text-light">Email:</b> <b><?php echo $record['email']; ?></b></h5>
	  	<h5><b class="text-light">Registration no:</b> <b><?php echo $record['regno']; ?></b> </h5>
	  	<h5><b class="text-light">Current working place:</b> <b><?php echo $record['currentplace']; ?></b> </h5>
	  	<h5><b class="text-light">Private practice place:</b> <b><?php echo $record['ppplace']; ?></b></h5>
	  	<h5><b class="text-light">Working experience:</b> <b><?php echo $record['workingexperience']; ?></b></h5>
	  </p>
	 
    </div>
    <br><hr>
</div><br><br>


<?php } ?> 



<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</body>
</html>