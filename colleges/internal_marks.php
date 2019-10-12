<?php include "../lib/admin-inc1.php" ;
if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'Submit')
{
  foreach($_POST["intmarks"] as $key=>$value){
if($value!=''){

  if(marks_exists($_POST['stud_id'][$key],$_POST['paper_id'])<1){
	  $qr1  = "INSERT INTO student_internal_marks SET ";
	  $qr1 .= " marks = '".$value."' ,";
	  $qr1 .= " stud_id = '".$_POST['stud_id'][$key]."', ";
	  $qr1 .= " paper_id = '".$_POST['paper_id']."', ";
	  $qr1 .= " controller_review = '0' ";
   }
   else
   {
	  $qr1  = "UPDATE student_internal_marks SET ";
	  $qr1 .= " marks = '".$value."' ";
	  $qr1 .= " WHERE stud_id = '".$_POST['stud_id'][$key]."' AND ";
	  $qr1 .= " paper_id = '".$_POST['paper_id']."' ";
	  
   }
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
                                <table width="100%" border="0" align="center" cellspacing="5" cellpadding="4" style=" border-collapse:collapse; border-color:#0582BC;">
   
                          <tr height="30" bgcolor="#CCCCCC">
				 <td valign="middle" width="28%" align="left" style="padding-left:5px;"><STRONG>NAME</STRONG></td>
                                <td valign="middle" width="18%" align="left" style="padding-left:5px;"><STRONG>REGISTRATION NO</STRONG></td>
				<td valign="middle" width="18%" align="left"><STRONG>SESSION</STRONG></td>
			        <td valign="middle" width="18%" align="left"><STRONG>ROLL NO</STRONG></td>
				<td valign="middle" width="18%" align="left"><STRONG>MARKS ALLOCATION</STRONG></td>
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
				<td valign="middle" width="28%" align="left" style="padding-left:5px;"><?php echo $rw["s_name"];?></td>
                                <td valign="middle" width="18%" align="left" style="padding-left:5px;"><?php echo $rw["reg_no"];?></td>
				<td valign="middle" width="18%" align="left"><?php echo ($rw["reg_yr"]-1)."-".($rw["reg_yr"]-2000);?></td>
			        <td valign="middle" width="18%" align="left"><?php echo $rw["cate"]."-".$rw["inp_yr"].$rw["coll_cod"]."-".$rw["roll_no"];?></td>
				<td valign="middle" width="18%" align="left">
<?php 
if($rwo_exists>0){
  if($rwo_exists["controller_review"]=="0"){
?>
				<input type="hidden" name="stud_id[]" value="<?php echo $rw["stud_id"];?>"/>
				<select name="intmarks[]" id="intmarks" ">
				<option value="">...Please Allocate Marks...</option>
				<option value="0" <?php if($rwo_exists["marks"]=="0"){ echo " SELECTED";}?>>0</option>
				<option value="1" <?php if($rwo_exists["marks"]=="1"){ echo " SELECTED";}?>>1</option>
				<option value="2" <?php if($rwo_exists["marks"]=="2"){ echo " SELECTED";}?>>2</option>
				<option value="3" <?php if($rwo_exists["marks"]=="3"){ echo " SELECTED";}?>>3</option>
				<option value="4" <?php if($rwo_exists["marks"]=="4"){ echo " SELECTED";}?>>4</option>
				<option value="5" <?php if($rwo_exists["marks"]=="5"){ echo " SELECTED";}?>>5</option>
				<option value="6" <?php if($rwo_exists["marks"]=="6"){ echo " SELECTED";}?>>6</option>
				<option value="7" <?php if($rwo_exists["marks"]=="7"){ echo " SELECTED";}?>>7</option>
				<option value="8" <?php if($rwo_exists["marks"]=="8"){ echo " SELECTED";}?>>8</option>
				<option value="9" <?php if($rwo_exists["marks"]=="9"){ echo " SELECTED";}?>>9</option>
				<option value="10" <?php if($rwo_exists["marks"]=="10"){ echo " SELECTED";}?>>10</option>
				<option value="Absent" <?php if($rwo_exists["marks"]=="Absent"){ echo " SELECTED";}?>>Absent</option>
				</select>
<?php }
else{ echo $rwo_exists["marks"]."&nbsp;&nbsp;[Reviewed]";}
}

else{?>	
                                <input type="hidden" name="stud_id[]" value="<?php echo $rw["stud_id"];?>"/>
				<select name="intmarks[]" id="intmarks" ">
				<option value="">...Please Allocate Marks...</option>
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="Absent">Absent</option>
				</select>
<?php }?>				
				</td>
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
