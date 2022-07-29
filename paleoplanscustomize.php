<?php include ('dbconnection.php')  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Paleo Diet plans</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/mine.css">
  
  <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>
<body id="vegplansbg1">

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
 if(isset($_POST['show2'] ))
{  


$breakfast  = implode('<br>', $_POST['breakfast']);
$snack1     = implode('<br>',$_POST['snack1']);
$lunch      = implode('<br>', $_POST['lunch']);
$snack2     = implode('<br>', $_POST['snack2']);
$dinner     = implode('<br>', $_POST['dinner']);
$snack3     = implode('<br>', $_POST['snack3']);


     
   
    $query1="INSERT INTO dietplans (username,category,breakfast,snack1,lunch,snack2,dinner,snack3) VALUES ('$username','paleo', '" . $breakfast . "', '" . $snack1 . "','" . $lunch . "','" . $snack2 . "','" . $dinner . "','" . $snack3 . "')   ";     

    mysqli_query($db,$query1);

    header('location: paleoplanscustomize.php');

}
 

 if(isset($_POST['deleteplan'] )){


// $checkBox = implode('<br>', $_POST['breakfast']);

$query2="DELETE FROM dietplans WHERE breakfast IN ('$checkBox') ";

mysqli_query($db,$query2);
}


 ?>



   <h1 class="text-light mt-5 text-center" ><b>Start cuztomize your diet plan here!</b> </h1><br>
    <a href="paleoplans.php" class="btn btn-warning btn-lg" ><b>BACK</b></a> 
   <hr>

   <div class="row">
    <form action="paleoplanscustomize.php" method="post" style="background-color: tomato">
        <div class="col-md-6 mx-auto ">

          <h3 class="text-light"><b>Customize here! </b></h3><hr>
        

          
            
          <h5><b>Breakfast(8.a.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="2 eggs fried in coconut oil -  172cal " name="breakfast[]" >
                  <label>2 eggs fried in coconut oil &nbsp;&nbsp; 172cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of fried mashroom, onion and vegitables -  300cal " name="breakfast[]" >
                  <label>1 cup of fried mashroom, onion and vegitables &nbsp;&nbsp; 300cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 banana - 105cal " name="breakfast[]" >
                  <label>1 banana &nbsp;&nbsp; 105cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 1/2 cup of cowpea with coconut scraped(2tbsp) and lunumiris (2tbsp) -  342cal " name="breakfast[]" >
                  <label>1 1/2 cup of cowpea with coconut scraped(2tbsp) and lunumiris (2tbsp) &nbsp;&nbsp; 342cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 2 bananas -210cal " name="breakfast[]" >
                  <label> 2 bananas &nbsp;&nbsp; 210cal </label>
                </div><hr>
                

          
           

          <h5><b>Snack1(10.30.a.m.)</b></h5>
            <div class="form-check">
                  <input type="checkbox" value="1/2 cup of roasted peanut - 220cal " name="snack1[]">
                  <label>1/2 cup of roasted peanut  &nbsp;&nbsp; 220cal  </label>
            </div>
            <div class="form-check">
                  <input type="checkbox" value="1 large peace of papaya  - 168cal " name="snack1[]">
                  <label>1 large peace of papaya  &nbsp;&nbsp; 168cal  </label>
            </div>
            <div class="form-check">
                  <input type="checkbox" value="1/4 cup peanuts - 110cal " name="snack1[]">
                  <label>1/4 cup peanuts  &nbsp;&nbsp; 110cal  </label>
            </div><hr>
             
          
  
            <h5><b>Lunch(12.30.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="3 medium size, roasted sweet potatos - 250cal " name="lunch[]">
                  <label>3 medium size, roasted sweet potatos &nbsp;&nbsp; 250cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of vegitable salad with olive oil - 200cal " name="lunch[]">
                  <label>1 cup of vegitable salad with olive oil &nbsp;&nbsp; 200cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1/2 cup of nuts - 220cal " name="lunch[]">
                  <label> 1/2 cup of nuts &nbsp;&nbsp; 220cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of chicken salad with olive oil  - 230cal " name="lunch[]">
                  <label>1 cup of chicken salad with olive oil &nbsp;&nbsp; 230cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="handful of nuts -440cal " name="lunch[]">
                  <label>handful of nuts &nbsp;&nbsp; 440cal </label>
                </div>
                <hr>


               <h5><b>Snack2(3.30.p.m.)</b></h5>
               <div class="form-check">
                  <input type="checkbox" value="2 bananas (kolikuttu) - 210cal " name="snack2[]">
                  <label>2 bananas (kolikuttu)  &nbsp;&nbsp; 210cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 banana  - 105cal " name="snack2[]">
                  <label>1 banana   &nbsp;&nbsp; 105cal </label>
                </div><hr>
          

                <h5><b>Dinner(6.00.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of potato soup  - 330cal " name="dinner[]">
                  <label>1 cup of potato soup  &nbsp;&nbsp; 330cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 medium size bolied sweet potatos -170cal " name="dinner[]">
                  <label>2 medium size bolied sweet potatos  &nbsp;&nbsp; 170cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1 cup of vegitable salad  -180cal " name="dinner[]">
                  <label>1 cup of vegitable salad &nbsp;&nbsp; 180cal </label>
                </div>
               <hr>
                

                <h5><b>Snack3(8.30.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1/4 cup of nuts -110cal " name="snack3[]">
                  <label>1/4 cup of nuts &nbsp;&nbsp; 110cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 banana -60cal " name="snack3[]">
                  <label>1 banana &nbsp;&nbsp; 60cal </label>
                </div>
                <br><hr>
                 


         <button type="submit" name="show2" class="btn-lg btn-dark font-weight-bold"  onclick="return confirm ('Are you sure, you want to add this plan!');">Show my plan</button>

              
          
       
        </div>
         </form>



<div class="container">

        <div class="col-md-6 mx-auto" style="background-color: mediumseagreen; ">


     <?php 

$sql = "SELECT * FROM dietplans where username='$username'AND category='paleo'  ";
$resultset = mysqli_query($db, $sql);
while( $record = mysqli_fetch_assoc($resultset) ) {
?> 

      <h3 class="text-center"><b>Here is your plan! <?php echo $_SESSION['username']; ?> </b></h3><hr>
      
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

          
        </div>


<?php }

 ?>
      
          
        </div>

    </div>

</div>      
        



<hr style="height: 100px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</div>  
</body>
</html>