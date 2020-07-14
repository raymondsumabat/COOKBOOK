<?php
  require "../view/header.php";
 ?>

 <!DOCTYPE html>
 <html>
<head>
  <link rel="stylesheet" href="../css/design-addownrecipe.css" />
</head>
<body>
  <h1>&nbsp;&nbsp;ADD YOUR OWN RECIPE</h1>
  <div class="box">
    <form name="recipe-form" method="post" action="../includes/add-own-recipe.inc.php" enctype="multipart/form-data">
      <input type="file" name="recipe-image" />
      <input type="text" name="recipe-name" placeholder="Recipe Name"/>
      <textarea name="recipe-summary" cols="20" rows="2" placeholder="Recipe Introduction "></textarea>
      <select name="recipe-difficulty" id="recipe-difficulty">
          <option value="Beginner">Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
    </select>
    <select name="recipe-category" id="recipe-category">
        <option value="Baking">Baking</option>
        <option value="Frying">Frying</option>
  </select>
      <input type="text" name="recipe-serve" placeholder="Serving how many"/>
      <input type="text" name="recipe-time" placeholder="Prep Time & Cooking Time" />
      <textarea name="recipe-ingredients" cols="40" rows="4" placeholder="Recipe Ingredients "></textarea>
      <textarea name="recipe-procedures" cols="40" rows="4" placeholder="Recipe Procedures "></textarea>
      <button type="submit" name="recipe-submit">Submit</button>
      <button type="reset">Reset</button>
    </form>
  </div>
</body>
 </html>


 <!-- <script>
 function myFunction() {
   alert("Recipe has been submitted for approval");
 }
 </script> -->
