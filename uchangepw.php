<?php include ('dbconnection.php') ?>
<?php
 
  session_start();

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
  	header('location: firstpg.php');
  }
  
  ?>


<?php  

 $username = "";
 $email    = "";
 $errors   = array();

if (isset($_GET['username'])) { 
	//getting the user information
	  $username = $_SESSION['username'];

	$username = mysqli_real_escape_string ($db, $_GET['username']);
    $query1 = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

    $result1 = mysqli_query($db, $query1);

      	   if (mysqli_num_rows($result1)== 1) { //if user found

      	   	  $result2 = mysqli_fetch_assoc($result1); //data retrive karanawa

			    $username = $result2['username'];
				$email    = $result2['email'];
				
      	   	
      	   }else { // user not found
             header('location: home.php? err=user_notFound');
             
      	   }

	}  


//if user clicked register button
if (isset($_POST['usavechanges'])) {

	//save input values into varialbles (recieve all input values from the form)
  $username   = mysqli_real_escape_string ($db,$_POST['username']);//if not display error msg
  $password1  = mysqli_real_escape_string ($db,$_POST['password1']);
  $password2  = mysqli_real_escape_string ($db,$_POST['password2']);

  
  if (empty($password1)) { 
  	 array_push($errors, "Password is required"); 
  	}
  if($password1 != $password2) { 
  	 array_push($errors, "Two passwords are not match"); 
  	}	
  


  	if (strlen($password1) > 15) {

   array_push($errors, "Password is too long. Maximum legth is 15 characters"); 
}

    
     
  

  // if there is no any error, then register the user and insert data into database
  if (count($errors) == 0) {
      $password = sha1($password1);
  	$query_update = "UPDATE users SET password = '$password' WHERE username = '$username' LIMIT 1";

    $result3=mysqli_query($db, $query_update);

    if ($result3) {
          
         header('location: home.php ? password_updated');
    } else{
    	
    	 array_push($errors, "Failed to Update the password!!");
    }
              
  	
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>user's change password</title>
	
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="mine.css">
  
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body>

<?php include ('header.php') ?>




<h2 class="text-center mt-5"><b class="font-italic">Change Your Password</b></h2>

	<form action="uchangepw.php" method="post">
        
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
              
	  			<div class="form-group">
	  				<label><b>User Name</b></label>
	  				<input type="text" name="username" class="form-control" required placeholder="Enter user name" disabled value="<?php echo $username; ?>">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Email</b></label>
	  				<input type="email" name="email" class="form-control" required placeholder="Enter email address" disabled value="<?php echo $email; ?>">
	  			</div>

	  			<div class="form-group">
	  				<label><b>New Password</b></label>
	  				<input type="password" name="password1" class="form-control" required  placeholder="Enter password" id="password1">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Show Password</b></label>
	  				<input type="checkbox" name="dshowpassword" id="ushowpassword" style="width: 20px; height: 20px;">
	  			</div>
	  			<div class="form-group">
	  				<label><b>Confirm New Password</b></label>
	  				<input type="password" name="password2" class="form-control" required  placeholder="Confirm your password">
	  			</div><hr>


	  		    <div class="row">
			    <div class="col-md-6 text-center">
			        <button type="submit" name="usavechanges" class="btn btn-primary font-weight-bold">Save Changes</button>
			    </div>
			     <div class="col-md-6 text-center">
			         <a href="home.php" class="btn btn-dark" role="button"><b>Back</b></a>
			    </div>
	  			</div><br>

	  			
	  	</div>

	 </form> <br><br><br>
 

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

</body>
</html>