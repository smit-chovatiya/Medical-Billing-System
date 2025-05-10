<?php require("navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>  
    <main>
        <div class="contentbox">

            <div class="item">
                <div class="leftbox">
                    <div class="login_form">
                        
                        <form class="form" action="Login.php" method="post">
                            <h2 class="hading">Login</h2><br>

                            <label for="uname">User Name:</label><br>
                            <input id="uname" type="text" name="uname"placeholder="Enter Username"><br><br>

                            <label for="password">Password:</label><br>
                            <input id="password" type="password" name="password" placeholder="Enter Password"><br>

                            <br>
                            <input id="loginButton" type="submit" name="login" value="Login">
                            <br>
                            
                            <br>
                            <span>Are you registered? <a href="register.php">Register</a></span>

                        </form>
                    </div>
                </div>
                <div class="loginimage">
                    <img src="Images/flat-design-pharmacist-serving-customers.png" />
                </div>
            </div>

        </div>

    </main>

    <?php require("footer.php"); ?>
</body>

</html>