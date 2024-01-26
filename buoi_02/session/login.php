<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "init_session.php";
    $message = "";

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ($username == "nqtnh" && $password == "12345678") {
      $_SESSION['id'] = "1";
      $_SESSION['name'] = $username;
    } else {
      $message = "Invalid username or password";
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
  <title>Login</title>
</head>
<body>
  <form name="frmLogin" action="" method="post">
    <div class="msg">
      <?php
        if ($message!="") echo $message;
      ?>
    </div>
    <fieldset>
      <legend>Information Login</legend>
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