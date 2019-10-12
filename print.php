<?php 
/****************************************************/
// Filename: print.php
// Created: Kafil Siddiqui
/****************************************************/
include "./lib/admin-inc.php" ;

if(basename($_SERVER['HTTP_REFERER'])!="confirm.php" && basename($_SERVER['HTTP_REFERER'])!="student_home.php"){
header('Location:user_auth.php');exit();
}
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
   * Array of semester
   *
   * @var array
   */
$semester = array("3"=>"3rd SEMESTER EXAMINATION - 2019");
/**
   * Array of stream
   *
   * @var array
   */
$stream = array("BA"=>"B.A", "BSC"=>"B.SC", "BCOM"=>"B.COM");

/**
 * CALL FUNCTION  subjects to fetch all the subjects
 */
$subjects = subjects();
/**
 * CALL FUNCTION  fld_value to fetch all the field values
 */
$fld_value = fld_value();

/**
   * Assign values into the course_chosen array after the form submit.
   *
   * @var array
   */

if($_SERVER['REQUEST_METHOD'] == "POST"  && $_POST['Submit'] == 'Confirm')
{
 
 $courses_chosen = '';

 if(($_SESSION['userdata']['stream']=="BA" || $_SESSION['userdata']['stream']=="BSC" || $_SESSION['userdata']['stream']=="BCOM") && $_SESSION['userdata']['is_hons']=="1"){
    
         $courses_chosen = $_SESSION['userdata']['sub1'].",".$_POST['generic'].",".substr($_SESSION['userdata']['sub1'],0,3)."HSE"; 
  }

elseif( $_SESSION['userdata']['stream']=="BCOM" && $_SESSION['userdata']['is_hons']=="0"){
		
	  $courses_chosen = $_SESSION['userdata']['sub1'].",".substr($_SESSION['userdata']['sub1'],0,3)."PSE".",".$_POST['lcc'];
       
  }
elseif( $_SESSION['userdata']['stream']=="BA" && $_SESSION['userdata']['is_hons']=="0"){
		
 $courses_chosen = $_POST['main_subject']."PCC".",".$_POST['other_subject']."PCC".",".$_POST['skill'].",".$_POST['lcc'];
       
  }
elseif( $_SESSION['userdata']['stream']=="BSC" && $_SESSION['userdata']['is_hons']=="0"){

$courses_chosen = $_POST['main_subject']."PCC".",".$_POST['other_subject1']."PCC".",".$_POST['other_subject2']."PCC".",".$_POST['skill'];
  
  }

	/**
	 * INSERT INTO student_course_opted TABLE 
	 */
	$qr  = "INSERT INTO student_course_opted SET ";
	$qr .= " stud_id = '".$_SESSION['userdata']['stud_id']."', ";
	$qr .= " courses_chosen = '".$courses_chosen."' ";
	mysql_query($qr);

	$_SESSION['userdata']['applied_id'] = mysql_insert_id();
	$application_no  = get_appno();
	$office_no       = get_office_no();

	/**
	 * UPDATE student_course_opted TABLE 
	 */
	$qr1  = "UPDATE student_course_opted SET ";
	$qr1 .= " application_no = '".$application_no."', ";
	$qr1 .= " office_no = '".$office_no."' ";
	$qr1 .= " WHERE stud_cr_id = '".$_SESSION['userdata']['applied_id']."' ";
	mysql_query($qr1);
     
}

/**
 * CALL FUNCTION  fetch_office_no
 */
$officeno       = fetch_office_no();
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
<style type="text/css">
@media print {
  body * {
    visibility: hidden;
  }
  #place_holder, #place_holder * {
    visibility: visible;
  }
  #place_holder {
    position: absolute;
    left: 0;
    top: 0;
  }
 .noprint{
      display: none !important;

   }
}

/*@media print {
   .noprint{
      display: none !important;

   }
      #footer_table {
                      border: 0 !important; zoom: 1 
                    } 
}*/
@page {
    size: auto;   /* auto is the initial value */
    /*margin: 0;   this affects the margin in the printer settings */
    margin-top: 3mm;
    margin-bottom: 1mm;
    margin-left: 2mm;
   margin-right: 2mm;
}
 </style>

