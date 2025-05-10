<?php require("navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #email{
            border-radius: 7px;
            padding: 3px;
        }

    #registerButton{
    color: white;
    /* background-color: dodgerblue; */
    background-color: #203a78;
    font-weight: bold;
    font-size: 1.3rem;
    border-radius: 10px;
    padding: 3px;
    cursor: pointer;

}
#registerButton:hover{
    background-color: white;
    color: #203a78;

}
        </style>
    
</head>

<body>  
    <main>
        <div class="contentbox">

            <div class="item">
                <div class="leftbox">
                    <div class="register_form">
                        
                        <form class="form" action="" method="post">
                            <h2 class="hading">Register</h2><br>

                            <label for="uname">User Name:</label><br>
                            <input id="uname" type="text" name="uname"placeholder="Enter Username"><br><br>

                            <label for="email">Email id:</label><br>
                            <input id="email" type="text" name="email"placeholder="Enter Email id"><br><br>

                            <label for="password">Password:</label><br>
                            <input id="password" type="password" name="password" placeholder="Enter Password"><br>

                            <br>
                            <input id="registerButton" type="submit" name="register" value="Register">
                            <br>
                            
                            <!-- <br>
                            <span>Are you registered? <a href="register.php">Register</a></span> -->

                        </form>
                    </div>
                </div>
                <div class="loginimage">
                    <img src="Images/flat-design-pharmacist-serving-customers.png" />
                </div>
            </div>

        </div>

    </main>

    <?php
        // insert data
        require("connection.php");
        if(isset($_POST['register']))
        {
            $userName=$_POST['uname'];
            $Email=$_POST['email'];
            $Password=$_POST['password'];

            $sql="insert into tblregister values('{$userName}','{$Email}','{$Password}')";
        $result=mysqli_query($conn,$sql);
        header("Location:index.php");
        } 
       
    ?>


    <?php require("footer.php"); ?>
</body>

</html>