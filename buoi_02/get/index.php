<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Get</title>
</head>
<body>
  <h1>Sign up</h1>
  <form name="frmGet" action="form_get.php" method="get">
    <fieldset>
      <legend>Input your name and email</legend>
      <p>
        <label for="fullName">Full Name:</label>
        <input name="fullName" id="fullName" type="text" placeholder="Input your full name" required>
      </p>
      <p>
        <label for="email">Email:</label>
        <input name="email" id="email" type="email" placeholder="Input your email">
      </p>
      <p>
        <label for="password">Password:</label>
        <input name="password" id="password" type="password" placeholder="Input your password">
      </p>
      <p>
        <input type="submit">
        <input type="reset" value="Cancel">
      </p>
    </fieldset>
  </form>
</body>
</html>