<?php require("navbar.php"); ?>
<?php
// session start.
session_start();
require("connection.php");

//check if medicine are selected
if (!isset($_SESSION['selected_products']) || empty($_SESSION['selected_products'])) {
    die("Error:No medicine selected. Please go back and select medicine.") . mysqli_error($conn);
}

//Retrieve selected medicine and quantities form the session
$selected_products = $_SESSION['selected_products'];
$quantities = $_SESSION['quantities'];

// Initialize an empty array for medicine details
$product_detail = [];
$total_amount = 0; // total amount 

if (!empty($selected_products)) {
    // Sanitize the product IDs before using them in the query
    $product_ids = implode(',', array_map('intval', $selected_products)); // Fetch the all checkbox data in using implode function.

    // Prepare and execute the query
    $query = "SELECT * FROM  tblmedicine  WHERE mid IN ($product_ids)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) // Fetch data from assocative array key and values.
        {
            $product_id = $row['mid']; // mid row wise.
            $quantity = $quantities[$product_id]; // array store from Quantities in id .
            $row['quantity'] = $quantity;
            $row['total_price'] = $row['price'] * $quantity; // Total Price is Qty*price
            $product_details[] = $row;
            $total_amount += $row['total_price']; //calculate total amount

        }
    } else {
        die("Error retrieving products:" . mysqli_error($conn));
    }
}

// Handle form submission to procced to invoice
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // redirect to invoice.php
    header("Location:invoice.php");
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
        table tr td {
            padding: 15px;
        }

        button {
            color: white;
            background-color: #203a78;
            /* font-weight: bold; */
            font-size: 1rem;
            border-radius: 10px;
            padding: 7px;
            margin-left: 350px;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            /* color: dodgerblue; */
            color: #203a78;

        }
    </style>
</head>

<body>
    <!-- <h2>Home Page</h2> -->
    <main>
        <div class="contentbox">
            <div class="product_table" style="  display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top :40px; ">
                <form action="order.php" method="post">

                    <table border="3" class="table_data">
                        <thead>
                            <tr style=" background-color: #80D0C7 ;color:black;">
                                <th>Medicine Id</th>
                                <th>Medicine Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total_price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($product_details as $row): ?>
                                <tr>

                                    <td><?php echo $row['mid']; ?> </td>
                                    <td><?php echo $row['mname']; ?> </td>
                                    <td><?php echo $row['price']; ?> </td>
                                    <td><?php echo $row['quantity']; ?> </td>
                                    <td><?php echo $row['total_price']; ?> </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button style="margin: 20px;" type="submit">Generate Invoice</button>

                </form>


            </div>

        </div>

    </main>

    <?php require("footer.php"); ?>
</body>

</html>