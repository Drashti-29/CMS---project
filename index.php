<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Showroom</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Product Lines</h1>
      </div>
    </div>
    <div class="row">
      <?php 
        require('reusables/connect.php');
        $query = 'SELECT * FROM productlines';
        $productlines = mysqli_query($connect, $query);
        
        foreach($productlines as $productline){
            echo '<div class="card col-md-4 mb-2">
            <div class="card-body">
                <h5 class="card-title">' . $productline['productLine'] . '</h5>
                <p class="card-text">' . $productline['textDescription'] . '</p>
            </div>
            <div class="card-footer">
                <div class="row">
                <div class="col">        
                    <form method="GET" action="getProduct.php">
                    <input type="hidden" name="productLine" value="' . $productline['productLine'] . '">
                    <button class="btn btn-sm btn-primary">Get Details</button>
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