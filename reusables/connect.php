<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    'root', //write your password
    'products' // write your database name
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }