<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Frog</title>
  <link rel="stylesheet" href="style.css">
  <style>
    
  </style>
</head>
    <body>
        <header>
          <?php include 'components/nav.php';?>
        </header>
        <main>
        <div class="container">
        <?php
        include "dbconnect.php";

        if (!isset($_SESSION)) 
        { 
            session_start(); 
        }

        if (isset($_SESSION['uid'])) {
          $query = "SELECT * FROM orders WHERE uid=".$_SESSION['uid'];
          $res = $db->query($query);

          if ($res->num_rows > 0) {
            echo '<table>
            <tr>
              <th>Order Date</th>
              <th>Food Store</th>
              <th>Total</th>
              <th>Collection Point</th>
              <th>Collection Time</th>
            </tr>';

            for ($i=0; $i < $res->num_rows; $i++) {
              $order = $res->fetch_object();
              $queryStore = "SELECT * FROM food_stores WHERE id=".$order->food_store_id;
              $resStore = $db->query($queryStore);
              $store = $resStore->fetch_object();
  
              echo '<tr>
              <td>'.$order->created_at.'</td>
              <td>'.$store->name.'</td>
              <td>$'.$order->total.'</td>
              <td>'.$order->collection_point.'</td>
              <td>'.$order->collection_time.'</td>
            </tr>';
            }

            echo '</table>';
          } else {
            echo '<div>You have no past orders.</div>';
          }
        } else {
          echo '<p>You are not logged in.</p>';
          echo '<p>Only logged in members may see this page.</p>';
        }
        ?>

        <!-- <table>
          <tr>
            <th>Order Date</th>
            <th>Food Store</th>
            <th>Total</th>
            <th>Collection Point</th>
            <th>Collection Time</th>
          </tr>

        </table> -->
        </div>
        <?php include 'components/footer.php';?>
      </main>
    </body>
</body>
</html>
