<?php

if (isset($_POST['approve-submit'])) {

  require 'connect.php';

  foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_recipeStatus/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE recipes SET recipeStatus = '$value' WHERE recipeId = $key;";
			$con->query($sql);
		}
    if(preg_match("/[0-9]+_recipeDelete/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE recipes SET recipeDelete = '$value' WHERE recipeId = $key;";
			$con->query($sql);
		}
  }
  echo '<script type="text/javascript">';
  echo 'alert("Database Updated!");';
  echo 'window.location.href = "../pages/admin-page.php?success=update";';
  echo '</script>';
  exit();
} else if (isset($_POST['delete-submit'])) {

  require 'connect.php';

  $sql = "INSERT INTO archiverecipes (archiveName, archiveSum, archiveImg, archiveDiff, archiveCat, archiveServe, archiveTime, archiveIng, archiveProc, archiveUser)
  SELECT recipeName, recipeSum, recipeImg, recipeDiff, recipeCat, recipeServe, recipeTime, recipeIng, recipeProc, recipeUser FROM recipes WHERE recipeDelete='1'";
  mysqli_query($con, $sql);

  mysqli_query($con, "DELETE FROM recipes where recipeDelete = '1'");

  echo '<script type="text/javascript">';
  echo 'alert("Posts Deleted!");';
  echo 'window.location.href = "../pages/admin-page.php?success=archived";';
  echo '</script>';
  exit();

}
else {
  header("Location: ../pages/admin-page.php?error");
  exit();
}
