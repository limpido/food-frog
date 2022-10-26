<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
if (isset($_GET["add"])) {
  $itemId = $_GET["add"];
  if (array_key_exists($itemId, $_SESSION['cart'])) {
    $_SESSION['cart'][$itemId]++;
  } else {
    $_SESSION['cart'][$itemId] = 1;
  }
  print_r($_SESSION['cart']);
}
?>