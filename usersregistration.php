<?php include ('dbconnection.php') ?>

<?php  

 session_start();

// initializing variables
$firstname= "";
$lastname = "";
$username = "";
$email    = "";
$password1 = "";
$errors = array();


//if user clicked register button
if (isset($_POST['usersregister'])) {

			//receive and save input values into varialbles
  $firstname  = mysqli_real_escape_string ($db,$_POST['firstname']);
  $lastname   = mysqli_real_escape_string ($db,$_POST['lastname']);
  $username   = mysqli_real_escape_string ($db,$_POST['username']);
  $email      = mysqli_real_escape_string ($db,$_POST['email']);
  $password1  = mysqli_real_escape_string ($db,$_POST['password1']);
  $password2  = mysqli_real_escape_string ($db,$_POST['password2']);
  


  //check whether the user filled all the fields of form and if not add into the errors array 
  if (empty($firstname)) {
  	 array_push($errors, "First name is required");
    }
  if (empty($lastname)) {
  	 array_push($errors, "Last name is required"); 
  	}
  if (empty($username)) {
  	 array_push($errors, "Username is required"); 
  	}
  if (empty($email)) { 
  	 array_push($errors, "Email is required"); 
  	}
  if (empty($password1)) { 
  	 array_push($errors, "Password is required"); 
  	}
  if($password1 != $password2) { 
  	 array_push($errors, "Passwords are not match"); 
  	}
 
//checking max length
$max_length_field  = array('firstname' =>100 , 'lastname' =>100 ,'username' =>100, 'email' =>100 ,'password1' =>100 , );

   foreach ($max_length_field as $field => $max_length) {
   	if (strlen(trim($_POST[$field]))> $max_length) {
   	 array_push($errors, $field .  ' must be less than'. $max_length. ' characters'); 
   	}
  }

 //email validation
  if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
{ 
   array_push($errors, "Email is not valid"); 
  	
}


 // check whether there are any same username or email exists already in the database
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // query eka successfulnm 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  


  // if there is no any error, then register the user and insert data into database
  if (count($errors) == 0) {
    $password = sha1($password1); //hashed password to encrypt it
  	$query = "INSERT INTO users (firstname, lastname, username, email, password) 
  			  VALUES('$firstname', '$lastname','$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	header('location: questionnaire.php');
  }
}

?>






<!DOCTYPE html>
<html>
<head>
	<title>Users Registration</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mine.css">
	
	<script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>
<body id="userhomebg">

<div class="container col-md-4 bg-light mt-3 form-div usersregistration" ><br><br>

		<h2 class="font-italic text-center "><b>User Registration</b></h2>
		<br><hr>
	       <form action="usersregistration.php" method="POST">
       
            <div class="text-danger text-center font-weight-bold form-error">
                <?php 
						if (count($errors) > 0){
							echo '<br>Somthing wrong in your form. </br>';
							foreach ($errors as $error) {
								echo '-', $error . '<br>';

							}
						}
			    ?>           
		    </div><hr>


		        <div class="form-group">
	  				<label><b>First Name</b></label>
	  				<input type="text" name="firstname"  class="form-control" required placeholder="Enter First name" value="<?php echo $firstname; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Last Name</b></label>
	  				<input type="text" name="lastname"  class="form-control" required placeholder="Enter Last name" value="<?php echo $lastname; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>User Name</b></label>
	  				<input type="text" name="username" class="form-control" required placeholder="Enter user name" value="<?php echo $username; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Email</b></label>
	  				<input type="email" name="email" class="form-control" required placeholder="Enter your email address" value="<?php echo $email; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Password</b></label>
	  				<input type="password" name="password1" class="form-control" required  placeholder="Enter password">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Confirm Password</b></label>
	  				<input type="password" name="password2" class="form-control" required  placeholder="Confirm your password">
	  			</div><br>

	  			 <div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="usersregister" class="btn btn-dark font-weight-bold">Register</button>
			    </div>
			    <div class="col-md-6 text-center">
			         <a href="firstpg.php" class="btn btn-dark font-weight-bold">Back</a>
			    </div>
	  			</div><hr>

	  			<p class="text-center font-weight-bold">Already a member? <a href="userslogin.php"><b class="text font-italic">Sign In</b></a></p> <br>
	        </form>
</div>



<hr style="height:70px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>