</head>

<body bgcolor="#FFFFFF" id="place_holder">
	

<table width="100%"  border="0" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
<DIV class="noprint"><?php include "./lib/admin_top.php";?></DIV>
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top"  style="padding-left:10px; padding-right:10px; padding-top:5px;">

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="visibility:hidden;">
	<tr> 
	<td  align="center" colspan="3" width="60%" valign="top" style="font-size:26px; padding-top:5px;"><strong>UNIVERSITY OF KALYANI</strong></td>
	</tr>
	<tr> 
	<td  align="center" colspan="3" width="60%" valign="top" style="font-size:11px; padding-top:5px;"><img src="./images/ku_logo.png" border="0"  width="50" height="45" /></td>
	</tr>
	<tr> 
	<td  align="center" colspan="3" width="60%" valign="top" style="font-size:11px; padding-top:5px;"><strong>EXAMINATION APPLICATION FORM</strong></td>
	</tr>
 </table>
  <table width="100%" border="0" cellspacing="1" cellpadding="2">
<tr>
  <td  align="center" valign="top">
  <table width="97%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td width="50%" valign="top" style="font-size:10px;" >
		<table width="100%" border="0" cellspacing="4" cellpadding="2">
		<tr><td colspan="2">To</td> </tr>
		 <tr><td colspan="2">The Controller of Examinations</td> </tr>
		 <tr><td colspan="2">University of Kalyani</td> </tr>
		 <tr><td colspan="2">Kalyani,Nadia</td> </tr>
		 <tr><td colspan="2"> West Bengal-741235,India</td> </tr>

</table>
</td>
<td width="70%" valign="top" style="font-size:10px;"><table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr align="center"><td width="70%">&nbsp;</td><td width="30%">
<DIV><?php echo $_SESSION['userdata']['photo_id'] ."-".$officeno ;?></DIV>
<img src="
<?php 
if(file_exists('./photos/'.$_SESSION['userdata']['photo_id'].'.jpg')){
echo './photos/'.$_SESSION['userdata']['photo_id'].'.jpg';
}
else
{
 echo './images/nophoto.jpeg';
}

?>" width="110" height="132" border="0" /></td> </tr>
	 <tr align="center"><td width="70%">&nbsp;</td><td width="30%">
<?php 
if(file_exists('./signatures/'.$_SESSION['userdata']['photo_id'].'.jpg')){
?>
<img src="<?php echo './signatures/'.$_SESSION['userdata']['photo_id'].'.jpg';?>" border="0" style="width:180px;height:60px;" />
<?php
}
else
{?>
<div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:2px;padding-right:2px; width:160px;height:35px;" align="center"><strong><BR>Signature not available</strong></div>
<?php
}
?></td> </tr>
</table></td>
  </tr>
</table></td>
</tr>

 <tr>
  <td align="left" valign="top" style="padding-left:30px;font-size:10px;">Sir/Madam,</td>
</tr>
<tr>
  <td align="left" valign="top" style="padding-left:30px;font-size:10px;">I would like to apply for examination stated below. I satisfy all the conditions for this purpose under the regulations of the university.Any wrong information/non-compliance will render my candidature liable to be cancelled at any stage of the Examinations as will be decided by the university.
  <div align="right" style="padding-right:40px;">Yours faithfully</div>
  <div align="right" style="padding-right:40px; padding-top:10px;"><?php echo ucwords(strtolower($_SESSION['userdata']['s_name']));?></div>
   <div align="left" style="padding-left:10px; padding-top:0px;">Dated: <?php echo date("d/m/Y");?></div>
  </td>
</tr>
<tr>

<td align="center" valign="top" style="font-size:15px; padding-top:20px; padding-bottom:20px;"><span style="font-size:15px;"><strong><?php
 echo substr($_SESSION['userdata']['stream'],0,1).". ".substr($_SESSION['userdata']['stream'],1).". ".$type1[$_SESSION['userdata']['is_hons']];?> 3rd SEMESTER EXAMINATION - 2019</strong></span><BR><strong><span style="font-size:13px;">[UNDER C.B.C.S]  </span></strong></td>

