<?php
  $email = $_POST["email"];
  $password = $_POST["password"];
  if ($password == "12345678") {
    echo "<h1>Hello, {$email} </h1>";
  } else {
    echo "Sai mat khau";
  }
?>