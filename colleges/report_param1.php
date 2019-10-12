<?php
include "./lib/admin-inc.php" ;
$_REQUEST['VKORG1'] = substr($_REQUEST['VKORG1'],0,-1);
$VKORG1 = explode(",", $_REQUEST['VKORG1']);
$VKORG = array("Domestic"=>"1000","Deemed"=>"2000","Export"=>"3000");
      $rfc = saprfc_open ($login );
	  if (! $rfc ) { echo "RFC connection failed"; exit; }

		  $fce1 = saprfc_function_discover($rfc,"ZPHP_DO_SQL");
		  if (! $fce1 ) { echo "Discovering interface of ZPHP_DO_SQL failed"; exit; }
		  $order = array("\r\n", "\n", "\r");
		 $query1 = file_get_contents('./lib/code1_sql.txt');
		 $query1 = str_replace("[USER]",strtolower($_SESSION["USERNAME"]),$query1);
		 $query1 = str_replace($order,"\\n",$query1);
		 $query1 = str_replace("\\'","'",$query1);
		 $query1 = str_replace('\\"','"',$query1);
	
		# Pass import parameters
		  saprfc_import ($fce1,"P_OPER","S");
		  saprfc_import ($fce1,"P_TABLE","");
		  saprfc_import ($fce1,"P_SQL",$query1);
		  saprfc_import ($fce1,"P_FLAVOUR","N");
		# Pass table parameters

		  saprfc_table_init ($fce1,"PT_JSON");
		  // Do RFC call of function ZPHP_DO_SQL,
		  // for handling exceptions use saprfc_exception()
		  $rfc_rc = saprfc_call_and_receive ($fce1);
		  if ($rfc_rc != SAPRFC_OK)
			{ if ($rfc == SAPRFC_EXCEPTION )
				echo ("Exception raised: ".saprfc_exception($fce1));
			  else echo (saprfc_error($fce1));
			  exit; }
		   // saprfc_function_debug_info ($fce1);
		  // Retrieve export parameters
			$rows1 = saprfc_table_rows ($fce1,"PT_JSON");
			$json1="";
			  for ($i=1;$i<=$rows1;$i++){
			  $PT_JSON1 = saprfc_table_read ($fce1,"PT_JSON",$i);
			  $json1 = $json1 . $PT_JSON1['LINE'];
			  }
			  preg_replace("/[^[:print:]]/"," ",$json1);
			  $results1=json_decode($json1);
			  
			  
		    

?>

<form name="report_param" id="report_param" action="" method="post">
<?php 
foreach ($results1 as $num => $roww){if(in_array($roww->VKORG,$VKORG1)){?><input type="hidden" name="cust_all" value="<?php echo $roww->KUNNR;?>" id="cust_all" /><?php }}?> 
<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:415px; position:absolute; font-family: Arial; font-size: 12px; font-weight: 400; font-style:normal; color:#585858; background: #F5F5F5;border:1px solid #B9AD97;">
                          <tr>
                            <td valign="top" class='bodyText1'>
							
							<table width="100%" border="0" cellpadding="0" cellspacing="1">
                              <tr> <td colspan="4">&nbsp;</td> </tr>
							  
								 <tr height="18" class="bodyText">
								   <td height="12"  valign='top'>&nbsp;</td>
								   <td height="12"  valign='top' align="left">&nbsp;</td>
								   <td valign='top' align="right"><div align="right" style="padding-top:0px; padding-right:8px;"><img src="./images/close.gif" width="15" height="18"  border="0"  onclick="pageload1('<?php echo $_REQUEST['target']?>')" /></div></td>
						      </tr>
								 <tr height="18" class="bodyText">
							 <td width="5%" height="12"  valign='top'>&nbsp;</td>
							  <td width="6%" height="12"  valign='top' align="left">
							 
							<input type="checkbox" name="check_uncheck0" id="check_uncheck0" value="" style="width:15px;" <?php echo $_REQUEST['checked0'];?> DISABLED/>					     </td>
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

?>
                              <tr bgcolor="<?php echo $bg_color;?>" class="bodytextdark222">
                                <td width="8%">&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="VKORG" id="VKORG" value="<?php echo  $value;?>" style="width:15px;"  DISABLED <?php if(in_array(intval($value),$VKORG1)){ echo " CHECKED";}?>/></td>
                                  <td width="92%"><?php echo $key;?></td>
                                </tr>
								
                                <?php
//if($bg_color == "#F3F3F3"){ $bg_color = "#FFFFFF";}elseif($bg_color == "#FFFFFF"){$bg_color = "#F3F3F3";} 
								
}

?>
                              </table>
							</div></td><td width="2%">&nbsp;</td></tr>
                              
                              <tr height="18" class="bodyText">
							 <td width="5%" height="12"  valign='top'>&nbsp;</td>
							  <td width="6%" height="12"  valign='top' align="left">
							<input type="checkbox" name="check_uncheck" id="check_uncheck" value="" style="width:15px;" onclick="checkedAll(this.id,'KUNNR',this.form)" />						     </td>
							  <td width="87%" valign='top' class="bodytextdk">Select All Customers</td>
							  </tr>
							
							<tr> 
							<td>&nbsp;</td>
							<td colspan="2">
							
							<div style="height: 120px; overflow: auto; padding: 1px">
							  <table width="100%" border="1" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" style="border-collapse:collapse">
                               <?php 
//$kunnr = explode(",",$_SESSION["KUNNR"]);
$bg_color = "#FFFFFF";
$countrec = 0;
foreach($_SESSION as $key=>$value){
if(is_numeric($key)){
$exp = explode("&&",$value);
if(in_array($exp[1],$VKORG1)){
?>
                              <tr bgcolor="<?php echo $bg_color;?>" class="bodytextdark222">
                                <td width="8%">&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="KUNNR" id="KUNNR" value="<?php echo $key;?>" style="width:15px;" onclick="checkedAll_ch('check_uncheck',this.id,this.form)" /></td>
                                  <td width="92%"><?php echo $exp[0]."&nbsp;&nbsp;[".intval($key)."]";?></td>
                                </tr>
								
                                <?php
//if($bg_color == "#F3F3F3"){ $bg_color = "#FFFFFF";}elseif($bg_color == "#FFFFFF"){$bg_color = "#F3F3F3";}

$countrec++;
} 
}								
}

if($countrec == 1){?>
<tr style="visibility:hidden">
                                <td width="8%">&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="cust_all" value="" id="cust_all" /><input type="checkbox" name="KUNNR" id="KUNNR" value="" style="width:15px;"  /></td>
                                  <td width="92%">&nbsp;</td>
                                </tr>



<?php
}
	

saprfc_function_free($fce1);
saprfc_close($rfc);
?>
                              </table>
							</div></td><td width="2%">&nbsp;</td></tr>
							<tr>
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left">&nbsp;</td>
							  <td height="12"  valign='top'>&nbsp;</td>
							  </tr>
							<tr>
							  <td height="12"  valign='top'>&nbsp;</td>
							  <td colspan="2" align="left"><input type="button" name="Submit" value="Submit" id="Submit" onclick="mat_help('<?php echo $_REQUEST['target']?>');"  style="width:52px; height:20px;"/>
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

   
