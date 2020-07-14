<?php
  require "../view/header.php";
 ?>

<link rel="stylesheet" href="../css/design-baking.css"/>

 <div class="wrapper">
   <h1>&nbsp;&nbsp;BAKING RECIPES</h1>
 </div>

 <?php

 $result = mysqli_query($con, "SELECT * FROM recipes WHERE recipeCat='Baking' AND recipeStatus='1'");

 while ($row = mysqli_fetch_array($result)) {
   echo "<div class='child-page-listing'>
           <div class='grid-container'>
              <article class='recipe-listing'>
              <a href='recipe-page-baking.php?name=".$row['recipeName']."'>
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
