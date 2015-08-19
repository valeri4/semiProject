<?php 
include_once 'includes/global.php';
include_once 'includes/auth.php';
include_once 'includes/header.php';
?>
<div class="userSearchContainer">
  <label for="userSearch">Find your friends: </label>
  <input id="userSearch">
</div>
 
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>

<?php
include_once './includes/footer.php';
?>