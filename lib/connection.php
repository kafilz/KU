<?php
//FOR LOCAL
$DB_NAME="ku-sem3-2019";
$DB_HOST="localhost";
$DB_USER="root";
$DB_PASS="welkome";

//FOR REMOTE
/*
$DB_NAME="knu";
$DB_HOST="35.161.92.27";
$DB_USER="root";
$DB_PASS="ramgro";
*/


//if($myDB = mysql_pconnect($DB_HOST,$DB_USER,$DB_PASS))
$myDB = mysql_pconnect($DB_HOST,$DB_USER,$DB_PASS );
if (!$myDB) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db($DB_NAME,$myDB);
if (!$db_selected) {
    die ('Can\'t use : '. $DB_NAME   . mysql_error());
}




?>
