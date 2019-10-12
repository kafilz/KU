<?php include "./lib/connection.php" ;
session_start();


if($_REQUEST['checking'] == 'true')
{
  
  $paper_id = $_REQUEST['paper_id']."PCC";
  $paper_id1 = $_REQUEST['paper_id1']."PCC";
  $paper_id2 = $_REQUEST['paper_id2']."PCC";

  $str = '';
  $flg = 0;
     
  $user_sql = "SELECT * FROM subject_master WHERE subject IN ('".$paper_id."', '".$paper_id1."', '".$paper_id2."')";
  $user_rst = mysql_query($user_sql); 

  $str .= '<select name="skill" id="skill" style="width:250px;" >';
 if( $flg == 1){
  $str .= '<option value="">...Please select...</option>';
  }
            
   while($rw_ge2 = mysql_fetch_assoc($user_rst)){

          $qr_sec = "SELECT subject,opt,details FROM subject_papers WHERE subject = '".substr($rw_ge2['subject'], 0,3)."HSE"."'"; 
         $rst_sec = mysql_query($qr_sec);
         $num_sec = mysql_num_rows($rst_sec);

         $disabled = 'disabled="disabled"';

         $str .= '<option value="'.$rw_ge2['subject'].'"';
          if($num_sec > 1){

           $str .= $disabled;

           } 

           $str .= '>'.$rw_ge2['subject_details'] .'</option>';         

         if($num_sec > 1){
         while($rw_sec = mysql_fetch_assoc($rst_sec)){
        $str .='<option value="'.$rw_sec['subject'].'-'.$rw_sec['opt'].'" style="font-size:15px;"> '.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rw_sec['details'].'-'.$rw_sec['opt'].'</option>';
       }
     }
    }  
         $str .='</select>';
        
  
}
?>
<td width="26%" align="left" valign="top" style="padding-left:58px;"><?php echo $str; ?></td>
<?php  exit();?>