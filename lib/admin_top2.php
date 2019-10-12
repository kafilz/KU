<?php
$subjects = subjects();
$courseType = array(
                   "H"=>"HONOURS",
		   "U"=>"HONOURS",
		   "T"=>"(Tourism & Hospitality) HONOURS",
                   "P"=>"PROGRAM",
                   "E"=>"GENERIC ELECTIVE",
		   "A"=>"GENERIC ELECTIVE",
		   "B"=>"GENERIC ELECTIVE",
                   "C"=>"AECC CORE-2",
		   "M"=>"AECC ELECTIVE"

                   );
?>
<!--<script src="./scripts/popcalendar.js"></script> -->
<script>
/*function intMarks(paper_id)
{

window.location.href='internal_marks.php?paper_id='+paper_id;
}*/
function pracMarks(paper_id)
{
window.location.href='allocator.php?redirect=practical_marks.php&paper_id='+paper_id;
}
function addedit_Marks(paper_id)
{
window.location.href='internal_marks_add_edit.php?paper_id='+paper_id;
}

function addedit_prcMarks(paper_id)
{
window.location.href='practical_marks_add_edit.php?paper_id='+paper_id;
}
function reviewMarks(paper_id)
{
window.location.href='review_marks.php?paper_id='+paper_id;
}
</script>
<link type="text/css" rel="stylesheet" href="../style/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="../scripts/dhtmlgoodies_calendar.js?random=20060118"></script>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#960027">
            <tr height="45">
              <td width="60%" align="left" valign="middle"><img src="../images/header.png" border="0"  width="" height="" /> </td>

			   <td width="40%" align="right" valign="top" style="color:#FFFFFF; font-size:11px;font-family: Verdana, Arial, Helvetica, sans-serif;padding-top:3px;">You are logged in as&nbsp;&nbsp;<span style="color:#00CCFF;"><?php echo $_SESSION["description"];?></span></td>

			   <td width="6%" align="right" valign="top" style="padding-top:3px;">&nbsp;&nbsp;<a href = 'home.php' class = 'categorylink33' style="color:#FFFFFF;">Home</a>&nbsp;&nbsp;<a href = 'logout.php' class = 'categorylink33' style="color:#FFFFFF;">Logout</a>&nbsp;&nbsp;</td>
		  </tr>
