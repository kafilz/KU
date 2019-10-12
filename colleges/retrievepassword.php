<?php
include "../lib/admin-inc.php" ;
session_destroy();
session_start();
ob_start();
if($_POST["username"] != ''){
		  $qr = "SELECT * FROM admin WHERE username='".trim($_POST["username"])."'";
		  $rst = mysql_query($qr);
		  $num = mysql_num_rows($rst);
		  $row = mysql_fetch_assoc($rst);
		 	if($num == 0)
			{
				$_SESSION["message"] = 'Incorrect Username !';
			    header('Location:password_retrieval.php');exit();
			}
			else
			{
				
				$new_password = generatePassword();
				update($new_password);
				
				                $subject = "New password for the DC test admin ";
								$tpl_file= "./forget_password.html";
								$tpl_handler=fopen($tpl_file,"r");
								$tpl_message1=fread($tpl_handler,filesize($tpl_file));
								fclose($tpl_handler);
								$tpl_message = $tpl_message1;
								$tpl_message=str_replace("[SUBJECT]",$subject,$tpl_message);
								//$tpl_message=str_replace("[UPDATOR]",$_SESSION["FULLNAME"],$tpl_message);
								$tpl_message=str_replace("[PASSWORD]", $new_password,$tpl_message);
													
															
									$cnt = new PHPMailer;
									$cnt->FromName = "dctest";
									$cnt->From     = "pcbl_agentportal@rp-sg.in" ;
									$cnt->Subject  = $subject;	
									
									$cnt->Body     = stripslashes($tpl_message);
									$cnt->AltBody  = stripslashes($tpl_message);
									$cnt->IsHTML(true);
									$cnt->IsSMTP(true);
									$cnt->AddAddress($row['email']);
								
								if(!$cnt->Send()){return false;}
								else{
								$cnt->ClearAllRecipients();//return true;
								}
				
				$_SESSION["message"] = "Your password has ben sent on your email id ". $row['email'];
				//$_SESSION["message"] = 'Passwors sent on your email id.plz check. !';
			    header('Location:password_retrieval.php');exit();
			}
			
			
	
	
}
else
	{
	header('Location:password_retrieval.php');exit();
	}
ob_end_clean();

function update($new_password)
{		
		$quer  = " UPDATE admin SET  ";
		$quer .= " password ='".generateHash($new_password)."' ";
		$quer .= " WHERE  username ='".$_POST["username"]."' ";
				
		if(mysql_query($quer))
		{return true;}
		else{return false;}	
		
}
?>





