<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .contentbox .update_form table tr td{
            padding: 10px;
            gap: 10px;
        }
    </style>
</head>

<body>

<?php require("navbar.php"); ?>

    <main>
        <div class="contentbox">



            <div class="update_form">

                <?php
                require('connection.php');
                // display record in the db
                $mid=$_GET['id'];// id get method through retrived..
                
                $sql="select * from tblmedicine where mid={$mid}";
                $result=mysqli_query($conn,$sql);

                            
                    $num = mysqli_num_rows($result);
                    // echo "The number records in the table:$num" . "<br>";


                    // Display the rows returned by the sql query
                    if ($num > 0) {
                        while($row=mysqli_fetch_assoc($result)){
            ?>
                <center>
                <h2 style="margin: 10px;">Update Data</h2>

                    <form action="update.php"  method="post" style="margin: 60px;">
                       
                        <table >
                            <tr>
                                <td>Medicine ID:</td>
                                <td>
                                    <input type="number" name="mid" value="<?php echo $row['mid']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Medicine Name:</td>
                                <td>
                                <input type="text" name="mname" value="<?php echo $row['mname']; ?>">
                            </td>
                            </tr>

                            <tr>
                                <td>Medicine Price:</td>
                            <td>
                                <input type="number" name="price" value="<?php echo $row['price']; ?>">
                            </td>
                            </tr>

                            <tr>
                                <th>
                                    <input value="Update Data" name="update" type="submit">
                                </th>
                            </tr>

                                    
        <?php
                }   
            }
            ?>
                        </table>
                    </form>
                </center>
            </div>

        </div>

    </main>

    <?php require("footer.php"); ?>

</body>

</html>