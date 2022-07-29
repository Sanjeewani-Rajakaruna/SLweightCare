
<?php  
 
include("dbconnection.php");  

if (isset($_GET['id'])) {

   $id = $_GET['id'];
   $query2 = "DELETE FROM dieticians WHERE id=$id";

   if (mysqli_query($db,$query2)) {

      echo"<p>You delete that record..!!</p><a href='adminhome.php'>Go back</a>";
   }

}
?>






