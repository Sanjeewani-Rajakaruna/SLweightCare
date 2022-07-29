<?php include ('dbconnection.php')  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Vegitarian Diet plans</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>
<body id="vegplansbg">

  <?php
session_start();
$username = $_SESSION['username']; //initializing the session

$q = "SELECT username from users where username='$username'";
$run=mysqli_query($db,$q);
$user=mysqli_fetch_assoc($run);

if (isset($user)) {
  include 'header.php';
}else{
  include 'dheader.php';
}


 ?>


    <h2 class="text-light mt-5 text-center" ><b>SLweightCare Paleo diet plans!</b> </h2>
    <h3 class="text-light text-center"><b>(All plans are based on a 2100 calorie diet).</b></h3><br>
    <a href="dietplans.php" class="btn btn-dark btn-lg"><b>BACK</b></a> 
    <a href="paleoplanscustomize.php" class="btn btn-warning btn-lg" name="paleo" style="float: right"><b>Cuztomize my plan</b></a>
    <br><hr>


 <div class="container">
    <div class="card-deck">
   
  
    	<div class="card">
    		<div class="card-header">
    			<h3 class="text-center"><b>PLAN 1</b></h3>
    		</div>
    		<div class="card-body">
    			<h4 class="text-right">Calories</h4>
    			<h4><b>Breakfast(8.a.m.)</b></h4>
    			<h6>2 eggs fried in coconut oil</b> <b style="float: right">172</b><br>
    			1 cup of fried mashroom, onion and vegitables <b style="float: right">300</b> <br>
                1 banana <b style="float: right">105</b> <br></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1/2 cup of roasted peanut <b style="float: right">220</b> </h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>3 medium size, roasted sweet potatos <b style="float: right">250</b> <br>
    			1 cup of vegitable salad with olive oil <b style="float: right">200</b> <br>
    		    1/2 cup of nuts<b style="float: right">220</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>2 bananas (kolikuttu) <b style="float: right">210 </b><br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>1 cup of potato soup<b style="float: right">330</b> <br>
                </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1/4 cup of nuts<b style="float: right">110</b> <br>
                </h6><br>


    		</div>
    	</div>
        

        	<div class="card">
    		<div class="card-header">
    			<h3 class="text-center"><b>PLAN 2</b></h3>
    		</div>
    		<div class="card-body">
    			<h4 class="text-right">Calories</h4>
    			<h4><b>Breakfast(8.a.m.)</b></h4>
    			<h6>1 1/2 cup of cowpea with coconut scraped(2tbsp) and lunumiris (2tbsp)</b> <b style="float: right">342</b><br>
                2 bananas<b style="float: right">210</b></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1 large peace of papaya<b style="float: right">168</b><br>
    		    1/4 cup peanuts <b style="float: right">110</b><br></h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>1 cup of chicken salad with olive oil <b style="float: right">230</b> <br>
    		    handful of nuts<b style="float: right">440</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>1 banana <b style="float: right">105</b> <br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>2 medium size bolied sweet potatos <b style="float: right">170</b><br>
    		    1 cup of vegitable salad<b style="float: right">180</b><br>
    		    </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1 banana <b style="float: right">60</b> <br>
                </h6><br>


    		</div>
    	</div>

    	
    </div>	
 </div>



<hr style="height: 100px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>