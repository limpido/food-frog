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
          <div class="container">
          <?php
          include "dbconnect.php";
          if(!isset($_SESSION)) 
            { 
                session_start(); 
            }

          if (!isset($_SESSION['uid'])) {
            echo '<p>You are not logged in.</p>';
            echo '<p>Only logged in members may see this page.</p>';
            exit;
          }
          
          
          if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['uid'])) {
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
              echo '<p>Your shopping cart is empty. Please Order something first.</p>';
            } else {
              $firstItemId = array_key_first($_SESSION['cart']);
              $queryFirstItem = "SELECT food_store_id FROM food_items WHERE id=".$firstItemId;
              $res = $db->query($queryFirstItem);
              $obj = $res->fetch_object();
              $storeId = $obj->food_store_id;

              $collectionPoint = $_POST['collectionPoint'];
              $collectionTime = $_POST['collectionTime'];
              $total = $_POST['total'];

              $insertOrder = "INSERT INTO orders (uid, food_store_id, total, collection_point, collection_time) VALUES (".$_SESSION['uid'].", ".$storeId.", ".$total.", '".$collectionPoint."', '".$collectionTime."')";

              if ($db->query($insertOrder) === TRUE) {
                $order_id = $db->insert_id;

                $content = '<html>
                <head>
                <title>Your Receipt - FoodFrog</title>
                </head>
                <body>
                <p>Thank you for ordering with us. Below is your receipt.</p>
                <p>Please be reminded to collect your food the next day from your chosen collection point at your chosen timing. Thank you.</p>
                <table>
                <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                </tr>';
                

                foreach($_SESSION['cart'] as $itemId=>$quantity) {
                  $queryItem = "SELECT * FROM food_items WHERE id=".$itemId;
                  $res = $db->query($queryItem);
                  $item = $res->fetch_object();
                  $unitPrice = $item->price;
                  $subtotal = $unitPrice * $quantity;
                  $query = "INSERT INTO order_items (order_id, item_id, quantity, subtotal) VALUES (".$order_id.", ".$itemId.", ".$quantity.", ".$subtotal.")";
                  if ($db->query($query) !== TRUE) {
                    echo '<div>Oops, something wrong happens. Please try again later.</div>';
                    exit;
                  }
                  $content .= '<tr>
                              <td>'.$item->name.'</td>
                              <td>$'.$item->price.'</td>
                              <td>'.$quantity.'</td>
                              <td>$'.number_format((float)$subtotal, 2, ".", "").'</td>
                              </tr>';
                }

                $content .= '</table><br>
                             <div>Total: $'.number_format((float)$total, 2, ".", "").'</div>
                             <div>Collection Point: '.$collectionPoint.'</div>
                             <div>Collection Time: '.$collectionTime.'</div>
                             </body>
                             </html>';

                unset($_SESSION['cart']);

                // send receipt to email
                $to = 'f32ee@localhost';
                $subject = "Receipt - FoodFrog";
                $headers = 'From: f31ee@localhost' . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $res = mail($to,$subject,$content,$headers);

                if ($res == true) {
                  echo '<div>Your order is successfully placed. The receipt has been sent to your email address.</div>';
                } else {
                  echo '<div>Oops! Receipt cannot be sent to your email, please try again.</div>';
                }
              } else {
                echo '<div>Oops! Your order cannot be placed, please try again.</div>';
              }

            }
          }

          ?>

          

          </div>
    </body>
  <?php include 'components/footer.php';?>
</body>
</html>