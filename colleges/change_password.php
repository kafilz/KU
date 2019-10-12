<?php include "../lib/admin-inc1.php" ;
$flag = 0;
$err_message = '';
	
	if($_REQUEST['checking'] == 'true' )
{
	if($_REQUEST['old_password']=="")
	{
		$err_message="Please enter old password";
		$flag = 1;
	}
	elseif($_REQUEST['new_password']=="")
	{
		$err_message="Please enter new password";
		$flag = 1;
	}
	elseif($_REQUEST['conf_password']=="")
	{
		$err_message="Please enter confirm password";
		$flag = 1;
	}
	elseif($_REQUEST['new_password']!=$_REQUEST['conf_password'])
	{
		$err_message="New passwd and confirm passwd mismatch";
		$flag = 1;
	}
		if($flag == 0)
		{
				  $qr = "SELECT password FROM admin WHERE username='".$_SESSION["USERNAME"]."'";
		  		  $rst = mysql_query($qr);
		  		  $num = mysql_num_rows($rst);
		  		  $row = mysql_fetch_assoc($rst);
				 
				 		
			if(generateHash($_REQUEST["old_password"],$row['password']) != $row['password'])
			{
				$err_message="Old Password is wrong";
			}
			else
			{  		
			if(update()) {
					        $err_message="Password Successfully Updated";						
					  }
					  else
					  {
						    $err_message="Password Updation Error";
					  }

					  
			}
     }  
 }

?>
<div style="width:370px; position:absolute; font-family: Arial; font-size: 12px; font-weight: 400; font-style:normal; color:#585858; background: #F5F5F5;border:1px solid #B9AD97; z-index:1;">
<div align="right" style="padding-top:10px; padding-right:8px;"><img src="../images/close.gif"  border="0"  onclick="pageload1('<?php echo $_REQUEST['target']?>')" /></div>
<div style="padding-left:20px;"><form name="report_param" id="report_param" action="" method="post">	 
<table width="92%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5">
                          <tr>
                            <td valign="top" class='bodyText1'>
							<fieldset>
							<table width="100%" border="0" cellpadding="0" cellspacing="1">
                              <tr> <td colspan="4">Change password</td> </tr>
							  
                              <tr height="18" class="bodyText">
                                <td height="12"  valign='top'>&nbsp;</td>
                                <td height="12" align="center"  valign='top' colspan="2" class="error"><?php echo $err_message;?></td>
                                
                              							
							<tr height="18" class="header1">
                                <td height="12"  valign='top'>&nbsp;</td>
								<td width="44%" height="12"  valign='top'>Old Password</td>
                              <td valign='top' class="bodytextdark"><input type="password" name="old_password" style="width:120px;" id="old_password" value="<?php echo $_REQUEST['old_password'];?>" />                                &nbsp;</td>
                              </tr>	
							  
							  <tr height="18" class="header1">
							    <td height="12"  valign='top'>&nbsp;</td>
							    <td height="12"  valign='top'>New password</td>
							    <td valign='top' class="bodytextdark"><input type="password" name="new_password" style="width:120px;" id="new_password" value="<?php echo $_REQUEST['new_password'];?>" />
						        &nbsp;</td>
						      </tr>
							  <tr height="18" class="header1">
                                <td height="12"  valign='top'>&nbsp;</td>
								<td height="12"  valign='top'>Confirm password</td>
                               
                                <td valign='top' class="bodytextdark"><input type="password" name="conf_password" style="width:120px;" id="conf_password" value="<?php echo $_REQUEST['conf_password'];?>" /></td>
                              </tr>			
							
							  
							  <tr>
							 <td width="3%" height="12"  valign='top'>&nbsp;</td>
							  <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							  <td width="53%" height="12"  valign='top'><input type="button" name="Submit" value="Submit" id="Submit" onclick="changePass('change_password.php?checking=true&target=<?php echo $_REQUEST['target']?>','change_password');"  style="width:62px; height:20px;"/>&nbsp;<input type="button" name="cancel" value="Cancel" id="Submit"  style="width:60px; height:20px;" onclick="pageload1('<?php echo $_REQUEST['target']?>');"/>
							   </td>
							</tr>
							<tr> <td colspan="4">&nbsp;</td> </tr>
						</table>
							</fieldset>
							</td>
                          </tr>
						  <tr>
                            <td valign="top" class='bodyText1'></td></tr>
      </table>

</form>
  </div>
   
</div>
<?php
function update()
{		
		$quer  = " UPDATE admin SET  ";
		$quer .= " password ='".generateHash($_REQUEST["new_password"])."' ";
		$quer .= " WHERE  username ='".$_SESSION["USERNAME"]."' ";
				
		if(mysql_query($quer))
		{return true;}
		else{return false;}	
		
}
?>

 
