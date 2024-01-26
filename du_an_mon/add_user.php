<?php

  // require "config.php";
  // require "classes/database.php";
  // require "classes/user.php";
  
  require "inc/init.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $conn = require "inc/db.php";

    // Connect when having username, password
    $user = new User($username, $password);
    try {
      if ($user->addUser($conn)) {
        echo "Add user successfully!";
      } else {
        echo "Cannot add user";
      }
    } catch (PDOException $e) {
      // Solution added: header to error.php
      echo $e->getMessage();
    }
    
  }
  if(isset($_SESSION['id'])) {
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Store 📕</title>
</head>
<body>
  <h2>Add new user</h2>
  <form name="frmAddUser" action="add_user.php" method="post">
    
    <fieldset>
      <legend>Sign Up</legend>
      <p>
        <label for="username">Username:</label>
        <br>
        <input name="username" id="username" type="text" placeholder="Input your username">
      </p>
      <p>
        <label for="password">Password:</label>
        <br>
        <input name="password" id="password" type="password" placeholder="Input your password">
      </p>
      <p>
        <input type="submit" value="Login">
        <input type="reset" value="Cancel">
      </p>
    </fieldset>
  </form>
</body>
</html>