<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <?php 
        include('reusables/functions.php');
        if (!isset($_SESSION['admin'])) {
          echo 
          '<a class="navbar-brand" href="#">Vehicle Showroom</a>';
        } else {
          echo
          '<a class="navbar-brand" href="#">Admin</a>';
        };
      ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <?php 
        if (isset($_SESSION['admin'])) {
          echo 
          '<li class="nav-item">
            <a class="nav-link" href="add.php">Add Product</a>
          </li>';
        };
        ?>
        <li class="nav-item">
        <?php 
        if (!isset($_SESSION['admin'])) {
          echo 
          '<form method="GET" action="login.php" >
              <input type="hidden">
              <button class="btn btn-sm btn-primary nav-link">Login</button>
          </form>
        </li>';
        } else {
          echo
          '<form method="GET" action="logout.php" >
              <input type="hidden">
              <button class="btn btn-sm btn-primary nav-link">Logout</button>
          </form>';
        };
        ?>
        </li>
      </ul>
    </div>
  </div>
</nav>