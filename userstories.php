<?php include ('dbconnection.php') ?> 
<?php
 
  session_start(); 

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
    header('location: firstpg.php');
  }

$firstname = "";
$lastname = ""; 
$username = "";
$story   = "";
$errors = array(); 


//if user clicked the login button
if (isset($_POST['storysubmit'])) {

  //save input values into variables with avoiding sql injections
$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$lastname  = mysqli_real_escape_string($db, $_POST['lastname']);
$username  = mysqli_real_escape_string($db,$_POST['username']);
$story     = mysqli_real_escape_string($db, $_POST['story']);

  
//check all fields are filled
   if (empty($firstname)) {
    array_push($errors, "firstname is required");
  }
   if (empty($lastname)) {
    array_push($errors, "lastname is required");
  }
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($story)) {
    array_push($errors, "story is required");
  }

//check there are any errors in the form
   if (count($errors) == 0) {
   $password = sha1($password);

        $query1 = "INSERT INTO userstories (firstname, lastname, username, story) 
          VALUES('$firstname', '$lastname','$username', '$story')";
          
          mysqli_query($db, $query1);
          header('location: userstories.php'); 
        
      }
   }
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>User story</title>

  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="css/mine.css">
	  <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>
<body id="storybg">

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




<div class="container-fluid mt-4">
  <h1 class="text-center text-warning font-italic "><b>You can read other's successfull stories or You can upload your own story about the weight loss journey through SLweightCare HERE!</b></h1>  
</div>





<div class="row">

 
    <div class="container col-md-8 mt-4">
  <div class="card-columns">
         <h2 class="text-light text-center mt-5"><b>Read here!</b></h2><br>
     <?php 

$sql = "SELECT * FROM userstories order by uploadate desc ";
$resultset = mysqli_query($db, $sql);
while( $record = mysqli_fetch_assoc($resultset) ) {
?>
      <div class="card mt-5" style="background-color:palegoldenrod; border:10px solid tomato;">
       <h5 class=" text-center"><b>Name:</b> <?php echo $record ['firstname'] ?> <?php echo  $record ['lastname'] ?></h5>
       <h5 class="text-center"><b>Username: </b><?php echo $record['username'];?></h5>
       <h6 class="text"><b> Uploaded at: <?php echo $record ['uploadate'] ?></b></h6><hr>
       <h6 class="text"> <?php echo $record ['story'] ?></h6><hr>
    </div> <br>
     <?php }  ?>
     </div>
  </div>


       
      

      <div class="col-md-3 mx-auto  mt-4" id="storyform" >

       <h2 class="text-light text-center mt-5"><b>Write here!</b></h2><br>

      <form id="form1" action="userstories.php" method="POST">

        <div class="form-group">
            <label><b>First Name</b></label>
            <input type="text" name="firstname" class="form-control" required placeholder="Enter first name" value="<?php echo $firstname; ?>">
          </div>

         <div class="form-group">
            <labe><b>Last Name</b></label>
            <input type="text" name="lastname" class="form-control" required placeholder="Enter last name" value="<?php echo $lastname; ?>">
          </div>

         <div class="form-group">
            <label><b>User Name</b></label>
            <input type="text" name="username" class="form-control" required placeholder="Enter user name" value="<?php echo $username; ?>">
          </div>
          
         <div class="form-group">
            <textarea class="form-control" name="story"  rows="10" placeholder="We are really appriciate your attend to writting...Since your uploaded story would available for other users we recommend you to write it in short and sweet way by targetting motivate your friends! "></textarea>
         </div>
      
             
            <div class="col-md-6 text-center">
              <button type="submit" name="storysubmit" class="btn btn-primary font-weight-bold" onclick="return confirm ('Are you sure you want to upload?');">upload</button>
          </div><br>
      </form>
    </div>

</div>



</div>
<hr style="height: 400px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</body>
</html>