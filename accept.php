
<?php  
 
include("dbconnection.php");  

//check whether the parameter is pass or not
if (isset($_GET['id'])) {

   $id = $_GET['id'];
   $query1 = "UPDATE dieticians SET approval = 1 WHERE id = '$id' LIMIT 1";

   if (mysqli_query($db,$query1)==1) {
    
      echo"<p>The approval is success..!!</p><a href='adminhome.php'>Go back</a>";
   }
   
}
?>



