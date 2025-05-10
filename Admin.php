<?php require("navbar.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        a {
            text-decoration: none;
        }

        table tr td {
            padding: 15px;
        }

        button {

            padding: 7px;
            margin-left: 350px;

            color: azure;
            background-color: #203a78;
            height: 50px;
            width: 150px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            color: #203a78;

        }
    </style>
</head>

<body>

    <main>
        <div class="contentbox">



            <a href="logout.php"><input type="submit" value="Logout" name="logout" style="margin-left:85rem; margin-top:10px; color:azure; background-color:#203a78; height:35px;width:100px; font-size:15px; border:0; border-radius:5px; cursor:pointer;"></a>

            <form action="insert_form.php" method="post">


                <div class="product_table" style="  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding-top :40px; ">
                    <button name="insert" id="inser_data">INSERT DATA</button>

                    <table border="3">

                        <?php
                        require('connection.php');

                        $u1 = $_SESSION['username'];
                        // $p1=$_SESSION['password'];
                        if ($u1 == true) {
                        } else {
                            header("Location:index.php");
                        }
                        $sql = "select * from tblmedicine";
                        $result = mysqli_query($conn, $sql);

                        $num = mysqli_num_rows($result);
                        if ($num > 0) {
                        ?>
                            <div class="table_heading" style="padding: 10px;">
                                <tr style=" background-color: #80D0C7 ;color:black;">
                                    <div class="table_heding_data" style="padding: 6px;">
                                        <th>Medicine Id</th>
                                        <th>Medicine Name</th>
                                        <th>Price(₹)</th>
                                        <th>Operation</th>
                                    </div>

                                </tr>
                            </div>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['mid']; ?> </td>
                                    <td><?php echo $row['mname']; ?> </td>
                                    <td><?php echo $row['price']; ?> </td>
                                    <td>
                                        <a href="edit_form.php? id=<?php echo $row['mid']; ?>"> <img src="Images/pen.png" height="30px" width="30px" style="margin:3px;"></a> &nbsp; &nbsp;
                                        <a href="delete.php? id=<?php echo $row['mid']; ?>"><img src="Images/bin.png" height="30px" width="30px" style="margin:3px;"></a>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </table>

            </form>

        </div>

        </div>

    </main>


    <?php require("footer.php"); ?>
</body>

</html>