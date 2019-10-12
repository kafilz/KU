<?php
include "../lib/admin-inc1.php" ;


?>
<form name="report_param" id="report_param" action="download.php" method="post">
	 
<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:313px; position:absolute; font-family: Arial; font-size: 12px; font-weight: 400; font-style:normal; color:#585858; background: #F5F5F5;border:1px solid #B9AD97;">
                          <tr>
                            <td valign="top" class='bodyText1'>
							
							<table width="100%" border="0" cellpadding="0" cellspacing="1">
                              <tr> <td colspan="4">&nbsp;</td> </tr>
							  
								 
							
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td width="93%" colspan="2" align="left">
							  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
   <td width="96%" align="left">&nbsp;</td>
 </tr>
 <tr class="bodytextdk">
						   
						   <td align="left">From&nbsp;:&nbsp;<input type="text" name="DATE_FROM" style="width:70px;" id="DATE_FROM" value="<?php echo date("d/m/Y");?>"  readonly />&nbsp;<img style="CURSOR: hand;position:absolute;border:0;" border="0" src="../images/icon_calender.gif" width="20" height="19" title="Calendar" onclick="displayCalendar(document.report_param.DATE_FROM,'dd/mm/yyyy',this)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;:&nbsp;<input type="text" name="DATE_TO" style="width:70px;" id="DATE_TO" value="<?php echo date("d/m/Y");?>"  readonly />&nbsp;<img style="CURSOR: hand;position:absolute;border:0;" border="0" src="../images/icon_calender.gif" width="20" height="19" title="Calendar" onclick="displayCalendar(document.report_param.DATE_TO,'dd/mm/yyyy',this)"></td>						  
						   </tr>
</table>							  </td>
							  <td height="12"  valign='top'>&nbsp;</td>
							  </tr>
							<tr class="bodytextdk" height="35" valign="middle">
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left">
							<input type="radio" name="rep_on" value="2" style="width:15px;" checked />&nbsp;Download in CSV</td>
							  <td height="12"  valign='top'>&nbsp;</td>
							  </tr>
							<tr>
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left">&nbsp;<input type="submit" name="Submit" value="Download" id="Submit"  style="width:62px; height:20px;"/>
							    &nbsp;
						      <input type="button" name="cancel" value="Cancel" id="Submit"  style="width:52px; height:20px;" onclick="pageload1('<?php echo $_REQUEST['target']?>');"/></td>
							  <td height="12"  valign='top'>&nbsp;</td>
							  </tr>
							<tr>
							 <td width="5%" height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left">&nbsp;</td>
							  <td width="2%" height="12"  valign='top'>&nbsp;</td>
							</tr>
						</table>
							
							</td>
                          </tr>
  </table>
	 
</form>
 
