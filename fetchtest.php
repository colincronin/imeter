<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';

# Grab a list of the bills in the database
$convo1 = new conversation();
$convo1->fetchAllConversations();

echo '<br><br>';

$convo2 = new conversation();
$today  = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $today;
$dateend = $tomorrow;
$ids = $convo2->fetchDates($datebegin,$dateend);
print_r($ids);

echo '<br><br>';

$convo3 = new conversation();
$lastweek  = mktime(0, 0, 0, date("m"), date("d")-7, date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $lastweek;
$dateend = $tomorrow;
$ids = $convo2->fetchDates($datebegin,$dateend);
print_r($ids);
?>
