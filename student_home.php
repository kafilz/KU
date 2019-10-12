<?php include "./lib/admin-inc.php" ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>

<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />



</head>

<body bgcolor="#FFFFFF">
<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/user_top1.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder">
            <table width="100%" border="0" cellspacing="7" cellpadding="0">
			
			  <tr><td height="180">&nbsp;</td></tr>
			  
<tr> <td align="center" class="bodytext_dark" valign="top" id="place_holder">Welcome!<BR> </td></tr>
<tr><td height="180">&nbsp;</td></tr>
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
</body>
</html>
<script language="JavaScript" src="./scripts/login.js"></script>
