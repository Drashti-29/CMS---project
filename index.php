<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Showroom</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="reusables/style.css">
  <style>
  body {
    background-image: url('imgs/download.gif'); /* Replace with your GIF's URL */
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    color: #fff;
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

  <!-- Hero Section -->
  <div class="hero mb-4 text-center py-5 bg-light">
    <h1 class="display-4">Explore Our Collection of Vehicles</h1>
    <p class="lead">Discover a wide variety of vehicle models to suit your style and needs.</p>
  </div> 

  <!-- Product Lines -->
  <div class="container">


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <?php 
        require('reusables/connect.php');
        $query = 'SELECT * FROM productlines';
        $productlines = mysqli_query($connect, $query);
        
        foreach($productlines as $productline){
            echo '
            <div class="col">
              <div class="card h-100 shadow-sm">
                <div class="card-body">
                  <h5 class="card-title">' . htmlspecialchars($productline['productLine']) . '</h5>
                  <p class="card-text">' . htmlspecialchars($productline['textDescription']) . '</p>
                </div>
                <div class="card-footer text-center">
                  <form method="GET" action="getProduct.php">
                    <input type="hidden" name="productLine" value="' . htmlspecialchars($productline['productLine']) . '">
                    <button class="btn btn-sm btn-primary">View Products</button>
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
