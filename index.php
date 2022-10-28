<!DOCTYPE html>
<html lang="en">
<head>
  <title>Food Frog</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      display: grid;
      grid-template-columns: repeat(3, 30%);
      column-gap: 32px;
      row-gap: 32px;
    }

    .link:link, .link:visited {
      color: #EFFCEF;
      text-decoration: none;
    }

    .food-store {
      display: flex;
      flex-direction: column;
      border-radius: 10px;
      background-color: #655C56;
      overflow: hidden;
    }

    .img-container{
      height: 200px;
      width: 100%;
      overflow: hidden;
    }

    .store-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .food-store:hover .store-img {
      transform: scale(1.5);
    }

    .text-container {
      padding: 16px;
      display: flex;
      flex-direction: column;
    }

    .store-title {
      text-align: center;
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

              $query = "SELECT * FROM food_stores;";
              $result = $db->query($query);

              for ($i=0; $i < $result->num_rows; $i++) {
                $store = $result->fetch_object();
                echo '<a class="link" href="food-store.php?id='.$store->id.'&section=main"><div class="food-store">
                <div class="img-container"><img class="store-img" src="' . $store->image. '"></div>
                <div class="text-container">
                <div class="store-title">'.$store->name.'</div>
                <div class="cuisine-type"><span>'.$store->cuisine_type.'</span></div>
                </div>
              </div></a>';
              }
              ?>
            </div>
            <?php include 'components/footer.php';?>  
        </main>
    </body>
</body>
</html>
