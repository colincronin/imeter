<?php
# Require the Connection Credentials, Global Functions, and Table Creation
require 'con.php';
require 'functions.php';

# Grab the data (From a form that will be created in the future)
$d = time();
$t = mt_rand(0,100);
$topic = FALSE;
$newconvo = new newconversation($d,$t,$topic);

# Add the new bill to the database
$newconvo->addConversation();

?>
