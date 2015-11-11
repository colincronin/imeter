<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';

$convo1 = new conversation();

$testday  = mktime(0, 0, 0, 10, 15, 2015);
$testtopic = 'test';
$convo1->addTick($testday, $testtopic);

#Change this code in production:
$convo1->fetchAllConversations();
echo '
<br>
<img src="imetericon.png" onclick="newTick()">
';
?>
