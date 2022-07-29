<?php include('dbconnection.php') ?>

<?php 

session_start();

$username = "";
$errors = array(); 


//if user clicked the login button
if (isset($_POST['userslogin'])) {

	//save input values into variables with avoiding sql injections
$username = mysqli_real_escape_string($db,$_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

  
//check all fields are filled
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

//check there are any errors in the form
   if (count($errors) == 0) {
   $password = sha1($password);
    //prepare the database query
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        
        //give query to the database
  	    $results = mysqli_query($db, $query);
        
        //if a valid user found
  	    if (mysqli_num_rows($results)== 1) {
  	     $_SESSION['username'] = $username;
  	  	 header('location:home.php');
  	    } else {
  		array_push($errors, "Wrong username or password");
  	   }
      }
   }
 
?>	


<!DOCTYPE html>
<html>
<head>
	<title>users login</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	
	<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="userhomebg">

<br><br><br><br><br><br><br>
<div class="col-md-3 mx-auto bg-light mt-5 form-div userlogin" ><br><br>
	  		<h2 class="text-center"><b class="font-italic">User Sign In</b></h2><br>

             <div class="text-danger text-center font-weight-bold form-error">
            	<?php 
						if (count($errors) > 0){
							echo '<br>Somthing wrong in your form. </br>';
							foreach ($errors as $error) {
								echo $error . '<br>';

							}
						}
			    ?>
	  		   
		      </div><hr>
	  		
	  		<form action="userslogin.php" method="post">

	  			<div class="form-group">
	  				<label><b>User Name</b></label>
	  				<input type="text" name="username" class="form-control" required placeholder="Enter user name" value="<?php echo $username; ?>">
	  			</div>
	  			
	  			<div class="form-group">
	  				<label><b>Password</b></label>
	  				<input type="password" name="password" class="form-control" required  placeholder="Enter password" id="password1">
	  			</div><br>

	  			<div class="form-group">
	  				<label><b>Show Password</b></label>
	  				<input type="checkbox" name="dshowpassword" id="ushowpassword" style="width: 20px; height: 20px;">
	  			</div>

	  			<div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="userslogin" class="btn btn-primary font-weight-bold">Login</button>
			    </div>
			    <div class="col-md-6 text-center">
			         <a href="usersregistration.php" class="btn btn-info" role="button">Back</a>
			    </div>
	  			</div><br>

	  			<p class="text-center">Not yet a member? <a href="usersregistration.php"><b>Sign Up</b></a></p><br><br>
	  		</form>
 </div>


 <script>
	$(document).ready(function(){
		$('#ushowpassword').click(function(){
			if($('#ushowpassword').is(':checked')){
               $('#password1').attr ('type','text');
			}else{
				 $('#password1').attr ('type','password');
			}

			});
		});
</script>

<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>