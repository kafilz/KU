<?php
session_start();
unset($_SESSION['stud_id'] );
unset($_SESSION['user'] );
unset($_SESSION['loginType'] );
$_SESSION["editable"] = false;
header('Location:user_auth.php'); exit();

?>
