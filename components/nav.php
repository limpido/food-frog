<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  }
  if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
    echo '<nav>
    <a href="index.php">
    <img src="https://i.pinimg.com/736x/1a/e7/33/1ae733509d7ba91b55b034230249f77b.jpg">
    </a>
    <ul>
        <li><a href="shopping-cart.php">Shopping Cart</a></li>
        <li><a href="orderhistory.html">Order History</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
    </nav>';
    
  } else {
    echo '<nav>
    <a href="index.php">
    <img src="https://i.pinimg.com/736x/1a/e7/33/1ae733509d7ba91b55b034230249f77b.jpg">
    </a>
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
    </ul>
    </nav>';
  }
?>