<!DOCTYPE html>
<html>
<head>
	<title>Firstpage</title>
	
   
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
	
</head>

<body id="userhomebg">


<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
    <img src="images/logo3.png" class="rounded img-responsive" width="70" height="50">
	<a class="navbar-brand font-weight-bold text-white">SLweightCare</a>
</nav>
<br><br>
<div class="container-fluid mx-auto" id="firstheader">
	<div class="overlay">
	<h1 class="text-center text-white font-italic font-weight-bold" style="font-size: 70px">Welcome to SLweightCare!</h1>
	</div>

	<div class="jumbotron bg-dark mt-3">
		<div class="row">
			<div class="col-md-8 text-center text-white">
			   <h5>Though there are lots of weight loss systems around the world, the main problem is there is no any proper system for Sri Lankans. SLweightCare is a weight loss web application which is focus on Sri Lankans.</h5> <hr>
			   	<h5>Are you a Sri Lankan who is starving to loss your weight?<h4>OR</h4></h5>
			    <h5>Do you like to help Sri Lankans who are struggling with their weight?</h5><br>
			    <h5>Then you are in the right place. Join us and take the first step here!</h5><br>
			    <h4 class="text-center text-warning"><b class="font Italic">Our "mission" is make our motherland a healthier place!!</b></h4><br>
                
                <h5 class="text-center text-info font-italic font-weight-bold mt-5"> Are you already a member? LogIn here</h5><br>

                <div class="dropdown">
				  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"> <b>Login as</b>
				  </button>
				  <div class="dropdown-menu">
				    <a class="dropdown-item" href="admin.php"><b>Admin</b></a>
				    <a class="dropdown-item" href="userslogin.php"><b>User</b></a>
				    <a class="dropdown-item" href="dieticianslogin.php"><b>Dietician</b></a>
				  </div>
				</div>
			</div>



			<div class="col-md-4 text-center">
				<div class="card bg-light">
					<div class="card-header">
						<h2 class="text-center font-italic font-weight-bold">Sign Up for free</h2>
					</div>
					<div class="card-body">
						<h3  class="text-center font-italic font-weight-bold">
						Who are you?	
						</h3>

						<div class="card-group">
							<div class="card col-md-6 bg-light">
					      	 	<img class="card-img-top mt-2" src="images/user.jpg"><br>
					      	 	<a href="usersregistration.php" class="btn mx-auto btn-success mb-2"><b>User</b></a>
				      	    </div>
				      	    <div class="card col-md-6 bg-light">
					      	 	<img class="card-img-top mt-2" src="images/dietician.jpg"><br>
					      	 	<a href="dieticiansregistration.php" class="btn mx-auto btn-success mb-2"><b>Dietician</b></a>
				      	    </div>
						</div>
					</div>
				</div>
		     
			</div>
		</div>
	</div>
</div>   

<br><br><br><br>

<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</body>
</html>