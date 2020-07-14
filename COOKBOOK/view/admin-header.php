<?php
  require '../includes/connect.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/design-admin-header.css" />

  </head>
  <body>
    <header>
      <nav>
        <img class="logo" src="../images/cookbooklogo.png" alt="logo" />
        </form>
          <ul class="nav__links">
            <li><a href="../pages/admin-page.php">LIST OF RECIPES</a></li>
            <li><a href="../pages/admin-page-users.php">LIST OF USERS</a></li>
          </ul>
          <div>
            <p class="session-name">
              Admin:&nbsp;&nbsp;<?=$_SESSION['name'];?>
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
