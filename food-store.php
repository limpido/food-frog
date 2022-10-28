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

    .review-form {
      width: 100%;
      margin: 16px 0 36px 0;
    }

    .review {
      padding: 20px;
      background-color: #6CC4A1;
      margin-bottom: 16px;
      color: #EFFCEF;
    }

    .review-title {
      font-weight: bold;
      margin-bottom: 6px;
    }

    .review-content {

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

            if (!isset($_GET["id"]) || !isset($_GET["section"])) {
              echo '<div>Please specify a food store id and a section.</div>';
              exit;
            }

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
              <div><a href="food-store.php?id=<?=$_GET["id"]?>&section=main">Menu</a>&nbsp;&nbsp;&VerticalLine;&nbsp;&nbsp;<a href="food-store.php?id=<?=$_GET["id"]?>&section=review">Customer Review</a></div>
            </div>

            <?php
            if ($_GET["section"] == "main") {
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
            } else if ($_GET["section"] == "review") {
              echo '<form method="POST" action="upload-review.php" class="review-form">
              <div>Leave a review:</div>
              <label for="rating">Rating (1-5):</label>
              <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <div><textarea name="review" rows="6" cols="80"></textarea></div>
              <input type="hidden" name="store_id" value="'.$_GET['id'].'">
              <div><input type="submit" value="Submit"></div>
              </form>';

              $query = "SELECT * FROM reviews WHERE food_store_id=".$_GET["id"]." ORDER BY created_at DESC";
              $res = $db->query($query);
              for ($i=0; $i < $res->num_rows; $i++) {
                $review = $res->fetch_object();
                echo '<div class="review">
                        <div class="review-title">Anonymous User&nbsp;&nbsp;&VerticalLine;&nbsp;&nbsp;rating: '.$review->rating.'&nbsp;&nbsp;&VerticalLine;&nbsp;&nbsp;'.$review->created_at.'</div>
                        <div class="review-content">'.$review->content.'</div>
                      </div>';
              }
            }
            ?>
          </div>
          <?php include 'components/footer.php';?>

        </main>
    </body>
</body>
<script type="text/javascript" src="scripts/add-to-cart.js"></script>
</html>
