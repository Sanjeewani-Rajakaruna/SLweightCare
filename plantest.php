<?php include ('dbconnection.php')  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Vegitarian Diet plans</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/mine.css"> -->
	
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

<?php
	

$checkBox  = implode('<br>', $_POST['breakfast']);
$checkBox1 = implode('<br>',$_POST['snack1']);
$checkBox2 = implode('<br>', $_POST['lunch']);
$checkBox3 = implode('<br>', $_POST['snack2']);
$checkBox4 = implode('<br>', $_POST['dinner']);
$checkBox5 = implode('<br>', $_POST['snack3']);


if(isset($_POST['show'] ))
{       
   
    $query1="INSERT INTO dietplans (username,breakfast,snack1,lunch,snack2,dinner,snack3) VALUES ('$username', '" . $checkBox . "', '" . $checkBox1 . "','" . $checkBox2 . "','" . $checkBox3 . "','" . $checkBox4 . "','" . $checkBox5 . "')   ";     

    mysqli_query($db,$query1);

    header('location: plantest.php');

}
 

 if(isset($_POST['deleteplan'] )){


// $checkBox = implode('<br>', $_POST['breakfast']);

$query2="DELETE FROM dietplans WHERE breakfast IN ('$checkBox') ";

mysqli_query($db,$query2);
}


 ?>



   <h1 class="text-light mt-5 text-center" ><b>Start cuztomize your diet plan here!</b> </h1><br>
    <a href="vegplans.php" class="btn btn-warning btn-lg" ><b>BACK</b></a> 
   <hr>

   <div class="row">
    <form action="plantest.php" method="post" style="background-color: tomato">
        <div class="col-md-6 mx-auto ">

    			<h3 class="text-light"><b>Customize here! </b></h3><hr>
    		

    			
    		    
    			<h5><b>Breakfast(8.a.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="Full-fat milk  1 cup (without sugar) -  150cal " name="breakfast[]" >
                  <label>Full-fat milk  1 cup (without sugar) &nbsp;&nbsp; 150cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 thin slices of bread with margerine -  135cal " name="breakfast[]">
                  <label>2 thin slices of bread with margerine &nbsp;&nbsp; 135cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 medium size bananas (Kolikuttu)  - 210cal " name="breakfast[]">
                  <label>2 medium size bananas (Kolikuttu)  &nbsp;&nbsp; 210cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 cups boiled green gram with scraped coconut(2tbsp) and lunumiris(2tbsp) - 345cal " name="breakfast[]">
                  <label>2 cups boiled green gram with scraped coconut(2tbsp) and lunumiris(2tbsp) &nbsp;&nbsp; 345cal </label>
                </div><hr>

    			
    			 

    			<h5><b>Snack1(10.30.a.m.)</b></h5>
    		    <div class="form-check">
                  <input type="checkbox" value="1 large piece of papaw  - 64cal " name="snack1[]">
                  <label>1 large piece of papaw  &nbsp;&nbsp; 64cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 Highland yoghurt  - 90cal " name="snack1[]">
                  <label>1 Highland yoghurt  &nbsp;&nbsp; 90cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="Papaya juice (200ml)  - 114cal " name="snack1[]">
                  <label>Papaya juice (200ml) &nbsp;&nbsp; 114cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 halapa  - 96cal " name="snack1[]">
                  <label>1 halapa &nbsp;&nbsp; 96cal </label>
                </div><hr>

    			

    			<h5><b>Lunch(12.30.p.m.)</b></h5>
    			<div class="form-check">
                  <input type="checkbox" value="1 cup of boiled rice (Red rice)  - 204cal " name="lunch[]">
                  <label>1 cup of boiled rice (Red rice) &nbsp;&nbsp; 204cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of boiled rice (Red rice)  - 512cal " name="lunch[]">
                  <label>1 cup of mallum (cooked with coconut) &nbsp;&nbsp; 512cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="3 tbsp cucumber curry  - 53cal " name="lunch[]">
                  <label>3 tbsp cucumber curry &nbsp;&nbsp; 53cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 4 tbsp dhal curry - 60cal " name="lunch[]">
                  <label> 4 tbsp dhal curry &nbsp;&nbsp; 60cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 2 tbsp soya curry - 47cal " name="lunch[]">
                  <label> 2 tbsp soya curry &nbsp;&nbsp; 47cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1 cup of boiled rice (Red rice) - 204cal " name="lunch[]">
                  <label> 1 cup of boiled rice (Red rice) &nbsp;&nbsp; 204cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="coconut samble (2tbsp) - 28cal " name="lunch[]">
                  <label>coconut samble (2tbsp)  &nbsp;&nbsp; 28cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="3 tbsp green bean curry - 36cal " name="lunch[]">
                  <label>3 tbsp green bean curry  &nbsp;&nbsp; 36cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="4 tbsp dhal curry - 60cal " name="lunch[]">
                  <label>4 tbsp dhal curry  &nbsp;&nbsp; 60cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1/2 cup of mallum - 256cal " name="lunch[]">
                  <label> 1/2 cup of mallum  &nbsp;&nbsp; 256cal </label>
                </div><hr>


    			<h5><b>Snack2(3.30.p.m.)</b></h5>
    			<div class="form-check">
                  <input type="checkbox" value=" 1 highland yoghurt- 90cal " name="snack2[]">
                  <label> 1 highland yoghurt  &nbsp;&nbsp; 90cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1 medium guava - 70cal " name="snack2[]">
                  <label> 1 medium guava  &nbsp;&nbsp; 70cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1 banana(Ambul) - 110cal " name="snack2[]">
                  <label> 1 banana(Ambul)  &nbsp;&nbsp; 110cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 tbsp cashew nuts - 40cal " name="snack2[]">
                  <label> 2 tbsp cashew nuts  &nbsp;&nbsp; 40cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="3 pieces of dates -22cal " name="snack2[]">
                  <label> 3 pieces of dates  &nbsp;&nbsp; 22cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 medium orange -47cal " name="snack2[]">
                  <label> 1 medium orange  &nbsp;&nbsp; 47cal </label>
                </div><hr>
                

    		
    			

                <h5><b>Dinner(6.00.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1/2 cup of boiled noodles  -110cal " name="dinner[]">
                  <label>1/2 cup of boiled noodles  &nbsp;&nbsp; 110cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup boiled vegetables -70cal " name="dinner[]">
                  <label>1 cup boiled vegetables  &nbsp;&nbsp; 70cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 tbsp of soya curry -22cal " name="dinner[]">
                  <label>2 tbsp of soya curry &nbsp;&nbsp; 22cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="5 string hoppers -183cal " name="dinner[]">
                  <label>5 string hoppers  &nbsp;&nbsp; 183cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 tbsp green gram curry -40cal " name="dinner[]">
                  <label>2 tbsp green gram curry  &nbsp;&nbsp; 40cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 tbsp coconut samble -14cal " name="dinner[]">
                  <label>1 tbsp coconut samble  &nbsp;&nbsp; 14cal </label>
                </div><hr>
                
    			

                <h5><b>Snack3(8.30.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1 banana  -110cal " name="snack3[]">
                  <label>1 banana  &nbsp;&nbsp; 110cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="10 pieces of dates -240cal " name="snack3[]">
                  <label>10 pieces of dates &nbsp;&nbsp; 240cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 medium orange -47cal " name="snack3[]">
                  <label>1 medium orange &nbsp;&nbsp; 47cal </label>
                </div><br><hr>
                 


				 <button type="submit" name="show" class="btn-lg btn-dark font-weight-bold"  onclick="return confirm ('Are you sure, you want to add this plan!');">Show my plan</button>

              
    			
       
        </div>
         </form>



<div class="container">

        <div class="col-md-6 mx-auto" style="background-color: mediumseagreen; ">

         <h3 class="text-center"><b>Here is your plan! <?php echo $_SESSION['username']; ?> </b></h3><hr>


     <?php 

$sql = "SELECT * FROM dietplans where username='$username'  ";
$resultset = mysqli_query($db, $sql);
while( $record = mysqli_fetch_assoc($resultset) ) {
?> 

      
        <div class="text-center">
            <h5><b>Breakfast(8.a.m.)</b></h5>
            <h6><?php echo $record ['breakfast']; ?></h6><br>

            <h5><b>Snack1(10.30.a.m.)</b></h5>
            <h6><?php echo $record ['snack1']; ?></h6><br>

            <h5><b>Lunch(12.30.p.m.)</b></h5>
            <h6><?php echo $record ['lunch']; ?></h6><br>


            <h5><b>Snack2(3.30.p.m.)</b></h5>
            <h6><?php echo $record ['snack2']; ?></h6><br>

	          <h5><b>Dinner(6.00.p.m.)</b></h5>
            <h6><?php echo $record ['dinner']; ?></h6><br>

	          <h5><b>Snack3(8.30.p.m.)</b></h5>
            <h6><?php echo $record ['snack3']; ?></h6><br>


         <button type="submit" name="deleteplan" value="<?=$username?>"  class="btn btn-danger font-weight-bold"  onclick="return confirm ('Are you sure, you want to delete it!');">DELETE</button><br><br>
         	
        </div>


<?php }

 ?>
      
        	
        </div>

    </div>

</div>    	
        





</div>  
</body>
</html>