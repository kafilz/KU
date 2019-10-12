<!--<script src="./scripts/popcalendar.js"></script> -->

<link type="text/css" rel="stylesheet" href="../style/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="../scripts/dhtmlgoodies_calendar.js?random=20060118"></script>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" background="../images/bottom_shadow_bg.jpg">
            <tr height="35">
              <td width="15%" valign="top" style="padding-top:3px;">
			   <?php if($_SESSION["ADMIN"] == true){?>
			   <a href = '#' class = 'categorylink33' onclick="loading('change_password.php?target=change_password','change_password');">&nbsp;&nbsp;Change Password</a><?php }?>
	          <div id="change_password"></div></td>
			
			   <td width="27%" valign="top" style="padding-top:3px;">
			   
			   <!--<a href = '#' class = 'categorylink33' onclick="loading('update_email.php?target=update_email','update_email');">&nbsp;&nbsp;Edit Admin Email</a> -->
	          <div id="update_email"></div></td>
			   <td width="41%" align="right" valign="top" style="color:#000000; font-size:11px;font-family: Verdana, Arial, Helvetica, sans-serif;padding-top:3px;">You are logged in as&nbsp;&nbsp;<span style="color:#00CCFF;"><?php echo $_SESSION["USERNAME"];?></span><?php echo $_SESSION["text"];?></td>
			   <!--<td width="6%" align="right" valign="top"><a href = '<?php echo $_SERVER['REQUEST_URI'];?>' class = 'categorylink33'>Refresh</a></td> -->
			   <td width="5%" align="right" valign="top" style="padding-top:3px;"><?php if($_SESSION["ADMIN"] == true){?><a href = 'home.php' class = 'categorylink33'>Home</a><?php }?></td>
			   <td width="6%" align="right" valign="top" style="padding-top:3px;"><a href = 'logout.php' class = 'categorylink33'>Logout&nbsp;&nbsp;</a></td>
		  </tr>
		</table>		

		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		
		<tr>	
		<td width="100%" valign="top" height="50">
		<?php if($_SESSION["ADMIN"] == true){?>
		<nav>
	<ul>
		
		
		<li>
		<a href="#" onclick="loading('report_param01.php?target=mydata','mydata');">Download Data</a>
		</li>
		<!--<li>
		<a href="list_users.php">Paid Users</a>
		</li>
		<li>
		<a href="list_content.php">Manage Contents</a>
		</li>-->
		<div id="mydata"></div>	 
		
	</ul>
</nav><?php }?>

		</td>				
		
	    </tr>
      </table> 
