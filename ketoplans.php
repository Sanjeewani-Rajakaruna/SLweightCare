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


    <h1 class="text-light mt-5 text-center" ><b>SLweightCare Ketogenic diet plans!</b> </h1>
    <h3 class="text-light text-center"><b>(All plans are based on a 2100 calorie diet).</b></h3><br>
    <a href="dietplans.php" class="btn btn-dark btn-lg"><b>BACK</b></a> 
    <a href="ketoplanscuztomize.php" class="btn btn-warning btn-lg" style="float: right"><b>Cuztomize my plan</b></a>
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
    			<h6>2 boiled eggs</b> <b style="float: right">196</b><br>
    			1 cup of full-cream milk <b style="float: right">150</b> <br>
    			2 tbsp cashew (8)<b style="float: right">85</b>
                8 boiled green bean <b style="float: right">120</b> <br>
                1 large avacado slice <b style="float: right">125</b> <br>
                2 cheese slices <b style="float: right">120</b> <br></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1 large piece of avacado <b style="float: right">125</b> 
                1 cheese slice <b style="float: right">60</b> </h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>1 cup of cooked corn with cream cheese <b style="float: right">320</b> <br>
    			1 highland yoghurt <b style="float: right">90</b> <br>
    		    1/2 cup of cucumber, tomato and avacado salad with olive oil<b style="float: right">70</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>2 cheese slices <b style="float: right">120</b> <br>
    			1 medium orange <b style="float: right">50 </b><br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>1 1/2 couliflower, orange, and tomato salad <b style="float: right">170</b> <br>
    			1 small avacado <b style="float: right">160 </b><br>
    			2 cheese slice<b style="float: right">60</b> <br>
                </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1 cup of mashroom soup<b style="float: right">68</b> <br>
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
    			<h6>2 fried eggs </b> <b style="float: right">172</b><br>
    			2 cups of orange, mango smoothie<b style="float: right">274</b> <br>
    			1 highland yoghurt<b style="float: right">90</b><br>
                1 medium avacado<b style="float: right">160</b><br>
                2 cheese slices<b style="float: right">120</b></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1 Highland yoghurt<b style="float: right">90</b><br>
    		    1 large avacado slice <b style="float: right">80</b><br></h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>1/4 cup of boiled rice (Red rice) <b style="float: right">51</b> <br>
    			1 cup chicken curry <b style="float: right">306</b> <br>
    			3 tbsp green bean curry <b style="float: right">36</b> <br>
    		    4 tbsp carrot curry <b style="float: right">110</b> <br>
    		    1/2 cup of fried mashroom with coconut oil<b style="float: right">196</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>1 cup of milk coffee <b style="float: right">90</b> <br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>1/2 cup of chicken curry <b style="float: right">153</b><br>
    			1/2 cup of boiled noodles <b style="float: right">110</b><br>
    		    </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1 medium size avacado <b style="float: right">60</b> <br>
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