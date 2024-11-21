<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
        require('reusables/connect.php');
        // require('reusables/functions.php');
        $productCode = $_GET['productCode'];
        $productLine = $_GET['productLine'];
        $query = "SELECT * FROM products WHERE productCode = '$productCode'";
        $product = mysqli_query($connect, $query);

        $result = $product -> fetch_assoc();
        echo '<title>' . $result['productName']  . '</title>'
    ?>
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
    echo "<script>console.log('PHP says: $productLine');</script>";
  ?>
  <div class="container">
    <div class="row">
        <?php echo 
        '<div class="row">
              <div class="col">        
                  <form method="GET" action="getProduct.php">
                  <input type="hidden" name="productCode" value="' . $result['productCode'] . '">
                  <input type="hidden" name="productLine" value="' . $result['productLine'] . '">
                  <button class="btn btn-sm btn-primary">Back</button>
                  </form>
              </div>
          </div>'
        ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4"><?php echo $result['productName'] ?></h1>
      </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
            <h3>Product Name:</h3>
                <?php echo '<p>' . $result['productName'] . '</p>'; ?>
            </div>
            <div class="mb-3">
            <h3>Product Line:</h3>
                <?php echo '<p>' . $result['productLine'] . '</p>'; ?>
            </div>
            <div class="mb-3">
            <h3>Product Vendor:</h3>
                <?php echo '<p>' . $result['productVendor'] . '</p>'; ?>
            </div>
            <div class="mb-3">
            <h3>Description:</h3>
                <?php echo '<p>' . $result['productDescription'] . '</p>'; ?>
            </div>
            <div class="mb-3">
            <h3>Price: </h3>
                <?php echo '<p>$' . $result['buyPrice'] . '</p>'; ?>
            </div>
        </div>
        <div class="col-md-6">
          <?php
            if (!$result['image'] == null) {
              echo '<img src="' . $result['image'] . ' alt=' . $result['productName'] . ' height="500" width="600" />';
            } else {
              echo '<img src="https://next-images.123rf.com/index/_next/image/?url=https://assets-cdn.123rf.com/index/static/assets/top-section-bg.jpeg&w=3840&q=75" alt="' . $result['productName'] . 'height="500" width="600" />';
            }
          ?>
        </div>
    </div>
</body>
</html>