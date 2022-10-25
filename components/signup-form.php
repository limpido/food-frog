<?php
echo '<form id="signupForm" action="signup.php" method="POST">
<h1 class="title">Sign up</h1>

<div class="inputContainer">
  <label for="email">Email</label>  
  <input type="email" name="email" id="email" value="" placeholder="Email" onchange="validateEmail()">
</div>

<div class="inputContainer">
  <label for="username">Username</label>
  <input type="text" name="username" id="username" value="" placeholder="Username" onchange="validateUsername()">
</div>

<div class="inputContainer">
  <label for="pwd">Password</label>
  <input type="password" name="pwd" id="pwd" value="" placeholder="Password" onchange="validatePwd()">
</div>

<div class="inputContainer">
  <label for="cpwd">Confirm Password</label>
  <input type="password" name="cpwd" id="cpwd" value="" placeholder="Confirm Password" onchange="validateConfirmPwd()">
</div>

<div class="submit-container">
  <input type="submit" name="submit" id="submitBtn" value="Sign up">
  <div>Already have an account? <a href="login.php">Log in</a></div>
</div>
</form>'
?>
