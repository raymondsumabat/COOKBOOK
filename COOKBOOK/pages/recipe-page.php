<?php
  require "../view/header.php";
  $name = mysqli_real_escape_string($con, $_GET['name']);
 ?>

<link rel="stylesheet" href="../css/design-recipe-page.css"/>

<div class="wrapper">
  <h1>&nbsp;&nbsp;<?php echo $name ?></h1>
</div>

 <?php

 $name = mysqli_real_escape_string($con, $_GET['name']);
 $result = mysqli_query($con, "SELECT * FROM recipes WHERE recipeStatus='1' AND recipeName='$name'");

 while ($row = mysqli_fetch_array($result)) {
   echo "<div class='recipe-box'>
            <div class='recipe-image'>
                <img width='800' height='800' src=../includes/images/".$row['recipeImg']." />
            </div>
            <div class='recipe-name'>
                <h1>".$row['recipeName']."</h1> by <br /> <p>".$row['recipeUser']." </p>
            </div>
            <div class='recipe-summary'>
                <h2>About the dish: </h2> <p>".$row['recipeSum']."</p>
            </div>
            <div class='recipe-diff'>
                <h2>How difficult it is to cook: </h2> <p>".$row['recipeDiff']."</p>
            </div>
            <div class='recipe-ing'>
                <h2>Ingredients needed: </h2> <p><textarea cols='50' rows='20'>".$row['recipeIng']."</textarea></p>
            </div>
            <div class='recipe-time'>
                <h2>Approximate time of cooking: </h2> <p><textarea cols='30' rows='6'>".$row['recipeTime']."</textarea></p>
            </div>
            <div class='recipe-serve'>
                <h2>Serving Size: </h2> <p>".$row['recipeServe']."</p>
            </div>
            <div class='recipe-proc'>
                <h2>How to cook it: </h2><p><textarea cols='150' rows='20'>".$row['recipeProc']."</textarea></p>
            </div>
        </div>";
 }

 ?>


 <?php

   $resultrating = mysqli_query($con, "SELECT * FROM feedback WHERE feedbackAssign='$name'");

   echo "<h1 class='ratings'>Ratings:</h1>";

   while ($row2 = mysqli_fetch_array($resultrating)) {
     echo "<div class='ratings-section'>
             <div class='rating-line'>
               <b>Chef ".$row2['feedbackUser'].":</b> rated the recipe <b>".$row2['feedbackContent']."</b>
               <br />
                             <p>".$row2['feedbackComment']."</p>
             </div>
           </div>";
   }

 ?>


  <form class="recipe-rate" name="recipe-rate" method="post" >
    <h2>Rate this recipe</h2>
    <select name="rating-recipe" id="rating-recipe">
      <option value="Highly Dissatisfied">Highly Dissatisfied</option>
      <option value="Dissatisfied">Dissatisfied</option>
      <option value="Neutral">Neutral</option>
      <option value="Satisfied">Satisfied</option>
      <option value="Highly Satisfied">Highly Satisfied</option>
    </select>
    <br />
    <textarea cols="40" rows="10" name="comment-recipe" placeholder="(Optional)Comment:"></textarea>
    <br />
    <button name="submit-rating" class="submit-rating" type="submit">Submit Rating</button>
  </form>

  <?php

   if(isset($_POST['submit-rating'])) {

     $comment = $_POST['comment-recipe'];
     $rating = $_POST['rating-recipe'];
     $user = $_SESSION['name'];
     $namerecipe = mysqli_real_escape_string($con, $_GET['name']);

     $sql = "INSERT INTO feedback (feedbackContent, feedbackAssign, feedbackUser, feedbackComment) VALUES ('$rating','$namerecipe','$user','$comment')";

     mysqli_query($con, $sql);

     echo '<script type="text/javascript">';
     echo 'alert("Feedback has been submitted!");';
     echo 'window.location.href = "../pages/recipe-page.php?name='.$namerecipe.'";';
     echo '</script>';

   }


  ?>

<?php
  require "../view/footer.php";
?>
