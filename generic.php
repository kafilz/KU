<?php include "./lib/connection.php" ;
session_start();

if($_REQUEST['checking'] == 'true')
{
  
	$str = '';
        $flg = 0;
	$user_sql = "SELECT * FROM subjects_details WHERE paper_id='".$_REQUEST['paper_id']."' ";

      //echo  $user_sql;exit();
	$user_rst = mysql_query($user_sql);
	
	$row = @mysql_fetch_array($user_rst);

           $ge2_sql = "SELECT * FROM subjects_details WHERE subject='".$row['subject']."' AND parent_subject='".$row['parent_subject']."'
                          AND paper LIKE '%CEC 3.2%' ORDER BY paper ASC ";
           $rst_ge2 = mysql_query($ge2_sql);
           $num = mysql_num_rows($rst_ge2);

	 if($num == '0')
        {	
            $ge2_sql = "SELECT * FROM subjects_details WHERE  parent_subject='".$row['parent_subject']."'
                          AND paper LIKE '%CEC 3.2%' ORDER BY paper ASC ";
            $rst_ge2 = mysql_query($ge2_sql);

            $flg = 1;
	 }
         
           
            
            $str .= '<select name="generic1" id="generic1" style="width:350px;" >';
           if( $flg == 1){
            $str .= '<option value="">...Please select...</option>';
            }
            
   while($rw_ge2 = mysql_fetch_assoc($rst_ge2)){

         $str .= '<option value="'.$rw_ge2['paper_id'].'"> [ '.$rw_ge2['paper'] .' ] '.$rw_ge2['details1'].'</option>';
    }  
         $str .='</select>';
        
	
}

$str1 .= '<select name="generic1" id="generic1" style="width:350px;" >';
$str1 .= '<option value="">...Please Choose...</option>';
$str1 .= '<option value="sub1">Subject 1</option>';
$str1 .= '<option value="sub2">Subject 2</option>';
$str1 .= '<option value="sub3">Subject 3</option>';
$str1 .='</select>';
?>
<td width="66%" align="left" valign="top" style="padding-left:58px;"><?php echo $str1; ?></td>
<?php  exit();?>

