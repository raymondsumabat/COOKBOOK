<?php
  require "../view/admin-header.php";
  ?>

<div class="wrapper">
<h1>&nbsp;&nbsp;LIST OF USERS</h1>
</div>

<link rel="stylesheet" href="../css/design-admin-page.css"/>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Unvalidated')">Unvalidated</button>
  <button class="tablinks" onclick="openCity(event, 'Validated')">Validated</button>
</div>

<form name="recipe-form" id="recipe-form" method="post" action="../includes/verify-approve.inc.php" enctype="multipart/form-data" novalidate>
  <div id="Unvalidated" class="tabcontent">
    <h3>Unvalidated Accounts</h3>
<table class="table-users">
<thead>
  <tr>
    <th>Username</th>
    <th>Validated</th>
  </tr>
</thead>
<tbody>
  <?php

  $result = mysqli_query($con, "SELECT * FROM users WHERE title= '0' AND validate='0'");

  while($row = mysqli_fetch_array($result))
  {
    echo '<tr><td>'.$row["username"].'</td>';
    echo '<td><select name="'.$row['id'].'_validate">
      <option value="1"'.($row['validate'] ? 'selected' : '').'>Validated</option>
      <option value="0"'.(!$row['validate'] ? 'selected' : '').'>Unvalidated</option>
      </select></td>';
  }
  ?>
</tbody>
</table>
</div>

  <div id="Validated" class="tabcontent">
    <h3>Validated Accounts</h3>
<table class="table-users">
<thead>
  <tr>
    <th>Username</th>
    <th>Validated</th>
  </tr>
</thead>
<tbody>
  <?php

  $result = mysqli_query($con, "SELECT * FROM users WHERE title= '0' AND validate='1'");

  while($row = mysqli_fetch_array($result))
  {
    echo '<tr><td>'.$row["username"].'</td>';
    echo '<td><select name="'.$row['id'].'_validate">
      <option value="1"'.($row['validate'] ? 'selected' : '').'>Validated</option>
      <option value="0"'.(!$row['validate'] ? 'selected' : '').'>Unvalidated</option>
      </select></td>';
  }
  ?>
</tbody>
</table>
</div>

<div class="buttons">
<button type="submit" name="validate-submit">Validate</button>
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
