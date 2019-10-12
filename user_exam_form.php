<?php 
/****************************************************/
// Filename: user_exam_form.php
// Created: Kafil Siddiqui
/****************************************************/
include "./lib/admin-inc.php" ;

unset($_SESSION['userdata']);
$_SESSION['userdata'] = '';
$flag = 0;
$chk1 = '';
$chk2 = '';
$type = array("0"=>"DISCIPLINE CORE COURSE","1"=>"HONOURS CORE COURSE");
$type1 = array("0"=>"PROGRAMME","1"=>"HONOURS");
$sex = array("M"=>"S/O","F"=>"D/O");
$gender = array("M"=>"MALE","F"=>"FEMALE");
$cast = array("1"=>"SC","2"=>"ST","3"=>"OBC","4"=>"PH","5"=>"OBC-A","6"=>"OBC-B",""=>"GENERAL");
$semester = array("3"=>"3rd SEMESTER EXAMINATION - 2019");
$stream = array("BA"=>"B.A", "BSC"=>"B.SC", "BCOM"=>"B.COM");

/**
 * CALL FUNCTION  subjects to fetch all the subjects
 */
$subjects = subjects();
/**
 * CALL FUNCTION  fld_value to fetch all the field values
 */
$fld_value = fld_value();

if(basename($_SERVER['HTTP_REFERER'])!="user_auth.php" && basename($_SERVER['HTTP_REFERER'])!="confirm.php"){
  header('Location:user_auth.php');exit();
}
if(user_exists($_SESSION['stud_id']) > 0)
{
  $err_message="You have already submitted your examination form.";
  header('Location:user_auth.php?err_message='.base64_encode($err_message));exit();

}
/**
 * Fetch Student Details from the table student_details
 */
$qr = "SELECT * FROM student_details WHERE stud_id='".$_SESSION['stud_id']."'";
$rst = mysql_query($qr);
$num = mysql_num_rows($rst);
$row = mysql_fetch_assoc($rst);
if($num > 0)
{
  $_SESSION['userdata'] = $row;
                
}

$ids = explode(",",base64_decode($_REQUEST['ids']));
$chk = '';

if($_REQUEST['updation']=='1')
{
  $chk =" CHECKED";
}

$sub_lc = "ENGLCC";
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
<!-- 101201701079 -->
</head>

<body bgcolor="#FFFFFF">
<!--<form id="userhome" name="userhome" method="post" action="confirm.php" onsubmit="return formvalidation(this,'<?php echo $_SESSION['userdata']['main_subject'];?>','<?php echo $_SESSION['userdata']['is_hons'];?>','<?php echo $_SESSION['userdata']['stream'];?>');" > -->
<form id="userhome" name="userhome" method="post" action="confirm.php" onsubmit="return formvalidation4(this,'<?php echo $_SESSION['userdata']['is_hons'];?>','<?php echo $_SESSION['userdata']['stream'];?>');">
<input type="hidden" name="lcc" value="<?php echo $sub_lc;?>"/>

<table width="100%"  border="1" align="center" cellpadding="1" cellspacing="0" style=" border-collapse:collapse; border-color:#0582BC;" >
  <tr>
    <td valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><?php include "./lib/admin_top.php";?>
      
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td valign="top" id="place_holder" style="padding-left:30px; padding-right:20px; padding-top:10px;">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
      
        
<tr>
  <td  align="center" valign="top">
  
  <table width="97%" border="0" cellspacing="2" cellpadding="2">
  
  
  <tr>
    
     <td width="50%" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="2">
     <tr><td colspan="2">To</td> </tr>
   <tr><td colspan="2">The Controller of Examinations</td> </tr>
   <tr><td colspan="2">University of Kalyani</td> </tr>
   <tr><td colspan="2">Kalyani,Nadia</td> </tr>
         <tr><td colspan="2"> West Bengal-741235,India</td> </tr>
