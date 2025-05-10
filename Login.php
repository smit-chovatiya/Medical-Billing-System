<?php

// session has start.
session_start();
// connection to database
require('connection.php');

// login data
if (isset($_POST['login'])) {
    $u1 = $_POST['uname'];
    $p1 = $_POST['password'];
    $sql = "select * from tblregister  where username='{$u1}' and password='{$p1}' "; // Fetch the record from login table.
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    // echo $num;
    if ($num == 1) // only one record are exits(Admin,User)
    {
        // Session 
        $_SESSION['username'] = $u1;
        $_SESSION['password'] = $p1;
        
        $record = mysqli_fetch_assoc($result);

        // if ($record['role'] == 'admin')
        //     header("Location:admin.php");
        // else
        //     header("Location:patient_form.php");

        if($record['Username']=="admin" && $record['Password']=="admin")
        {
            header("Location:admin.php");
        }
        else{
            header("Location:patient_form.php");
        }
    }
     else
        header("Location:index.php");
}
?>