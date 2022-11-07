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
              
              if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review']) && isset($_POST['store_id']) && isset($_POST['rating'])) {
                  $query = "INSERT INTO reviews (username, food_store_id, content, rating) VALUES ('".$_SESSION['username']."', ".$_POST['store_id'].", '".$_POST['review']."', ".$_POST['rating'].")";
                  if ($db->query($query) === TRUE) {
                    echo '<div>Your review has been successfully uploaded.</div>';
                  } else {
                    echo '<div>Oops, something went wrong, please try again.</div>';
                  }
                }
              } else {
                echo '<p>You are not logged in.</p>';
                echo '<p>Only logged in members may see this page.</p>';
              }
              ?>
            </div>
            <?php include 'components/footer.php';?>  
        </main>
    </body>
</body>
</html>
