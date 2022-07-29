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

    <div class="container text-light">
    <h1 class="page-header mt-5 text-center" ><b>SLweightCare Vegitarian diet plans!</b> </h1>
    <h3 class=" text-center"><b>(All plans are based on a 2100 calorie diet).</b></h3><br>
    </div>
    <a href="dietplans.php" class="btn btn-dark btn-lg" ><b>BACK</b></a> 
    <a href="vegplanscuztomize.php" class="btn btn-warning btn-lg" style="float: right" name="vegcuztomize"><b>Cuztomize my plan</b></a>
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
    			<h6>Full-fat milk  1 cup (without sugar) </b> <b style="float: right">150</b><br>
    			2 thin slices of bread with margerine <b style="float: right">135</b> <br>
    			2 medium size bananas (Kolikuttu) <b style="float: right">210</b></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1 large piece of papaw <b style="float: right">64</b> </h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>1 cup of boiled rice (Red rice) <b style="float: right">204</b> <br>
    			1 cup of mallum (cooked with coconut) <b style="float: right">512</b> <br>
    			3 tbsp cucumber curry <b style="float: right">53</b> <br>
    		    4 tbsp dhal curry <b style="float: right">60</b> <br>
    		    2 tbsp soya curry <b style="float: right">47</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>1 highland yoghurt  <b style="float: right">91</b> <br>
    			1 medium guava <b style="float: right">70 </b><br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>1/2 cup of boiled noodles <b style="float: right">110</b> <br>
    			1 cup boiled vegetables <b style="float: right">70 </b><br>
    			2 tbsp of soya curry <b style="float: right">22</b> <br>
                </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1 banana <b style="float: right">110</b> <br>
    			10 pieces of dates <b style="float: right">240</b> <br>
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
    			<h6>Full-fat milk  1 cup (without sugar) </b> <b style="float: right">150</b><br>
    			2 cups boiled green gram with scraped coconut(2tbsp) and lunumiris(2tbsp) <b style="float: right">345</b> <br>
    			2 bananas <b style="float: right">210</b></h6><br>

    			<h4><b>Snack1(10.30.a.m.)</b></h4>
    			<h6>1 Highland yoghurt<b style="float: right">90</b><br>
    			Papaya juice (200ml)<b style="float: right">114</b><br>
    		    1 halapa <b style="float: right">96</b><br></h6><br>

    			<h4><b>Lunch(12.30.p.m.)</b></h4>
    			<h6>1 cup of boiled rice (Red rice) <b style="float: right">204</b> <br>
    			coconut samble (2tbsp) <b style="float: right">28</b> <br>
    			3 tbsp green bean curry <b style="float: right">36</b> <br>
    		    4 tbsp dhal curry <b style="float: right">60</b> <br>
    		    1/2 cup of mallum <b style="float: right">256</b></h6><br>


    			<h4><b>Snack2(3.30.p.m.)</b></h4>
    			<h6>1 banana(Ambul)  <b style="float: right">110</b> <br>
    			2 tbsp cashew nuts<b style="float: right">40 </b><br>
    			3 pieces of dates <b style="float: right">22</b> <br>
    			1 medium orange <b style="float: right">47 </b><br>
                </h6><br>

                <h4><b>Dinner(6.00.p.m.)</b></h4>
    			<h6>5 string hoppers <b style="float: right">183</b><br>
    			2 tbsp green gram curry <b style="float: right">40</b><br>
    			1 tbsp coconut samble<b style="float: right">14</b><br>

                </h6><br>

                <h4><b>Snack3(8.30.p.m.)</b></h4>
    			<h6>1 medium orange <b style="float: right">47</b> <br>
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