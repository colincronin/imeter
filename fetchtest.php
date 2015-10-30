<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';

# Grab a list of the bills in the database
$convo1 = new conversation();
$convo1->fetchAllConversations();

echo '<br><br><h2>Today:</h2><h4>'.date('F j, Y',time()).'</h4>';

$today  = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $today;
$dateend = $tomorrow;
$ids = $convo1->fetchDates($datebegin,$dateend);
print_r($ids);

echo '<br><br><h2>Last 7 days:</h2>';

$lastweek  = mktime(0, 0, 0, date("m"), date("d")-7, date("Y"));
$tomorrow  = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
$datebegin = $lastweek;
$dateend = $tomorrow;
$ids2 = $convo1->fetchDates($datebegin,$dateend);
print_r($ids2);

echo '<br><br><h2>October 15, 2015:</h2>';
$testday  = mktime(0, 0, 0, 10, 15, 2015);
$testtopic = 'test';
$convo1->addTick($testday, $testtopic);
$ids3 = $convo1->fetchDates($testday);
print_r($ids3);
?>
