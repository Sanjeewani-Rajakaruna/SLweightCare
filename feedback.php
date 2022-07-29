<?php include ('dbconnection.php') ?>
<?php
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	header('location: firstpg.php');
  } 
  ?>

<?php 

if (isset($_POST['feedback1'])) {

//save input values into variables with avoiding sql injections
$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$choose1 = mysqli_real_escape_string($db,$_POST['choose1']);
$choose = mysqli_real_escape_string($db, $_POST['choose']);
$suggestions = mysqli_real_escape_string($db,$_POST['suggestions']); 


$query_feedback = "INSERT INTO feedback (username, email, usertype, feedback, suggestions)VALUES ('$username', '$email', '$choose1', '$choose', '$suggestions')";

 mysqli_query($db, $query_feedback);
 header('location: feedback.php');

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 

</head>
<body id="feedbackbg">

<?php

$username = $_SESSION['username']; //initializing the session

$q = "SELECT username from users where username='$username'";
$run=mysqli_query($db,$q);
$user=mysqli_fetch_assoc($run);

if (isset($user)) {
  include 'header.php';
}else
  include 'dheader.php';

 ?>
<br><br><br>

   	<form action="feedback.php" method="POST">
  
       <div class="container  mt-2 text-white" style="background-color: tomato">
         	
       	  <h1 class="text-center mt-2">Feedback Form</h1><br>

       	  	<h6>Please help us to serve you better by taking a couple of minutes.</h6><br>
       	  	<h6 class="text-dark">How satisfied were you with the SLweightCare?</h6>


                <div class="form-check">
				  <input class="form-check-input" type="radio" name="choose" id="excellent" value="excellent" required >
				  <label>
				    Excellent
				  </label>
				</div>
				 <div class="form-check">
				  <input class="form-check-input" type="radio" name="choose" id="good" value="good" required>
				  <label>
				    Good
				  </label>
				</div>
				 <div class="form-check">
				  <input class="form-check-input" type="radio" name="choose" id="neutral" value="neutral" required>
				  <label>
				    Neutral
				  </label>
				</div>
				 <div class="form-check">
				  <input class="form-check-input" type="radio" name="choose" id="poor" value="poor" required>
				  <label>
				    Poor
				  </label>
				</div> 

			<h6 class="text-dark">If you have specific feecback, please write to us..</h6><br>
			<div class="form-group">
				<textarea class="form-control id=textarea1" rows="8" name="suggestions" placeholder="Feel free to write your suggestions here"></textarea>		
            </div><br>

            <div class="row">
                <div class="col">
		            <h6 class="text-dark">what is your user type?</h6>
		            <div class="form-check">
						  <input class="form-check-input" type="radio" name="choose1" id="fdselect1" value="Normal user" required>
						  <label>
						    Normal user
						  </label>
					</div>
		             <div class="form-check">
						  <input class="form-check-input" type="radio" name="choose1" id="fdselect2" value="Dietician" required>
						  <label>
						   Dietician
						  </label>
					</div><br>
				</div>

				<div class="col">
					<input type="text" class="form-control" name="username" placeholder="Your username (Optional)"></input><br>
					<input type="text" class="form-control" name="email" placeholder="Your email (Optional)"></input><br>
				</div>
			</div>

			<div class="col-md-4 mx-auto">
				<button type="submit" name="feedback1" class="btn btn-dark font-weight-bold"  onclick="return confirm ('Your feedback send successfully!');">Submit</button>
			</div><br>
        
       </div>
   	  
    </form>


<br><br><br><br>
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div> 

</body>
</html>