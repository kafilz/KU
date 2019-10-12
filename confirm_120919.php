<?php 
/****************************************************/
// Filename: confirm.php
// Created: Kafil Siddiqui
/****************************************************/
include "./lib/admin-inc.php" ;
/**
   * Array of course
   *
   * @var array
   */
$type = array("0"=>"DISCIPLINE CORE COURSE","1"=>"HONOURS CORE COURSE");
/**
   * Array of course
   *
   * @var array
   */
$type1 = array("0"=>"PROGRAMME","1"=>"HONOURS");
/**
   * Array of sex
   *
   * @var array
   */
$sex = array("M"=>"S/O","F"=>"D/O");
/**
   * Array of gender
   *
   * @var array
   */
$gender = array("M"=>"MALE","F"=>"FEMALE");
/**
   * Array of cast
   *
   * @var array
   */
$cast = array("1"=>"SC","2"=>"ST","3"=>"OBC","4"=>"PH","5"=>"OBC-A","6"=>"OBC-B",""=>"GENERAL");

/**
 * CALL FUNCTION  subjects to fetch all the subjects
 */
$subjects = subjects();
/**
 * CALL FUNCTION  fld_value to fetch all the field values
 */
$fld_value = fld_value();


if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'SUBMIT')
{
  $qr1  = "UPDATE student_details SET ";
  $qr1 .= " mob_no = '".$_POST['mob_no']."' ";
  $qr1 .= " WHERE stud_id = '".$_SESSION['stud_id']."' ";
  mysql_query($qr1);
  $_SESSION['userdata']['mob_no'] = $_POST['mob_no'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>

<link href="./style/adminmain.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#FFFFFF">
<form id="userhome" name="userhome" method="post" action="print.php" onsubmit="return formvalidation1(this);">
<input type="hidden" name="main_subject" value="<?php echo $_POST["main_subject"];?>"/>
<input type="hidden" name="other_subject" value="<?php echo $_POST['other_subject'];?>"/>
<input type="hidden" name="other_subject1" value="<?php echo $_POST['other_subject1'];?>"/>
<input type="hidden" name="other_subject2" value="<?php echo $_POST['other_subject2'];?>"/>
<input type="hidden" name="generic" value="<?php echo $_POST["generic"];?>"/>
<input type="hidden" name="generic1" value="<?php echo $_POST["generic1"];?>"/>
<input type="hidden" name="skill" value="<?php echo $_POST["skill"];?>"/>
<input type="hidden" name="lcc" value="<?php echo $_POST['lcc'];?>"/>
<input type="hidden" name="updation" value="<?php echo $_POST["updation"];?>"/>

<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
      
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr>
  <td height="40" align="left" valign="bottom" style="padding-top:30px;padding-bottom:30px;padding-left:30px;"><span style="font-size:15px;padding-top:30px;padding-bottom:30px;"><strong>Please confirm you submission. </strong></span></td>
</tr>

<tr>
  <td height="30" align="center" valign="top">
<?php  if(($_SESSION['userdata']['stream']=="BA" || $_SESSION['userdata']['stream']=="BSC" || $_SESSION['userdata']['stream']=="BCOM") && $_SESSION['userdata']['is_hons']=="1"){?>

  <table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
<tr>
 <td width="25%" align="left"><strong><?php    echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
 <td width="26%" align="left"><?php    echo $subjects[substr($_SESSION['userdata']['main_subject'],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['main_subject']."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>
<tr>
 <td width="25%" align="left"><strong>GENERIC ELECTIVE-2 COURSE-1</strong></td>
   <td width="26%" align="left">
<?php
$qr_ge = "SELECT * FROM `subject_master` WHERE subject='".$_POST["generic"]."' ";
$rst_ge = mysql_query($qr_ge);
$rw_ge = mysql_fetch_assoc($rst_ge);
echo $rw_ge['subject_details'];
?>
</td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST["generic"]."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td>
</tr>

<tr>
<td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
<td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".substr($_SESSION['userdata']['sub1'],0,3)."HSE"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td>
</tr>
</table>
<?php 
}
elseif($_SESSION['userdata']['stream']=="BCOM" && $_SESSION['userdata']['is_hons']=="0"){
?>

<table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
 <tr>
<td width="25%" align="left"><strong>MAIN <?php echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
 <td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['main_subject'],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['main_subject']."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td>
	</tr>

<tr>
 <td width="26%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
 <td width="25%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['main_subject'],0,3)]?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".substr($_SESSION['userdata']['main_subject'],0,3)."PSE"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>

<tr>
 <td width="25%" align="left"><strong>LANGUAGE CORE COURSE</strong></td>   
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['lcc'],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['lcc']."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>
</table>
<?php
}
elseif($_SESSION['userdata']['stream']=="BSC" && $_SESSION['userdata']['is_hons']=="0"){
?>

<table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
  
<tr>
 <td width="25%" align="left"><strong>MAIN <?php echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
 <td width="26%" align="left"><?php echo $subjects[$_POST['main_subject']];?>
</td>
 <td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['main_subject']."PCC"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
	</tr>


<tr>
 <td width="25%" align="left"><strong>OTH. DISCIPLINE COURSE-2</strong></td> 
 <td width="26%" align="left"><?php echo $subjects[$_POST['other_subject1']];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['other_subject1']."PCC"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>
<tr>
 <td width="25%" align="left"><strong>OTH. DISCIPLINE COURSE-3</strong></td>
 <td width="26%" align="left"><?php echo $subjects[$_POST['other_subject2']];?></td>
 <td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['other_subject2']."PCC"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
	</tr>



<tr>
 <td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>	
 <td width="26%" align="left"><?php echo $subjects[substr($_POST["skill"],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".substr($_POST["skill"],0,3)."PSE"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>
</table>

<?php }

elseif($_SESSION['userdata']['stream']=="BA" && $_SESSION['userdata']['is_hons']=="0"){
?>

<table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
  
<tr>
 <td width="25%" align="left"><strong>MAIN <?php echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
  <td width="26%" align="left"><?php echo $subjects[$_POST['main_subject']];?></td>
 <td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['main_subject']."PCC"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>


<tr>
 <td width="25%" align="left"><strong>OTH. DISCIPLINE COURSE-2</strong></td>  
<td width="26%" align="left"><?php echo $subjects[$_POST['other_subject']];?></td>
 <td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['other_subject']."PCC"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td>  
</tr>

<tr>
 <td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
   
	
 <td width="26%" align="left">
<?php 
if($_SESSION['userdata']['imp_pap']=='AP'){
echo $subjects[substr($_SESSION['userdata']['main_subject'],0,3)];
}else{ echo $subjects[$_POST['skill']];  }
?>
</td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['skill']."PSE"."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>

<tr>
 <td width="25%" align="left"><strong>LANGUAGE CORE COURSE</strong></td>   
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['lcc'],0,3)];?></td>
<td  width="45%" align="left">
		<table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
			<?php
			$course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_POST['lcc']."' ORDER BY paper ASC";
			$course_rst = mysql_query($course_sql);
			while($course_row = @mysql_fetch_array($course_rst)){
			?>
		<tr>
			<td width="20%"><?php echo $course_row['cour_cate'];?></td>
			<td width="80%"><?php echo ucwords(strtolower($course_row['details']));?></td>
			</tr>
			<?php }?>
		</table>
	</td> 
</tr>
</table>
<?php
}
?>
  </td>
</tr>
<tr>
<td colspan="4" align="center" style="padding-top:20px;">
<input name="Submit" type="submit" class="submit1" value="Confirm" style="width:58px; height:22px;" />&nbsp;
<a href="user_exam_form.php?main_subject=<?php echo $_POST["main_subject"];?>&generic=<?php echo $_POST["generic"];?>&generic1=<?php echo $_POST["generic1"];?>&skill=<?php echo $_POST["skill"];?>&lcc=<?php echo $_POST["lcc"];?>&other_subject=<?php echo $_POST["other_subject"];?>&other_subject1=<?php echo $_POST["other_subject1"];?>&other_subject2=<?php echo $_POST["other_subject2"];?>&updation=<?php echo $_POST["updation"];?>" style="text-decoration:none;">
<input name="Submit" type="button" class="submit1" value="Back" style="width:58px; height:22px;" /></a>
</td>
</tr>
</table>
    </td>
</tr>
<tr>
  <td height="30" align="center" valign="top">&nbsp;</td>
</tr>

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
</form>
</body>
</html>
<script language="JavaScript" src="./scripts/login.js"></script>
