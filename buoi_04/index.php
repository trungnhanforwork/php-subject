<?php

  $nameError = "";
  $emailError = "";
  $websiteError = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      if (empty($_POST["name"])) {
        $nameError = "Name is required!!";
      } else {
        $name = $_POST["name"];
        if (!preg_match("/^[A-Za-z]*$/", $name)) {
          $nameError = "Only contains [A-Za-z]";
        }
      }
    }
    if (empty($_POST["email"])) {
      $emailError = "Email is required!";
    } else {
      $email = $_POST["email"];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailError = "Invalid email format!";
      }
    }

  if (empty($_POST["website"])) {
      $websiteError = "Website is required!";
  } else {
      $website = $_POST["website"];
      // Validate website format
      if (!preg_match("~^(?:https?://)?(?:www\.)?[a-zA-Z0-9.-]+(?:\.[a-zA-Z]{2,})+$~", $website)) {
          $websiteError = "Invalid website format!";
      }
  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="index.php" method="post">
    <fieldset>
      <legend>Fill form</legend>
      <p>
        <label for="name">Name:</label>
        <input name="name" id="name" type="text" placeholder="Input your name">
        <?php echo '<span class="error"> $nameError </span>'?>
      </p>
      <p>
        <label for="email">Email:</label>
        <input name="email" id="email" type="email" placeholder="Input your email">
        <?php echo '<span class="error"> $emailError </span>'?>
      </p>
      <p>
        <label for="website">Website:</label>
        <input name="website" id="website" type="text" placeholder="Input website">
        <?php echo '<span class="error"> $websiteError </span>'?>
      </p>
      <p>
        <input type="submit" value="Submit">
        <input type="reset" value="Cancel">
      </p>
    </fieldset>
  </form>
</body>
</html>