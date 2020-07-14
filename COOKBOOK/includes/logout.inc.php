<?php

if (isset($_POST['logout-submit'])) {

  require 'connect.php';

    session_start();
  	session_destroy();
  	header("location: ../pages/login.php");

}

?>
