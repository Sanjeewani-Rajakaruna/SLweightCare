<?php

include ('dbconnection.php');
      
session_start();

         $username = $_SESSION['username'];
         $sql ="SELECT * FROM bmi where username='$username'";
         $result = mysqli_query($db,$sql);
       
         while ($row = mysqli_fetch_array($result)) { 
 
            $bmi_value[]  = $row['bmi_value']  ;
            $caldate[] = $row['caldate'];
       } 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Chart</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  
  <script src="js/jquery.js"></script>
  <script src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> 
</head>

<body>

  <?php

$username = $_SESSION['username']; //initializing the session

$q = "SELECT username from users where username='$username'";
$run=mysqli_query($db,$q);
$user=mysqli_fetch_assoc($run);

if (isset($user)) {
  include 'header.php';
}else{
  include 'dheader.php';
}

 ?>
  
            <h2 class="page-header mt-5 text-center" ><b>HERE YOUR BMI HISTORY!</b> </h2> <br>
            <a href="bmi.php" class="btn btn-dark btn-lg" name="bmiback"><b>BACK</b></a> <br><hr>
            

            <div class="container" style="width:70%;height:10%;text-align:center">
            <canvas  id="bmi-chart"></canvas>
            </div> 
 




<script type="text/javascript">

      var bmi= document.getElementById("bmi-chart").getContext('2d');
                var myChart = new Chart(bmi, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($caldate); ?>,
                        datasets: [{
                              label: 'BMI Values',
                              backgroundColor: "#008B8B", 

                            data:<?php echo json_encode($bmi_value); ?>,
                        }]
                    },
                    options: {
                        legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: 'black',
                            fontFamily: 'sans-serif',
                            fontSize: 18,
                        }
                    },
 
 
                }
                });
  
</script>



</body>
</html>