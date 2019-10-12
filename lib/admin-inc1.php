<?php
ini_set('magic_quotes_gpc','0');
ini_set('error_reporting','E_ALL & ~E_NOTICE');

include_once("../lib/session.inc.php");

include_once("../lib/connection.php");
include_once("../lib/inc_func.php");
include_once("../lib/PaginateIt.php");

if(basename($_SERVER['PHP_SELF']) != "login.php" )
 {       	
		if($_SESSION["college_code"]=='') {         
			header("location:./index.php"); exit();
		}
	   
        
}


?>