</tr>

<tr>
  <td  align="center" valign="top" style="font-size:10px;">
  <table width="90%" border="0" cellspacing="2" cellpadding="3" align="center">

  <tr>
    <td>Registration Number</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="1">
<div style="width: 380px;">
 <div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:90px;float: left;" align="center"><strong><?php echo $_SESSION['userdata']['reg_no'];?></strong></div>
<div style="float: left; width: 80px;padding-left:15px;">Session<b> : </b></div>
 <div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:60px;float: left;" align="center"><strong><?php echo ($_SESSION['userdata']['reg_yr']-1)."-".($_SESSION['userdata']['reg_yr']-2000);?></strong></div>
 <br style="clear: left;" />
</div>


</td>
    <td align="right" valign="top">&nbsp;</td>
     <td width="2%" align="center" valign="top">&nbsp;</td>
	 <td width="10%">&nbsp;</td>
   
  </tr>




   <tr>
    <td height="30">College</td>
    <td width="2%" align="center"><b>:</b></td>
    <td><?php echo $_COOKIE["DESCRIPTION"]." [".$_COOKIE["USERNAME"]."]"; ?></td>
    
    <td colspan="4" align="left">&nbsp;</td>
   
  </tr>
  
  <tr>
    <td>Name</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><strong><?php echo $_SESSION['userdata']['s_name'];?></strong></td>
   
  </tr>
 <tr>
    <td><?php echo $sex[$_SESSION['userdata']['sex']];?></td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><strong><?php echo $_SESSION['userdata']['f_name'];?></strong></td>
   
  </tr>


  <tr>
    <td>DOB</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php 
$dob_arr = explode("-",$_SESSION['userdata']['date_of_birth']);
echo $dob_arr['0']."/".$dob_arr['1']."/".$dob_arr['2'];
?>
</td>
   
  </tr>
 <tr>
    <td>Mob No</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php echo $_SESSION['userdata']['mob_no'];?>
</td>
  <tr>
    <td>Aadhaar No</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><?php echo $_SESSION['userdata']['aadhaar_no'];?></td>
  </tr> 
  </tr>
<tr>
    <td>Sex</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php echo $gender[$_SESSION['userdata']['sex']];?>
</td>
   
  </tr>
<tr>
    <td>Caste</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php echo $cast[$_SESSION['userdata']['category']];?>
</td>
   
  </tr>

<tr>
    <td valign="top">Address</td>
    <td width="2%" align="center" valign="top"><b>:</b></td>
    <td colspan="5" valign="top">
<?php echo $_SESSION['userdata']['add1']."<BR>".$_SESSION['userdata']['add2']." ".$_SESSION['userdata']['add3']." - ".$_SESSION['userdata']['pin'];?>
</td>
   
  </tr>
</table>

  </td>
</tr>
<tr>
  <td height="40" align="left" valign="bottom"><span style="font-size:13px;padding-left:60px;"><strong>The candidate has agreed to appear for the following subjects in the said Examination.</strong></span><BR><BR></td>
</tr>

<tr>
  <td height="30" align="center" valign="top">
<?php  if(($_SESSION['userdata']['stream']=="BA" || $_SESSION['userdata']['stream']=="BSC" || $_SESSION['userdata']['stream']=="BCOM") && $_SESSION['userdata']['is_hons']=="1"){?>

  <table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
  
<tr>
 <td width="25%" align="left"><strong><?php echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
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
<td width="26%" align="left">
<?php
$qr_se = "SELECT * FROM `subject_master` WHERE subject='".$_SESSION['userdata']['sub1']."' ";
$rst_se = mysql_query($qr_se);
$rw_se = mysql_fetch_assoc($rst_se);
echo $rw_se['subject_details'];
?>
</td>
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
<td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-1)</strong></td>
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
 <td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
  <td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['main_subject'],0,3)]?></td>
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
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['lcc'],0,3)];?>
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
</td>
  
	</tr>

</table>

