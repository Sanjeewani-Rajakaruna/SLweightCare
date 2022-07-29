<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "slweightcare";

// create connection to the database
$db = mysqli_connect($servername, $username, $password, $dbname);


//checking whether the connection is successfull or not

if (!$db) {
	die("Something wrong while connecting to the database" . mysqli_connect_error());
}

?>