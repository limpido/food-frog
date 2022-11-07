<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Frog</title>
  <link rel="stylesheet" href="style.css">
</head>
    <body>
        <header>
          <?php include 'components/nav.php';?>
        </header>
        <main>
            <div class="container">
              <?php
              include "dbconnect.php";

              if(!isset($_SESSION)) 
              { 
                  session_start(); 
              }

              if (isset($_SESSION['uid'])) {
                $query = "SELECT * FROM users WHERE id=".$_SESSION['uid'];
                $result = $db->query($query);
                $user = $result->fetch_object();

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pwd'])) {
                  $pwd = md5($_POST['pwd']);
                  $updateQuery = "UPDATE users SET `password`='".$pwd."' WHERE id=".$_SESSION['uid'];
                  if ($db->query($updateQuery) === TRUE) {
                    echo '<div>Your password is succesfully updated.</div>';
                  } else {
                    echo '<div>Oops, something went wrong, please try again.</div>';
                  }
                }
                echo '<form action="profile.php" id="profileForm" method="POST">
                  <h1 class="title">Profile</h1>
                  <div class="inputContainer"><label>Username</label>'.$user->username.'</div>
                  <div class="inputContainer"><label>Email</label>'.$user->email.'</div>
                  <div class="inputContainer">
                    <label for="pwd">New Password</label>
                    <input type="password" name="pwd" id="pwd" value="" placeholder="Password" onchange="validatePwd()">
                  </div>
                  <div class="inputContainer">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" name="cpwd" id="cpwd" value="" placeholder="Password" onchange="validateConfirmPwd()">
                  </div>
                  <input type="submit" name="submit" id="submitBtn" value="Update">
                  </form>';
              } else {
                echo '<p>You are not logged in.</p>';
                echo '<p>Only logged in members may see this page.</p>';
              }
              ?>
            </div>
            <?php include 'components/footer.php';?>  
        </main>
</body>
<script type="text/javascript" src="scripts/profile.js"></script>
</html>
