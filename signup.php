<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php include 'components/nav.php';?>
<body>
  <?php
  include "dbconnect.php";
  // var_dump($_POST);
  if (isset($_POST['submit']) && $_POST['submit'] == "Sign up") {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['cpwd'])) {
      echo "<div class='warning'>All records to be filled in</div>";
      include "components/signup-form.php";
      exit;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
  
    $pwd = md5($pwd);

    $sql = "SELECT FROM users WHERE email = '$email'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      echo "<div class='warning'>This email address has been registered already. Try another one.</div>";
      include "components/signup-form.php";
      exit;
    }
  
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$pwd')";
    $result = $db->query($sql);
  
    if (!$result) {
      echo "<div class='warning'>Oops! Something went wrong, please try again.</div>";
      include "components/signup-form.php";
    }
    else {
      echo "<div>Welcome to FoodFrog, ". $username . "! You are now registered.</div>";
    }
  } else {
    include "components/signup-form.php";
  }
  ?>
    <form id="signupForm" action="register.php" autocomplete="false">
      <h1 class="title">Sign up</h1>

      <div class="inputContainer">
        <label for="email">Email</label>  
        <input type="email" name="email" id="email" value="" placeholder="Email" onchange="validateEmail()">
      </div>

      <div class="inputContainer">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="" placeholder="Username" onchange="validateUsername()">
      </div>

      <div class="inputContainer">
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd" value="" placeholder="Password" onchange="validatePwd()">
      </div>

      <div class="inputContainer">
        <label for="cpwd">Confirm Password</label>
        <input type="password" name="cpwd" id="cpwd" value="" placeholder="Confirm Password" onchange="validatecpwd()">
      </div>

      <div class="submit-container">
        <input type="submit" name="submit" id="submitBtn" value="Sign up">
        <div>Already have an account? <a href="login.php">Log in</a></div>
      </div>
    </form>
  <?php include 'components/footer.php';?>

</body>
<script type="text/javascript" src="scripts/signup.js"></script>
</html>
