
<?php include ('dbconnection.php') ?> 

<?php

  session_start();
$username= $_SESSION['username'];

  //check whether the form is submitted

  if (isset($_POST['op']) != "addpost") {

     if (!$_GET['post_id']) {
         header("Location: topiclist.php");
     }
  
     $verify = "SELECT ft.topic_id, ft.topic_title from
      forum_posts as fp left join forum_topics as ft on
      fp.topic_id = ft.topic_id where fp.post_id = $_GET[post_id]";
 
     $verify_res = mysqli_query($db,$verify);
      if (mysqli_num_rows($verify_res) < 1) {
         header("Location: topiclist.php");
     } else {
         //get the topic id and title
        
     	 $topic_id = mysqli_fetch_array($verify_res)[0];

     	 $topic_title = stripslashes(mysqli_fetch_array($verify_res)[0]);
  
         print "

         <html>
         <head>
         <title>Post Your Reply in $topic_title</title>
          <link rel=\"stylesheet\" type\"text/css\" href=\"css/bootstrap.min.css\">
          <link rel=\"stylesheet\" type=\"text/css\" href=\"css/mine.css\"> 
         </head>
         <body id=\"forumbg\">
         <h1>Add Your Reply here</h1><br>

         <form method=post action=\"$_SERVER[PHP_SELF]\">
  
         <p><strong>Your username:</strong><br>
         <input type=\"text\" name=\"post_owner\" value=\" $username\" size=40 maxlength=150 >
  
         <P><strong>Post Text:</strong><br>
         <textarea name=\"post_text\" rows=8 cols=40 wrap=virtual></textarea>
  
         <input type=\"hidden\" name=\"op\" value=\"addpost\">
         <input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\">
  
         <P><input type=\"submit\" name=\"submit\" value=\"Add Post\" class=\"btn btn-dark\"></p>
         <a href=\"topiclist.php\" class=\"btn btn-dark\" name=\"addtopic\"><b>BACK</b></a> 
  
         </form>
         </body>
         </html>";
     }
  } else if ($_POST['op'] == "addpost") {

     if ((!$_POST['topic_id']) || (!$_POST['post_text']) ||
      (!$_POST[post_owner])) {
         header("Location: topiclist.php");
        
     }
  
     //add the post
     $add_post = "INSERT into forum_posts values ('', '$_POST[topic_id]',
      '$_POST[post_text]', now(), '$_POST[post_owner]')";
     mysqli_query($db,$add_post);
     
     header("Location: showtopic.php?topic_id=$topic_id");
     
  }
  ?>

  