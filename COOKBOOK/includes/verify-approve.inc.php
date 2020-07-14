<?php

if (isset($_POST['validate-submit'])) {

  require 'connect.php';

  foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_validate/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE users SET validate = '$value' WHERE id = $key;";
			$con->query($sql);
		}
  }
  echo '<script type="text/javascript">';
  echo 'alert("Database Updated!");';
  echo 'window.location.href = "../pages/admin-page-users.php?success=update";';
  echo '</script>';
  exit();
}
