<?php include "./lib/connection.php" ;
session_start();

if($_REQUEST['checking'] == 'true')
{
  

	$user_sql = "SELECT s_name FROM student_details WHERE reg_no='".$_REQUEST['reg_no']."' AND college_code='".$_COOKIE["USERNAME"]."' ";


       $user_sql .= " AND date_of_birth='".$_REQUEST['dob']."'";
      //echo  $user_sql;exit();
	$user_rst = mysql_query($user_sql);
	 $num = mysql_num_rows($user_rst);
	$row = @mysql_fetch_array($user_rst);
	 if($num != '0')
     {	
       echo $row["s_name"];
	 }

	 exit();
}
?>

