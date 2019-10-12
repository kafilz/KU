<?php include "../lib/admin-inc.php" ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Read My Language</title>

<link href="../style/adminmain.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#FFFFFF">
<form id="userhome" name="userhome" method="post" action="user_test.php">
	<input type="hidden" name="cycle_id" value="<?php echo $row["cycle_id"];?>" />
</form>
<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "../lib/admin_top.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px;">
            <table width="100%" border="0" cellspacing="2" cellpadding="3">
			
			  <tr><td height="20"  align="center" class="error"><?php echo $_SESSION['msgdisp'];$_SESSION['msgdisp']="";?></td></tr>
			  
<tr> <td align="left" class="bodytext_dark" valign="top" height="30"><?php echo getcontent_title('7');?></td>
</tr>
<tr>
  <td height="140" align="left" valign="top">
 </td>
</tr>
<tr>
  <td height="60" align="left" valign="top"><BR><a href="#" class = 'categorylink33' onclick="javascript:document.userhome.submit();"><span class="bodytextdark5">Click to take the test&nbsp;&nbsp;<?php echo $row["cycle_name"];?></span></a> </td>
</tr>
           </table>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="bottom">
      <?php include "../lib/admin_bottom.php";?>
	  </td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>
<script language="JavaScript" src="../scripts/login.js"></script>
