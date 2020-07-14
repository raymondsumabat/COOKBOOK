<?php

if (isset($_POST['login-submit'])) {

  require 'connect.php';

  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];

  if (empty($uname) || empty($pwd)) {
    echo '<script type="text/javascript">';
    echo 'alert("Fill in required text fields");';
    echo 'window.location.href = "../pages/login.php?error=emptyfields";';
    echo '</script>';
    exit();
  }
  else {
  $success=false;

$result = mysqli_query($con, "SELECT * FROM users WHERE title='1' AND validate= '1' AND username='$uname' AND password='$pwd'");

while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['id'];
  $title = $row['title'];
	$name = $row['username'];
}

if($success == true)
{
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['title'] = $title;
	$_SESSION['name'] = $name;

	header("location: ../pages/admin-page.php");
}
else {
	$result = mysqli_query($con, "SELECT * FROM users WHERE title ='0' AND validate= '1' AND username='$uname' AND password='$pwd'");

	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['id'];
	$name = $row['username'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['customer_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['name'] = $name;

		header("location: ../pages/index.php");
	}
  else {
    echo '<script type="text/javascript">';
    echo 'alert("Wrong Info or Unvalidated Account!");';
    echo 'window.location.href = "../pages/login.php?error=wronginfo";';
    echo '</script>';
    exit();
  }
}
}
}
else {
  header("location: ../pages/login.php");
  exit();
}
