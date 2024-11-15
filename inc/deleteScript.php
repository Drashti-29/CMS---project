<?php

if (isset($_POST['deleteProduct'])) {
    $productCode = $_POST['productCode'];
    $productLine = $_POST['productLine'];

    // Include the connection to the database
    require('../reusables/connect.php');

    // SQL query to delete the school by its ID
    $query = "DELETE FROM products WHERE `productCode` = '" . mysqli_real_escape_string($connect, $productCode) . "'";

    // Execute the query
    $result = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($result) {
      // Redirect to the index page or a success page
      header("Location: ../getProduct.php?productLine=$productLine");
    } else {
      // Display an error message if something went wrong
      echo "There was an error deleteing the product: " . mysqli_error($connect);
    }
  }
?>
