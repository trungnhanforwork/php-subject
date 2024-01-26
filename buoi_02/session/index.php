<?php
  require "init_session.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <h2>You access this website 
      <?php echo $_SESSION['counter']?>
      time(s).
    </h2>
    <?php if (isset($_SESSION['name'])):?>
      <h3>
        Welcome,
        <?php echo $_SESSION["name"]; ?>
      </h3>
      Click here to <a href="logout.php">Logout</a>
    <?php else: ?>
      <h3>Please login first!!</h3>
      Click here to <a href="login.php">Login</a>
    <?php endif; ?>
  </body>
</html>