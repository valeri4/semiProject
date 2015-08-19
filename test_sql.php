<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Autocomplete - Remote JSONP datasource</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .ui-autocomplete-loading {
    background: white url("img/ajax-loader.gif") right center no-repeat;
  }
  #city { width: 25em; }
  </style>
<div class="ui-widget">
  <label for="city">Your city: </label>
  <form method="POST" action="users/autoCompleteSearch.php">
  <input id="city" name="q">
  <button type="submit">Send</button>
  </form>
</div>
 
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>
 
 
</body>
</html>