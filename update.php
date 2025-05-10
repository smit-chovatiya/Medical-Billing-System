<?php
    require('connection.php');
    $mid=$_POST['mid'];
    $mname=$_POST['mname'];
    $price=$_POST['price'];
    // $qty=$_POST['qty'];

    $sql="update tblmedicine set mname='{$mname}',price={$price} where mid={$mid}";
    $resulut=mysqli_query($conn,$sql) or die("Not Updated...");

    header("Location:Admin.php")
?>