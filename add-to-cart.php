<?php
include "dbconnect.php";
session_start();


if (!isset($_SESSION['uid'])) {
  http_response_code(401);  // not authorized: user not logged in
  exit;
}

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

if (isset($_GET["add"])) {
  $itemId = $_GET["add"];
  if (!empty($_SESSION['cart'])) {
    $firstItemId = array_key_first($_SESSION['cart']);
    $queryFirstItem = "SELECT food_store_id FROM food_items WHERE id=".$firstItemId;
    $queryItem = "SELECT food_store_id FROM food_items WHERE id=".$itemId;
    $res1 = $db->query($queryFirstItem);
    $res2 = $db->query($queryItem);
    $obj1 = $res1->fetch_object();
    $obj2 = $res2->fetch_object();
    if ($obj1->food_store_id != $obj2->food_store_id) {
      http_response_code(400);  // bad request: adding items from multiple stores to shopping cart is not allowed
    } else {
      if (array_key_exists($itemId, $_SESSION['cart'])) {
        $_SESSION['cart'][$itemId]++;
      } else {
        $_SESSION['cart'][$itemId] = 1;
      }
      http_response_code(200);
    }
  } else {
    $_SESSION['cart'][$itemId] = 1;
    http_response_code(200);
  }
}

if (isset($_GET["remove"])) {
  $itemId = $_GET["remove"];
  if (array_key_exists($itemId, $_SESSION['cart'])) {
    $_SESSION['cart'][$itemId]--;
    if ($_SESSION['cart'][$itemId] == 0) {
      unset($_SESSION['cart'][$itemId]);
    }
  }
}
?>