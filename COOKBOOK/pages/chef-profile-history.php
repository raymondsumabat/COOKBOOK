<?php
  require "../view/header.php";
  $name = mysqli_real_escape_string($con, $_GET['name']);
 ?>

 <link rel="stylesheet" href="../css/design-profile.css"/>

  <div class="wrapper">
    <h1>&nbsp;&nbsp;<?=$_SESSION['name'];?>'s rating history</h1>
  </div>

  <div class="vertical-menu">
  <a href="#" class="active">Profile Page</a>
  <a href="chef-profile-recipes.php?name=<?=$_SESSION['name'];?>">Recipes</a>
  <a href="chef-profile-history.php?name=<?=$_SESSION['name'];?>">Activity History</a>
  </div>

  <?php

    $result = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackUser='$name'");

    echo "<h1 class='ratings'>User ratings history:</h1>";

    while ($row = mysqli_fetch_array($result)) {
      echo "<div class='ratings-section'>
              <div class='rating-line'>
                <b>Chef ".$row['feedbackUser'].":</b> rated the recipe <b>".$row['feedbackAssign']."</b> with <b>".$row['feedbackContent']."</b>
                <br />
                              <p>".$row['feedbackComment']."</p>
              </div>
            </div>";
    }

  ?>

 <?php
   require "../view/footer.php";
 ?>
