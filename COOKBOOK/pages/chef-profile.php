<?php
  require "../view/header.php";
  $name = mysqli_real_escape_string($con, $_GET['name']);
 ?>

 <link rel="stylesheet" href="../css/design-profile.css"/>

  <div class="wrapper">
    <h1>&nbsp;&nbsp;<?=$_SESSION['name'];?>'s profile page</h1>
  </div>

  <div class="vertical-menu">
  <a href="#" class="active">Profile Page</a>
  <a href="chef-profile-recipes.php?name=<?=$_SESSION['name'];?>">Recipes</a>
  <a href="chef-profile-history.php?name=<?=$_SESSION['name'];?>">History</a>
  </div>

 <?php
   require "../view/footer.php";
 ?>
