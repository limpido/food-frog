<?php
echo '<form action="login.php" method="POST" id="loginForm">
<h1 class="title">Login</h1>

<div class="inputContainer">
  <label for="email">Email</label>  
  <input type="email" name="email" id="email" value="" placeholder="Email" onchange="validateEmail()">
</div>

<div class="inputContainer">
  <label for="pwd">Password</label>
  <input type="password" name="pwd" id="pwd" value="" placeholder="Password" onchange="validatePwd()">
</div>

<div class="submit-container">
<input type="submit" name="submit" id="submitBtn" value="Login">
  <div>Do not have an account? <a href="signup.php">Sign up</a></div>
</div>
</form>'
?>