</table></td>
   <td width="50%" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  
     <tr align="center"><td width="50%">&nbsp;</td><td width="50%"></td> </tr>
   <tr align="center"><td width="50%">&nbsp;</td><td width="50%"><img src="
<?php 
if(file_exists('./photos/'.$_SESSION['userdata']['photo_id'].'.jpg')){
  echo './photos/'.$_SESSION['userdata']['photo_id'].'.jpg';
}else{  echo './images/nophoto.jpeg';}?>" width="110" height="132" border="0" /></td> </tr>
  <tr align="center"><td width="50%">&nbsp;</td><td width="50%">
<?php 
if(file_exists('./signatures/'.$_SESSION['userdata']['photo_id'].'.jpg')){
?>
<img src="<?php echo './signatures/'.$_SESSION['userdata']['photo_id'].'.jpg';?>" border="0" style="width:180px;height:60px;" />
<?php
}else{?>
<div style="font-size:13px; border:solid 1px; border-color:#000000; padding-left:2px;padding-right:2px; width:160px;height:35px;" align="center"><strong><BR>Signature not available</strong></div>
<?php
}
?></td> </tr>
   <tr align="center"><td width="50%">&nbsp;</td><td width="50%">&nbsp;</td> </tr>
 
</table></td>
  </tr>
 
</table></td>
</tr>

 <tr>
  <td align="left" valign="top" style="padding-left:30px;">Sir/Madam,</td>
</tr>
<tr>
  <td align="left" valign="top" style="padding-left:30px;">I would like to apply for examination stated below. I satisfy all the conditions for this purpose under the regulations of the university.Any wrong information/non-compliance will render my candidature liable to be cancelled at any stage of the Examinations as will be decided by the university.
  <div align="right" style="padding-right:40px;">Yours faithfully</div>
  <div align="right" style="padding-right:40px; padding-top:20px;"><?php echo ucwords(strtolower($_SESSION['userdata']['s_name']));?></div>
  <div align="right" style="padding-right:40px;"></div>
  <div align="left" style="padding-left:10px; padding-top:20px;">Dated: <?php echo date("d/m/Y");?></div>
  </td>
</tr>
<tr>

<td align="center" valign="top" style="font-size:15px; padding-top:20px; padding-bottom:20px;"><span style="font-size:15px;"><strong>
<?php echo $stream[$_SESSION['userdata']['stream']].". ".$type1[$_SESSION['userdata']['is_hons']]." ".$semester[3];?> </strong></span><BR><strong><span style="font-size:13px;">[UNDER C.B.C.S]  </span></strong></td>
</tr>
<tr>
  <td  align="center" valign="top">
  <table width="90%" border="0" cellspacing="4" cellpadding="5" align="center">

  <tr>
    <td>Registration Number</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="1">
<div style="width: 380px;">
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:10px;padding-right:10px; width:100px;float: left;" align="center"><strong><?php echo $_SESSION['userdata']['reg_no'];?></strong></div>
 <div style="float: left; width: 80px;padding-left:15px;">Session <b>:</b></div>
 <div style="font-size:15px; border:solid 1px; border-color:#000000; padding-left:10px;padding-right:10px; width:60px;float: left;" align="center"><strong><?php echo ($_SESSION['userdata']['reg_yr']-1)."-".($_SESSION['userdata']['reg_yr']-2000);?></strong></div>
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
<input type="text" name="mob_no" style="width:100px;" id="mob_no" value="<?php echo $_SESSION['userdata']['mob_no'];?>" maxlength="10" />&nbsp;&nbsp;Provide your latest Mob No (if changed).
</td>
  </tr>
<tr>
    <td>Aadhaar No</td>
    <td width="2%" align="center"><b>:</b></td>
    <td colspan="5"><?php echo $_SESSION['userdata']['aadhaar_no'];?></td>
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
  <td height="40" align="left" valign="bottom"><span style="font-size:14px;padding-left:60px;"><strong>The following subjects is offered to the candidate for the said Examination.</strong></span><BR></td>
</tr>

<tr>
  <td height="30" align="center" valign="top">
