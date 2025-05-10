<?php
 require("navbar.php"); 

session_start();
    require("connection.php");

    $selected_products=[];

    // Handle form submission
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $selected_products=$_POST['medicines'];
        $quantities=$_POST['quantities'];

         // Save selected products and their quantities in the session
        $_SESSION['selected_products'] = $selected_products;
        $_SESSION['quantities'] = $quantities;
    
        header("Location:order.php");
        exit();
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
           table tr td{
            padding: 15px;
        }
        button{
            color: white;
    background-color: #203a78;
    /* font-weight: bold; */
    font-size: 1rem;
    border-radius: 10px;
    padding: 7px;
    margin-left: 350px;
    cursor: pointer;
        }

        button:hover{
            background-color: white;
    color: #203a78;

        }
    </style>
</head>

<body>

    <main>
        <div class="contentbox">
        <div class="product_table" style="  display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top :40px; "
  >
            <form action="user.php" method="post">

            <table border="3" class="table_data" >

            <?php
                require('connection.php');
                
                $sql="select * from tblmedicine";
                $result=mysqli_query($conn,$sql);

                $num=mysqli_num_rows($result);
                if($num>0){
            ?>
                <tr style=" background-color: #80D0C7 ;color:black;">
                    <th>Select</th>
                    <th >Medicine Id</th>
                    <th>Medicine Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                </tr>
                    <?php
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td>
                        <!-- checkbox in assign array from medicines[] and value from get by mis wise for particular this record.  -->
                        <input type="checkbox" name="medicines[]" value="<?php echo $row['mid']; ?>">
                    </td>
                    <td><?php echo $row['mid']; ?> </td>
                    <td><?php echo $row['mname']; ?> </td>
                    <td><?php echo $row['price']; ?> </td>
                     <!-- Quentitites are assign array from quantities[] and mid wise get the data.  -->
                    <td><input type="number" name="quantities[<?php echo $row['mid']; ?>]"  mix="0"></td>

                </tr>
                <?php
                }
            }
                ?>
            </table>
            <button style="margin: 20px;" type="submit">Order Medicine</button>

            </form>


        </div>
           
        </div>

    </main>

    <?php require("footer.php"); ?>
</body>

</html>