</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
			<td width="100%" valign="top" style="color:#960027;padding-top:8px; font-size:16px;font-family: Verdana, Arial, Helvetica, sans-serif;" align="center">
			UNDER GRADUATE EXAMINATION PORTAL<BR><span style="color:#960027;padding-top:8px; font-size:14px;font-family: Verdana, Arial, Helvetica, sans-serif;">3rd Semester Examination 2019</span></td></tr>
		</table>		

		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		
		<tr>	
		<td width="100%" valign="top" height="50">
		
		<nav>
	<ul>
		<?php 
		if($_SESSION["is_allocator"]!='1' && $_SESSION["is_reviewer"]!='1'  && $_SESSION["is_principal"]!='1'){
                 ?>
		<li><a href="candidate_listings_all.php">Download Candidate Listings</a></li>
		<li><a href="candidate_listings_applied_all.php">Download Candidates Applied</a></li>

		<?php }?>


		<?php 
		if($_SESSION["is_allocator"]=='1'){
                 ?>
              
		<li style="width:292px;"><a href="#" style="width:253px;font-size:17px;color:#FFFFFF;">Allocate Marks</a>
               <ul>
                
  <?php 
	$subjects_qr1 = "SELECT * FROM subject_marks WHERE paper_id='".$_SESSION["paper_id"]."'";
	$subjects_rst1 = mysql_query($subjects_qr1);
	$subjects_rw1 = mysql_fetch_assoc($subjects_rst1);
?>


<li><a href="internal_marks.php?paper_id=<?php echo $subjects_rw1["paper_id"] ;?>"><?php echo ucwords(strtolower($subjects[substr($subjects_rw1["subject"],0,3)]." ". $courseType[substr($subjects_rw1["subject"],-1,1)]))."  [ ".$subjects_rw1["cc"]." ]"."   ". $subjects_rw1["paper"];?></a></li>
		
    </ul>
	 </li> 
 <?php
}
if($_SESSION["is_principal"]=='1'){

                 ?>

<li><a href="register_teacher.php" style="width:223px;font-size:15px;color:#FFFFFF;">Register Teachers</a>
               
              
	 </li> 
              
		<li><a href="#" style="width:223px;font-size:15px;color:#FFFFFF;">View/Edit Marks</a>
               <ul>
                <li style="width:303px;">
		 <select name="subjects" id="subjects" onchange="addedit_Marks(this.value)" style="width:303px;">
  <option value="">............................Please Select...........................Paper</option>
<?php 
$subjects_qr = "SELECT DISTINCT `subject` ,`cc` FROM `subject_marks` WHERE 1";
$subjects_rst = mysql_query($subjects_qr);
while($subjects_rw = mysql_fetch_assoc($subjects_rst)){

if(sub_exist($subjects_rw["subject"])>0){
?>
   <optgroup label="<?php echo ucwords(strtolower($subjects[substr($subjects_rw["subject"],0,3)]." ". $courseType[substr($subjects_rw["subject"],-1,1)]))."[ ".$subjects_rw["cc"]." ]";?>">
  <?php 
$subjects_qr1 = "SELECT * FROM subject_marks WHERE subject='".$subjects_rw["subject"]."' ORDER BY paper ASC";
$subjects_rst1 = mysql_query($subjects_qr1);
 while($subjects_rw1 = mysql_fetch_assoc($subjects_rst1)){
?>
<option value="<?php echo $subjects_rw1["paper_id"] ;?>" style="padding-left:245px;font-size:20px;"><?php echo $subjects_rw1["paper"] ;?></option>
 <?php 
 }
}
}

?>

</select> 			       
		</li>		                           
             </ul>
		 
              
	 </li> 
              <li>
		<a href="submit_all.php" style="font-size:15px;color:#FFFFFF;">Release Marks</a>
               </li>  
		


<!--<li>
		 <a href="#" style="width:253px;font-size:17px;color:#FFFFFF;">Allocate Practical Marks</a>
               <ul>
                <li style="width:333px;">
		 <select name="subjects" id="subjects" onchange="pracMarks(this.value)" style="width:333px;">
  <option value="">............................Please Select...........................Paper</option>
<?php 
$subjects_qr = "SELECT DISTINCT sbm.subject,sbm.subject_details,sbm.type,sbm.level FROM subject_master sbm, int_marks_papers imp WHERE
                sbm.subject=imp.subject AND imp.stat='CIP' ORDER BY sbm.type ASC, sbm.level ASC ";
$subjects_rst = mysql_query($subjects_qr);
while($subjects_rw = mysql_fetch_assoc($subjects_rst)){

if(sub_exist($subjects_rw["subject"])>0){
?>
   <optgroup label="<?php echo ucwords(strtolower($subjects_rw["subject_details"]." ". $courseType[substr($subjects_rw["subject"],-1,1)]))."[ ".$subjects_rw["subject"]." ]";?>">
  <?php 
$subjects_qr1 = "SELECT * FROM int_marks_papers WHERE subject='".$subjects_rw["subject"]."' AND stat='CIP' ORDER BY paper";
$subjects_rst1 = mysql_query($subjects_qr1);
 while($subjects_rw1 = mysql_fetch_assoc($subjects_rst1)){
?>
<option value="<?php echo $subjects_rw1["paper_id"] ;?>" style="padding-left:245px;font-size:20px;"><?php echo $subjects_rw1["paper"] ;?></option>
 <?php 
 }
}
}
?>
</select> 			       

		</li>
		
		                           
             </ul>
		 
              
	 </li>-->




<?php } 


if($_SESSION["is_reviewer"]=='1' && $_SESSION["submitted"]>0){
                 ?>

		<li>
		 <a href="review_marks.php" style="width:253px;font-size:17px;color:#FFFFFF;">Review Marks</a>
             
		</li>
               
               
<?php

}
?>


      		 
		
	
</nav>

		</td>				
		
	    </tr>
      </table> 
