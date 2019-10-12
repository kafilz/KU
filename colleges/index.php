<?php session_start();?>
<html>
<head>
<title>KU EXAMINATION PORTAL</title>
<link href="../style/adminmain.css" rel="stylesheet" type="text/css" />

</head>
<body>
<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" bgcolor="#FFFFFF">
  <tr>
    <td valign="top">

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #960027;border:1px solid #B9AD97; margin-bottom:10px;">
	  
	 <tr> <td width="80%" align="left" valign="middle"><img src="../images/header.png" border="0"  width="" height="" /></td>
  </tr>
       	<tr class="navbg">
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
	    </tr>
		
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" >	
       	<tr>
  <!-- <td width="100%" align="center" valign="middle" style="font-size:15px; padding-top:5px; padding-bottom:2px;"><SPAN style="color:#ffffff;font-size:22px;font-family: Arial,Verdana,  Helvetica, sans-serif;">University of Kalyani</SPAN><BR><SPAN style="color:#ffffff;font-size:13px;font-family: Arial,Verdana,  Helvetica, sans-serif;">Kalyani,Nadia</SPAN><BR>
<SPAN style="color:#ffffff;font-size:13px;font-family: Arial,Verdana,  Helvetica, sans-serif;">West Bengal-741235,India</SPAN>
</h1>
</td>
  <td width="24%" align="right" valign="middle" style="font-size:15px; padding-top:5px; padding-bottom:2px;padding-right:15px;">&nbsp;</td> -->
<td width="100%" colspan="2" align="right" valign="middle" style="font-size:15px; padding-top:5px; padding-bottom:2px;padding-right:15px;">&nbsp;</td>
</tr>
</table>

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
       
        <td valign="top" align="center"><table border="0" width="46%"  cellspacing="0" cellpadding="1" background="../images/tab4.png">
            
            <tr>
             
              <td valign="top" align="left" style="padding-left:0px;">
               
                  <table width="100%" height="254" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    
                    <tr>
                      
                        <td valign="top" bgcolor="#960027">
						<form name="loginfrm" action="login.php" method="post">
						<table width="100%" height="214" border="0" cellpadding="2" cellspacing="5">
						<tr>
						<td colspan="4" class="bodytextdark11" height="35" align="center">Login					      </td>
						</tr>
                          
                          
                            <tr>
                              
                              <td colspan="4" class="error" style="color: #FFFFFF;" align="center" height="35"><?php if(!empty($_SESSION["message"])){echo $_SESSION["message"]; $_SESSION["message"] = "";}?></td>
                            </tr>
                            <tr>
                              <td width="17%" class="bodytextdark">&nbsp;Username </td>
                              <td width="4%" align="center" class="bodytextdarkbold">:</td>
                              <td colspan="2"><input name="username" type="text" class="seachfield" id="username" style="width:130"  value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"/>                            </td>
                            </tr>
                            <tr>
                              <td class="bodytextdark">&nbsp;Password</td>
                              <td align="center" class="bodytextdarkbold">:</td>
                              <td colspan="2"><input name="password" type="password" class="seachfield" id="password" style="width:130" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" /></td>
                            </tr>
                            
                            
                            <tr>
                              <td class="bodytextdark">&nbsp;</td>
                              <td align="center" class="bodytextdarkbold">&nbsp;</td>
                              <td width="24%"><span class="bodytextdark">
							  <input name="Submit" type="submit" value="SUBMIT" class="cssbutton" style="width:50px;"/>
                                
                              </span></td>
                              <td width="55%" class="bodytextdark"><!--<a href="password_retrieval.php" class = 'categorylink33'><u>Forgot Password?</u></a>--></td>
                            </tr>
                        </table>
						</form></td>
                    </tr>
                </table></td>
            </tr>
			
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="100">&nbsp;</td>
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
