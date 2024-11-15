<?php
// Check if the form was submitted
if (isset($_POST['add'])) {
    // Retrieve form data
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];

    // Include the connection to the database
    require('../reusables/connect.php');

    // Debugging: Check the connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully<br>";
    }

    // Prepare the SQL INSERT query
    $query = "INSERT INTO `products` (
                `productCode`, 
                `productName`, 
                `productLine`, 
                `productScale`, 
                `productVendor`, 
                `productDescription`, 
                `quantityInStock`, 
                `buyPrice`, 
                `MSRP`
              ) VALUES (
                '" . mysqli_real_escape_string($connect, $productCode) . "',
                '" . mysqli_real_escape_string($connect, $productName) . "',
                '" . mysqli_real_escape_string($connect, $productLine) . "',
                '" . mysqli_real_escape_string($connect, $productScale) . "',
                '" . mysqli_real_escape_string($connect, $productVendor) . "',
                '" . mysqli_real_escape_string($connect, $productDescription) . "',
                " . (int)$quantityInStock . ",
                " . (float)$buyPrice . ",
                " . (float)$MSRP . "
              )";

    // Debugging: Output the SQL query
    echo "SQL Query: " . $query . "<br>";

    // Execute the query
    if (mysqli_query($connect, $query)) {
        echo "New product added successfully. Redirecting...<br>";
        header("Location: ../getProduct.php?productLine=$productLine");
        exit; // Make sure to exit after redirection
    } else {
        // Display an error message if something went wrong
        echo "Error adding product: " . mysqli_error($connect) . "<br>";
    }
} else {
    // If form wasn't submitted, redirect to the home page
    header("Location: ../index.php");
    exit;
}
?>
