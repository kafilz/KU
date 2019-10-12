<!--<script src="./scripts/popcalendar.js"></script> -->
<?php
$qr = "SELECT * FROM student_details WHERE stud_id='".$_SESSION['stud_id']."'";
$rst = mysql_query($qr);
$num = mysql_num_rows($rst);
$row = mysql_fetch_assoc($rst);
 if($num > 0)
{
 $_SESSION['userdata'] = $row;
}
$university = "UNIVERSITY OF KALYANI";
?>

<link type="text/css" rel="stylesheet" href="./style/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="./scripts/dhtmlgoodies_calendar.js?random=20060118"></script>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#960027">
            <tr height="42">
              <td width="60%" align="left" valign="middle"><img src="./images/header.png" border="0"  width="" height="" /> </td>	
			
			  
			   
<td width="40%" align="right" valign="middle" style="color:#ffffff; font-size:11px;font-family: Verdana, Arial, Helvetica, sans-serif;padding-top:1px;padding-right:20px;">
	You are logged in as&nbsp;&nbsp;<span style="color:#00CCFF;"><?php echo $_SESSION["s_name"];?></span><?php echo $_SESSION["text"];?>&nbsp;&nbsp;<a href = 'student_home.php' class = 'categorylink33' style="color:#FFFFFF;">Home</a>	&nbsp;<a href = 'logout.php' class = 'categorylink33' style="color:#FFFFFF;">Logout&nbsp;</a>    
<div styel="float:right;" class="noprint" style="color:#FFFFFF;">
                         <p>Helpline no for colleges only&nbsp; <img src="images/phone.png">  (033) 2582-8750</p>
			<p>Email.&nbsp; kuhelpdesk@klyuniv.ac.in</p><div>
                    </div>
		      </td>
	      </tr>
		  <tr><td colspan="10">
		 
		  </td></tr>
		</table>		


	 
			
		

		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		
		<tr>	
		<td width="100%" valign="top" height="50">
		
		<nav>
	<ul>
		
		
		<?php 
		 if($_SESSION['userdata']['s1_enrl']=='NA' && $_SESSION['userdata']['s2_enrl']=='NA'){
		?>
		
		<li>
		<a href="reprint1.php" target="_self">Print the form</a>
		</li>
		<?php }
		else{
		?>
		<li>
		<a href="reprint.php" target="_self">Print the form</a>
		</li>
		<?php }?>
		 
		
	</ul>
</nav>

		</td>				
		
	    </tr>
      </table> 
