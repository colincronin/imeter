<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>iMeter</title>
<meta name="description" content="iMeter - Application for Tracking Self-Mentions">
<meta id="viewport" name="viewport" content="width=device-width; initial-scale=0.5; maximum-scale=2.0;" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!-- AJAX -->
<script>
function newTick() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("tickbutton").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("GET", "addtick.php", true);
  xhttp.send();
}
</script>
<!-- END AJAX -->
</head>
<body>
<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';
?>
<div id="tickbutton">
<img src="imetericon.png" onclick="newTick()">
</div>
</body>
</html>