<?php
}
elseif($_SESSION['userdata']['stream']=="BSC" && $_SESSION['userdata']['is_hons']=="0"){
?>

<table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
  
<tr>
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-1)</strong></td>	
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['main_subject'],0,3)];?></td>
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
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-2)</strong></td>
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['other_subject1'],0,3)];?></td>
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
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-3)</strong></td>
 <td width="26%" align="left"><?php echo $subjects[substr($_POST['other_subject2'],0,3)];?></td>
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
<td width="26%" align="left"><?php echo $subjects[substr($_POST['skill'], 0,3)]; ?></td>
 <td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $sec = substr($_POST["skill"], 0,6);
      $opt = substr($_POST["skill"], 7,1);
      if($opt == ''){
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sec."'";
    }else{
       $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sec."' AND opt = '".$opt."'";
    }
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
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-1)</strong></td>

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
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-2)</strong></td>
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
<td width="26%" align="left"><?php echo $subjects[substr($_POST['skill'], 0,3)]; ?></td>
 <td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $sec = substr($_POST["skill"], 0,6);
      $opt = substr($_POST["skill"], 7,1);
      if($opt == ''){
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sec."'";
    }else{
       $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sec."' AND opt = '".$opt."'";
    }
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
   
 <td width="26%" align="left">
<?php
echo $subjects[substr($_POST['lcc'],0,3)];
?>
</td>
<td  width="45%" align="left">
  <?php echo $subjects[substr($_POST['lcc'],0,3)];?>
		<!-- <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
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
		</table> -->
	</td> 
</tr>
</table>
<?php
}
?>
  </td>
</tr>
<tr>
<td>
<table width="90%" cellspacing="2" cellpadding="3" align="center" style="border-collapse:collapse">
<tr>
 <td align="left">Application No : <?php echo $application_no;?> Submitted On : <?php echo date('d/m/Y');?></td>
