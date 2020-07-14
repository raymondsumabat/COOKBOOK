<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>Login Page</title>
<link rel="stylesheet" href="../css/design-login.css" />
</head>
  <body>
    <form class="box" action="../includes/login1.inc.php" method="post">
    <h1 class="header"> Login to COOKBOOK</h1>
    <input class="enter-username" type="text" name="uname" placeholder="Username" />
    <input class="enter-password" type="password" name="pwd" placeholder="Password" />
    <button type="submit" name="login-submit">Login</button>
    <a href="signup.php">Signup</a>
  </form>
  </body>
</html>
