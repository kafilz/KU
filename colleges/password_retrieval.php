<?php session_start();?>
<html>
<head>
<title>Read Myanguage</title>
<link href="../style/adminmain.css" rel="stylesheet" type="text/css" />

</head>
<body>
<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" bgcolor="#FFFFFF">
  <tr>
    <td valign="top">

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
		
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #F5F5F5;border:1px solid #B9AD97; margin-bottom:10px;">
	  
		  <!--<tr height="35" style="background-image:url(../images/bg_sunorange.gif);"> <td colspan="4" align="center">&nbsp;</td> -->
	 <tr> <td colspan="4" align="center"><!--<img src="../images/sample-background.jpg" width="100%" height="160" /> --></td>
  </tr>
       	<tr class="navbg">
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
		<td width="25%">&nbsp;</td>
	    </tr>
		
</table>&nbsp;&nbsp;
<img src="../images/logo11.png" border="0" width="120" height="100">

 <table width="100%" border="0" cellspacing="0" cellpadding="0" >	
       	<tr>
		<td height="35" colspan="4">&nbsp;</td></tr>
</table>

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
       
        <td valign="top" align="center">
		<table width="46%" border="0" cellspacing="0" cellpadding="1" background="../images/tab4.png">
            
            <tr>
             
              <td valign="top" align="left" style="padding-left:0px;">
               
                  <table width="100%" height="254" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                    
                    <tr>
                      
                        <td valign="top" bgcolor="#F0F8FC">
						<form name="loginfrm" action="retrievepassword.php" method="post">
						<table width="100%" height="214" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<td colspan="4" class="bodytextdark11" height="35" align="center">Read My Language</td>
						</tr>
						<tr>
						<td colspan="4" class="bodytextdark1" height="35" align="center">Please provide below your username, password will be sent on your email id maintained in the system					      </td>
						</tr>
                          
                           
                            <tr>
                              
                              <td colspan="4" class="error" align="center" height="35"><?php if(!empty($_SESSION["message"])){echo $_SESSION["message"]; $_SESSION["message"] = "";}?></td>
                            </tr>
                            <tr>
                              <td width="14%" class="bodytextdark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username </td>
                              <td width="4%" align="center" class="bodytextdarkbold">:</td>
                              <td colspan="2"><input name="username" type="text" class="seachfield" id="username" style="width:130"  value=""/></td>
                            </tr>
                                                        
                            
                            
                            <tr>
                              <td class="bodytextdark">&nbsp;</td>
                              <td align="center" class="bodytextdarkbold">&nbsp;</td>
                              <td width="16%"><span class="bodytextdark">
							  <input name="Submit" type="submit" value="SUBMIT" class="cssbutton"/>
                                
                              </span></td>
                              <td width="66%" class="bodytextdark"><a href="index.php" class = 'categorylink33'><u>Sign in</u></a></td>
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
