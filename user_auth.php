<?php 
/****************************************************/
// Filename: user_auth.php
// Created: Kafil Siddiqui
/****************************************************/
include "./lib/admin-inc.php" ;
ob_start();
$flag = 0;
$err_message = base64_decode($_REQUEST['err_message']);

$_SESSION['user'] = '';
$_SESSION['stud_id'] = '';
	
if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'SUBMIT')
{
//echo "Services is not available now.";exit();
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
			 
		$qr = "SELECT * FROM student_details WHERE reg_no='".$_POST['reg_no']."' ";
		$qr .= " AND  date_of_birth='".$_POST['dob']."' AND college_code='".$_COOKIE["USERNAME"]."' ";
		//echo $qr ;exit(); 
		$rst = mysql_query($qr);
		$num = mysql_num_rows($rst);
		$row = mysql_fetch_assoc($rst);

	if($num == '0')
	{
		$err_message="Data Mismatched!";
		$flag = 1;
	}
	elseif(user_exists($row['stud_id']) > 0)
	{
		$err_message='<DIV style="padding-left:20px;">You have already submitted your examination form.</DIV>';
		$flag = 1;
	}

	else
	{ 
		/*if(date("d")<12 && date("m")=="09")
		{

			$_SESSION['stud_id'] = $row["stud_id"];
			$_SESSION['user'] = "1";
			$_SESSION['loginType'] = "1";

			echo "<script type='text/javascript'> window.location.href = 'user_exam_form.php'; </script>";
			exit();

		}
		else
		{
			$err_message='<DIV style="padding-left:20px;">3rd semester 2019 form submission closed now.</DIV>';
			$flag = 1;										 

		}	*/
		
			$_SESSION['stud_id'] = $row["stud_id"];
			$_SESSION['user'] = "1";
			$_SESSION['loginType'] = "1";

			echo "<script type='text/javascript'> window.location.href = 'user_exam_form.php'; </script>";
			exit();


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
<!--<script>
function myFunction(val) {
alert(val);
    var x = document.getElementById("enrollment_no");
    x.value = x.value.toUpperCase();
}
</script>-->
</head>

<body bgcolor="#FFFFFF">
<form id="userhome" name="userhome" method="post" action="user_auth.php">
	

<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
 <div class="well well-sm" style="height: 25px; color: #a94442; background-color: #fcf8e3; border-color: #CCCCCC; text-align: center; padding-top:10px;padding-left:2px;padding-right:2px;border:1px solid; margin-top:10px;">
                <marquee><b >The portal of "On-line Examination Form Submission System" will be available from  <SPAN style="font-size: 14px;color:#199f19;">XX/XX/2019 to XX/XX/2019</SPAN> without late fine and to <SPAN style="font-size: 14px;color:#199f19;">XX/XX/2019 </SPAN>with late fine. for all 3rd semester students.
                         </b></marquee>
            </div>

      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px; padding-top:15px;">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
			

			  <tr> <td align="center" class="bodytext_dark1" valign="top" height="20">
UNDER GRADUATE EXAMINATION FORM SUBMISSION PORTAL<span > 3rd SEMESTER EXAMINATION 2019</span>
			  </td></tr>

<tr>
  <td  align="center" valign="top">
  
  <table width="99%" border="0" cellspacing="2" cellpadding="2">
  
	<tr>
    
    
	 <td width="67%" valign="top">
	 
	 <fieldset style="border:1px solid #867f7f;border-radius:15px; background:#F0F8FC;">
 
<table width="100%" border="0" cellspacing="2" cellpadding="2" height="490">
  
 <tr>
						<td width="100%" class="bodytextdark11" align="center" valign="top"> <div style="border:1px solid #867f7f;border-radius:12px; background:#CCCCCC; height:30px; padding-top:7px;padding-left:5px;">How to use this portal</div></td>
						</tr>
						
						 <tr>
						<td width="100%"  align="center" valign="top"> 
						<div style=" height: 400px; overflow: auto; padding: 1px">
						<table width="100%" border="0" cellspacing="2" cellpadding="2">
						<tr>
						<td width="100%"  align="left" valign="top">
						Instructions for Using Portal For Filling-Up Examination-Forms for 3rd semester 2019
						<BR> <BR><STRONG>Instructions Overview:</STRONG>
						<BR> 
						<UL>
						<LI>
						Authenticate yourself to the System.
                                                </LI>
						<LI>
						Filling-Up of Examination Form.
                                                </LI>
						<LI>
						Take printout of your submitted Form.
                                                </LI>
						
						</UL>
						<BR> <BR>
						<STRONG>Instructions in Detail:</STRONG>
  						 
						<BR> 
                                              <ul>
						<h4 style="background-color:#FFFFFF;">Step 1: Authentication: For the Candidates whose DOB is already registered with us .</h4>
						    <ul>
							<li>Enter Your Registration No.</li>
							<li>Enter Your Date Of Birth. (Registered with us)</li>
						    </ul>
						</ul>					
                                              
                                               <DIV style="float:left">
                                               <img src="./images/auth1.png"  width="360">
                                               </DIV>					
                                                <DIV style="float:right">
                                               <img src="./images/auth2.png" width="360" > 

						</DIV>
						    
						</ul>
						   
                                                </td>
						</tr>
                                             <tr>
						<td width="100%"  align="left" valign="top">
					      <ul>
                                                  <h4 style="background-color:#FFFFFF;">On successful matching of Registration No. and Date of Birth, candidate's name will appear as shown above.<BR>Now click submit button.</h4>
						</ul>
                                                </td>
						</tr>
                                                
                                                
                                              <tr>
						<td width="100%"  align="left" valign="top">
					      <ul>
                                                  <h4 style="background-color:#FFFFFF;">Step 2: Submission of Examination-Form:</h4>
						    <ul>
							<li>Check Carefully if the data is fully correct.</li>
							<li>Select the required subjec(s).</li>
                                                       	<li>If Your Checking is Over,Click on “Submit”.</li>
						    </ul>
						</ul>
											
						</td>
						</tr>
                                                <tr>
						<td width="100%"  align="left" valign="top">

						<img src=./images/auth3.png align=left width="770" height="300" style="margin-bottom:1px;">
						<img src=./images/auth4.png align=left width="770" height="475" style="margin-bottom:30px;">
 						
                                               </td>
						</tr>
         						
                                                <tr>
						<td width="100%"  align="left" valign="top">
					      <ul>
                                                  <h4 style="background-color:#FFFFFF;">Step 3: Confirm the Filled Up Examination-Form:</h4>
						    <ul>
							<li>Check Carefully Once Again, If Your data is fully correct.</li>
							<li>If you are not sure or want to Modify the data, Click on “Edit button".</li>
                                                       	<li>If you are Fully Sure, Click on “Confirm button”.</li>
						    </ul>
						</ul>
											
						</td>
						</tr>
						<tr>
						<td width="100%"  align="left" valign="top">
						<img src=./images/auth5.png align=left width="770" height="250" style="margin-bottom:20px;">
 								
                                               </td>
						</tr>
						<tr>
						<td width="100%"  align="left" valign="top">
					      <ul>
                                                  <h4 style="background-color:#FFFFFF;">Step 4: Take application prinout:</h4>
						    <ul>
							<li>Take the print of your form submission .</li>
							<li>If your photo/Signature is missing, provide the same to collge authority in the space generated in your application ptintout.</li>
							<li>Exit now.</li>
                                                    </ul>
						</ul>
						</td>
						</tr>
						<tr>
						<td width="100%"  align="left" valign="top">
						<img src=./images/auth3.png align=left width="770" height="300" style="margin-bottom:1px;">	
						<img src=./images/auth6.png align=left width="770" height="500" style="margin-bottom:10px;">
						
						
                                               </td>
						</tr>
						</table>
						</div>
						
						</td>
						</tr>
 
</table>
</fieldset>
	 
	 </td>
<td width="33%" valign="top">
<fieldset style="border:1px solid #867f7f;border-radius:15px; background:#F0F8FC;">
 
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
						<td colspan="2" class="bodytextdark11" align="center" valign="top"> <div style="border:1px solid #867f7f;border-radius:12px; background:#CCCCCC; height:30px; padding-top:7px;padding-left:5px;"><img src=./images/logoff.gif align=left>User Authentication</div></td>
						</tr>
	 <tr>
    
    <td colspan="2" class="error" align="center" height="35"><?php echo $err_message;?></td>
  </tr>
  <tr>
    <td width="29%">Registration No.</td>
    <td width="71%"><DIV id="usernamefld"  style="float:left;"><input type="text" name="reg_no" style="width:120px;" id="reg_no" value="<?php echo $_POST['reg_no'];?>" maxlength="20"/></DIV></td>
  </tr>
  <tr>
    <td width="29%">Admission year.</td>
   <td width="71%"><select name="admission_yr" style="width:75px;" >
  <option value="2018">2018-19</option>
  
</select></td>
  </tr>
 <tr>
    <td>Date of Birth</td>
    <td><input name="dob" type="text" id="dob" size="35" value="<?php echo $_POST['dob'];?>" style="width:65px;" onclick="displayCalendar(this,'dd-mm-yyyy',this)" onchange="getusername('username.php?','username');" />&nbsp;(dd-mm-yyyy format only) </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><DIV id="username"  style="float:left;">&nbsp;</DIV></td>
  </tr>

   <tr>
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" id="frmsubmit" class="submit1" value="SUBMIT" style="width:58px; height:22px;" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="padding-top:10px;"><a href="student_auth.php"class="categorylink33">Check your Status</a> (if already applied)</td>
  </tr>
</table>
</fieldset>
<BR>
</td>
  </tr>
    
   
</table>
</td>
</tr>

<tr>
  <td align="right" valign="middle" style="padding-right:20px;padding-bottom:20px;">&nbsp;</td>
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

