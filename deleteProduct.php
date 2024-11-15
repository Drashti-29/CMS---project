<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Product</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="reusables/css/styles.css">
  <link rel="stylesheet" href="reusables/style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php'); ?>
      </div>
    </div>
  </div>

  <?php 
    require('reusables/connect.php');
    $productCode = $_GET['productCode'];
    $productLine = $_GET['productLine'];
    $query = "SELECT * FROM products WHERE productCode = '$productCode'";
    $product = mysqli_query($connect, $query);

    if ($product) {
      $result = $product->fetch_assoc();
  ?>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4">Delete Product: <?php echo $result['productName']; ?></h1>
          <p class="lead">Are you sure you want to delete this product?</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <form method="POST" action="inc/deleteScript.php">
            <input type="hidden" name="productCode" value="<?php echo $productCode; ?>">
            <input type="hidden" name="productLine" value="<?php echo $productLine; ?>">
            <button type="submit" class="btn btn-danger" name="deleteProduct">Delete</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <?php
    } else {
      echo '<p>Product not found.</p>';
    }
  ?>

</body>
</html>
