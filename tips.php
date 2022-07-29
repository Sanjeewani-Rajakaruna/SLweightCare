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
  	<title>Tips</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	  <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
	
  </head>
  <body>
    
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



<div class="card text-white">
   <img class="card-img " style="height:1000px" src="images/tips5.jpg" alt="tips image">
   <div class="card-img-overlay">

   	<div class="container-fluid mt-4">
	<h1 class="text-center text-warning font-italic"><b>These simple tips may speed your weight loss process!</b></h1>	
    </div><br><br><br>


		<div class="container ">
		<h3><b>1. Do not skip breakfast</b></h3>
		<h5>Skipping breakfast will not help you lose weight. You could miss out on essential nutrients and you may end up snacking more throughout the day because you feel hungry.</h5><br>

		<h3><b>2. Eat regular meals.</b></h3>
		<h5>Eating at regular times during the day helps burn calories at a faster rate. It also reduces the temptation to snack on foods high in fat and sugar.</h5><br>

		<h3><b>3. Get more active.</b></h3>
		<h5>Being active is key to losing weight and keeping it off. As well as providing lots of health benefits, exercise can help burn off the excess calories you cannot lose through diet alone.</h5><br>

		<h3><b>4. Drink plenty of water.</b></h3>
		<h5> People sometimes confuse thirst with hunger. You can end up consuming extra calories when a glass of water is really what you need. </h5><br>

		<h3><b>5. Cut down on alcohol.</b></h3>
		<h5> A standard glass of wine can contain as many calories as a piece of chocolate. Over time, drinking too much can easily contribute to weight gain. </h5><br>

		<h3><b>6. Sleep well and Avoid Stress.</b></h3>
		<h5> A lack of sleep may disrupt the appetite-regulating hormones leptin and ghrelin. Another hormone, cortisol, becomes elevated when you’re stressed. Having these hormones fluctuate can increase your hunger and cravings for unhealthy food, leading to higher calorie intake </h5>
		</div>
    </div>
</div>


 
<div class="card text-white"  >
   <img class="card-img " style="height:1300px" src="images/myths2.jpg" alt="Myths image">
   <div class="card-img-overlay">

<div class="container-fluid mt-4">
	<h1 class="text-center text-warning font-italic"><b>You must avoid these myths when you are trying to lose your weight!</b></h1>	
</div><br><br>
    
    <div class="container">
   	<h3><b>1. All Calories are equal</b></h3>
   	<h5>The calorie is a measurement of energy. All calories have the same energy content.However, this does not mean that all calorie sources have the same effects on your weight.Different foods go through different metabolic pathways and can have vastly different effects on hunger and the hormones that regulate your body weight.For example, a protein calorie is not the same as a fat or carb calorie.eplacing carbs and fat with protein can boost your metabolism and reduce appetite and cravings, all while optimizing the function of some weight-regulating hormones.Also, calories from whole foods like fruit tend to be much more filling than calories from refined foods, such as candy.</h5><br>

   	<h3><b> 2. Carb are bad for you </b></h3>
   	<h5>Carbohydrate are an important part of a healthy diet.It’s important to note that there are different types of carbs: simple and complex. Simple carbs include things like processed foods, and they can raise your blood sugar and lead to weight gain if you have too much of them. Complex carbs, on the other hand, are found in nutrient-dense foods like whole grain breads, beans and legumes, oats, and certain vegetables, and can actually help regulate your blood sugar levels.</h5><br>

   	<h3><b>3. Eating at night will make you gain weight.</b></h3>
    <h5>There are people that can be okay with stopping eating more than a few hours before bed, but for many people it’s a struggle mentally and physically because they get hungry.They often attempt to have their last meal early in the evening but wind up doing mindless snacking or “sneak” foods because they’re trying to not be hungry.A lot of it also depends on what you’re eating. Late-night eating patterns have been linked to excess calorie intake and poorer food choices. But, if you’re eating healthy, well-balanced foods in the evening, you should be just fine.</h5><br>

    <h3><b>4. You can out-exercise a bad diet.</b></h3>
    <h5>Exercise is an important part of weight loss, but you can easily torpedo your efforts by eating foods high in calories and low in nutrition, like processed snacks, fried meats, and sugary drinks.Eating junk foods also isn’t fueling your body with the nutrients it needs for balanced energy, Cording points out.If you’re eating certain foods that wreak havoc on your hormones, it will probably negatively impact your energy and ability to work out.</h5><br>

    <h3><b>5. Going gluten-free will help you lose weight.</b></h3>
    <h5>Gluten is a type of protein that’s found in certain grains, like wheat, barely, and rye. Except for a small number of people who have Celiac disease, gluten itself is not dangerous and is found in many healthy foods which also contain high levels of fiber, vitamins, and minerals”.You might even gain weight on a gluten-free diet, depending on what you end up eating. Many processed gluten-free products actually contain higher levels of fats and sugars than their gluten-containing counterparts in order to improve taste and consistency.</h5><br>

    <h3><b>6. If you want to lose weight, you’ll have to go hungry. </b></h3>
    <h5>You may think that losing weight means skipping meals and snacks, and feeling hungry all day. But that just leads to irritability, frustration and, ultimately, going off your diet and quickly regaining weight</h5><br>
    </div>

   </div>
