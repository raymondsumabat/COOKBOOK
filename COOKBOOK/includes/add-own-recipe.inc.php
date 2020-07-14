<?php

  if (isset($_POST['recipe-submit'])) {

    require 'connect.php';

    $target = "images/".basename($_FILES['recipe-image']['name']);
    $image = $_FILES['recipe-image']['name'];
    $name = $_POST['recipe-name'];
    $summary = $_POST['recipe-summary'];
    $difficulty = $_POST['recipe-difficulty'];
    $category = $_POST['recipe-category'];
    $serve = $_POST['recipe-serve'];
    $time = $_POST['recipe-time'];
    $ingredients = $_POST['recipe-ingredients'];
    $procedures = $_POST['recipe-procedures'];
    $user = $_SESSION['name'];

    if (empty($image) || empty($name) || empty($summary) || empty($difficulty) || empty($category) || empty($serve)
    || empty($time) ||empty($ingredients) || empty($procedures)) {

      echo '<script type="text/javascript">';
      echo 'alert("Please input in required text fields");';
      echo 'window.location.href = "../pages/add-own-recipe.php?error=emptyfields";';
      echo '</script>';
      exit();

    }
    else {

      $sql_c = "SELECT * FROM recipes WHERE recipeName='$name'";
      $res_c = mysqli_query($con, $sql_c);

      if (mysqli_num_rows($res_c) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Recipe name exists! please change the name!");';
        echo 'window.location.href = "../pages/add-own-recipe.php?recipe=exists";';
        echo '</script>';
        exit();
  	} else {

      $sql = "INSERT INTO recipes (recipeName, recipeSum, recipeImg, recipeDiff, recipeCat, recipeServe, recipeTime, recipeIng, recipeProc, recipeUser)
      VALUES ('$name','$summary','$image','$difficulty','$category','$serve','$time','$ingredients','$procedures', '$user')";

      mysqli_query($con, $sql);

      if (move_uploaded_file($_FILES['recipe-image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      } else {
        $msg = "There was a problem uploading the image";
      }

      echo '<script type="text/javascript">';
      echo 'alert("Recipe is pending for approval!");';
      echo 'window.location.href = "../pages/add-own-recipe.php?recipe=added";';
      echo '</script>';
      exit();
    }
  }
}
  else {
    header("Location: ../pages/add-own-recipe.php?recipe=notadded");
    exit();
  }
?>
