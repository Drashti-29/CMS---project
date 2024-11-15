<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
<div class="container">
    <h1 class="my-4">Add New Product</h1>
    <form method="POST" action="inc/addScript.php">
        <div class="mb-3">
            <label for="productCode" class="form-label">Product Code</label>
            <input type="text" class="form-control" id="productCode" name="productCode" required>
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
        </div>
        <div class="mb-3">
            <label for="productLine" class="form-label">Product Line</label>
            <input type="text" class="form-control" id="productLine" name="productLine" required>
        </div>
        <div class="mb-3">
            <label for="productScale" class="form-label">Product Scale</label>
            <input type="text" class="form-control" id="productScale" name="productScale" required>
        </div>
        <div class="mb-3">
            <label for="productVendor" class="form-label">Product Vendor</label>
            <input type="text" class="form-control" id="productVendor" name="productVendor" required>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quantityInStock" class="form-label">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantityInStock" name="quantityInStock" required>
        </div>
        <div class="mb-3">
            <label for="buyPrice" class="form-label">Buy Price</label>
            <input type="number" step="0.01" class="form-control" id="buyPrice" name="buyPrice" required>
        </div>
        <div class="mb-3">
            <label for="MSRP" class="form-label">MSRP</label>
            <input type="number" step="0.01" class="form-control" id="MSRP" name="MSRP" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
    </form>
</div>
</body>
</html>
