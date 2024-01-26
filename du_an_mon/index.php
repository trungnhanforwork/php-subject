<?php
  // require "config.php";
  // require "classes/database.php";
  // require "classes/user.php";
  require "inc/init.php";
  $conn = require "inc/db.php";
  
  if ($conn) {
    echo "Success Connection ";
    $rs = User::authenticate($conn, "nqtnh", "12345678");
    if($rs) {
      echo "Successfully Login!";
      // tao session
    } else {
      die("Login Failed!!!");
    }
  }
?>