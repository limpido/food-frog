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
      margin-right: 20px;
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

    
  </style>
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

            if (isset($_SESSION['uid']))
            {
              $total = 0;
              
              if (isset($_SESSION['cart'])) {
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
              }

              echo '<div class="total">Total: <span id="total">$'.number_format((float)$total, 2, ".", "").'</span></div>';
              
            }
            else
            {
              echo '<p>You are not logged in.</p>';
              echo '<p>Only logged in members may see this page.</p>';
            }

            
            ?>
          </div>
    </body>
  <?php include 'components/footer.php';?>
</body>
<script type="text/javascript" src="scripts/shopping-cart.js"></script>
</html>
