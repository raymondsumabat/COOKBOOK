<?php
  require '../includes/connect.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/design-header.css" />

  </head>
  <body>
    <header>
      <nav>
        <img class="logo" src="../images/cookbooklogo.png" alt="logo" />
        <form class="search" method="post" action="../pages/search-results.php">
          <p class="search-text">
            Search for recipe:
          <input type="text" name="search-recipe" placeholder="Recipe Name" />
          <button type="submit" name="search-submit">Search</button>
        </p>
        </form>
          <ul class="nav__links">
            <li><a href="../pages/index.php">HOME</a></li>
            <li><a href="../pages/baking.php">BAKING</a></li>
            <li><a href="../pages/frying.php">FRYING</a></li>
          </ul>
          <div class="add-own-recipe">
            <form action="../pages/add-own-recipe.php" method="post">
              <button class="recipe-submit" type="submit">Add own recipe</button>
            </form>
          </div>
          <div>
            <p class="session-name">
              Chef:&nbsp;&nbsp;<a class="profile-link" href='chef-profile.php?name=<?=$_SESSION['name'];?>'><?=$_SESSION['name'];?></a>
            </p>
          </div>
          <div class="logout">
            <form action="../includes/logout.inc.php" method="post">
              <button name="logout-submit" type="submit">Logout</button>
            </form>
          </div>
      </nav>
    </header>
  </body>
</html>
