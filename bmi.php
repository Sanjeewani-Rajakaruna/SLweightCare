<?php include ('dbconnection.php') ?>
<?php
 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: firstpg.php');
  }
  
  ?>



<?php


$height='';
$weight='';
$bmi = '';
$output ='';

if (isset($_POST['bmi'])) { 

$weight =  mysqli_real_escape_string($db, $_POST['weight']);
$height =  mysqli_real_escape_string($db,$_POST['height']);


function bmi($weight,$height) {
$bmi = round( $weight/($height*$height),2);
return $bmi;
} 
$bmi = bmi($weight,$height);
if ($bmi <= 18.5) {
$output = "Under Weight";
} else if ($bmi > 18.5 AND $bmi<=24.9 ) {
$output = "Normal Weight";
} else if ($bmi > 24.9 AND $bmi<=29.9) {
$output = "Over Weight";
} else if ($bmi > 30.0) {
$output = "OBESE";
}

      $username = $_SESSION['username'];
      $q = "SELECT username from users where username='$username'";
      $run=mysqli_query($db,$q);
      $user=mysqli_fetch_assoc($run);

      if (isset($user)) {
        
      $bmi_query = "INSERT INTO bmi (username, bmi_value, category) VALUES ('$username', '$bmi', '$output')  " ;
            
             mysqli_query($db, $bmi_query);
       }   
}
?>





<!DOCTYPE html>
<html>
<head>
	<title>BMI</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="bmibg">

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

 


   	<div class="container-fluid mt-2">
	<h1 class="text-center  font-italic"><b>Calculate your BMI value here!</b></h1>	
    </div><br>
           

           <div class="card">
				   <img class="card-img " style="height:350px" src="images/home7.jpg" alt="tips image">
				   <div class="card-img-overlay">

				   	<div class="container-fluid mt-2">
					<h3 class="text-center text-white font-italic"><b>What is BMI (Body Mass Index)</b></h3>	
				    </div><br>
                    <h5 class="text-white"><b>Your BMI is a measurement that is a ratio of your weight and height. It’s a good way to gauge whether your weight is in healthy proportion to your height. In fact, knowing your BMI can help you to determine any health risks you may face if it’s outside of the healthy range.</b></h5><br>

                    <h3 class="text-center text-white font-italic"><b>How to calculae your BMI</b></h3>	
                    <h5 class="text-white text-center"><b>Simply divide your weight in kilograms by your height in metres squared.</b></h5>


			    </div>
			      </div>
  

   <div class="card-deck">

             <div class="card  mt-5 mb-5" style="background-color: tomato">
               <h4 class="text-center  mt-5"><b>BMI Categories</b></h4> <br>
               <h6 class="text-white text-center"><b>
                If your BMI is:</b></h6><br>

               <h5 class="text-white text-center"> below 18.5 – you're in the underweight range <br>
                between 18.5 and 24.9 – you're in the healthy weight range <br>
                between 25 and 29.9 – you're in the overweight range <br>
                between 30 and 39.9 – you're in the obese range </h5>
             </div>
     

  <form action="bmi.php" method="post"> 

  <div class="card">
  
             <h2 class="text-center text-dark"><b class="font-italic mt-5">Calculate your BMI </b></h2><br>
              
                <div class="form-group">
                  <label><b>Mass in kilogram (kg):-</b></label>
                  <input type="text" name="weight" class="form-control" required placeholder="Enter your weight" >
                </div>
                
                <div class="form-group">
                  <label><b>Height in meter (m):-</b></label>
                  <input type="text" name="height" class="form-control" required  placeholder="Enter your height">
                </div><br>

                <div class="col-md-6 text-center">
                    <button type="submit" name="bmi" value="bmi" class="btn btn-primary font-weight-bold">Calculate</button>
                </div>
               <br>
   
 </div>
 </form>

         <div class="card bg-info mt-5 mb-5">
           <img class="card-img " style="height:350px" src="images/feedback3.jpg" alt="tips image">
            <div class="card-img-overlay">
                <h5 class="text-center mt-5"><b><?php echo $_SESSION['username'];?></b> <b> your BMI value is</b> <b class="text-danger"> <?php echo "$bmi";?></b><b> and you are</b> <b class="text-primary"> <?php echo "$output" ?></b></h5><br><br><br>
                <div class="container text-center">
                <a href="bmihistory.php" class="btn btn-dark btn-lg" name="bmihistory"><b>see my BMI history</b></a> </div> 
         </div>
        </div>

 </div> 
 <!-- end of the card deck -->

<hr style="height:100px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</body>
</html>