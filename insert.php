<?php
include_once("./lib/session.inc.php");
include_once("./lib/inc_func.php");	
include_once "./lib/connection.php" ;

mysql_query("TRUNCATE TABLE `teacher_master`"); 

$subjects_qr = "SELECT DISTINCT `subject` FROM `subject_marks` WHERE 1";
$subjects_rst = mysql_query($subjects_qr);
while($subjects_rw = mysql_fetch_assoc($subjects_rst)){

$college_qr = "SELECT DISTINCT `username` FROM `college_master` WHERE username IN(SELECT DISTINCT `college_code` FROM student_details) ORDER BY username ASC ";
$college_rst = mysql_query($college_qr);
$_SESSION["college_code"] = '';
while($college_rw = mysql_fetch_assoc($college_rst)){
$_SESSION["college_code"] = $college_rw['username'];
if(sub_exist($subjects_rw["subject"])>0){
 
$subjects_qr1 = "SELECT * FROM subject_marks WHERE subject='".$subjects_rw["subject"]."'  ORDER BY paper ASC";
$subjects_rst1 = mysql_query($subjects_qr1);
 while($subjects_rw1 = mysql_fetch_assoc($subjects_rst1)){
             
                $sql_up_qr = "INSERT INTO teacher_master SET ";
		$sql_up_qr .= "college_code='".$_SESSION["college_code"]."',";
		$sql_up_qr .= "paper_id='".$subjects_rw1["paper_id"]."'";


 
		mysql_query($sql_up_qr);
 }}}}
echo "Created";exit();
?>
