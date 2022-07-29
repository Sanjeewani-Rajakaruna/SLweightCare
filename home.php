<?php include ('dbconnection.php') ?>
<?php
 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: firstpg.php');
  }
  
  ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
	
</head>
<body id="userhomebg">
	
<?php include ('header.php') ?>


<div class="header text-center text-light font-italic mt-3">
	<h1 style="font-size: 50px"><b>Welcome to SLweightCare</b> <strong class="text-warning"><?php echo $_SESSION['username']; ?> !</strong></h1>
</div><br><hr>

<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
	
$query= "SELECT * FROM users where username= '$username' LIMIT 1 ";
$run=mysqli_query($db,$query); 

while($row = mysqli_fetch_assoc($run))
    { 
		
		$username=$row['username']; 
		$firstname=$row['firstname']; 
		$lastname=$row['lastname']; 
		$email=$row['email'];  

           
    }
}
?>

<div class="container-fluid" >
<div class="row">
	<div class="col-md-2" style="border:5px solid tomato;">
		<div>
			 <h2 class="text-light text-center mt-5"><b>User Profile</b></h2>
			 <img class="card-img-top mt-2" src="images/pro1.png" alt="Card image"><br><br>
			 <h5 class="text-warning"><b>Username: </b><?php echo $username;  ?></h5>
			 <h5 class="text-light"><b>First name:</b> <?php echo $firstname ?></h5>
			 <h5 class="text-light"><b>Last name:</b> <?php echo  $lastname ?></h5>
			 <h5 class="text-light"><b>Email:</b> <?php echo $email?></h5><hr>
             
			<a href="uchangepw.php?username=<?php echo $username ?>"><button id="dpassword" class="btn btn-primary" name="dpassword"><b>Change Password</b></button></a><br>
		</div>
    </div> 

   


    <div class="col-md-10">
       
      <div class="card">
	      <img class="card-img" style="height:400px" src="images/home7.jpg" alt="Home image">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4"><br><br>
		<h1 class="text-danger font-italic"><b style="font-size: 50px">Losing weight is not a exhausting work anymore! </b></h1><br>
		<h3> <b class="text-white">Are you a Sri Lankan who is struggling with your weight? Then you are in the right place now! we are not provide hard steps like other systems. This site provide more effective information and tips that you need to reduce weight without getting tired. The most importantly, we created this site  targeting the Sri Lankan people. So, why wait to start your weight loss journey further? Let's start here! </b></h3><br><br>	
	    </div>

      </div>
    </div>

    <div class="card" style="background-color: tomato">
		<div class="container-fluid mt-5 mb-5"><br><br>
		<h1 class=" text-center font-italic"><b style="font-size: 50px">Our GOAL is not to gain profit like other weight loss systems. We just need to make SRI LANKA a healthier place!</b></h1><br><br>
	    </div>
    </div>

    <div class="card">
	      <img class="card-img" style="height:400px" src="images/bmi.webp" alt="bmi">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4"><br><br>
		<h1><b style="font-size: 40px">What is your BMI? </b></h1><br>
		<h3> <b>Every body is different. Use our Body Mass calculator to determine if you are currently <br> in the healthy weight range.</b></h3><br><br>
		<a href="bmi.php" class="btn mx-auto btn-danger mb-2"><b>See more</b></a><br><br>	
	    </div>

      </div>
    </div>
    
     <div class="card">
	      <img class="card-img" style="height:400px" src="images/diet3.jpg" alt="diet">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4 text-left">
		<h1 class="text-danger"><b style="font-size: 60px"> We provide Easy Diet Plans! </b></h1><br>
		<h3> <b> You can get free and easy diet plans which include local food and you can<br> customize it if you want. Check out our amazing food you will enjoy!</b></h3><br><br>
		<a href="dietplans.php" class="btn mx-auto btn-danger mb-2"><b>See more</b></a>	
	    </div>

      </div>
    </div>

     <div class="card">
	      <img class="card-img" style="height:400px" src="images/d7.jpg" alt="diet">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4 text-right">
		<h1 class="text-danger"><b style="font-size: 60px">Chat with Dieticians ! </b></h1>
		<h3> <b>By visiting our Dietitians section you can talk to the qualified doctors who have joined us to help you in Sri Lanka. All dietitians who have joined us can be found here.  </b></h3><br><br>
		<a href="meetdieticians.php" class="btn mx-auto btn-danger mb-2"><b>See more</b></a>	
	    </div>

      </div>
    </div>
   
     <div class="card">
	      <img class="card-img" style="height:450px" src="images/forum1.jpeg" alt="forum">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4"><br>
		<h1 class="text-danger"><b style="font-size: 60px">Public forum ! </b></h1><br>
		<h3> <b class="text-white"> We provide a public forum which is common to both normal users and dieticians. Using this you can interact with the other users of the system. </b></h3><br>
		<a href="topiclist.php" class="btn mx-auto btn-danger mb-2"><b>See more</b></a><br><br>	
	    </div>

      </div>
    </div>
 
     <div class="card">
	      <img class="card-img" style="height:500px" src="images/story4.jpg" alt="user stories">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4">
		<h1 ><b style="font-size: 60px">Users' successfull Stories! </b></h1><br>
		<h3> <b class="text-white"> You can see the users who have successfully reached their ideal weight, using this system </b></h3><br><br>

            <div class="card col-md-6" style="background-color: tomato">
               <h4><b>Within 6 months of using this method I was able to lose 10kg. SLweightCare is better than expected. So, I invite you to start your weight loss journey here!</b></h4>
               <h5><b>- Tharushi Pathirana - (University Studant)</b></h5>
            </div><br><br>

		<a href="userstories.php" class="btn mx-auto btn-danger mb-2"><b>See more</b></a>	
	    </div>

      </div>
    </div>

     <div class="card">
	      <img class="card-img" style="height:400px" src="images/more2.jpg" alt="forum">
	   <div class="card-img-overlay">
		
		<div class="container-fluid mt-4"><br><br>
		<h1 class=" text-center font-italic"><b style="font-size: 40px"> And much more to help you. Stay with us and enjoy your journey. Feel free to give us your valuble feedback about the system. We really appriciate it.</b></h1><br>
		<h1 class="text-center text-danger"><b>We Wish you the BEST LUCK!</b></h1>br
	    </div>

      </div>
    </div><br>


 
    </div>

</div>
</div>



<br><br><br><br>
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>