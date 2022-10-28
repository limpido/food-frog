<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodFrog - Log in</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php include 'components/nav.php';?>

<body>
  <main>
    <div class="container">
  <?php
  include "dbconnect.php";
  if (!isset($_SESSION)) { 
        session_start(); 
  }

  if (isset($_POST['submit']) && $_POST['submit'] == "Login") {
    if (empty($_POST['email']) || empty($_POST['pwd'])) {
      echo "<div class='warning'>All records need to be filled in</div>";
      include "components/login-form.php";
      exit;
    }

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $pwd = md5($pwd);
    $sql = 'select * from users '
             ."where email='$email' "
             ." and password='$pwd'";

    $result = $db->query($sql);
    if ($result->num_rows > 0)
    {
      $user = $result -> fetch_object();
      $_SESSION['uid'] = $user -> id;
      $_SESSION['username'] = $user -> username;
      header('location:' . $_SERVER['PHP_SELF']);
      exit;
    } else {
      echo "<div class='warning'>Wrong email or password, please try again.</div>";
      include "components/login-form.php";
    }
    $db->close();
  }

  if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
    echo '<div>You are logged in as: '.$_SESSION['username'].'</div>';
  } else {
    include "components/login-form.php";
  }

  ?>
  </div>
  <?php include 'components/footer.php';?>
  </main>
</body>
<script type="text/javascript" src="scripts/login.js"></script>
</html>