<?php
// establish the connection.
    require('connection.php');

    $id=$_GET['id'];// link from table in delete link

    $sql="delete from tblmedicine where mid={$id}"; // id wise record deleted by Admin...
    $result=mysqli_query($conn,$sql) ;
    if(!$result)
    {
        die("Not Deleted!!!").mysqli_error($conn);
    }
    header("Location:Admin.php");  // redirect to the admin pannel...
?>