<?php
$university = "UNIVERSITY OF KALYANI";
?>
<!--<script src="./scripts/popcalendar.js"></script> -->

<link type="text/css" rel="stylesheet" href="./style/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="./scripts/dhtmlgoodies_calendar.js?random=20060118"></script>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#960027">
            <tr>
           <td width="70%" align="left" valign="middle"><img src="./images/header.png" border="0"  width="" height="" /> </td>
			  
<td width="30%" align="right" valign="middle" style="color:#000000; font-size:11px;font-family: Verdana, Arial, Helvetica, sans-serif;padding-top:1px;padding-right:20px;">
<?php
if( $_SESSION['loginType'] == "2"){
?>
You are logged in as&nbsp;&nbsp;<span style="color:#00CCFF;"><?php echo $_SESSION["s_name"];?></span><?php echo $_SESSION["text"];?>&nbsp;&nbsp;<a href = 'student_home.php' class = 'categorylink33' style="color:#FFFFFF;">Home</a>	&nbsp;<a href = 'logout.php' class = 'categorylink33' style="color:#FFFFFF;">Logout&nbsp;</a> 
<?php }
elseif( $_SESSION['loginType'] == "1" && basename($_SERVER['PHP_SELF']) == "offline_payment.php" ||  basename($_SERVER['PHP_SELF']) == "success.php"){
?>
&nbsp;&nbsp;<a href = 'index.php' class = 'categorylink33' style="color:#FFFFFF;">Home</a>
<?php
}
?>   		    
<div styel="float:right;" class="noprint" style="color:#FFFFFF;">
                         <p>Helpline no for colleges only&nbsp; <img src="images/phone.png">  (033) 2582-8750</p>
			<p>Email.&nbsp; kuhelpdesk@klyuniv.ac.in</p><div>
                    </div>
		      </td>
	      </tr>
		  <tr><td colspan="10">
		 
		  </td></tr>
		</table>		

		
