<?php include "../lib/admin-inc1.php" ;
if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'Submit')
{
  foreach($_POST["marks_id"] as $key=>$value){
if($value!=''){

  
	  $qr1  = "UPDATE student_internal_marks SET ";
	  $qr1 .= " controller_review = '1' ";
	  $qr1 .= " WHERE marks_id = '".$value."' ";
	  
	  

  //echo $qr1;exit();
  mysql_query($qr1);
 
  }
}
 
}

$limit_value = 20;
$qr_sub = "SELECT * FROM `int_marks_papers` WHERE paper_id  = '".$_REQUEST["paper_id"]."' ";
$rows_sub = mysql_query($qr_sub);
$rw_sub  = mysql_fetch_array($rows_sub);


if($_REQUEST["paper_id"]!=''){

$PaginateIt = new PaginateIt();
$PaginateIt->SetItemsPerPage($limit_value);
$PaginateIt->SetLinksToDisplay(5);

$ListQuery = "SELECT student_details.*,student_course_opted.courses_chosen,student_course_opted.office_no FROM `student_details`,student_course_opted WHERE
      student_details.stud_id=student_course_opted.stud_id AND student_details.coll_cod  = '".$_SESSION["college_code"]."' 
       AND student_course_opted.courses_chosen LIKE '%".$rw_sub["subject"]."%' ORDER BY student_details.s_name ASC ";


$res = mysql_query($ListQuery);

$row_num = @mysql_num_rows($res);
$PaginateIt->SetItemCount($row_num);

$PaginateIt->SetQueryString('paper_id='.$_REQUEST['paper_id'].'&page='.$_REQUEST['page']);

$PaginateIt->SetLinksFormat('<< Back', ' | ', 'Next >>');

$ListQuery= $ListQuery . $PaginateIt->GetSqlLimit();
//echo $ListQuery;exit();
$rows = mysql_query($ListQuery); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>KAZI NAZRUL UNIVERSITY(KNU)</title>

<link href="../style/adminmain.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#FFFFFF">
<form id="intmarks" name="intmarks" method="post" action="<?php echo $_SERVER ["REQUEST_URI"]?>">
<input type="hidden" name="paper_id" value="<?php echo $_REQUEST['paper_id'];?>"/>
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>" />
<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "../lib/admin_top2.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder">
            <table width="95%" border="1" align="center" cellspacing="7" cellpadding="0" style=" border-collapse:collapse; border-color:#0582BC;">
			<tr>
                                <td colspan="12" style="background-color:#CCCFFF;">
<FIELDSET><LEGEND>AWARD LIST</LEGEND>
                                <table width="60%" border="0" align="center" cellspacing="7" cellpadding="0" style=" border-collapse:collapse; border-color:#0582BC;color:#0d0801;">
			  <tr height="50">
                                <td valign="middle" width="8%" align="right">SUBJECT</td>
				<td valign="middle" width="2%" align="center"><STRONG>:</STRONG></td>
			        <td valign="middle" width="41%" align="left"><?php echo ucwords(strtolower($rw_sub["details"]." ". $courseType[substr($rw_sub["subject"],-1,1)]))."[ ".$rw_sub["subject"]." ]";?></td>
				
				<td valign="middle" width="8%" align="right">PAPER</td>
				<td valign="middle" width="2%" align="center"><STRONG>:</STRONG></td>
				<td valign="middle" width="15%" align="left"><?php echo $rw_sub["paper"];?></td>
				<td valign="middle" width="14%" align="right">FULL MARKS</td>
				<td valign="middle" width="2%" align="center"><STRONG>:</STRONG></td>
				<td valign="middle" width="9%" align="left"><?php echo $rw_sub["marks"];?></td>				
                         </tr>
                        </table></FIELDSET>
                                </td>
                       </tr>
			<tr>
                                <td colspan="12">
                                <table width="100%" border="1" align="center" cellspacing="5" cellpadding="4" style=" border-collapse:collapse; border-color:#0582BC;">
   
                          <tr height="30" bgcolor="#CCCCCC">
				 <td valign="middle" width="24%" align="left" style="padding-left:5px;"><STRONG>NAME</STRONG></td>
                                <td valign="middle" width="16%" align="left" style="padding-left:5px;"><STRONG>REGISTRATION NO</STRONG></td>
				<td valign="middle" width="16%" align="left"><STRONG>SESSION</STRONG></td>
			        <td valign="middle" width="16%" align="left"><STRONG>ROLL NO</STRONG></td>
				<td valign="middle" width="16%" align="left"><STRONG>MARKS ALLOCATED</STRONG></td>
	<td valign="top" width="12%" align="left" style="padding-left:20px;"><input type="checkbox" name="chkall" id="chkall" onclick="checkedAll('chkall','marks_id[]',this.form)" class="checkbox1" />Check All</td>

                           </tr>
<?php
while ($rw = mysql_fetch_assoc($rows)) {

$qr_exists = " SELECT * FROM student_internal_marks WHERE stud_id='".$rw["stud_id"]."' AND paper_id='".$_REQUEST['paper_id']."' ";
//echo $qr_exists;exit();
$rst_exists = mysql_query($qr_exists);
$num_exists = mysql_num_rows($rst_exists);
$rwo_exists = mysql_fetch_assoc($rst_exists);
?>
                        
			 <tr height="20">
				<td valign="middle" width="24%" align="left" style="padding-left:5px;"><?php echo $rw["s_name"];?></td>
                                <td valign="middle" width="16%" align="left" style="padding-left:5px;"><?php echo $rw["reg_no"];?></td>
				<td valign="middle" width="16%" align="left"><?php echo ($rw["reg_yr"]-1)."-".($rw["reg_yr"]-2000);?></td>
			        <td valign="middle" width="16%" align="left"><?php echo $rw["cate"]."-".$rw["inp_yr"].$rw["coll_cod"]."-".$rw["roll_no"];?></td>
				<td valign="middle" width="16%" align="center">
<?php 
if($rwo_exists>0){ echo  $rwo_exists["marks"];}
else{ echo  "N/A";}
?>
</td>
<td valign="middle" width="12%" align="left" style="padding-left:20px;">
<?php 
if($rwo_exists>0){
?>
<input type="checkbox" name="marks_id[]" value="<?php echo $rwo_exists["marks_id"];?>" <?php if($rwo_exists["controller_review"]=='1') { echo " CHECKED";}?> class="checkbox1" /><?php }?></td>
                         

 </tr>

<?php }?>

<tr>
                                  <td colspan="6" valign="top" align="center" class="categorylink31" background="../images/tab4.PNG"><?php echo $PaginateIt->GetPageLinks();?></td>
                                </tr>

		</table>
                                </td>
                       </tr>
			  

           </table>
          </td>
        </tr>
      </table></td>
  </tr>
<tr>
    <td valign="middle" height="40" align="center">
      <input name="Submit" type="submit" class="submit1" value="Submit" style="width:58px; height:22px;" />
	  </td>
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
</form>
</body>
</html>
<script language="JavaScript" src="../scripts/login.js"></script>
