<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    'root', //write your password
    'http5225' // write your database name
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }