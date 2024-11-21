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

  <!-- Hero Section -->
   <div class="hero mb-4">
    <h1 class="display-4">Explore Our Collection of Vehicles</h1>
   </div> 

  <!-- Product Lines -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-3">Product Lines</h1>
        <p class="lead">Explore a wide variety of vehicle models to suit your needs.</p>
      </div>
    </div>
    <!-- above fold picture -->
    <div class="row mb-3">
      <img src="https://images.unsplash.com/photo-1515281239448-2abe329fe5e5?q=80&w=1193&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="wall of model cars" >
      <!-- https://unsplash.com/photos/die-cast-car-collection-on-rack-JBrfoV-BZts -->
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="cats">
      <?php 
        require('reusables/connect.php');
        $query = 'SELECT * FROM productlines';
        $productlines = mysqli_query($connect, $query);
        
        foreach($productlines as $productline){
            echo '
            <div class="col">
              <div class="card h-100">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">' . $productline['productLine'] . '</h5>
                  <p class="card-text">' . $productline['textDescription'] . '</p>
                </div>
                <div class="card-footer text-center">
                  <form method="GET" action="getProduct.php">
                    <input type="hidden" name="productLine" value="' . $productline['productLine'] . '">
                    <button class="btn btn-sm btn-primary">Get Details</button>
                  </form>
                </div>
              </div>
            </div>';
    }
        ?>
      </div>
    </div>
  </body>
  </html>