<?php include ('dbconnection.php') ?>

<?php  

 session_start();
// initializing variables
$firstname= "";
$lastname = "";
$username = "";
$email    = "";
$contact  = "";
$nic      = "";
$regno    = "";
$currentplace = "";
$ppplace  = "";
$workingexperience = "";
$approval = "";

$errors   = array();


//if user clicked register button
if (isset($_POST['dieticiansregister'])) {

	//save input values into varialbles (recieve all input values from the form)
  $firstname  = mysqli_real_escape_string ($db,$_POST['firstname']);
  $lastname   = mysqli_real_escape_string ($db,$_POST['lastname']);
  $username   = mysqli_real_escape_string ($db,$_POST['username']);
  $email      = mysqli_real_escape_string ($db,$_POST['email']);
  $contact    = mysqli_real_escape_string ($db,$_POST['contact']);
  $nic        = mysqli_real_escape_string ($db,$_POST['nic']);
  $regno      = mysqli_real_escape_string ($db,$_POST['regno']);
  $currentplace = mysqli_real_escape_string ($db,$_POST['currentplace']);
  $ppplace    = mysqli_real_escape_string ($db,$_POST['ppplace']);
  $workingexperience = mysqli_real_escape_string ($db,$_POST['workingexperience']);
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
  if (empty($contact)) {
  	 array_push($errors, "Contact number is required"); 
  	}
  if (empty($nic)) {
     array_push($errors, "NIC number is required"); 
    }
  if (empty($regno)) {
  	 array_push($errors, "Registration number is required"); 
  	}
  if (empty($currentplace)) {
  	 array_push($errors, "Current working place is required"); 
  	}
  if (empty($workingexperience)) {
  	 array_push($errors, "working experience is required"); 
  	}	
  if (empty($password1)) { 
  	 array_push($errors, "Password is required"); 
  	}
  if($password1 != $password2) { 
  	 array_push($errors, "Two passwords are not match"); 
  	}


//checking max length
$max_length_field  = array('firstname' =>100 , 'lastname' =>100 ,'username' =>100, 'email' =>100 , 'contact' =>10, 'nic' =>12, 'regno' =>10,'workingexperience' =>2,'password1' =>100 , );

   foreach ($max_length_field as $field => $max_length) {
   	if (strlen(trim($_POST[$field]))> $max_length) {
   	 array_push($errors, $field .  ' must be'. $max_length. ' characters'); 
   	}
  }

 //email validation
  if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
{ 
   array_push($errors, "Email is not valid"); 
  	
}

if (strlen($contact) < 10) {

   array_push($errors, "Contact number not valid. Must have 10 digits"); 
}
  

 // check whether there are any same username or email exists already in the database
  $user_check_query = "SELECT * FROM dieticians WHERE username='$username' OR email='$email' OR nic='$nic' OR regno='$regno' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }

    if ($user['nic'] === $nic) {
      array_push($errors, "Already exists NIC number");
    }
    if ($user['regno'] === $regno) {
      array_push($errors, "Already exists registration number");
    }
 
     
  
  if (count($errors) == 0) {
    $password = sha1($password1); //hashed password to encrypt it

  	$query = "INSERT INTO dieticians (firstname, lastname, username, email, contact, nic, regno, currentplace, ppplace, workingexperience, password,approval) 
  			  VALUES('$firstname', '$lastname','$username', '$email','$contact', '$nic', '$regno', '$currentplace', '$ppplace', '$workingexperience', '$password' , 0)";

    mysqli_query($db, $query);
              
  	header('location: dieticianslogin.php');
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dieticians registration</title>
	
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="mine.css">
  
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="userhomebg">

<div class="card col-md-6 mx-auto bg-light mt-5 mb-5" ><br>

	  		<h2 class="text-center"><b class="font-italic">Dietician SignUp</b></h2>
        

	  		<form action="dieticiansregistration.php" method="post">

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
	  				<input type="email" name="email" class="form-control" required placeholder="Enter email address" value="<?php echo $email; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Contact number</b></label>
	  				<input type="contact" name="contact" class="form-control" required placeholder="Enter contact number" value="<?php echo $contact; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>NIC number</b></label>
	  				<input type="nic" name="nic" class="form-control" required placeholder="Enter NIC number" value="<?php echo $nic; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Registartion Number of SL medical council</b></label>
	  				<input type="text" name="regno" class="form-control" required placeholder="Enter Register number" value="<?php echo $regno; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Current working place Address</b></label>
	  				<input type="text" name="currentplace" class="form-control" required placeholder="Enter current working place" value="<?php echo $currentplace; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Private practice place Address (if available)</b></label>
	  				<input type="text" name="ppplace" class="form-control" placeholder="Enter private place" value="<?php echo $ppplace; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Working experience (Years)</b></label>
	  				<input type="text" name="workingexperience" class="form-control" required  placeholder="Enter how many years you have experience" value="<?php echo $workingexperience; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Password</b></label>
	  				<input type="password" name="password1" class="form-control" required  placeholder="Enter password">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Confirm Password</b></label>
	  				<input type="password" name="password2" class="form-control" required  placeholder="Confirm your password">
	  			</div><hr>


	  		    <div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="dieticiansregister" class="btn btn-primary font-weight-bold">Register</button>
			    </div>
			    <div class="col-md-6 text-center">
			         <a href="firstpg.php" class="btn btn-info" role="button">Back</a>
			    </div>
	  			</div><br>

	  			<p class="text-center">Already a member? <a href="dieticianslogin.php"><b>Sign In</b></a></p>
	  		</form>
 </div>

</body>
</html>