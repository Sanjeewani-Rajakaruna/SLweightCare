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
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
	
</head>
<body id="userhomebg">

<?php include ('dheader.php') ?>


<div class="header text-center text-light font-italic mt-3">
	<h2 style="font-size: 50px"><b>Welcome to SLweightCare Dr. </b><strong class="text-warning"><?php echo $_SESSION['username']; ?></strong></h2>
</div><br><hr>

<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
	
$array = array ();
$query= "SELECT * FROM dieticians where username= '$username' LIMIT 1 ";
$run=mysqli_query($db,$query); 

while($row = mysqli_fetch_assoc($run))
    { 

		$array ['username']=$row['username']; 
		$array ['firstname']=$row['firstname']; 
		$array ['lastname']=$row['lastname']; 
		$array ['email']=$row['email'];
		$array ['contact']=$row['contact'];
		$array ['nic']=$row['nic'];
	  $array ['regno']=$row['regno']; 
		$array ['currentplace']=$row['currentplace'];
		$array ['ppplace']=$row['ppplace'];
		$array ['workingexperience']=$row['workingexperience'];
	 

           
    }
}

?>

<div class="container-fluid">
<div class="row">
	<div class="col-md-3" style="border:5px solid tomato;">
		<div>
			 <h2 class="text-light text-center mt-5"><b>User Profile</b></h2>
			 <img class="card-img-top mt-2" height="300" src="images/dpro1.jpg" alt="Card image"><br><br>
			 <h5 ><b class="text-warning">Username:</b> <b class="text-light"><?php echo $array['username'];  ?> </b></h5>
			 <h5 ><b class="text-warning">First name:</b> <b class="text-light"><?php echo $array ['firstname']  ?></b></h5>
			 <h5><b class="text-warning">Last name:</b> <b  class="text-light"><?php echo  $array ['lastname'] ?></b></h5>
			 <h5><b  class="text-warning">Email:</b> <b class="text-light"> <?php echo $array ['email'] ?></b></h5>
			 <h5><b class="text-warning">Contact No:</b><b class="text-light"> <?php echo $array ['contact'] ?></b></h5>
			 <h5><b  class="text-warning">NIC no:</b> <b  class="text-light"><?php echo $array ['nic'] ?></b></h5>
			 <h5><b  class="text-warning">MedicalCouncil Registartion no:</b> <b  class="text-light"><?php echo $array ['regno'] ?></b></h5>
			 <h5><b class="text-warning">Currenly Working place:</b> <b class="text-light"><?php echo $array ['currentplace'] ?></b></h5>
			 <h5><b  class="text-warning">Private Practice place:</b> <b  class="text-light"><?php echo $array ['ppplace'] ?></b></h5>
			 <h5><b  class="text-warning">Working Experience:</b> <b  class="text-light"><?php echo $array ['workingexperience'] ?></b></h5><br>
			 
           
        <a href="dieticianedit.php?username=<?php echo $username ?>"><button id="dieticianedit" class="btn btn-primary" name="dieticianedit"><b>Edit Profile</b></button></a><br><br>

			  <a href="dchangepw.php?username=<?php echo $username ?>"><button id="dpassword" class="btn btn-primary" name="dpassword"><b>Change Password</b></button></a><br>
        </div>
    </div>


    <div class="col-md-9">


    <div class="card" style="background-color: mediumseagreen">
		<div class="container-fluid mt-5 mb-5"><br><br><br>
		<h1 class=" text-center font-italic text-white"><b style="font-size: 40px">We really appreciate your passion to help to overweight people in Sri Lanka! Because obesity is rapidly invading Sri Lankan society and has become a major social problem.</b></h1>
	    </div><br><br><br>
    </div>

  <div class="container-fluid bg-dark">	<br><br><br>
    <h1 class="text-warning text-center"><b>You have to do just few things as a dietician here! But it is worth a lot to them!</b></h1><br><br><br><br>	
   
        <div class="card-deck">	

          <div class="card bg-light">
             <img class="card-img-top" style="height:400px" src="images/dhome3.png" alt="Detox image"><br><br>
             <div class="card-body">
             <h4><b>You can participate for the public forum and share your knowledge as well as you can answer their quesions.</b></h4><br><br>
             <a href="topiclist.php" class="btn mx-auto btn-danger mb-2"><b>Forum</b></a><br><br>
             </div>
          </div>

           <div class="card bg-light">
             <img class="card-img-top" style="height:400px" src="images/dhome4.jpg" alt="Detox image"><br><br>
             <div class="card-body">
             <h4><b>Because some users do not like to ask their problem in the public forum, we offer private chatting between the user and the dietician.</b></h4><br><br>
             <a href="" class="btn mx-auto btn-danger mb-2"><b>Chat</b></a><br><br>
             </div>
          </div>
          
          <div class="card bg-light">
             <img class="card-img-top" style="height:400px" src="images/dhome5.png" alt="Detox image"><br><br>
             <div class="card-body">
             <h4><b>As a relevant professional you can see what other things we offer to users. So you can give your valuable feedback to improve the system. We really appreciate it.</b></h4><br><br>
             <a href="feedback.php" class="btn mx-auto btn-danger mb-2"><b>Feedback</b></a><br><br>
             </div>
          </div>

        </div><br><br><br>
   </div>

    <div class="card" style="background-color: tomato">
		<div class="container-fluid mt-5 mb-5"><br><br>
		<h1 class=" text-white font-italic"><b>To maintain system transparency, you can see what we provide to users as SLweightCare. Because our goal is not to make a profit but to make our motherland healthier.</b></h1><br>
		<h2><b>We invite you to invite your collegues to join us. When dieticians join together as a community to share knowledge, it is more effective and many sri lankans will benifit from it.</b></h2><br><br>
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