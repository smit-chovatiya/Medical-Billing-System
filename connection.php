<?php
//Connecting to the Database.
$servername="localhost";
$username="root";
$password="";
$database="medical_billing_system";


// create a connection
$conn=mysqli_connect($servername,$username,$password,$database);

//die if connection was not successful.
if(!$conn)
    die("Sorry we failed to connect:".mysqli_connect_error($conn));


?>