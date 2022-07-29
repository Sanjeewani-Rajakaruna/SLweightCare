<?php include('dbconnection.php') ?>

<?php 

session_start();

$username = "";
$errors = array(); 


//if user clicked the login button
if (isset($_POST['adminlogin'])) {

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
    //prepare the database query
  	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
        
        //give query to the database
  	    $results = mysqli_query($db, $query);
        
        //if a valid user found
  	    if (mysqli_num_rows($results)== 1) {
  	     $_SESSION['username'] = $username;
  	  	 header('location:adminhome.php');
  	    } else {
  		array_push($errors, "Wrong username or password");
  	   }
    }
}
 
?>	


<!DOCTYPE html>
<html>
<head>
	<title>Admin log in</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	  
    <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="userhomebg">
	

<br><br><br><br><br><br><br>
<div class="col-md-3 mx-auto bg-light mt-5" ><br><br>
	  		<h2 class="text-center"><b class="font-italic">Admin Sign In</b></h2><br>

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
	  		
	  		<form action="admin.php" method="post">

	  			<div class="form-group">
	  				<label><b>User Name</b></label>
	  				<input type="text" name="username" class="form-control" required placeholder="Enter user name" value="<?php echo $username; ?>">
	  			</div>
	  			
	  			<div class="form-group">
	  				<label><b>Password</b></label>
	  				<input type="password" name="password" class="form-control" required  placeholder="Enter password">
	  			</div><br>

	  			<div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="adminlogin" class="btn btn-primary font-weight-bold">Login</button>
			    </div>
			    <div class="col-md-6 text-center">
			         <a href="firstpg.php" class="btn btn-info" role="button">Back</a>
			    </div>
	  			</div><br>
	  		</form>
 </div>


<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>