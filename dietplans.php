<?php include ('dbconnection.php') ?> 
<?php
 
  session_start(); 

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
    header('location: firstpg.php');
  }
  
  ?> 
<!DOCTYPE>
<html>
<head>
	<title>Diet Plans</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 

</head>
<body id="diet-plansbg">


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



<h1 class="text-center text-danger font-italic mt-4"><b>Let food be the medicine and medicine be the food!</b></h1>
<h3 class="text-center"><b>Here you can see our diet plans that we recommend you to loss weight</b></h3>

<div class="container mt-5">
	<h4><b>How important is following a diet plan for reduce weight?</b></h4>
	<h5>To achieve lasting and sustained weight loss, you must decrease the total calories consumed each day.

	To reduce body weight, most individuals will need to change their habitual diet to include healthy foods, such as fruits, vegetables, lean meats, whole grains, nuts, and oils, that are nutrient-dense and nourishing for the body.

	These healthy foods still need to be limited in portion size, such that they contribute to a lower total daily calorie intake.</h5>
</div>
<div class="container">
	<h4><b>What is our specialty?</b></h4>
	<h5>Many weight loss diet plans became popular and then faded with time. Most of them are based on western countries. At SLweightCare, we try to give you simple diet plans with local foods that easy to follow at home. You have the facility to customize them as per your requiremets. We hope this is the first time you are gonna try this type of diet. </h5>
</div>	<hr><br><br>


<div class="card-deck" style="background-color:palegoldenrod; border:10px solid tomato;">
	
          <div class="card bg-success">
             <img class="card-img-top" style="height:300px" src="images/image1.jpg" alt="Vegitarian image">
             <div class="card-body">
             <h2><b>Vegetarian Diets</b></h2><br>	
             <h6><b> Vegetarian diets exclude meat, fish, and poultry.Some people may follow this diet for religious or ethical reasons, while others are drawn to its possible health benefits. Especially to weight loss.Vegetarian diets typically focus on fruits, vegetables, whole grains, legumes, nuts, and seeds. These foods are rich in fiber, micronutrients, and beneficial plant compounds, and tend to be lower in calories, fat, and protein than animal foods.Since this diet emphasizes nutrient-rich foods, it’s linked to a reduced risk of heart disease, certain cancers, diabetes, and high blood pressure.</b> </h6>
             <a href="vegplans.php" class="btn btn-dark"><b>GET PLANS</b></a> 
             </div>
          </div>

          <div class="card bg-info">
             <img class="card-img-top" style="height:300px" src="images/keto1.jpg" alt="Keto image">
             <div class="card-body">
             <h2><b>Ketogenic Diets</b></h2><br>	
             <h6><b> A ketogenic diet is high in fat, moderate in protein, and low in carbs. As carbs are reduced and fat is increased, the body enters a metabolic state called ketosis. Then the body starts turning fats into ketones, which are molecules that can supply energy for the brain. After a few days or weeks on such a diet, the body and brain become very efficient at burning fat and ketones for fuel instead of carbs.The ketogenic diet also lowers insulin levels, which can be beneficial for improving insulin sensitivity and blood sugar management.</b>  </h6>
             <a href="ketoplans.php" class="btn btn-dark"><b>GET PLANS</b></a> 
             </div>
          </div>

          <div class="card bg-warning">
             <img class="card-img-top" style="height:300px" src="images/paleo1.jpg" alt="Paleo image">
             <div class="card-body">
             <h2><b>Paleo Diets</b></h2><br>	
             <h6><b>The paleo diet is an eating pattern that is designed to mimic the diet of early human ancestors.It encourages the consumption of whole foods like fruits, veggies, meat, fish, and poultry.Meanwhile, processed foods, grains, legumes, and artificial sweeteners are off-limits.According to proponents of the diet, following it may help prevent chronic disease and improve overall health. Especially it boots weight loss. </b> </h6>
             <a href="paleoplans.php" class="btn btn-dark"><b>GET PLANS</b></a> 
             </div>
          </div>

          <div class="card">
             <img class="card-img-top" style="height:300px" src="images/lowfat1.jpg" alt="Lowfat image">
             <div class="card-body">
             <h2><b>Low-fat Diets</b></h2><br>	
             <h6> <b>Low fat diets involve restricting fat intake to less than 30% of total daily calories.High fat foods like cooking oils, butter, avocados, nuts, seeds, and full fat dairy are typically limited or banned.Instead, you’re meant to eat naturally low fat foods like fruits, vegetables, whole grains, egg whites, legumes, and skinless poultry. Fat-reduced foods like low fat yogurt, skim milk, and lean cuts of beef and pork are also sometimes permitted.</b> </h6>
             <a href="lowfatplans.php" class="btn btn-dark" name="bmihistory"><b>GET PLANS</b></a> 
             </div>
          </div>

</div>





<hr style="height: 100px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div> 
</body>
</html>