<?php include ('dbconnection.php') ?>
<?php
 
  session_start();

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
  	header('location: firstpg.php');
  }
  
  ?>




<?php  

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

$errors   = array();

if (isset($_GET['username'])) {

	//getting the user information
	  $username = $_SESSION['username'];

	$username = mysqli_real_escape_string ($db, $_GET['username']);
    $query1 = "SELECT * FROM dieticians WHERE username = '$username' LIMIT 1";

    $result1 = mysqli_query($db, $query1);

       if ($result1) {
      	   if (mysqli_num_rows($result1)== 1) { //if user found

      	   	  $result2 = mysqli_fetch_assoc($result1);

        $firstname= $result2['firstname'];
				$lastname = $result2['lastname'];
			  $username = $result2['username'];
				$email    = $result2['email'];
				$contact  = $result2['contact'];
			  $nic      = $result2['nic'];
			  $regno    = $result2['regno'];
				$currentplace = $result2['currentplace'];
				$ppplace  = $result2['ppplace'];
				$workingexperience = $result2['workingexperience'];
				
      	   	
      	   }else { // user not found
             header('location: dieticianshome.php? err=user_notFound');
             
      	   }

       }else{ // query faild
          header('location: dieticianshome.php? err=query_failed');

       }

	}  


//if user clicked register button
if (isset($_POST['update'])) {

	//recieve all input values from the form
  $username   = mysqli_real_escape_string ($db,$_POST['username']);
  $firstname  = mysqli_real_escape_string ($db,$_POST['firstname']);
  $lastname   = mysqli_real_escape_string ($db,$_POST['lastname']);
  $email      = mysqli_real_escape_string ($db,$_POST['email']);
  $contact    = mysqli_real_escape_string ($db,$_POST['contact']);
  $currentplace = mysqli_real_escape_string ($db,$_POST['currentplace']);
  $ppplace    = mysqli_real_escape_string ($db,$_POST['ppplace']);
  $workingexperience = mysqli_real_escape_string ($db,$_POST['workingexperience']);
 

  //check whether the user filled all the fields of form and if not add into the errors array because he can't remove data. just can update 
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
  if (empty($currentplace)) {
  	 array_push($errors, "Current working place is required"); 
  	}
  if (empty($workingexperience)) {
  	 array_push($errors, "working experience is required"); 
  	}	
  


//checking max length
$max_length_field  = array('firstname' =>100 , 'lastname' =>100 , 'email' =>100 , 'contact' =>10, 'workingexperience' =>2 );

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

if (strlen($contact) < 10) { //check contact no has exactly 10 intiders

   array_push($errors, "Contact number not valid. Must have 10 digits"); 
}
  

  $user_check_query = "SELECT * FROM dieticians WHERE  email='$email' AND username != '$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    
    
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }

    
     
  


  if (count($errors) == 0) {
    
  	$query_update = "UPDATE dieticians SET firstname = '$firstname' , lastname = '$lastname' , email = '$email', contact = '$contact',  currentplace = '$currentplace', ppplace = '$ppplace', workingexperience = '$workingexperience' WHERE username = '$username' LIMIT 1";

    $result3=mysqli_query($db, $query_update);

    if ($result3) {
          
         header('location: dieticianshome.php ? dietician_updated');
    } else{
    	
    	 array_push($errors, "Failed to Update!!");
    }
              
  	
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit dieticians profile</title>
	
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="mine.css">
  
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body>

<?php include ('dheader.php') ?>




<h2 class="text-center mt-5"><b class="font-italic">Edit Your Profile</b></h2>

	<form action="dieticianedit.php" method="post">
        
	  	<div class="container col-md-10 mt-2" style="background-color: tomato">

               <div class=" text-center font-weight-bold form-error">
				<?php 
						if (count($errors) > 0){
							echo '<br>Somthing wrong in your form. </br>';
							foreach ($errors as $error) {
								echo $error . '<br>';

							}
						}
			    ?>    
              </div><hr>
                
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <!-- user can"t see this -->
	  		    
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
	  				<input type="text" name="username" class="form-control" required placeholder="Enter user name" disabled value="<?php echo $username; ?>">
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
	  				<input type="nic" name="nic" class="form-control" required placeholder="Enter NIC number" disabled value="<?php echo $nic; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Registartion Number of SL medical council</b></label>
	  				<input type="text" name="regno" class="form-control" required placeholder="Enter Register number" disabled value="<?php echo $regno; ?>">
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
	  			</div><br>


	  		    <div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="update" class="btn btn-primary font-weight-bold">Update</button>
			    </div>
			     <div class="col-md-6 text-center">
			         <a href="dieticianshome.php" class="btn btn-dark" role="button"><b>Back</b></a>
			    </div>
	  			</div><br>

	  			
	  	</div>

	 </form> <br><br><br>
 



</body>
</html>