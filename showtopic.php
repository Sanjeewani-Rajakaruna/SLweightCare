<?php include ('dbconnection.php') ?> 

<?php
session_start();
$username= $_SESSION['username'];

  //check for required info from the query string
  if (!$_GET['topic_id']) {
     header("Location: topiclist.php");
     
  }
  
  //verify the topic exists
  $verify_topic = "SELECT topic_title from forum_topics where
      topic_id = $_GET[topic_id]";

  $verify_topic_res = mysqli_query($db,$verify_topic);
 
  if (mysqli_num_rows($verify_topic_res) < 1) {
     $display_block = "<P><em>You have selected an invalid topic.
      Please <a href=\"topiclist.php\">try again</a>.</em></p>";
  } else {
     
  	$topic_title =mysqli_fetch_array($verify_topic_res)[0];

  
     $get_posts = "SELECT post_id, post_text, post_create_time, post_owner from
          forum_posts where topic_id = $_GET[topic_id] order by post_create_time asc";
  
     $get_posts_res = mysqli_query($db,$get_posts);
  
     $display_block = "
     <P>Showing posts for the <strong>$topic_title</strong> topic:</p>
  
     <table width=100% cellpadding=3 cellspacing=1 border=1>
     <tr>
     <th>AUTHOR</th>
     <th>POST</th>
     </tr>";
  
     while ($posts_info = mysqli_fetch_array($get_posts_res)) {
         $post_id = $posts_info['post_id'];
         $post_text = nl2br(stripslashes($posts_info['post_text']));
         $post_create_time = $posts_info['post_create_time'];
         $post_owner = stripslashes($posts_info['post_owner']);
  
         $display_block .= "
         <tr>
         <td width=35% valign=top>$post_owner<br>[$post_create_time]</td>
         <td width=65% valign=top>$post_text<br><br>
          <a href=\"replytopost.php?post_id=$post_id\"><strong>REPLY TO
          POST</strong></a></td>
         </tr>";
     }
  
     //close up the table
     $display_block .= "</table>";
  }
  ?>
 

  <!DOCTYPE html>
  <html>
  <head>
    <title>Show the topic </title>
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/mine.css">
  
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
  </head>
  <body id="forumbg">
  <h2 class="text-center mt-5"><b>Add reply to the topic You have just selected</b></h2><br><hr>

  <div class="container mx-auto">
    <?php echo $display_block; ?>
  </div> <br><br>

   <div class="text-center">
    <a href="topiclist.php" class="btn btn-dark " name="topiclist"><b>BACK</b></a> 
    </div>



<hr style="height:70px;">
<div class="fixed-bottom">
<?php include('footer.php') ?>
</div>
  </body>
  </html>