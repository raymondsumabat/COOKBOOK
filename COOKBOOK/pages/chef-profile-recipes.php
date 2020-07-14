<?php
  require "../view/header.php";
  $name = mysqli_real_escape_string($con, $_GET['name']);
 ?>

 <link rel="stylesheet" href="../css/design-profile.css"/>

  <div class="wrapper">
    <h1>&nbsp;&nbsp;<?=$_SESSION['name'];?>'s recipes</h1>
  </div>

  <div class="vertical-menu">
  <a href="#" class="active">Profile Page</a>
  <a href="chef-profile-recipes.php?name=<?=$_SESSION['name'];?>">Recipes</a>
  <a href="chef-profile-history.php?name=<?=$_SESSION['name'];?>">History</a>
  </div>

  <?php

    $result = mysqli_query($con, "SELECT * FROM recipes WHERE recipeUser='$name'");

    while ($row = mysqli_fetch_array($result)) {
      echo "<div class='child-page-listing'>
              <div class='grid-container'>
                 <article class='recipe-listing'>
                 <a href='recipe-page.php?name=".$row['recipeName']."'>
                <p class='recipe-title'>
                ".$row['recipeName']." <br /> submitted by: ".$row['recipeUser']."
                </p>
                 <div class='recipe-image'>
                <img width='300' height='169' src=../includes/images/".$row['recipeImg']." />
                 </div>
                 </a>
                 </article>
                 <h2>About the dish: </h2> ".$row['recipeSum']."
                 <h2>Difficulty Level: </h2> ".$row['recipeDiff']."
              </div>
      </div>";
    }

  ?>

  <?php
    require "../view/footer.php";
  ?>
