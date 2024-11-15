<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
        $productLine = $_GET['productLine'];
        echo "<h1 class='my-4 text-center'>" . htmlspecialchars($productLine) . "</h1>";

        $query = "SELECT * FROM products WHERE productLine = '$productLine'";
        $products = mysqli_query($connect, $query);

        foreach($products as $product){
            echo '<div class="card col-md-4 mb-2">
            <div class="card-body">
                <h5 class="card-title">  Product: ' . $product['productName'] . '</h5>
                <p class="card-text">Vendor: ' . $product['productVendor'] . '</p>
                <p class="card-text">Stock Quantity: ' . $product['quantityInStock'] . '</p>
                <p class="card-text">Price: ' . $product['buyPrice'] . '</p>
                <p class="card-text">MSRP: ' . $product['MSRP'] . '</p>
            </div>
            <div class="card-footer">
                <div class="row">
                <div class="col">        
                    <form method="GET" action="updateProduct.php">
                    <input type="hidden" name="productCode" value="' . $product['productCode'] . '">
                    <input type="hidden" name="productLine" value="' . $product['productLine'] . '">
                    <button class="btn btn-sm btn-primary">Update</button>
                    </form>
                </div>
                <div class="col">
                    <form method="GET" action="deleteProduct.php">
                    <input type="hidden" name="productCode" value="' . $product['productCode'] . '">
                    <input type="hidden" name="productLine" value="' . $product['productLine'] . '">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
                </div>
            </div>
        </div>';
        }
        ?>
      </div>
    </div>
  </body>
  </html>