<?php  if(($_SESSION['userdata']['stream']=="BA" || $_SESSION['userdata']['stream']=="BSC" || $_SESSION['userdata']['stream']=="BCOM") && $_SESSION['userdata']['is_hons']=="1"){?>
  <table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
<tr>
 <td width="25%" align="left"><strong><?php echo $type[$_SESSION['userdata']['is_hons']];?></strong></td>
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
 <td width="26%" align="left"  colspan="2">
<?php
//echo $_SESSION['userdata']['sub2']."MK";
?>
<select name="generic" id="generic" style="width:280px;">
<?php
if($_SESSION['userdata']['stream']!="BCOM"){?>
  
<?php if($_SESSION['userdata']['stream']=="BSC"){
  
  if($_SESSION['userdata']['imp_pap'] == 'NA' || $_SESSION['userdata']['sub2'] == ''){?>

    <option value="">Please Choose</option>
    
   <?php $qr_ge = "SELECT * FROM subject_master WHERE stat = '2E' AND strm IN ('S','B')  AND subject != '".$_SESSION['userdata']['sub2_old']."' AND fld_value !=".$fld_value[$_SESSION['userdata']['main_subject']];
  
  }else{

    $qr_ge = "SELECT * FROM subject_master WHERE subject = '".$_SESSION['userdata']['sub2']."'";    
  }
}
else if($_SESSION['userdata']['stream']=="BA"){
  
  if($_SESSION['userdata']['imp_pap'] == 'NA' || $_SESSION['userdata']['sub2'] == ''){ ?>

    <option value="">Please Choose</option>
    
    <?php $qr_ge = "SELECT * FROM subject_master WHERE stat = '2E' AND strm IN ('A','B')  AND subject != '".$_SESSION['userdata']['sub2_old']."' AND fld_value !=".$fld_value[$_SESSION['userdata']['main_subject']];
  
  }else{

    $qr_ge = "SELECT * FROM subject_master WHERE subject = '".$_SESSION['userdata']['sub2']."'";    
  }
}
$rst_ge = mysql_query($qr_ge);
while($rw_ge = mysql_fetch_assoc($rst_ge)){
?>
<option value="<?php echo $rw_ge['subject'];?>" <?php if(substr($_REQUEST['generic'],0,3) == substr($rw_ge['subject'],0,3)){echo " SELECTED";} ?>><?php echo "[ ".$rw_ge['subject_details']." ] ".$subjects[substr($rw_ge['subject'],0,3)];?></option>
<?php  } }else{?>
<option value="<?php echo $_SESSION['userdata']['sub2'];?>" <?php if( $_SESSION['userdata']['sub2']==$_REQUEST['generic']){ echo " SELECTED";}?>><?php echo "[ ".$subjects[substr($_SESSION['userdata']['sub2'],0,3)]." ] ".$subjects[substr($_SESSION['userdata']['sub2'],0,3)];?></option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
<!-- <td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></td> -->
<td width="26%" align="left">
<select name="skill" id="skill" style="width:280px;">    
<option value="<?php echo $_SESSION['userdata']['sub1'];?>"><?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></option>
    </select>
  </td>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $se_sql = "SELECT * FROM subject_papers WHERE subject = '".substr($_SESSION['userdata']['sub1'],0,3)."HSE"."' ORDER BY paper ASC";
      $se_rst = mysql_query($se_sql);
      while($se_row = @mysql_fetch_array($se_rst)){
      ?>
    <tr>
      <td width="20%"><?php echo $se_row['cour_cate'];?></td>
      <td width="80%"><?php echo ucwords(strtolower($se_row['details']));?></td>
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
  <td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></td>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['sub1']."' ORDER BY paper ASC";
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
 <td width="26%" align="left"><?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)]?></td>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".substr($_SESSION['userdata']['sub1'],0,3)."PSE"."' ORDER BY paper ASC";
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
  <td width="26%" align="left"><?php echo $subjects[substr($sub_lc,0,3)];?></td>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sub_lc."' ORDER BY paper ASC";
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
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-1)</strong></td>
    <td width="26%" align="left">
