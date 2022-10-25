<?php
  session_start();
  
  $old_user = $_SESSION['uid'];
  unset($_SESSION['uid']);
  unset($_SESSION['username']);
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodFrog - Log out</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php include 'components/nav.php';?>
<body>
<h1>Log out</h1>
<?php 
  if (!empty($old_user))
  {
    echo '<div>You have successfully logged out.</div>';
  }
  else
  {
    echo 'You were not logged in, and so have not been logged out.<br />'; 
  }
?>
</body>
<?php include 'components/footer.php';?>
</html>
