<?php 
include "./lib/admin-inc.php" ;
ob_start();
$flag = 0;
$err_message = base64_decode($_REQUEST['err_message']);

$_SESSION['user'] = '';
$_SESSION['stud_id'] = '';
	
if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'SUBMIT')
{
	if($_POST['reg_no']=="")
	{
		$err_message="Please enter registration no";
		$flag = 1;
	}
	elseif($_POST['dob']=="")
	{
		$err_message="Please enter date of birth";
		$flag = 1;
	}
	
	        if($flag == 0)
		{
				 
				  $qr = "SELECT * FROM student_details WHERE reg_no='".$_POST['reg_no']."'";
                                  $qr .= " AND date_of_birth='".$_POST['dob']."' AND college_code='".$_COOKIE["USERNAME"]."' ";
                                  //$qr .= " AND prog_cd='".$_POST['coursregistratione_code']."'";
                                  //echo  $qr;exit();
		  		  $rst = mysql_query($qr);
		  		  $num = mysql_num_rows($rst);
		  		  $row = mysql_fetch_assoc($rst);

                                if($num == '0')
                                {
				 $err_message="Data Mismatched!";
		                 $flag = 1;
                                }
				 elseif(user_exists($row['stud_id']) < 1)
                                {
				 $err_message="You have not submitted online examination form yet.";
		                 $flag = 1;
                                }
				                            
				else
				{ 
				 // $_SESSION['userdata'] = $row;
				 $_SESSION['s_name'] = $row["s_name"];
                                 $_SESSION['stud_id'] = $row["stud_id"];
                                 $_SESSION['stud_identity'] = $row["stud_identity"];
				 $_SESSION['user'] = "1";
                                 $_SESSION['loginType'] = "2";
				
                                            echo "<script type='text/javascript'> window.location.href = 'student_home.php'; </script>";exit();	
												  header('Location:student_home.php');exit();
						
				}
				 
			
     }  
 }

	
ob_end_clean();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>

<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />
<script>
function myFunction(val) {
alert(val);
    var x = document.getElementById("enrollment_no");
    x.value = x.value.toUpperCase();
}
</script>
</head>

<body bgcolor="#FFFFFF">
<form id="userhome" name="userhome" method="post" action="student_auth.php">
	

<table width="100%"  border="0" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">


  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr> <td align="center" height="5" style="background-color:#FFFFFF; padding-top:10px; padding-bottom:10px;">
<div class="well well-sm" style="height: 35px; color: #a94442; background-color: #fcf8e3; border-color: #CCCCCC; text-align: center; padding-top:10px;padding-left:2px;padding-right:2px;border:1px solid;">
               <b >Those who have forgotten to take the print of their application or want to take another printout of the same for any reason can do so by providing Student ID and date of birth below.  
                         </b>
            </div>
			  </td>
</tr>
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px; padding-top:10px;">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
<tr> <td align="center" class="bodytext_dark" valign="top" height="25">Students area who already submitted online examination form.</td>
</tr>			
			  
<tr>
  <td height="25" align="center" valign="top" style="padding-bottom:15px;" class="bodytext_dark">3rd Semester 2019</td>
</tr>
<tr>
  <td height="25" align="center" valign="top"><font class="error1">*</font>Fields marked with 
                                (<font class="error">*</font> ) are mandatory</td>
</tr>			  

  <tr>
    
    <td colspan="2" height="20" valign="top" class="error" align="center"><?php echo $err_message;?></td>
  </tr>            		  

<tr>
  <td  align="center" valign="top">
  
  <table width="70%" border="1" cellspacing="2" cellpadding="2" style="border-collapse: collapse;border-color:grey;">
  <tr>
    
    <td colspan="4" height="30" align="center"><strong>Please enter the details.</strong></td>
  </tr>
	
  <tr>
    <td width="15%"><font class="error">*</font>Registration No.</td>
    <td width="42%" align="left"><DIV id="usernamefld"  style="float:left;"><input type="text" name="reg_no" style="width:120px;" id="reg_no" value="<?php echo $_POST['stud_identity'];?>" maxlength="12" /></DIV><DIV id="username"  style="float:left;padding-left:20px;">&nbsp;</DIV></td>

<td width="14%" align="left"><font class="error">*</font> Date of Birth</td>
    <td width="33%"><input name="dob" type="text" id="dob" size="35" value="<?php echo $_POST['dob'];?>" style="width:65px;" onclick="displayCalendar(this,'dd-mm-yyyy',this)" onchange="getusername('username.php?','username');" /> &nbsp;(dd-mm-yyyy format only) </td>
  </tr>
 
  
<tr>
   
    <td colspan="4" height="30" align="center"><input name="Submit" type="submit" class="submit1" value="SUBMIT" style="width:58px; height:22px;" />&nbsp;<input name="back" type="button" class="submit1" value="BACK" style="width:58px; height:22px;" onclick="window.location.href='user_auth.php'"; /></td>
  </tr>
  
  
</table></td>
	 
  </tr>

<tr>
  <td height="80" align="center" valign="middle"></td>
</tr>

           </table>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="bottom">
      <?php include "./lib/admin_bottom.php";?>
	  </td>
  </tr>
</table>
</td>
  </tr>
</table>
</form>
</body>
</html>
<script language="JavaScript" src="./scripts/login.js"></script>
