<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="reusables/css/styles.css"> -->
    <link rel="stylesheet" href="reusables/style.css">
    <style>
  body {
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    color: #fff;
  }
  /* Form container styling */
.container {
    background: #ffff; /* Semi-transparent dark background */
    border-radius: 15px; /* Rounded corners */
    padding: 30px; /* Space inside the form */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); /* Subtle shadow */
    max-width: 600px; /* Limit form width for readability */
    margin: 50px auto; /* Center the form */
    color: #0000; /* White text for contrast */
}
#productCodeHelp {
    color: #0000; /* Change text color to white */
}

/* Input fields styling */
.form-control {
    background: #ffff;
    border: 1px solid #d1d1d0; /* Subtle border */
    color: #0000; /* White text */
    border-radius: 8px; /* Rounded corners */
    padding: 10px; /* Space inside fields */
}

.form-control:focus {
    background: #ffff; /* Highlight on focus */
    outline: none; /* Remove default focus outline */
    border-color: #dadada; /* Highlight border */
    box-shadow: 0 0 10px #007bff; /* Glow effect */
}

/* Labels and help text */
.form-label {
    font-weight: bold;
    color: #007bff; /* Golden text for labels */
}

/* Submit button styling */
.btn-primary {
    background: #007bff; /* Golden button */
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #007bff; /* Slightly darker gold on hover */
    color: #000; /* Contrast text on hover */
    box-shadow: 0 0 15px rgba(255, 175, 0, 0.7); /* Glow effect */
}

/* General alignment for small screens */
@media (max-width: 576px) {
    .container {
        padding: 20px;
    }

    .form-label, .btn-primary {
        font-size: 14px; /* Adjust font size for small screens */
    }
}

</style>
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
            <small id="productCodeHelp" class="form-text text-muted">Format: "S00_0000".</small>
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
            <small id="productNameHelp" class="form-text text-muted">Format: Year Name Numbers.</small>
        </div>
        <div class="mb-3">
            <label for="productLine" class="form-label">Product Line</label>
            <select class="form-control" name="productLine" id="productLine" required>
                <option value="">Please Choose a Product Line from the list below.</option>
                <?php
                    require('reusables/connect.php');
                    $query = 'SELECT * FROM productlines';
                    $productlines = mysqli_query($connect, $query);
                    
                    foreach($productlines as $productline){
                        echo '<option value="'. $productline['productLine'] .'">' . $productline['productLine'] . '</option>';
                    }
                ?>
            </select>
            <small id="productLineHelp" class="form-text text-muted">Please select a Product Line.</small>
        </div>
        <div class="mb-3">
            <label for="productScale" class="form-label">Product Scale</label>
            <input type="text" class="form-control" id="productScale" name="productScale" required>
            <small id="productScaleHelp" class="form-text text-muted">Format: "1:1".</small>
        </div>
        <div class="mb-3">
            <label for="productVendor" class="form-label">Product Vendor</label>
            <input type="text" class="form-control" id="productVendor" name="productVendor" required>
            <small id="productVendoHelp" class="form-text text-muted">Please provide a Product Vendor.</small>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required></textarea>
            <small id="productDescriptionHelp" class="form-text text-muted">Please describe the product.</small>
        </div>
        <div class="mb-3">
            <label for="quantityInStock" class="form-label">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantityInStock" name="quantityInStock" required>
        </div>
        <div class="mb-3">
            <label for="buyPrice" class="form-label">Buy Price</label>
            <input type="number" step="0.01" class="form-control" id="buyPrice" name="buyPrice" required>
            <small id="buyPriceHelp" class="form-text text-muted">The price we are selling the product for.</small>
        </div>
        <div class="mb-3">
            <label for="MSRP" class="form-label">MSRP</label>
            <input type="number" step="0.01" class="form-control" id="MSRP" name="MSRP" required>
            <small id="MSRPHelp" class="form-text text-muted">The price the manufacturer sells it for.</small>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" step="0.01" class="form-control" id="image" name="image">
            <small id="imageUploadHelp" class="form-text text-muted">Please add a link to the image if available.</small>
        </div>
        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
    </form>
</div>
</body>
</html>