</div>



<div class="card text-white"  >
   <img class="card-img " style="height:2100px" src="images/detox4.jpg" alt="detox image">
   <div class="card-img-overlay">

<div class="container mt-4">
	<h1 class="text-center text-warning font-italic"><b>Detox drinks!</b></h1><br><hr>
  
	<h2 class="text-info"><b> What does mean by detoxification? </b> </h2><br>	

	<h4><b>	 As the name suggests, detoxing aims to help the body rid itself of toxins. The human body has many natural pathways to allow detoxification through liver, sweat, urine, faeces and more. But fast urbanization and exposure to pollutants, heavy metals, and preservatives has taken the average toxin consumption by human beings to an all-time high. These toxins get stored in tissues and cells of our bodies and manifest in harmful metabolical, reproductive and mental health effects. By detoxing your body you help the vital organs cleanse themselves of the toxins, and enable the liver to function appropriately in excreting them.</b></h4><br>	
   
    <h2 class="text-info"><b>	How it helps to reduce weight?</b></h2><br>	 

	<h4><b>	One of the best aspects of detox drinks is that it helps you lose weight naturally. Detox drinks offer a major boost to your metabolism, thus aiding weight loss. Some of the fruit based detox drinks that can help in weight loss are as follows:<br><br>		

	<h5><b class="text-warning">1. Raspberries:	</b> Experts claim that the ketones in raspberries prevent weight gain to a great extent. Raspberries are also rich in Vitamin B and C which are good for skin as well.	</h5> <br>	
	<h5><b class="text-warning">2. Apple Cider Vinegar:</b> The acetic acid in apple cider vinegar also increases your metabolism and speeds up weight loss. Its enzymes also aid in digestion. </h5> <br>	
	<h5><b class="text-warning">3. Lemon:</b> A lemon water detox can also help you shed those extra kilos, due to its richness in pectin fibre. This fibre helps you to feel full for a longer period of time. </h5>
    </b></h4><br>	

    <h4><b> Therefore, we can make our weight loss journey more efficient and effective, by using detox drinks.<br><br><br>	<br>	
</div>


  <div class="container-fluid">	
    <h2 class="text-success text-center"><b>Here are few detox drinks recipes which we can make at home easily!</b></h2><br><br><br>	
   
        <div class="card-deck">	

          <div class="card bg-primary">
             <img class="card-img-top" style="height:400px" src="images/cinnamon.jpg" alt="Detox image">
             <div class="card-body">
             <h2><b>Cinnamon Detox drink</b></h2><br>	
             <h4> This wonder spice can show effective results in the weight loss journey. You can consume it in the form of a detox drink as it helps boost metabolism and also has fat burning powers. If you wish to have a flat tummy, cinnamon is the key ingredient required for it. Just take a container and add lukewarm water in it. Add a tablespoon of cinnamon spice in the water and let it infuse. The longer you infuse, the more nutrients get leaked into the water. Consume it around bedtime (a cup or so) for better results.</h4>
             </div>
          </div>

          <div class="card bg-success">
             <img class="card-img-top" style="height:400px" src="images/cucumber.jpg" alt="Detox image">
             <div class="card-body">
             <h2 class="card-title"><b>Cucumber and Mint Detox drink</b></h2><br>	
             <h4> This is an ultimate detox drink. Not only will it help flush out toxins from the body, but also has a nice taste and aroma. Cucumber and mint when infused in water, release their nutrients, which help in promoting digestion. Just take a large pitcher and throw in few cucumber slices and fresh mint leaves. Let it infuse for some time and keep sipping throughout the day.</h4>
             </div>
          </div>

           <div class="card bg-info">
             <img class="card-img-top" style="height:400px" src="images/lemon1.jpg" alt="Detox image">
             <div class="card-body">
             <h2><b>Lemon and ginger Detox drink</b></h2><br>	
             <h4> This wonder drink can show amazing results in weight loss process, if consumed in the right manner and at the right time. Made with the goodness of lemon and ginger, this detox water should ideally be consumed early in the morning on an empty stomach. It gives your body a kick-start and also boosts the metabolism. Just squeeze in half a lemon (You can use lime as a substitution) in lukewarm water (about 1 glass) and add in 1 inch grated ginger. Drink two glasses of the lemon and ginger detox drink early morning for 1-2 months without fail and watch out for effective results.</h4>
             </div>
          </div>
 
         
        </div>
    </div>

<br><br>


   </div>
</div>



	<br><br><br><br>
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div> 
  </body>
  </html>