<?php
            // connection are created..
            require('Connection.php');
            if(isset($_POST['insert']))
            {
                $mid=$_POST['mid'];
                $mname=$_POST['mname'];
                $price=$_POST['price'];
 
            }
            $sql="insert into tblmedicine values({$mid},'{$mname}',{$price})";
            $result=mysqli_query($conn,$sql) or die("Record not inserted");

            header("Location:Admin.php"); // Redirect to the Admin pannel..

?>