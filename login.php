<?php
/****************************************************/
// Filename: login.php
// Created: Kafil Siddiqui
/****************************************************/
include "./lib/admin-inc.php" ;
session_destroy();
session_start();
$_SESSION["college"] = false;
$_SESSION["editable"] = false;
ob_start();
/**
 * CALL FUNCTION  login for user authentication
 */
login($_POST["username"], $_POST["password"]);

ob_end_clean();
?>





