<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
  </head>
  <body>
    <?php
      $cookie_name = "nqtnh";
      try {
        if(!isset($_COOKIE[$cookie_name])) {
          echo "Login failed!!!";
        } else {
          echo "Welcome, " .$cookie_name;
        }
      } catch(Exception $e) {
        echo $e->getMessage();
      }
    ?>
  </body>
</html>