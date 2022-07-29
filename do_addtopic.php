<?php include ('dbconnection.php') ?> 


<?php

session_start();
$username= $_SESSION['username'];

  //check for required fields from the form
  if ((!$_POST['topic_owner']) || (!$_POST['topic_title'])
      || (!$_POST['post_text'])) {
      header("Location: addtopic.php");
  } 
  
  $add_topic = "INSERT into forum_topics VALUES ('', '$_POST[topic_title]',
      now(), '$_POST[topic_owner]')";
  $result=mysqli_query($db,$add_topic);
  
  //get the id of the last query 
  $topic_id = mysqli_insert_id($db);
  
  
  $add_post = "INSERT into forum_posts values ('', '$topic_id',
     '$_POST[post_text]', now(), '$_POST[topic_owner]')";
  mysqli_query($db,$add_post);
  
  //create message for user
  $topic_title= $_POST['topic_title'];
  $msg = "<P>The <strong> $topic_title </strong> topic has been created.</p>";
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>New Topic Added</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mine.css">
  
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
  </head>
  <body id="forumbg">

  <h2 class="text-center mt-5">Your Topic has been Added </h2><br>
  <h4 class="text-center"><?php print $msg; ?></h4>
    
    <div class="text-center">
     <a href="topiclist.php" class="btn btn-dark btn-lg" name="topiclist"><b>Next</b></a> 
    </div><br><br>
     <div class="text-center">
    <a href="addtopic.php" class="btn btn-dark btn-lg" name="addtopic"><b>BACK</b></a> 
    </div>

<hr style="height:70px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
  </body>
  </html>