<?php include ('dbconnection.php')  ?>
<!DOCTYPE html>
<html>
<head>
  <title>keto Diet plans</title>
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

if(isset($_POST['show1'] ))
{       
    

$breakfast  = implode('<br>', $_POST['breakfast']);
$snack1     = implode('<br>',$_POST['snack1']);
$lunch      = implode('<br>', $_POST['lunch']);
$snack2     = implode('<br>', $_POST['snack2']);
$dinner     = implode('<br>', $_POST['dinner']);
$snack3     = implode('<br>', $_POST['snack3']);


     
   
    $query1="INSERT INTO dietplans (username,category,breakfast,snack1,lunch,snack2,dinner,snack3) VALUES ('$username','ketogenic', '" . $breakfast . "', '" . $snack1 . "','" . $lunch . "','" . $snack2 . "','" . $dinner . "','" . $snack3 . "')   ";     

    mysqli_query($db,$query1);

    header('location: ketoplanscuztomize.php');
  

}
 

 if(isset($_POST['deleteplan'] )){


// $checkBox = implode('<br>', $_POST['breakfast']);

$query2="DELETE FROM dietplans WHERE breakfast IN ('$checkBox') ";

mysqli_query($db,$query2);
}


 ?>



   <h1 class="text-light mt-5 text-center" ><b>Start cuztomize your diet plan here!</b> </h1><br>
    <a href="ketoplans.php" class="btn btn-warning btn-lg" ><b>BACK</b></a> 
   <hr>

   <div class="row">
    <form action="ketoplanscuztomize.php" method="post" style="background-color: tomato">
        <div class="col-md-6 mx-auto ">

          <h3 class="text-light"><b>Customize here! </b></h3><hr>
        
            
          <h5><b>Breakfast(8.a.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="2 boiled eggs -  196cal " name="breakfast[]" >
                  <label>2 boiled eggs &nbsp;&nbsp; 196cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of full-cream milk -  150cal " name="breakfast[]">
                  <label>1 cup of full-cream milk &nbsp;&nbsp; 150cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 medium size bananas (Kolikuttu)  - 210cal " name="breakfast[]">
                  <label>2 medium size bananas (Kolikuttu)  &nbsp;&nbsp; 210cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 tbsp cashew (8) - 85cal " name="breakfast[]">
                  <label>2 tbsp cashew (8) &nbsp;&nbsp; 85cal </label>
                </div>
                 <div class="form-check">
                  <input type="checkbox" value="  8 boiled green bean  -  120cal " name="breakfast[]">
                  <label>  8 boiled green bean  &nbsp;&nbsp; 120cal </label>
                </div>
                 <div class="form-check">
                  <input type="checkbox" value=" 1 large avacado slice  -  125cal " name="breakfast[]">
                  <label> 1 large avacado slice  &nbsp;&nbsp; 125cal </label>
                </div>
                 <div class="form-check">
                  <input type="checkbox" value="  2 cheese slices -  120cal " name="breakfast[]">
                  <label>  2 cheese slices &nbsp;&nbsp; 120cal </label>
                </div>
                 <div class="form-check">
                  <input type="checkbox" value="2 fried eggs -  172cal " name="breakfast[]">
                  <label>2 fried eggs &nbsp;&nbsp; 172cal </label>
                </div>
                 <div class="form-check">
                  <input type="checkbox" value="2 cups of orange, mango smoothie -  274cal " name="breakfast[]">
                  <label> 2 cups of orange, mango smoothie &nbsp;&nbsp; 274cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 highland yoghurt -  90cal " name="breakfast[]">
                  <label>1 highland yoghurt &nbsp;&nbsp; 90cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 medium avacado -160cal " name="breakfast[]">
                  <label>1 medium avacado &nbsp;&nbsp; 160cal </label>
                </div><hr>

          
           

          <h5><b>Snack1(10.30.a.m.)</b></h5>
            <div class="form-check">
                  <input type="checkbox" value="1 large piece of avacado   - 125cal " name="snack1[]">
                  <label>1 large piece of avacado   &nbsp;&nbsp; 125cal  </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 Highland yoghurt  - 90cal " name="snack1[]">
                  <label>1 Highland yoghurt  &nbsp;&nbsp; 90cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1 cheese slice - 60cal " name="snack1[]">
                  <label>1 cheese slice &nbsp;&nbsp; 60cal </label>
                </div><hr>
             
          
  
            <h5><b>Lunch(12.30.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of cooked corn with cream cheese  - 320cal " name="lunch[]">
                  <label>1 cup of cooked corn with cream cheese &nbsp;&nbsp; 320cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 highland yoghurt  - 90cal " name="lunch[]">
                  <label>1 highland yoghurt &nbsp;&nbsp; 90cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1/2 cup of cucumber, tomato and avacado salad with olive oil - 70cal " name="lunch[]">
                  <label> 1/2 cup of cucumber, tomato and avacado salad with olive oil &nbsp;&nbsp; 70cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1/4 cup of boiled rice (Red rice)  - 51cal " name="lunch[]">
                  <label>1/4 cup of boiled rice (Red rice) &nbsp;&nbsp; 51cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup chicken curry  - 306cal " name="lunch[]">
                  <label>1 cup chicken curry &nbsp;&nbsp; 306cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="3 tbsp green bean curry  - cal " name="lunch[]">
                  <label>3 tbsp green bean curry &nbsp;&nbsp; 36cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 4 tbsp carrot curry   - 110cal " name="lunch[]">
                  <label> 4 tbsp carrot curry  &nbsp;&nbsp; 110cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value=" 1/2 cup of fried mashroom with coconut oil  - 196cal " name="lunch[]">
                  <label> 1/2 cup of fried mashroom with coconut oil &nbsp;&nbsp; 196cal </label>
                </div> <hr>


          <h5><b>Snack2(3.30.p.m.)</b></h5>
          <div class="form-check">
                  <input type="checkbox" value="2 cheese slices - 120cal " name="snack2[]">
                  <label>2 cheese slices  &nbsp;&nbsp; 120cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 medium orange  - 50cal " name="snack2[]">
                  <label>1 medium orange   &nbsp;&nbsp; 50cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of milk coffee  - 90cal " name="snack2[]">
                  <label> 1 cup of milk coffee   &nbsp;&nbsp; 90cal </label>
                </div><hr>
                

        
          

                <h5><b>Dinner(6.00.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1 1/2 couliflower, orange, and tomato salad  - 170cal " name="dinner[]">
                  <label>1 1/2 couliflower, orange, and tomato salad  &nbsp;&nbsp; 170cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 small avacado   - 160cal " name="dinner[]">
                  <label>1 small avacado   &nbsp;&nbsp; 160cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="2 cheese slice  -60cal " name="dinner[]">
                  <label>2 cheese slice  &nbsp;&nbsp; 60cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1/2 cup of chicken curry  -153cal " name="dinner[]">
                  <label>1/2 cup of chicken curry  &nbsp;&nbsp; 153cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1/2 cup of boiled noodles  -110cal " name="dinner[]">
                  <label>1/2 cup of boiled noodles  &nbsp;&nbsp; 110cal </label>
                </div><hr>
                
          

                <h5><b>Snack3(8.30.p.m.)</b></h5>
                <div class="form-check">
                  <input type="checkbox" value="1 cup of mashroom soup -68cal " name="snack3[]">
                  <label>1 cup of mashroom soup &nbsp;&nbsp; 68cal </label>
                </div>
                <div class="form-check">
                  <input type="checkbox" value="1 medium size avacado -60cal " name="snack3[]">
                  <label>1 medium size avacado &nbsp;&nbsp; 60cal </label>
                </div><br><hr>
                 


         <button type="submit" name="show1" class="btn-lg btn-dark font-weight-bold"  onclick="return confirm ('Are you sure, you want to add this plan!');">Show my plan</button>

              
          
       
        </div>
         </form>



<div class="container">

        <div class="col-md-6 mx-auto" style="background-color: mediumseagreen; ">


     <?php 

$sql = "SELECT * FROM dietplans where username='$username' AND category='ketogenic'  ";
$resultset = mysqli_query($db, $sql);
while( $record = mysqli_fetch_assoc($resultset) ) {
?> 
    
     <h3 class="text-center"><b>Here is your plan <?php echo $_SESSION['username']; ?>! </b></h3><hr>
      
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