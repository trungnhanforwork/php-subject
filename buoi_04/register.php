<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demo Validation Form</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="container">
    <form class="form"
          id="frmRegForm"
          method="get"
          action=""
          name="frmRegForm">
          <fieldset>
            <legend>Registration Form</legend>
            <div class="row">
              <label for="firstname">First Name </label>
              <input name="firstname" id="firstname" type="text" placeholder="Input your username" minlength="2">
            </div>
            <div class="row">
              <label for="lastname">Last Name:</label>
              <input name="lastname" id="lastname" type="text" placeholder="Input your password">
           </div>
           <div class="row">
              <label for="email">Email:</label>
              <input name="email" id="email" type="email" placeholder="Input your last name">
           </div>
           <div class="row">
              <label for="password">Password:</label>
              <input name="password" id="password" type="password" placeholder="Input your password">
           </div>
           <div class="row">
              <label for="repassword">Retype Password:</label>
              <input name="repassword" id="repassword" type="password" placeholder="Input your password">
           </div>
           <div class="row">
              <label for="password">Comment:</label>
              <textarea name="comment" id="comment"></textarea>
           </div>
           <div class="row">
            <input class="registerbtn" type="submit" value="Register">
           </div>
          </fieldset>
      </form>
  </div>
  <script src="js/script.js"></script>
</body>
</html>