<select name="main_subject" id="main_subject" style="width:250px;" onchange="getSkillEnhancement('skillenhancement.php?','skill','cc2',this.value,document.getElementById('other_subject1').value,document.getElementById('other_subject2').value);">
<?php
if($_SESSION['userdata']['imp_pap']!='AP'){
$qr_main = "SELECT * FROM `subject_master` WHERE RIGHT(`subject`,3) = 'PCC' And strm IN ('S','B') ";
$rst_main = mysql_query($qr_main); 
while($rw_main = mysql_fetch_assoc($rst_main)){
?>
<option value="<?php echo substr($rw_main['subject'],0,3);?>" <?php if($_REQUEST['main_subject'] == substr($rw_main['subject'],0,3)){echo " SELECTED";} elseif(substr($rw_main['subject'],0,3) == substr($_SESSION['userdata']['sub1'],0,3)){ echo " SELECTED";}?>>
<?php echo $rw_main['subject_details'];?></option>
<?php }
}
else{
?>
  <option value="<?php echo substr($_SESSION['userdata']['sub1'],0,3);?>"> <?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></option>
<?php
}
?>
</select>
</td>
<?php
if($_SESSION['userdata']['imp_pap']!='NA'){
?>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['sub1']."' ORDER BY paper ASC";
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
<?php
}
?>
</tr>
<tr>
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-2)</strong></td>
  <td width="26%" align="left">
<select name="other_subject1" id="other_subject1" style="width:250px;" onchange="getSkillEnhancement('skillenhancement.php?','skill','cc2',this.value,document.getElementById('main_subject').value,document.getElementById('other_subject2').value);">
<?php
if($_SESSION['userdata']['imp_pap']!='AP'){
$qr_subject1 = "SELECT * FROM `subject_master` WHERE RIGHT(`subject`,3) = 'PCC' And strm IN ('S','B') ";
$rst_subject1 = mysql_query($qr_subject1); 
while($rw_subject1 = mysql_fetch_assoc($rst_subject1)){
?>
<option value="<?php echo substr($rw_subject1['subject'],0,3);?>" <?php if($_REQUEST['other_subject1'] == substr($rw_subject1['subject'],0,3)){echo " SELECTED";} elseif(substr($rw_subject1['subject'],0,3) == substr($_SESSION['userdata']['sub2'],0,3)){ echo " SELECTED";}?>>
<?php echo $rw_subject1['subject_details'];?></option>
<?php }
}
else{
?>
  <option value="<?php echo substr($_SESSION['userdata']['sub2'],0,3);?>"> <?php echo $subjects[substr($_SESSION['userdata']['sub2'],0,3)];?></option>
<?php
}
?>
</select>
</td>
<?php
if($_SESSION['userdata']['imp_pap']!='NA'){
?>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['sub2']."' ORDER BY paper ASC";
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
<?php
}
?>
</tr>
<tr>
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-3)</strong></td>
   <td width="26%" align="left">
