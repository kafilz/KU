<?php
ini_set('magic_quotes_gpc','0');
ini_set('error_reporting','E_ALL & ~E_NOTICE');
include_once("./lib/session.inc.php");
include("./lib/class.phpmailer.php");
include_once("./lib/connection.php");
include_once("./lib/inc_func.php");
include_once("./lib/PaginateIt.php");

if(basename($_SERVER['PHP_SELF']) != "index.php" && basename($_SERVER['PHP_SELF']) != "login.php" && basename($_SERVER['PHP_SELF']) != "user_auth.php" &&   basename($_SERVER['PHP_SELF']) != "print.php" && basename($_SERVER['PHP_SELF']) != "student_auth.php")
{
    if ($_SESSION["user"]=='')
    {              	
          header("location:./index.php"); exit();	
    }
}


?>
