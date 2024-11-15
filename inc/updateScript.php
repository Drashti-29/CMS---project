<?php
// Check if the form was submitted
if (isset($_POST['updateScript'])) {
    // Retrieve form data and the productCode from the URL query parameter
    $productCode = $_GET['productCode']; // Assuming productCode is passed in the URL
    $productLine = $_POST['productLine'];
    $productName = $_POST['productName'];
    $productVendor = $_POST['productVendor'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
    // Debugging: Output the retrieved values
  echo "<script>console.log('Product Code: $productCode');</script>";

    // Include the connection to the database
    require('../reusables/connect.php');

    // Debugging: Check the connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connected successfully<br>";
    }


    // Prepare the SQL UPDATE query
    $query = "UPDATE `products` 
              SET 
                `productName` = '" . mysqli_real_escape_string($connect, $productName) . "',
                `productVendor` = '" . mysqli_real_escape_string($connect, $productVendor) . "',
                `quantityInStock` = '" . mysqli_real_escape_string($connect, $quantityInStock) . "',
                `buyPrice` = '" . mysqli_real_escape_string($connect, $buyPrice) . "',
                `MSRP` = '" . mysqli_real_escape_string($connect, $MSRP) . "' 
              WHERE `productCode` = '" . mysqli_real_escape_string($connect, $productCode) . "'";

    // Debugging: Output the SQL query
    echo "SQL Query: " . $query . "<br>";

    // Execute the query
    $result = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($result) {
        // Debugging: Output the retrieved values
        
      echo "<script>console.log('Product Code: $productCode');</script>";
        header("Location: ../getProduct.php?productLine=$productLine");
        exit;
    } else {
        // Display an error message if something went wrong
        echo "Error executing query: " . mysqli_error($connect);
    }
} else {
    // If form wasn't submitted, redirect to the home page
    header("Location: ../index.php");
    exit;
}
?>
