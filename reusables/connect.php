<?php
  $connect = mysqli_connect(
    'sql111.infinityfree.com', 
    'if0_37528306', 
    'Drashti2911', //write your password
    'if0_37528306_http5225' // write your database name
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }