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
  <main>
    <div class="container">
  <?php
  include "dbconnect.php";
  if (isset($_POST['submit']) && $_POST['submit'] == "Sign up") {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['cpwd'])) {
      echo "<div class='warning'>All records need to be filled in</div>";
      include "components/signup-form.php";
      exit;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
  
    $pwd = md5($pwd);

    $sql = "SELECT * FROM users WHERE email = '$email'";
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
      echo "<div>Please log in to start ordering.</div>";
    }
  } else {
    include "components/signup-form.php";
  }
  ?>
  <?php include 'components/footer.php';?>
</main>
</body>
<script type="text/javascript" src="scripts/signup.js"></script>
</html>
