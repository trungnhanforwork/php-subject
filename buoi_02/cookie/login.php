<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ($username == "nqtnh" && $password == "12345678") {
      $cookie_name = $username;
      $cookie_value = $password;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
    }
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form name="frmGet" action="" method="post">
    <fieldset>
      <legend>Information Login</legend>
      <p>
        <label for="username">Username:</label>
        <input name="username" id="username" type="text" placeholder="Input your username">
      </p>
      <p>
        <label for="password">Password:</label>
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