<?php

if (isset($_POST['signup-submit'])) {

  require 'connect.php';

  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwordconfirm = $_POST['password-repeat'];

  if (empty($username) || empty($password) || empty($passwordconfirm)) {
    echo '<script type="text/javascript">';
    echo 'alert("Fill in required text fields");';
    echo 'window.location.href = "../pages/signup.php?error=emptyfields&username";';
    echo '</script>';
    exit();
  } else if ($password !== $passwordconfirm) {
    echo '<script type="text/javascript">';
    echo 'alert("Password confirmation does not match");';
    echo 'window.location.href = "../pages/signup.php?error=passwordcheck&username";';
    echo '</script>';
    exit();
  }
  else {

    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../pages/signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Username is already taken");';
        echo 'window.location.href = "../pages/signup.php?error=usernametaken";';
        echo '</script>';
        exit();
      }
      else {

        $sql = "INSERT INTO users (username, password) VALUES (? , ?)";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../pages/signup.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss", $username, $password);
          mysqli_stmt_execute($stmt);
          echo '<script type="text/javascript">';
          echo 'alert("Signed up successfully");';
          echo 'window.location.href = "../pages/signup.php?signup=success";';
          echo '</script>';
          exit();
        }

      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($con);

}
else {
  header("Location: ../pages/signup.php");
  exit();
}
