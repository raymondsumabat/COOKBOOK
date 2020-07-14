<?php
  require "../view/admin-header.php";
  ?>

<div class="wrapper">
<h1>&nbsp;&nbsp;LIST OF RECIPES</h1>
</div>

<link rel="stylesheet" href="../css/design-admin-page.css"/>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Pending')">Pending</button>
  <button class="tablinks" onclick="openCity(event, 'Active')">Active</button>
  <button class="tablinks" onclick="openCity(event, 'Reject')">Selected for Rejection/Deletion</button>
  <button class="tablinks" onclick="openCity(event, 'Archive')">Rejected</button>
</div>

<form name="recipe-form" id="recipe-form" method="post" action="../includes/update-approve.inc.php" enctype="multipart/form-data" novalidate>
<div id="Pending" class="tabcontent">
  <h3>PENDING REQUESTS</h3>
  <table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Image</th>
      <th>Summary</th>
      <th>Difficulty</th>
      <th>Category</th>
      <th>Ingredients</th>
      <th>Time</th>
      <th>Serving Size</th>
      <th>Procedures</th>
      <th>Submitted By:</th>
      <th>Status</th>
      <th>Reject</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $result = mysqli_query($con, "SELECT * FROM recipes where recipeStatus='0'");

    while($row = mysqli_fetch_array($result))
    {
      echo '<tr><td>'.$row["recipeName"].'</td>';
      echo '<td><img src=../includes/images/'.$row["recipeImg"].' /></td>';
      echo '<td>'.$row["recipeSum"].'</td>';
      echo '<td>'.$row["recipeDiff"].'</td>';
      echo '<td>'.$row["recipeCat"].'</td>';
      echo '<td><textarea>'.$row["recipeIng"].'</textarea></td>';
      echo '<td>'.$row["recipeTime"].'</td>';
      echo '<td>'.$row["recipeServe"].'</td>';
      echo '<td><textarea>'.$row["recipeProc"].'</textarea></td>';
      echo '<td>'.$row["recipeUser"].'</td>';
      echo '<td><select name="'.$row['recipeId'].'_recipeStatus">
				<option value="1"'.($row['recipeStatus'] ? 'selected' : '').'>Approve</option>
				<option value="0"'.(!$row['recipeStatus'] ? 'selected' : '').'>Pending</option>
				</select></td>';
      echo '<td><select name="'.$row['recipeId'].'_recipeDelete">
  			<option value="1"'.($row['recipeDelete'] ? 'selected' : '').'>Selected</option>
  			<option value="0"'.(!$row['recipeDelete'] ? 'selected' : '').'>Unselected</option>
  			</select></td>';
    }
    ?>
  </tbody>
</table>
</div>

<div id="Active" class="tabcontent">
  <h3>ACTIVE POSTS</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Summary</th>
        <th>Difficulty</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Time</th>
        <th>Serving Size</th>
        <th>Procedures</th>
        <th>Submitted By:</th>
        <th>Status</th>
        <th>Reject</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $result = mysqli_query($con, "SELECT * FROM recipes where recipeStatus='1'");

      while($row = mysqli_fetch_array($result))
      {
        echo '<tr><td>'.$row["recipeName"].'</td>';
        echo '<td><img src=../includes/images/'.$row["recipeImg"].' /></td>';
        echo '<td>'.$row["recipeSum"].'</td>';
        echo '<td>'.$row["recipeDiff"].'</td>';
        echo '<td>'.$row["recipeCat"].'</td>';
        echo '<td><textarea>'.$row["recipeIng"].'</textarea></td>';
        echo '<td>'.$row["recipeTime"].'</td>';
        echo '<td>'.$row["recipeServe"].'</td>';
        echo '<td><textarea>'.$row["recipeProc"].'</textarea></td>';
        echo '<td>'.$row["recipeUser"].'</td>';
        echo '<td><select name="'.$row['recipeId'].'_recipeStatus">
  				<option value="1"'.($row['recipeStatus'] ? 'selected' : '').'>Approve</option>
  				<option value="0"'.(!$row['recipeStatus'] ? 'selected' : '').'>Pending</option>
  				</select></td>';
        echo '<td><select name="'.$row['recipeId'].'_recipeDelete">
    			<option value="1"'.($row['recipeDelete'] ? 'selected' : '').'>Selected</option>
    			<option value="0"'.(!$row['recipeDelete'] ? 'selected' : '').'>Unselected</option>
    			</select></td>';
      }
      ?>
    </tbody>
  </table>
</div>

<div id="Reject" class="tabcontent">
  <h3>SELECTED POSTS</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Summary</th>
        <th>Difficulty</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Time</th>
        <th>Serving Size</th>
        <th>Procedures</th>
        <th>Submitted By:</th>
        <th>Status</th>
        <th>Reject</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $result = mysqli_query($con, "SELECT * FROM recipes where recipeDelete='1'");

      while($row = mysqli_fetch_array($result))
      {
        echo '<tr><td>'.$row["recipeName"].'</td>';
        echo '<td><img src=../includes/images/'.$row["recipeImg"].' /></td>';
        echo '<td>'.$row["recipeSum"].'</td>';
        echo '<td>'.$row["recipeDiff"].'</td>';
        echo '<td>'.$row["recipeCat"].'</td>';
        echo '<td><textarea>'.$row["recipeIng"].'</textarea></td>';
        echo '<td>'.$row["recipeTime"].'</td>';
        echo '<td>'.$row["recipeServe"].'</td>';
        echo '<td><textarea>'.$row["recipeProc"].'</textarea></td>';
        echo '<td>'.$row["recipeUser"].'</td>';
        echo '<td><select name="'.$row['recipeId'].'_recipeStatus">
  				<option value="1"'.($row['recipeStatus'] ? 'selected' : '').'>Approve</option>
  				<option value="0"'.(!$row['recipeStatus'] ? 'selected' : '').'>Pending</option>
  				</select></td>';
        echo '<td><select name="'.$row['recipeId'].'_recipeDelete">
    			<option value="1"'.($row['recipeDelete'] ? 'selected' : '').'>Selected</option>
    			<option value="0"'.(!$row['recipeDelete'] ? 'selected' : '').'>Unselected</option>
    			</select></td>';
      }
      ?>
    </tbody>
  </table>
</div>

<div id="Archive" class="tabcontent">
  <h3>REJECTED POSTS</h3>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Summary</th>
        <th>Difficulty</th>
        <th>Category</th>
        <th>Ingredients</th>
        <th>Time</th>
        <th>Serving Size</th>
        <th>Procedures</th>
        <th>Submitted By:</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $result = mysqli_query($con, "SELECT * FROM archiverecipes");

      while($row = mysqli_fetch_array($result))
      {
        echo '<tr><td>'.$row["archiveName"].'</td>';
        echo '<td><img src=../includes/images/'.$row["archiveImg"].' /></td>';
        echo '<td>'.$row["archiveSum"].'</td>';
        echo '<td>'.$row["archiveDiff"].'</td>';
        echo '<td>'.$row["archiveCat"].'</td>';
        echo '<td><textarea>'.$row["archiveIng"].'</textarea></td>';
        echo '<td>'.$row["archiveTime"].'</td>';
        echo '<td>'.$row["archiveServe"].'</td>';
        echo '<td><textarea>'.$row["archiveProc"].'</textarea></td>';
        echo '<td>'.$row["archiveUser"].'</td>';
      }
      ?>
    </tbody>
  </table>
</div>

<div class="buttons">
<button type="submit" name="approve-submit">Update Database & Confirm Selected</button>
<button type="submit" name="delete-submit">Reject & Archive Selected</button>
</div>
</form>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
