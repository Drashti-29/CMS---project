<?php
    include('reusables/functions.php');

    if(isset($_POST['loginButton'])){
      if($_POST['username'] == "admin" && $_POST['password'] == "password") {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        die();
      } else {
        set_message('Invalid Login Credentials!', 'danger');
        header('Location: login.php');
        die();
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                <h2 class="display-3">Login</h2>
                <?php get_message(); ?>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <!-- hard code username to admin -->
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <!-- hard code password to password -->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="loginButton">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>