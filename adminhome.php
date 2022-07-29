<?php include ('dbconnection.php') ?>
<?php
 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    header('location: firstpg.php');
  }
  
  ?>
<!DOCTYPE html>
<html>
<head> 
    <title>Adminhome</title> 
 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mine.css">
    
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
     
</head>  
 
  
<body id="userhomebg"> 

  <nav class="navbar navbar-expand-md sticky-top navbar-light bg-dark">
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#firstnavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
    <img src="images/logo3.png" class="rounded img-responsive" width="70" height="50">
    <a class="navbar-brand font-weight-bold text-white">SLweightCare</a>
    
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                <a class="nav-link text-warning"><b>Welcome Admin!</b></a> 
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="logout.php" onclick="return confirm ('Are you sure you want to logout?');"><b>Log Out</b></a> 
            </li>
              
        </ul>   
    </div>
</nav><br><br>


<div class="container">  
    <h1 align="center" class="text-white font-weight-bold">Dieticians who are waiting for your approval</h1> <br><br><br> 
</div>
  
<div class="table-responsive"> 
    <table class="table table-bordered table-hover table-dark" style="table-layout: fixed"> 

        <thead class="text-warning"> 
  
        <tr>  
  
            <th>User Id</th>  
            <th>First name</th>
            <th>Last name</th>
            <th>User name</th> 
            <th> E-mail</th>
            <th>Contact no</th>  
            <th>NIC</th>
            <th>Registration no</th>  
            <th>Current working place</th>
            <th>Private practice place</th>
            <th>Working Experience</th> 
             

        </tr>  
        </thead>  
  
        <?php  
        include("dbconnection.php");  
        $view_users_query="SELECT * FROM dieticians WHERE approval=0";

        $run=mysqli_query($db,$view_users_query);  
    
    
        //to fetch the result and store in $row array
        while($row=mysqli_fetch_assoc($run)) 
        {  
            $id=$row['id'];  
            $firstname=$row['firstname'];  
            $lastname=$row['lastname'];
            $username=$row['username'];
            $email=$row['email'];
            $contact=$row['contact'];
            $nic=$row['nic'];
            $regno=$row['regno'];
            $currentplace=$row['currentplace'];
            $ppplace=$row['ppplace'];
            $workingexperience = $row['workingexperience'];
           
  
        ?>  
  
        <tr> 

            <td><?php echo $id;  ?></td>  
            <td><?php echo $firstname;  ?></td>
            <td><?php echo $lastname;  ?></td>
            <td><?php echo $username;  ?></td>  
            <td><?php echo $email;  ?></td>
            <td><?php echo $contact;  ?></td> 
            <td><?php echo $nic;  ?></td>
            <td><?php echo $regno;  ?></td>
            <td><?php echo $currentplace;  ?></td>
            <td><?php echo $ppplace;  ?></td>
            <td><?php echo $workingexperience;  ?></td>
            
   
             <!--parameter (user id) pass to the accept file -->
            <td><a href="accept.php?id=<?php echo $id ?>" onclick="return confirm ('Are you sure you want to accept?. After confirm it, you cannot change it. please double check!');"><button id="accept" class="btn btn-success" name="accept"><b>Accept</b></button></a></td>

            <td><a href="reject.php?id=<?php echo $id ?>" onclick="return confirm ('Are u sure you want to delete? Please double check! Because after confirm it, you cannot change it!');"><button  id="reject" class="btn btn-danger" name="reject"> <b>Reject</b></button></a></td>

        </tr> 

  
        <?php } ?> 

    </table><hr style="height:100px;">



<!-- Feedback Section -->



    <div class="container">  
    <h1 align="center" class="text-warning font-weight-bold"> FEEDBACK OF THE SYSTEM USERS!</h1> <br><br><br> 
</div>

<div class="container">  
<div class="table-responsive"> 
    <table class="table table-bordered table-hover table-success" style="table-layout: fixed"> 

        <thead class="text-primary"> 
  
        <tr class="text" style="font-size: 20px">  
            <th>id</th>
            <th>date</th>
            <th>Username</th>  
            <th>Email</th>
            <th>User type</th> 
            <th> Feedback</th>
            <th>Suggestions</th>  
           
             

        </tr>  
        </thead>  
  
        <?php  
       
        $view_feedback_query="SELECT * FROM feedback ";

        $run1=mysqli_query($db,$view_feedback_query);  
    
    
        //to fetch the result and store in $row array
        
        while($row1=mysqli_fetch_assoc($run1)) 
        {  
            $id=$row1['id'];
            $date=$row1['date'];
            $username=$row1['username'];
            $email=$row1['email'];
            $choose1=$row1['usertype'];
            $choose=$row1['feedback'];
            $suggestions=$row1['suggestions'];
           
  
        ?>  
  
        <tr> 
            
            <td><b><?php echo $id;  ?></b></td>
            <td><b><?php echo $date;  ?></b></td>  
            <td><b><?php echo $username;  ?></b></td>  
            <td><b><?php echo $email;  ?></b></td>
            <td><b><?php echo $choose1;  ?></b></td> 
            <td class="text-danger"><b><?php echo $choose;  ?></b></td>
            <td><b><?php echo $suggestions;  ?></b></td>
            

        </tr> 

  
        <?php } ?> 

    </table>  
      
</div>
</div> <hr style="height:100px;">
      

<div class="fixed-bottom">
<?php include('footer.php') ?>
</div> 
</body>  
  
</html>  



