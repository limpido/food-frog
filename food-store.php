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

    .store {
      display: flex;
      align-items: center;
      height: 200px;
      overflow: hidden;
      background-color: #655C56;
      border-radius: 10px;
      color: #EFFCEF;
      margin-bottom: 36px;
    }

    .store-img-container {
      width: 300px;
      margin-right: 70px;
    }

    .store-img {
      width: 100%;
    }

    .store-name {
      font-weight: bold;
      font-size: 32px;
    }

    .cat-title {
      font-weight: semi-bold;
      font-size: 24px;
      margin: 36px 0 16px 0;
    }

    .item-container {
      display: grid;
      grid-template-columns: repeat(3, 30%);
      column-gap: 32px;
      row-gap: 32px;
      
    }

    .item {
      display: flex;
      flex-direction: column;
      border-radius: 10px;
      color: #EFFCEF;
      overflow: hidden;
      align-items: center;
      background-color: #655C56;
    }

    .item-img-container{
      height: 185px;
      width: 100%;
      overflow: hidden;
    }

    .item-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .item-img-container, .item-name, .item-price, .add-btn {
      margin-bottom: 10px;
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

            $queryStore = "SELECT * FROM food_stores WHERE id=".$_GET["id"];
            $resStore = $db->query($queryStore);
            $store = $resStore->fetch_object();
            ?>
            <div class="store">
              <div class="store-img-container"><img class="store-img" src="<?=$store->image?>"></div>
              <div class="store-text">
                <div class="store-name"><?=$store->name?></div>
                <div class="cuisine-type"><?=$store->cuisine_type?></div>
                <div></div>
              </div>
            </div>

            <div>
              <div><a href="food-store.php?id=<?=$_GET["id"]?>">Menu</a>  |  <a>Customer Feedback</a></div>
            </div>

            <?php
            $queryCategory = "SELECT DISTINCT food_category FROM food_items WHERE food_store_id=".$_GET["id"];
            $resCategory = $db->query($queryCategory);
            for ($i=0; $i < $resCategory->num_rows; $i++) {
              $cat = $resCategory->fetch_object();
              $queryItems = "SELECT * FROM food_items WHERE food_store_id=".$_GET["id"]." AND food_category='".$cat->food_category."';";
              $resItems = $db->query($queryItems);
              echo '<div class="cat-container">';
              echo '<div class="cat-title">'.$cat->food_category.'</div>';
              echo '<div class="item-container">';

              for ($j=0; $j < $resItems->num_rows; $j++) {
                $item = $resItems -> fetch_object();
                echo '  <div class="item">';
                echo '    <div class="item-img-container"><img class="item-img" src="'.$item->image.'"></div>';
                echo '    <div class="item-name">'.$item->name.'</div>';
                echo '    <div class="item-price">$'.$item->price.'</div>';
                echo '    <button class="add-btn" id="addBtn_'.$item->id.'" onclick="AddToCart('.$item->id.')">Add</button>';
                echo '  </div>';
              }
              
              echo '</div>';
              echo '</div>';
            }
            ?>

          </div>
    </body>
  <?php include 'components/footer.php';?>
</body>
<script type="text/javascript" src="scripts/add-to-cart.js"></script>
</html>
