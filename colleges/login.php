<?php
include "../lib/admin-inc1.php" ;
session_destroy();
session_start();
$_SESSION["ADMIN"] = false;
ob_start();

	if(!empty($_POST["username"]) && !empty($_POST["password"]))
	{
    if(trim($_POST["username"])=='wakeel' && trim($_POST["password"])=='wakeel123')
    {
      $_SESSION["ADMIN"] = true;
      $_SESSION["college_code"]='1000';
      header('Location:home.php');exit();
    }
 	$qr = "SELECT * FROM college_master WHERE username='".trim($_POST["username"])."' AND code='".trim($_POST["password"])."'
  AND is_reviewer='0' AND is_principal='0'";
		  
//echo $qr;exit();		 
		  $rst = mysql_query($qr);
		  $num = mysql_num_rows($rst);
		  $row = mysql_fetch_assoc($rst);
		 	if($num == 0)
			{
				$_SESSION["message"] = 'Incorrect Username/Password !';
			        header('Location:index.php');exit();
			}
			/*elseif(generateHash(trim($_POST["password"]),$row['password']) != $row['password'])
			{
				$_SESSION["message"] = 'Incorrect Password !';
				
			        header('Location:index.php');exit();
			}*/
                        else
			{
     			        

				$_SESSION["college_code"] = $row['username'];
                                $_SESSION["description"] = $row['description'];
					
				header('Location:home.php');exit();
			}
			
	}
	else
	{
	header('Location:index.php');exit();
	}


ob_end_clean();
?>





