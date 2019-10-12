<?php include "./lib/admin-inc.php" ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NSOU EXAMINATION PORTAL</title>

<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#FFFFFF">
<form id="userhome" name="userhome" method="post" action="user_enrolement.php">
	

<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px; padding-top:90px;">
            <table width="100%" border="0" cellspacing="2" cellpadding="3">
			
			  <tr><td height="20"  align="center" class="error">&nbsp;</td></tr>
			  
<tr> <td align="center" class="bodytext_dark" valign="top" height="30">WELCOME NSOU PG STUDENTS TO EXAMINATION FORM PORTAL.</td>
</tr>
<tr>
  <td height="50" align="center" valign="top">Session JULY 2017.</td>
</tr>
<tr>
  <td height="190" align="center" valign="top">
  <select name="course_id" id="course_id" style="width:235px;" >
							   <option value="">.....Please select your course.....</option>
							   
                                  <option value="">M.A.in Bengali</option>
								  <option value="">M.A.in English</option>
								  <option value="">M.A in English Language Teaching </option>
								  <option value="">M.A.in Political Science</option>
								  <option value="">M.A in Public Administration</option>	
								  <option value="">M.A in Education</option>	
								  <option value="">M.Sc. in Mathematics</option>	
								  <option value="">M.Sc. in Geography</option>	
								  <option value="">M.Sc. in Zoology</option>	
								  <option value="">M.Com.</option>	
								  <option value="">M.A.in HistoryM.A in Social Work(MSW)</option>	
								  <option value="">Master of Library & Information Science</option>					
                                 
                                </select> &nbsp;&nbsp;<input name="Submit" type="submit" class="submit1" value="SUBMIT" style="width:58px; height:22px;" />
  </td>
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