</tr>
</table>
</td>
</tr>
<?php 
if(!file_exists('./photos/'.$_SESSION['userdata']['photo_id'].'.jpg')){
?>

<tr>
  <td height="30" align="center" valign="top">
<BR><BR><BR><BR>

<table width="100%"  border="0" align="center" cellpadding="1" cellspacing="0"  style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">

      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" style="padding-left:30px; padding-right:20px; padding-top:10px;">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
			
			  
<tr>
  <td  align="center" valign="top" colspan="2">
  
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
 <tr> 
<td  align="left" width="20%" valign="top"><img src="./images/ku_logo.png" border="0"  width="95" height="100" /></td>
<td  align="center" width="60%" valign="top" style="font-size:22px; padding-top:10px;"><strong>University Of Kalyani</strong></td>
<td  align="left" width="20%" valign="top"></td></tr>
 </table>


</td>
</tr>
<tr>
<td width="50%" valign="top">&nbsp;</td>
	 <td width="50%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  
     <tr align="center"><td width="50%">&nbsp;</td><td width="50%">
<DIV><?php echo $_SESSION['userdata']['photo_id'] ."-".$officeno ;?></DIV>
<div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:2px;padding-right:2px; width:130px;height:140px;" align="center"><strong><BR><BR><BR>AFFIX YOUR<BR>PHOTO HERE</strong></div>
</td> </tr>
	 <tr align="center"><td width="50%">&nbsp;</td><td width="50%">

<div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:2px;padding-right:2px; width:180px;height:30px;" align="center"><strong>&nbsp;</strong>
</div>
Please sign within the box
</td> </tr>
	
 
</table></td>
  </tr>
 
</table></td>
</tr>

 
<tr>

<td align="center" valign="top" style="font-size:15px; padding-top:20px; padding-bottom:20px;"><span style="font-size:15px;">
<strong><?php echo $stream[$_SESSION['userdata']['stream']].". ".$type1[$_SESSION['userdata']['is_hons']]." ".$semester[3];?></strong></span><BR><strong><span style="font-size:13px;">[UNDER C.B.C.S]  </span></strong></td>

</tr>

<tr>
  <td  align="center" valign="top">
  <table width="90%" border="0" cellspacing="4" cellpadding="5" align="center">

  <tr>
    <td>Registration Number</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="1">
<div style="width: 380px;">
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:90px;float: left;" align="center"><strong><?php echo $_SESSION['userdata']['reg_no'];?></strong></div>
<div style="float: left; width: 80px;padding-left:15px;">SESSION</div>
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:60px;float: left;" align="center"><strong><?php echo ($_SESSION['userdata']['reg_yr']-1)."-".($_SESSION['userdata']['reg_yr']-2000);?></strong></div>
 <br style="clear: left;" />
</div>


</td>
    <td align="right" valign="top">&nbsp;</td>
     <td width="2%" align="center" valign="top">&nbsp;</td>
	 <td width="10%">&nbsp;</td>
   
  </tr>

     
  <tr>
    <td>Name</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><strong><?php echo $_SESSION['userdata']['s_name'];?></strong></td>
   
  </tr>
 <tr>
    <td><?php echo $sex[$_SESSION['userdata']['sex']];?></td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><strong><?php echo $_SESSION['userdata']['f_name'];?></strong></td>
   
  </tr>


  <tr>
    <td>DOB</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php 
$dob = explode("/",$_SESSION['userdata']['date_of_birth']);
echo $dob[0]."/".$dob[1]."/".$dob[2];
?>
</td>
   
  </tr>
 
<tr>
    <td>Sex</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5">
<?php echo $gender[$_SESSION['userdata']['sex']];?>
</td>
   
  </tr>

<tr>
<td height="30" align="left" valign="middle" style="font-size:12px; padding-left:30px;" colspan="3"> N.B. Please affix your photo and signature in the area provided and submit the same to the concerned authority of your college.
	</td>
    
   
  </tr>
</table>

  </td>
</tr>

<tr>

  <td height="100"  valign="top">

<div style="float:left;padding-top:20px;"><HR>Signature of the Principal/TIC of the college</div>
<div style="float:right;padding-top:20px;"><HR>Signature of the Controller of examination</div>

  </td>
</tr>

<?php }?>
<!-///////////////////////////////////////////////////////////////-->
<?php 
if($_REQUEST["updation"]=='1'){
?>

<tr>
  <td  align="center" valign="top">
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>

<table width="100%"  border="0" align="center" cellpadding="1" cellspacing="0"  style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">

      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" style="padding-left:30px; padding-right:20px; padding-top:10px;">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
			
			  
<tr>
  <td  align="center" valign="top" colspan="2">
  
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
 <tr> 
<td  align="left" width="20%" valign="top"><img src="./images/ku_logo.png" border="0"  width="95" height="100" /></td>
<td  align="center" width="60%" valign="top" style="font-size:22px; padding-top:10px;"><strong>Sidho-Kanho-Birsha University</strong></td>
<td  align="left" width="20%" valign="top"></td>
</tr>
 </table>


</td>
</tr>
<tr>
<td width="50%" valign="top">&nbsp;</td>
	 <td width="50%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  
     <tr align="center"><td width="50%">&nbsp;</td><td width="50%">
<DIV><?php echo $_SESSION['userdata']['photo_id'] ."-".$officeno ;?></DIV>
<img src="
<?php 
if(file_exists('./photos/'.$_SESSION['userdata']['photo_id'].'.jpg')){
echo './photos/'.$_SESSION['userdata']['photo_id'].'.jpg';
}
else
{
 echo './images/nophoto.jpeg';
}

?>" width="110" height="132" border="0" /></td> </tr>
	 <tr align="center"><td width="50%">&nbsp;</td><td width="50%">
<?php 
if(file_exists('./signatures/'.$_SESSION['userdata']['photo_id'].'.jpg')){?>
<img src="<?php echo './signatures/'.$_SESSION['userdata']['photo_id'].'.jpg';?>" border="0" width="150"/>
<?php
}
else
{?>
<div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:2px;padding-right:2px; width:160px;height:35px;" align="center"><strong><BR>Signature not available</strong></div>
<?php
}
?>

</td> </tr>
	 
	
 
</table></td>
  </tr>
 
</table></td>
</tr>

 
<tr>

<td align="center" valign="top" style="font-size:15px; padding-top:20px; padding-bottom:20px;"><span style="font-size:15px;"><strong><?php
echo substr($_SESSION['userdata']['stream'],0,1).". ".substr($_SESSION['userdata']['stream'],1).". ".$type1[$_SESSION['userdata']['is_hons']];?> 3rd SEMESTER EXAMINATION - 2019</strong></span><BR><strong><span style="font-size:13px;">[UNDER C.B.C.S]  </span></strong></td>

</tr>

<tr>
  <td  align="center" valign="top">
  <table width="90%" border="1" cellspacing="4" cellpadding="5" align="center"  style=" border-collapse:collapse; border-color:#0582BC;">

  <tr>
    <td>Registration Number</td>
    
    <td colspan="4">
<div style="width: 280px;">
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:90px;float: left;" align="center"><strong><?php echo $_SESSION['userdata']['reg_no'];?></strong></div>
<div style="float: left; width: 80px;padding-left:15px;">SESSION</div>
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:5px;padding-right:5px; width:60px;float: left;" align="center"><strong><?php echo ($_SESSION['userdata']['reg_yr']-1)."-".($_SESSION['userdata']['reg_yr']-2000);?></strong></div>
 <br style="clear: left;" />
</div>


</td>
    
   
  </tr>

     <tr>
     <td>&nbsp;</td>
     <td height="20" style="font-size:15px; border:solid 1px; border-color:#000000;" align="left" ><strong>Existing Informations</strong></td>
<td height="20" colspan="3" style="font-size:15px; border:solid 1px; border-color:#000000;" align="left" ><strong>Informations to be updated</strong></td>
    
    
   
  </tr>
  <tr>
    <td>Name</td>
    
    <td><strong><?php echo $_SESSION['userdata']['s_name'];?></strong></td>
    <td colspan="3">&nbsp;</td>

   
  </tr>
 <tr>
    <td><?php echo $sex[$_SESSION['userdata']['sex']];?></td>
   
    <td><strong><?php echo $_SESSION['userdata']['f_name'];?></strong></td> 
    <td colspan="3">&nbsp;</td>   
  </tr>


  <tr>
    <td>DOB</td>
   
    <td>
<?php 
$dob_arr = explode("-",$_SESSION['userdata']['date_of_birth']);
echo $dob_arr['0']."/".$dob_arr['1']."/".$dob_arr['2'];
?>
</td>
 <td colspan="3">&nbsp;</td>   
  </tr>
 
<tr>
    <td>Sex</td>
  
    <td>
<?php echo $gender[$_SESSION['userdata']['sex']];?>
</td>
  <td colspan="3">&nbsp;</td>  
  </tr>

<tr>
<td height="30" align="left" valign="middle" style="font-size:12px; padding-left:30px;" colspan="5"> N.B. Please provide above the personal informations to be updated.
	</td>
    
   
  </tr>
</table>

  </td>
</tr>

<tr>

  <td height="100"  valign="bottom">

<div style="float:left;padding-top:20px;"><HR>Signature of the Principal/TIC of the college</div>
<div style="float:right;padding-top:20px;"><HR>Signature of the Controller of examination</div>
  </td>
</tr>

<?php }?>

<!-////////////////////////////////////////////////////////////////-->

<tr>
  <td height="40" align="center" valign="middle">
<input name="Submit1" type="button" class="noprint" value="PRINT" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 9px;font-weight: bold; background-image:url(./images/tab_up.png);color: #666666;border: 1px solid #666666;text-align:center;width:108px; height:22px;" onclick="window.print();"/>&nbsp;
<input name="Submit1" type="button" class="noprint" value="LOGOUT" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 9px;font-weight: bold; background-image:url(./images/tab_up.png);color: #666666;border: 1px solid #666666;text-align:center;width:108px; height:22px;" onclick="window.location.href='logout.php';"/>
</td>
</tr>


           </table>
          </td>
        </tr>
      </table></td>
  </tr>
  
  
</table>
</td>
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
    <td valign="bottom">
     <DIV class="noprint"> <?php include "./lib/admin_bottom.php";?></DIV>
	  </td>
  </tr>
</table>
</td>
  </tr>
</table>

</body>
</html>
<script language="JavaScript" src="./scripts/login.js"></script>