<select name="other_subject2" id="other_subject2" style="width:250px;" onchange="getSkillEnhancement('skillenhancement.php?','skill','cc3',this.value, document.getElementById('other_subject1').value,document.getElementById('main_subject').value);">
<?php
if($_SESSION['userdata']['imp_pap']!='AP'){

$qr_subject2 = "SELECT * FROM `subject_master` WHERE RIGHT(`subject`,3) = 'PCC' And strm IN ('S','B') ";
$rst_subject2 = mysql_query($qr_subject2); 
while($rw_subject2 = mysql_fetch_assoc($rst_subject2)){
?>
<option value="<?php echo substr($rw_subject2['subject'],0,3);?>" <?php if($_REQUEST['other_subject2'] == substr($rw_subject2['subject'],0,3)){echo " SELECTED";} elseif(substr($rw_subject2['sub3'],0,3) == substr($_SESSION['userdata']['main_subject'],0,3)){ echo " SELECTED";}?>>
<?php echo $rw_subject2['subject_details'];?></option>
<?php }
}
else{
?> <option value="<?php echo substr($_SESSION['userdata']['sub3'],0,3);?>"> <?php echo $subjects[substr($_SESSION['userdata']['sub3'],0,3)];?></option>
<?php
}
?>
</select>
</td>
<?php
if($_SESSION['userdata']['imp_pap']!='NA'){
?>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['sub3']."' ORDER BY paper ASC";
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
<?php
}
?>
</tr>
<tr>
<td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
<td width="26%" align="left" colspan="2">
<select name="skill" id="skill" style="width:250px;"> 
<option value="">Please Choose</option>   
<?php 
    $qr_ge = "SELECT * FROM subject_master WHERE subject IN ('".$_SESSION['userdata']['sub1']."', '".$_SESSION['userdata']['sub2']."', '".$_SESSION['userdata']['sub3']."')"; 
      $rst_ge  = mysql_query($qr_ge);      
  while($rw_ge = mysql_fetch_assoc($rst_ge)){  

        $qr_sec = "SELECT subject,opt,details FROM subject_papers WHERE subject = '".substr($rw_ge['subject'], 0,3)."HSE"."'"; 
        $rst_sec = mysql_query($qr_sec);
        $num_sec = mysql_num_rows($rst_sec);    
    ?>
  <option value="<?php echo $rw_ge['subject'];?>" <?php if($num_sec > 1){?>disabled="disabled"<?php }?>><?php echo $rw_ge['subject_details'];?></option>
     <?php        
        if($num_sec > 1){
         while($rw_sec = mysql_fetch_assoc($rst_sec)){?>
        <option value="<?php echo $rw_sec['subject']."-".$rw_sec['opt'];?>" style="font-size:15px;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rw_sec['details']."-".$rw_sec['opt']; ?></option>
     <?php 
      }
     }
    }?>
    </select>
  </td>
</tr>
</table>
<?php }
elseif($_SESSION['userdata']['stream']=="BA" && $_SESSION['userdata']['is_hons']=="0"){
?>
<table width="90%" border="1" cellspacing="4" cellpadding="5" align="center" style="border-collapse:collapse">
<tr>
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-1)</strong></td>
  <td width="26%" align="left">
<select name="main_subject" id="main_subject" style="width:250px;" onchange="getSkillEnhancement('skillenhancement.php?','skill','cc1',this.value,document.getElementById('other_subject').value);">
<?php
if($_SESSION['userdata']['imp_pap']!='AP'){
$qr_main = "SELECT * FROM `subject_master` WHERE RIGHT(`subject`,3) = 'PCC' And strm IN ('A','B') ";
$rst_main = mysql_query($qr_main); 
while($rw_main = mysql_fetch_assoc($rst_main)){
?>
<option value="<?php echo substr($rw_main['subject'],0,3);?>" <?php if($_REQUEST['main_subject'] == substr($rw_main['subject'],0,3)){echo " SELECTED";} elseif(substr($rw_main['subject'],0,3) == substr($_SESSION['userdata']['sub1'],0,3)){ echo " SELECTED";} ?>>
<?php echo $rw_main['subject_details'];?></option>
<?php }
}
else{
?>
  <option value="<?php echo substr($_SESSION['userdata']['sub1'],0,3);?>"> <?php echo $subjects[substr($_SESSION['userdata']['sub1'],0,3)];?></option>
<?php
}
?>
</select>
</td>
<?php
if($_SESSION['userdata']['imp_pap']!='NA'){
?>
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
<?php
}
?>
</tr>
<tr>
 <td width="25%" align="left"><strong>CORE COURSE (DISCIPLINE-2)</strong></td>
  <td width="26%" align="left">
