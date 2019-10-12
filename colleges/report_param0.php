<?php
session_start();
$VKORG = array("Domestic"=>"1000","Deemed"=>"2000","Export"=>"3000");


?>

<form name="report_param" id="report_param" action="" method="post">

	 
<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:415px; position:absolute; font-family: Arial; font-size: 12px; font-weight: 400; font-style:normal; color:#585858; background: #F5F5F5;border:1px solid #B9AD97;">
                          <tr>
                            <td valign="top" class='bodyText1' colspan="2">
							
							<table width="100%" border="0" cellpadding="0" cellspacing="1">
                              <tr> <td colspan="4">&nbsp;</td> </tr>
							  
                              <tr height="18" class="bodyText">
                                <td height="12"  valign='top'>&nbsp;</td>
                                <td height="12"  valign='top' align="right">&nbsp;</td>
                                <td valign='top' align="right"><div align="right" style="padding-top:0px; padding-right:8px;"><img src="./images/close.gif" width="15" height="18"  border="0"  onclick="pageload1('<?php echo $_REQUEST['target']?>')" /></div></td>
                              </tr>
                              <tr height="18" class="bodyText">
							 <td width="5%" height="12"  valign='top'>&nbsp;</td>
							  <td width="6%" height="12"  valign='top' align="left">
							<?php if($_SESSION["export"] == false && $_SESSION["USERNAME"] != 'goodyear' && $_SESSION["USERNAME"] != 'bridgestone'){ $chkk = ' CHECKED';$enabb='';}else{$chkk = '';$enabb=' DISABLED';}?><input type="checkbox" name="check_uncheck0" id="check_uncheck0" value="" style="width:15px;" onclick="checkedAll(this.id,'VKORG',this.form)" <?php echo $chkk.$enabb;?> /> </td>
							  <td width="87%" valign='top' class="bodytextdk">Select All Sales Organisation</td>
							  </tr>
							
							<tr> 
							<td>&nbsp;</td>
							<td colspan="2">
							
							<div style="height: 70px; overflow: auto; padding: 1px">
							  <table width="100%" border="1" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" style="border-collapse:collapse">
                               <?php 
//$kunnr = explode(",",$_SESSION["KUNNR"]);
$bg_color = "#FFFFFF";

foreach($VKORG as $key=>$value){
$chk='';$enab='';
if($_SESSION["export"] == true && $value == '3000'){ $chk=' CHECKED'; $enab='';}
elseif(($_SESSION["USERNAME"] == 'goodyear' || $_SESSION["USERNAME"] == 'bridgestone') && $value == '3000'){ $chk=' UNCHECKED'; $enab=' DISABLED';}
elseif($_SESSION["export"] == true && $value != '3000'){ $chk=' UNCHECKED'; $enab=' DISABLED';}
else{$chk=' CHECKED'; }
?>
                              <tr bgcolor="<?php echo $bg_color;?>" class="bodytextdark222">
                                <td width="8%">&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="VKORG" id="VKORG" value="<?php echo $value;?>" style="width:15px;" onclick="checkedAll_ch('check_uncheck0',this.id,this.form)" <?php echo $chk.$enab;?> /></td>
                                  <td width="92%"><?php echo $key;?></td>
                                </tr>
								
                                <?php
//if($bg_color == "#F3F3F3"){ $bg_color = "#FFFFFF";}elseif($bg_color == "#FFFFFF"){$bg_color = "#F3F3F3";} 
								
}

	
?>
                              </table>
							</div></td><td width="2%">&nbsp;</td>
							</tr>
							
							<tr>
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left"><input type="button" name="Submit" value="Submit" id="Submit" onclick="report_param1('<?php echo $_REQUEST['target']?>');"  style="width:52px; height:20px;"/>
							    &nbsp;
                                <input type="button" name="cancel" value="Cancel" id="Submit"  style="width:50px; height:20px;" onclick="pageload1('<?php echo $_REQUEST['target']?>');"/></td>
							  </tr>
							<tr>
							 <td width="5%" height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left">&nbsp;</td>
							</tr>
						</table>
						
							</td>
                          </tr>
      </table>

</form>

   
