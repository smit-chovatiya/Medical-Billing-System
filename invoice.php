<?php
require("navbar.php"); 

session_start();
require("connection.php");

//// Retrieve user details from session
$pid = $_SESSION['pid'];
$pname = $_SESSION['pname'];
$bdate = $_SESSION['bdate'];
$cno = $_SESSION['cno'];


// Retrieve selected products and quantities from session
$selected_products = $_SESSION['selected_products'];
$quantities = $_SESSION['quantities'];


// Fetch product details from the database
$product_details = [];
$total_amount = 0;

if (!empty($selected_products)) {
    $product_ids = implode(',', array_map('intval', $selected_products));  // Fetch the all checkbox data in using implode function.
    $query = "SELECT * FROM tblmedicine WHERE mid IN ($product_ids)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) // Fetch data from assocative array key and values.
        {
            $product_id = $row['mid']; // mid row wise.
            $quantity = $quantities[$product_id]; // array store from Quantities in id .
            $row['quantity'] = $quantity;
            $row['total_price'] = $row['price'] * $quantity; // total price=qty*price
            $product_details[] = $row;
            $total_amount += $row['total_price']; // total price calculated.
        }
    }
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
        .bill-hedaer {
            display: flex;
            gap: 1rem;
            background-color: #80D0C7;
            /* height: 50px; */
            align-items: center;
            /* width: 1200px; */
            width: 90%;
            padding: 4px;
        }

        table tr td {
            padding: 10px;
        }


        .contentbox .bill-data{
            padding: 10px;
            margin: 20px;
        }

        .contentbox .bill-data .cust-data{
            padding: 10px;
        }
    </style>
</head>

<body>

    <main>

        <div class="contentbox">
            <div class="bill-data">
            <?php
             $date = date('d-m-Y'); // birthdate date formate changed.
            $orgDate = $bdate;
            $newDate = date("d-m-Y", strtotime($orgDate));  // system(current) Date are displayed. 
            $mid=1;// Medicine id declare.
            ?>


            <div class="bill-hedaer">
                <img src="Images/heart-rate.png" height="50px" width="50px" />
                <h2>Rhythm Medical Store</h2>
            </div>

            <div class="cust-data">
            <p><strong>Name:</strong><?php echo $pname; ?></p>
            <p><strong>Mobile Number:</strong><?php echo $cno; ?></p>
            <p><strong>Birth Date:</strong><?php echo $newDate; ?></p>
            <p><strong>Date Time:</strong><?php echo $date; ?></p>

            </div>
           

            <div class="table">
                <table border="0" class="table-data" style="width: 90%; height: 200px;">
                    <thead>

                        <tr style="background-color: #80D0C7;">
                            <td>Medicine Id</td>
                            <td>Medicine Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total Price</td>
                        </tr>
                    <tbody>
                        <?php foreach ($product_details as $row): ?> 
                            <tr>
                                 <!-- Medicine id incremented by 1. -->
                                <td><?php echo $mid++; ?></td> 
                                <td><?php echo $row['mname']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['quantity']; ?> </td>
                                <td><?php echo $row['total_price']; ?> </td>
                            </tr>


                        <?php endforeach; // End ForEach Loop.
                         ?>

                    </tbody>
                    <tfoot>
                        <tr style="background-color: #80D0C7;">
                            <td colspan="">
                                Total Price:
                            </td>
                            <td colspan="4">
                                ₹<?php echo number_format($total_amount, 2); 
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

</div>
        </div>
    </main>
    <?php require("footer.php"); ?>
</body>

</html>