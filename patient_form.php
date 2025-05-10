<?php
     require("navbar.php"); 

    session_start();
    require("connection.php");

        if(isset($_POST['submit'])){
            $pid=$_POST['pid'];
            $pname=$_POST['pname'];
            $bdate=$_POST['bdate'];
            $cno=$_POST['cno'];
            // $pmid=$_POST['pmid'];

            $sql="insert into tblpatient values({$pid},'{$pname}','{$bdate}',{$cno})";
            
            $result=mysqli_query($conn,$sql);

            $_SESSION['pid']=$pid;
            $_SESSION['pname']=$pname;
            $_SESSION['bdate']=$bdate;
            $_SESSION['cno']=$cno;

                header("Location:user.php");
                exit();
                echo "Inserted successfuly.";
            
        }
        
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
<style>
    .contentbox .patient_form tr td{
        padding: 10px;
        gap: 10px;


    }
</style>
</head>

<body>

    <main>
        <div class="contentbox">

            <div class="patient_form">
                <center>
                <form action="patient_form.php" method="post" style="margin: 120px;">
                    <table>
                        <tr>
                            <td>
                                Patient_id:
                            </td>
                            <td>
                                <input type="number" name="pid" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Patient_Name:
                            </td>
                            <td>
                                <input type="text" name="pname" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Patient_Bdate:
                            </td>
                            <td>
                                <input type="date" name="bdate" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Patient_Cno:
                            </td>
                            <td>
                                <input type="number" name="cno" required>
                            </td>
                        </tr>

                    
                        <tr>
                            
                            <td >
                                <input type="submit" name="submit">
                            </td>
                        </tr>
                    </table>
                </form>
                </center>
            </div>

        </div>

    </main>


        <?php require("footer.php"); ?>
</body>

</html>