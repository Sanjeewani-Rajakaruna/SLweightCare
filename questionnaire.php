<!DOCTYPE html>
<html>
<head>
	<title>Questionaire section</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="userhomebg">

<h1 class="text-white text-center mx-auto mt-5">We will get to know you a little more!</h1> <hr style="height: 20px;">

<div class="container col-md-4 mx-auto text-center" style="background-color: lightgray;">

	<h5 class="text mt-5">Are you suffering from diebetes?</h5>
	<button class="btn-danger" onclick="return alert ('Since we are developed this system in genaral, this system may contain some content which would not be suitable for you. We recommend you to get advices from some professional before use this system. Thank you!');">YES</button>   <button class="btn-success"  onclick="return alert ('Great!');">NO</button><br><br>

	<h5>Are you suffering from any hormone imbalance?</h5>
	<button class="btn-danger" onclick="return alert ('Since we are developed this system in genaral, this system may contain some content which would not be suitable for you. We recommend you to get advices from some professional before use this system. Thank you!');">YES</button>   <button class="btn-success"  onclick="return alert ('Great!');">NO</button><br><br>

	<h5>Are you suffering from any heart disease?</h5>
	<button class="btn-danger" onclick="return alert ('Since we are developed this system in genaral, this system may contain some content which would not be suitable for you. We recommend you to get advices from some professional before use this system. Thank you!');">YES</button>   <button class="btn-success"  onclick="return alert ('Great!');">NO</button><br><br>

	<h5>Are you suffering from any kidney problem?</h5>
	<button class="btn-danger" onclick="return alert ('Since we are developed this system in genaral, this system may contain some content which would not be suitable for you. We recommend you to get advices from some professional before use this system. Thank you!');">YES</button>   <button class="btn-success"  onclick="return alert ('Great!');">NO</button><br><br>

	<h5>Do you have any food allergies?</h5>
	<button class="btn-danger" onclick="return alert ('Since in this system, we mainly focus on providing diet plans, we advice you to concern about that. Thank you!');">YES</button>   <button class="btn-success"  onclick="return alert ('Great!');">NO</button><br><br><hr>

	   <div class="row">
			    <div class="col-md-6 text-center">
			        <a href="firstpg.php" class="btn btn-dark" role="button"><b>Back</b></a>
			    </div>
			    <div class="col-md-6 text-center">
			         <a href="userslogin.php" class="btn btn-primary" role="button"onclick="return alert ('We are glad you chose to join us.Thank You!');"><b>Next</b></a>
			    </div>
	  			</div><br>


         </div>


<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>