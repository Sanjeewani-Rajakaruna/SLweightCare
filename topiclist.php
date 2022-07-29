<?php include ('dbconnection.php') ?> 
<?php
 
  session_start();
$username= $_SESSION['username'];

//check whether the user is inside without login(only accessible for logged in users)
  if (!isset($_SESSION['username'])) {
    header('location: firstpg.php');
  }  
  ?>

<?php
  
  //gather the topics
  $get_topics = "SELECT topic_id, topic_title,
  topic_create_time,topic_owner from forum_topics order by topic_create_time desc";

  $get_topics_res = mysqli_query($db,$get_topics);

  if (mysqli_num_rows($get_topics_res) < 1) {
     //there are no topics, so say so
     $display_block = "<P><em>No topics exist.</em></p>";
  } else {
     //create the display string
     $display_block = "
     <table cellpadding=3 cellspacing=2 border=2>
     <tr>
     <th>TOPIC TITLE</th>
     <th>No of Replys</th>
     </tr>";
  
      while ($topic_info = mysqli_fetch_array($get_topics_res)) {//extract each row
         $topic_id = $topic_info['topic_id'];
         $topic_title =$topic_info['topic_title'];
         $topic_create_time = $topic_info['topic_create_time'];
         $topic_owner = $topic_info['topic_owner'];
  
         //get number of posts
         $get_num_posts = "SELECT count(post_id) from forum_posts
              where topic_id = $topic_id";

         $get_num_posts_res = mysqli_query($db,$get_num_posts);

         $num_posts = mysqli_fetch_array($get_num_posts_res)[0]-1;
  
         //add to display
         $display_block .= "
         <tr>
         <td><a href=\"showtopic.php?topic_id=$topic_id\">
         <strong>$topic_title</strong></a><br><br>
         Created on $topic_create_time by $topic_owner</td>
         <td align=center>$num_posts</td>
       </tr>";
     }
     //close up the table
     $display_block .= "</table>";
  }
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mine.css">
	
	<script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 

</head>
<body id="forumbg">

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

<div class="container mt-5">
  <h2 class="text font-italic "><b>Please use this forum to discuss with other users and dieticians about any weight related problem.</b></h2>
</div>

  
<div class="container mx-auto mt-5">
    <h5><?php echo $display_block; ?></h5><br><hr>

    <h3 class="text font-italic"> <a href="addtopic.php">Add a New discussion topic here!</a></h3>
</div><br>

<hr style="height:70px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>

</body>
</html>