<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Frog</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      display: flex;
      flex-direction: column;
    }

    .item {
      display: flex;
      align-items: center;
      
      border-radius: 10px;
      color: #EFFCEF;
      overflow: hidden;
      background-color: #655C56;
      height: 150px;
      margin-bottom: 24px;
    }

    .item-img-container{
      height: 100%;
      width: 300px;
      overflow: hidden;
    }

    .item-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .item-name {
      width: 150px;
    }

    .item-text {
      display: flex;
      justify-content: space-around;
      width: 70%;
    }

    .quantity {
      display: flex;
    }

    .count {
      margin: 0 8px;
    }

    .total {
      text-align: right;
      font-weight: bold;
      font-size: 20px;
    }

    .btn-container {
      display: flex;
      justify-content: center;
    }
    
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

            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            
            if (isset($_SESSION['uid']))
            {
              $total = 0;
              
              if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // shopping cart items
                foreach($_SESSION['cart'] as $itemId=>$quantity) {
                  $query = "SELECT * FROM food_items WHERE id=".$itemId;
                  $res = $db->query($query);
                  $item = $res->fetch_object();
                  $subtotal = $item->price * $quantity;
                  $total += $subtotal;
  
                  echo '<div class="item" id="item_'.$item->id.'">';
                  echo '<div class="item-img-container"><img class="item-img" src="'.$item->image.'"></div>';
                  echo '<div class="item-text">';
                  echo '<div class="item-name">'.$item->name.'</div>';
                  echo '<div class="item-price">$'.$item->price.'</div>';
                  echo '<div class="quantity">
                          <button onclick=increaseCount('.$item->id.','.$item->price.')>+</button>
                          <div class="count" id="count_'.$item->id.'">'.$quantity.'</div>
                          <button onclick=decreaseCount('.$item->id.','.$item->price.')>-</button>
                        </div>';
                  echo '<div class="subtotal" id="subtotal_'.$item->id.'">$'.number_format((float)$subtotal, 2, '.', '').'</div>';
                  echo '</div>';
                  echo '</div>';
                }

                echo '<form method="POST" action="place-order.php">';
                // select collection point
                echo '<div class="inputContainer">';
                echo '<label for="collection-point">Choose a collection point:</label>';
                echo '<select name="collectionPoint" id="collectionPoint">';
                $queryCollectionPoint = "SELECT * FROM collection_points;";
                $res = $db->query($queryCollectionPoint);
                for ($i=0; $i < $res->num_rows; $i++) {
                  $collectionPt = $res->fetch_object();                  
                  echo '<option value="'.$collectionPt->name.'">'.$collectionPt->name.'</option>';
                }
                echo '</select>';
                echo '</div>';

                // select collection time
                echo '<div class="inputContainer">';
                echo '<label for="collection-time">Choose a collection time for tomorrow:</label>';
                echo '<select name="collectionTime" id="collectionTime">';
                $queryCollectionTime = "SELECT * FROM collection_time;";
                $res = $db->query($queryCollectionTime);
                for ($i=0; $i < $res->num_rows; $i++) {
                  $collectionTime = $res->fetch_object();                  
                  echo '<option value="'.$collectionTime->time.'">'.$collectionTime->time.'</option>';
                }
                echo '</select>';
                echo '</div>';
                echo '<input type="hidden" name="total" value="'.$total.'" id="hiddenTotal" />';

                // total price
                echo '<div class="total">Total: <span id="total">$'.number_format((float)$total, 2, ".", "").'</span></div>';

                // place order button
                echo '<div class="btn-container"><input type="submit" name="place-order" value="Place Order" id="placeOrderBtn"></div>';
                echo '</form>';
                
              } else {
                echo '<div>Your shopping cart is empty.</div>';
              }
            }
            ?>

            <?php
            if (!isset($_SESSION['uid']))
            {
              echo '<p>You are not logged in.</p>';
              echo '<p>Only logged in members may see this page.</p>';
            }
            ?>
          </div>
          <?php include 'components/footer.php';?>
          </main>
  </body>
<script>
  <?php
  $jsonCart = json_encode($_SESSION['cart']);
  echo "var cart = ". $jsonCart . ";\n";
  ?>
</script>
<script type="text/javascript" src="scripts/shopping-cart.js"></script>
</html>
