<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="reusables/css/styles.css">
  <link rel="stylesheet" href="reusables/style.css">

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <?php 
        require('reusables/connect.php');
        $productCode = $_GET['productCode'];
        $productLine = $_GET['productLine'];
        $query = "SELECT * FROM products WHERE productCode = '$productCode'";
        $product = mysqli_query($connect, $query);

        $result = $product -> fetch_assoc();
        
echo "<script>console.log('PHP says: $productLine');</script>";
        ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4"><?php echo $result['productName'] ?></h1>
      </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-5">
      <form method="POST" action="inc/updateScript.php">
        <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="productName"
          value="<?php echo $result['productName']; ?>">
        </div>
        <div class="mb-3">
          <label for="productLine" class="form-label">Product Line</label>
          <!-- <input type="text" class="form-control" id="productLine" name="productLine"
          value=""> -->
          <select class="form-control" name="productLine" id="productLine">
                <option value="<?php echo $result['productLine']; ?>"><?php echo $result['productLine']; ?> -> Default</option>
                <?php
                    $query = 'SELECT * FROM productlines';
                    $productlines = mysqli_query($connect, $query);
                    
                    foreach($productlines as $productline){
                        echo '<option value="'. $productline['productLine'] .'">' . $productline['productLine'] . '</option>';
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
          <label for="productVendor" class="form-label">Product Vendor</label>
          <input type="text" class="form-control" id="productVendor" name="productVendor"
          value="<?php echo $result['productVendor']; ?>">
        </div>
        <div class="mb-3">
          <label for="quantityInStock" class="form-label">Quantity </label>
          <input type="Number" class="form-control" id="quantityInStock" name="quantityInStock"
          value="<?php echo $result['quantityInStock']; ?>">
        </div>
        <div class="mb-3">
          <label for="buyPrice" class="form-label">Price </label>
          <input type="Number" class="form-control" id="buyPrice" name="buyPrice" step=".01"
          value="<?php echo $result['buyPrice']; ?>">
        </div>
        <div class="mb-3">
          <label for="MSRP" class="form-label">MSRP </label>
          <input type="Number" class="form-control" id="MSRP" name="MSRP" step=".01"
          value="<?php echo $result['MSRP']; ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="updateScript">Submit</button>

      </form>
      </div>
    </div>
  </div>
</body>
</html>