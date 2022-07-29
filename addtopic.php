<?php include ('dbconnection.php') ?> 

<?php 
session_start();
$username= $_SESSION['username'];

$q = "SELECT username from users where username='$username'";
$run=mysqli_query($db,$q);
$user=mysqli_fetch_assoc($run);

if (isset($user)) {
  echo 'User:';
}else{
  echo 'Dietician:';

}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Add a Topic</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mine.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body id="forumbg">
    
<h2 class="text-center mt-5"><B>Add a New Topic Here </B></h2><br><hr>
 <div class="container  text-center">

    <form method=post action="do_addtopic.php">
    	<div class="form-group">
            <label><b>Username:</b></label>
            <input type="text" name="topic_owner" size=40 maxlength=150 
            value="<?php 
               $q = "SELECT username from users where username='$username'";
               $run=mysqli_query($db,$q);
               $user=mysqli_fetch_assoc($run);

            if (isset($user)) {
              echo $username .'(User)';
            }else{
              echo $username .'(Dietician)';
            }
             ?>">
        </div>
        <div class="form-group">
            <label><b>Topic Title:</b></label>
            <input type="text" name="topic_title" size=40 maxlength=150>
         
        </div>
        <div class="form-group">
            <label><b>Post Text:</b></label>
            <textarea name="post_text" rows=8 cols=45 ></textarea>    
        </div>
        <div>
              <button type="submit" name="submit" value="Add Topic" class="btn btn-primary font-weight-bold">Add Topic</button>
      </div>   
  </form>
</div>
 <div class="text-center">
    <a href="topiclist.php" class="btn btn-dark" name="addtopic"><b>BACK</b></a> 
    </div>
<hr style="height:70px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
</body>
</html>