<select name="other_subject" id="other_subject" style="width:250px;" onchange="getSkillEnhancement('skillenhancement.php?','skill','cc2',this.value,document.getElementById('main_subject').value);">
<?php
if($_SESSION['userdata']['imp_pap']!='AP'){
$qr_subject1 = "SELECT * FROM `subject_master` WHERE RIGHT(`subject`,3) = 'PCC' And strm IN ('A','B') ";
$rst_subject1 = mysql_query($qr_subject1); 
while($rw_subject1 = mysql_fetch_assoc($rst_subject1)){
?>
<option value="<?php echo substr($rw_subject1['subject'],0,3);?>" <?php if($_REQUEST['other_subject'] == substr($rw_subject1['subject'],0,3)){echo " SELECTED";} elseif(substr($rw_subject1['subject'],0,3) == substr($_SESSION['userdata']['sub2'],0,3)){ echo " SELECTED";} ?>>
<?php echo $rw_subject1['subject_details'];?></option>
<?php }
}
else{
?>
  <option value="<?php echo substr($_SESSION['userdata']['sub2'],0,3);?>"> <?php echo $subjects[substr($_SESSION['userdata']['sub2'],0,3)];?></option>
<?php
}
?>
</select>
</td>
<?php
if($_SESSION['userdata']['imp_pap']!='NA'){
?>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$_SESSION['userdata']['sub2']."' ORDER BY paper ASC";
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
<?php
}
?>
</tr>
<tr>
<td width="25%" align="left"><strong>SKILL ENHANCEMENT COURSE</strong></td>
<td width="26%" align="left" colspan="2">
<select name="skill" id="skill" style="width:250px;"> 
<option value="">Please Choose</option>   
<?php 
    $qr_ge = "SELECT * FROM subject_master WHERE subject IN ('".$_SESSION['userdata']['sub1']."', '".$_SESSION['userdata']['sub2']."')"; 
      $rst_ge  = mysql_query($qr_ge);      
  while($rw_ge = mysql_fetch_assoc($rst_ge)){  

        $qr_sec = "SELECT subject,opt,details FROM subject_papers WHERE subject = '".substr($rw_ge['subject'], 0,3)."HSE"."'"; 
        $rst_sec = mysql_query($qr_sec);
        $num_sec = mysql_num_rows($rst_sec);    
    ?>
  <option value="<?php echo $rw_ge['subject'];?>" <?php if($num_sec > 1){?>disabled="disabled"<?php }?>><?php echo $rw_ge['subject_details'];?></option>
     <?php        
        if($num_sec > 1){
         while($rw_sec = mysql_fetch_assoc($rst_sec)){?>
        <option value="<?php echo $rw_sec['subject']."-".$rw_sec['opt'];?>" style="font-size:15px;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rw_sec['details']."-".$rw_sec['opt']; ?></option>
     <?php 
      }
     }
    }?>
    </select>
  </td>
</tr>
<tr>
<td width="25%" align="left"><strong>LANGUAGE CORE COURSE</strong></td>
<td width="26%" align="left"><?php echo $subjects[substr($sub_lc,0,3)];?>
</td>
<td  width="45%" align="left">
<?php
echo $subjects[substr($sub_lc,0,3)];?>
</td> 
<?php
/*if($_SESSION['userdata']['imp_pap']!='NA'){
?>
<td  width="45%" align="left">
    <table width="100%" border="0" cellspacing="2" cellpadding="3" align="center">
      <?php
      $course_sql = "SELECT * FROM subject_papers WHERE subject = '".$sub_lc."' ORDER BY paper ASC";
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
<?php
} */
?>
</tr>
</table>
<?php
}
?>
  </td>
</tr>
<tr>
  <td height="30" align="left" valign="top" style="padding-left:50px;"><input type="checkbox" name="updation" style="width:22px;" value="1" <?php echo $chk;?> />&nbsp;If you want to update your personal informations, please tick <img src="./images/tick.svg" width="16" height="16" border="0" /> the check box</td>
</tr>
<tr>
  <td height="30" align="center" valign="top"><input name="Submit" type="submit" class="submit1" value="SUBMIT" style="width:58px; height:22px;" /></td>
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
