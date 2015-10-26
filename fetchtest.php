<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';

# Grab a list of the bills in the database
$convo1 = new conversation();
$convo1->fetchAllConversations();

echo '<br><br><h2>Today:</h2><h4>'.date('F j, Y',time()).'</h4>';

$convo2 = new conversation();
$today  = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $today;
$dateend = $tomorrow;
$ids = $convo2->fetchDates($datebegin,$dateend);
print_r($ids);

echo '<br><br><h2>Last 7 days:</h2>';

$convo3 = new conversation();
$lastweek  = mktime(0, 0, 0, date("m"), date("d")-7, date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $lastweek;
$dateend = $tomorrow;
$ids = $convo2->fetchDates($datebegin,$dateend);
print_r($ids);
?>
