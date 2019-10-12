<?php 
session_start();
$titleIndex = "KU EXAMINATION PORTAL";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $titleIndex;?></title>

<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#FFFFFF">
	

<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
      <div class="well well-sm" style="height: 35px; color: #a94442; background-color: #fcf8e3; border-color: #CCCCCC; text-align: center; padding-top:10px;padding-left:2px;padding-right:2px;border:1px solid; margin-top:20px;">
                <b >As the students will be submitting their On-line Examination forms for 3rd semester 2019 from respective colleges, the colleges have to authorize themselves providing college code and password to enable the students to complete On-line Examination forms submission.         
                         </b>
            </div>
	 <div class="well well-sm" style="height: 35px; color: #a94442; background-color: #fcf8e3; border-color: #CCCCCC; text-align: center; padding-top:10px;padding-left:2px;padding-right:2px;border:1px solid; margin-top:20px;">
                <b >The portal of "On-line Examination Form Submission System" will be available from  <SPAN style="font-size: 14px;color:#199f19;">XX/XX/2019 to XX/XX/2019</SPAN> without late fine and to <SPAN style="font-size: 14px;color:#199f19;">XX/XX/2019 </SPAN>with late fine. for all 3rd semester students.
                         </b>
            </div>
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px; padding-top:50px;">

            <table width="100%" border="0" cellspacing="2" cellpadding="3">
			
			  
<tr>
  <td align="center" valign="top">
  
  <table width="364" border="0" cellpadding="1" cellspacing="0">
            
            <tr>
             <td width="362" align="left" valign="top" style="padding-left:0px;">

               <div style="border:1px solid #867f7f;border-radius:15px; background:#F0F8FC;">
                  <table width="100%" height="204" border="0" cellpadding="0" cellspacing="0" >
                    
                    <tr>
                      
                        <td valign="top">
						<form name="loginfrm" action="login.php" method="post">
						<table width="100%" height="204" border="0" cellpadding="0" cellspacing="1" bgcolor="#960027">
						<tr>
						<td colspan="4" class="bodytextdark11" align="center" valign="top"> <div style="border:1px solid #867f7f;border-radius:12px; background:#CCCCCC; height:25px; padding-top:7px;padding-left:5px;"><img src=./images/logoff.gif align=left>College Login </div></td>
						</tr>
                              <td colspan="4" class="error" style="color: #FFFFFF;" align="center" height="35"><?php if(!empty($_SESSION["message"])){echo $_SESSION["message"]; $_SESSION["message"] = "";}?></td>
                            </tr>
                            <tr>
                              <td width="25%" class="bodytextdark" style="padding-left:15px;">Username </td>
                              <td width="4%" align="center" class="bodytextdarkbold">:</td>
                              <td colspan="2"><input name="username" type="text" class="seachfield" id="username" style="width:130" placeholder="College Code"  value=""/>                            </td>
                            </tr>
                            <tr>
                              <td class="bodytextdark" style="padding-left:15px;">Password</td>
                              <td align="center" class="bodytextdarkbold">:</td>
                              <td colspan="2"><input name="password" type="password" class="seachfield" id="password" style="width:130" placeholder="Password" value="" /></td>
                            </tr>
                            
                            
                            <tr>
                              <td class="bodytextdark">&nbsp;</td>
                              <td align="center" class="bodytextdarkbold">&nbsp;</td>
                              <td width="17%"><span class="bodytextdark">
							  <input name="Submit" type="submit" value="SUBMIT" class="cssbutton" style="width:50px;"/>
                                
                              </span></td>
                              <td width="54%" class="bodytextdark"><!--<a href="password_retrieval.php" class = 'categorylink33'><u>Forgot Password?</u></a>--></td>
                            </tr>
                        </table>
						</form></td>
                    </tr>
                </table></div> </td>
            </tr>
			
			
        </table> </td>
</tr><tr>
             <td valign="top" height="40">&nbsp;</td></tr>
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
