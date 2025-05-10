
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Billing System</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .contentbox .insert_form table tr td{
        padding: 10px;
        gap: 10px;
}
</style>

<body>

<?php require("navbar.php"); ?>
    
    <main>
        <div class="contentbox">



            <div class="insert_form">
                <center>
                    <form action="insert_data.php"  method="post" style="margin: 120px;">
                        <table>
                            <tr>
                                <td>Medicine ID:</td>
                                <td>
                                    <input type="number" name="mid" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Medicine Name:</td>
                                <td>
                                <input type="text" name="mname" required>
                            </td>
                            </tr>

                            <tr>
                                <td>Medicine Price:</td>
                            <td>
                                <input type="number" name="price" required>
                            </td>
                            </tr>

                            <tr>
                                <th>
                                    <input value="Add Data" name="insert" type="submit">
                                </th>
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