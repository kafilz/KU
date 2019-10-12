<?php
date_default_timezone_set("Asia/Kolkata");
ini_set('max_execution_time', 600);
$title = "KU EXAMINATION PORTAL";
//Remote Domain
//$DOMAIN = "";
//////////////////////////////////////////////////////////////////////////////////////
function base64En($num,$val) {
	for($i=0; $i<$num; $i++) {
		$val = base64_encode($val);
	}
	Return $val;
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function base64De($num,$val) {
	for($i=0; $i<$num; $i++) {
		$val = base64_decode($val);
	}
	Return $val;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
function valid_email($address)
{
  // check an email address is possibly valid
  if (ereg('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address))
	{
    return true;
	}
  else{
    return false;
  }
}
//////////////////////////////////////////////////////////////////////////////
function validPhone($phone){
if(!preg_match("/[^0-9\ ]+$/",$phone)) return TRUE;
else return FALSE;
}


function getIndianDate()
{
	$now = strtotime("now");
	$now =$now + 12*3600 +30*60;
	$indian_date =  date("Y-m-d",$now);
	return $indian_date;
}

function getIndianTime()
{
	$now = strtotime("now");
	$now =$now + 12*3600 +30*60;
	$indian_time =  date("H:i:s",$now);
	return $indian_time;
} 

function getcourse_det($abbr)
{
$user_sql = "SELECT details FROM subjects WHERE abbr='".$abbr."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}

function getcenter_det($sc_code)
{
$user_sql = "SELECT description FROM college_master WHERE username='".$sc_code."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function getsubjects_det($subject)
{
        $user_sql = "SELECT subject_details FROM subject_master  WHERE subject = '".$subject."'";

	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
 

function user_exists($stud_id)
{
       $user_sql = "SELECT count(*) FROM student_course_opted WHERE stud_id='".$stud_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function sub_exist($subject)
{
$user_sql = "SELECT student_details.*,student_course_opted.courses_chosen,student_course_opted.office_no FROM `student_details`,student_course_opted WHERE
      student_details.stud_id=student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
       AND student_course_opted.courses_chosen LIKE '%".$subject."%' ORDER BY student_details.s_name ASC ";

	$user_rst = mysql_query($user_sql);
	return(@mysql_num_rows($user_rst));
		
}


function alloc_reqd($subject)
{
      
$user_sql = "SELECT COUNT(*) FROM `student_details`,student_course_opted WHERE
      student_details.stud_id=student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
       AND student_course_opted.courses_chosen LIKE '%".$subject."%' ORDER BY student_details.s_name ASC ";

	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function alloc_reqd1($subject)
{
      
$user_sql = "SELECT COUNT(*) FROM `student_details`,student_course_opted WHERE
      student_details.stud_id=student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
       AND student_course_opted.courses_chosen LIKE '%".$subject."%' ORDER BY student_details.s_name ASC ";

	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function alloc_done($paper_id)
{
 $user_sql = "SELECT COUNT(*) FROM `student_internal_marks`,student_details WHERE
                student_internal_marks.stud_id=student_details.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
                 AND student_internal_marks.paper_id  = '".$paper_id."'";


	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function alloc_done1($paper_id)
{
 $user_sql = "SELECT COUNT(*) FROM `student_practical_marks`,student_details WHERE
                student_practical_marks.stud_id=student_details.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
                 AND student_practical_marks.paper_id  = '".$paper_id."'";


	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}


function marks_exists($stud_id,$paper_id)
{
       $user_sql = "SELECT count(*) FROM student_internal_marks WHERE stud_id='".$stud_id."' AND paper_id='".$paper_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function practical_marks_exists($stud_id,$paper_id)
{
       $user_sql = "SELECT count(*) FROM student_practical_marks WHERE stud_id='".$stud_id."' AND paper_id='".$paper_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function user_exists1($username,$user_id)
{
    $user_sql = "SELECT count(*) FROM user WHERE username='".$id."' AND user_id<>'".$user_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}



function get_appno()
{
        $str = "UE".date('y');
        $app_id = $_SESSION['userdata']['applied_id'];
        $cnt = (5-strlen($app_id));
        for($i=1;$i<= $cnt;$i++){$str.='0';}
        $str = $str.$app_id;
	return($str);
		
}
function get_office_no()
{
       $ocode = array("BA1"=>"A","BA0"=>"B","BSC1"=>"C","BSC0"=>"D","BCOM1"=>"E","BCOM0"=>"F","BBA1"=>"Q","BBAT1"=>"R","BCA1"=>"P");

        $str = $ocode[$_SESSION['userdata']['stream'].$_SESSION['userdata']['is_hons']].$_COOKIE["USERNAME"]."/";
        $app_id = $_SESSION['userdata']['applied_id'];
        $cnt = (5-strlen($app_id));
        for($i=1;$i<= $cnt;$i++){$str.='0';}
        $str = $str.$app_id;
	return($str);
		
}
 
function fetch_office_no($stud_id)
{
        $user_sql = "SELECT office_no FROM student_course_opted WHERE stud_id='".$_SESSION['userdata']['stud_id']."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}      
function fetch_appno($stud_id)
{
        $user_sql = "SELECT application_no FROM student_course_opted WHERE stud_id='".$stud_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function fetch_status($stud_id)
{
        $user_sql = "SELECT count(*)  FROM payments op, student_course_opted sco
                     WHERE op.application_no = sco.application_no AND op.status = 'SUCCESS' AND sco.stud_id='".$stud_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}

function fetch_status_on($stud_id)
{
        $user_sql = "SELECT count(*)  FROM payments op, student_course_opted sco
                     WHERE op.application_no = sco.application_no AND (sco.payment_mode = '1' OR (sco.payment_mode = '2' AND op.status = 'SUCCESS') ) AND sco.stud_id='".$stud_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}

function appno_exists($application_no)
{
        $user_sql = "SELECT count(*) FROM payments WHERE application_no ='".$application_no."'";

	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function submission_exists($username)
{
        $user_sql = "SELECT count(*) FROM college_intmarks_submission WHERE username ='".$username."' AND submission_status='1'";

	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}

function fetch_opted_course_id($stud_id)
{
        $user_sql = "SELECT courses_chosen FROM student_course_opted WHERE stud_id='".$stud_id."'";
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}


function getMonth($finishmonth)
{
	$mts = "";
	if($finishmonth == 1)
	{
	$mts  = "January";
	}
	elseif($finishmonth == 2)
	{
	$mts  = "February";
	}
	elseif($finishmonth == 3)
	{
	$mts  = "March";
	}
	elseif($finishmonth == 4)
	{
	$mts = "April";
	}
	elseif($finishmonth == 5)
	{
	$mts  = "May";
	}
	elseif($finishmonth == 6)
	{
	$mts  = "June";
	}
	elseif($finishmonth == 7)
	{
	$mts  = "July";
	}
	elseif($finishmonth == 8)
	{
	$mts  = "August";
	}
	elseif($finishmonth == 9)
	{
	$mts  = "September";
	}
	elseif($finishmonth == 10)
	{
	$mts  = "October";
	}
	elseif($finishmonth == 11)
	{
	$mts  = "November";
	}
	elseif($finishmonth == 12)
	{
	$mts  = "December";
	}
	return $mts ;
}


function generateHash($plainText, $salt = null)
{
    if ($salt === null)
    {
        $salt = substr(md5(uniqid(rand(), true)), 0, 9);
    }
    else
    {
        $salt = substr($salt, 0, 9);
    }

    return $salt . sha1($salt . $plainText);
}
function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return substr($sec ,0,2).substr($usec  ,-8,6).substr($sec ,-2,2);
}
function generatePassword()
{
           $salt = substr(md5(uniqid(rand(), true)), 0, 9);    
           return substr(sha1($salt), 0, 10);
}


function str_replace_last( $search , $replace , $str ) {
        if( ( $pos = strrpos( $str , $search ) ) !== false ) {
            $search_length  = strlen( $search );
            $str    = substr_replace( $str , $replace , $pos , $search_length );
        }
        return $str;
    }

function trim_all( $str , $what = NULL , $with = ' ' )
{
if( $what === NULL )
{
    //  Character      Decimal      Use
    //  "\0"            0           Null Character
    //  "\t"            9           Tab
    //  "\n"           10           New line
    //  "\x0B"         11           Vertical Tab
    //  "\r"           13           New Line in Mac
    //  " "            32           Space
   
    $what   = "\\x00-\\x20";    //all white-spaces and control chars
}

return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}

function subjects()
{
  $subjects = array(
    "ARB"=>"Arabic",
		"BNG"=>"Bengali",
		"BOT"=>"Botany",
		"CEM"=>"Chemistry",
		"CMS"=>"Computer Science",
		"COM"=>"Commerce",
		"DFS"=>"Defence studies",
		"ECO"=>"Economics",
		"EDC"=>"Education",
		"ENG"=>"English",
		"ENV"=>"Environmental Science",
		"FMS"=>"Flim Studies",
		"FNT"=>"Food & Nutrition",
		"GEO"=>"Geography",
		"HIN"=>"Hindi",
		"HIS"=>"History",
		"MBT"=>"Molecular Biology and Biotechnology",
		"MCB"=>"Micro Biology",
		"MLB"=>"Molecular Biology",
		"MSD"=>"Media Studies",
		"MTM"=>"Mathematics",
		"PED"=>"Physical Education",
		"PHI"=>"Philosophy",
		"PHS"=>"Physics",
		"PHY"=>"Physiology",
		"PLS"=>"Political Science",
		"SAN"=>"Sanskrit",
		"SOC"=>"Sociology",
		"STS"=>"Statistics",
		"URD"=>"Urdu",
		"ZOO"=>"Zoology",
		"ALE"=>"Alternative English (LCC)"
           );
   return $subjects;
}
 
function fld_value()
{
  $fld_value = array(           
		"ARBHCC"=>"3",
                "BNGHCC"=>"8",
                "BOTHCC"=>"4",
                "CEMHCC"=>"3",
                "CMSHCC"=>"8",
                "COMHCC"=>"",
                "DFSHCC"=>"3",
                "ECOHCC"=>"4",
                "EDCHCC"=>"1",
                "ENGHCC"=>"7",
                "ENVHCC"=>"5",
                "FMSHCC"=>"1",
                "FNTHCC"=>"4",
                "GEOHCC"=>"6",
                "HINHCC"=>"8",
                "HISHCC"=>"2",
                "MBTHCC"=>"6",
                "MCBHCC"=>"6",
                "MLBHCC"=>"6",
                "MSDHCC"=>"6",
                "MTMHCC"=>"2",
                "PEDHCC"=>"1",
                "PHIHCC"=>"6",
                "PHSHCC"=>"1",
                "PHYHCC"=>"7",
                "PLSHCC"=>"5",
                "SANHCC"=>"3",
                "SOCHCC"=>"3",
                "STSHCC"=>"7",
                "URDHCC"=>"8",
                "ZOOHCC"=>"1"                
           );
   return $fld_value;
}


/*
function college_email()
{
  $emails = array(
			"101" => "principal@amcollege.ac.co.in",
			"102" => "anandamargacollege@gmail.com",
			"103" => "arshacollege@gmail.com",
			"104" => "bltc1985@gmail.com",
			"105" => "contact@skbu.ac.in",
			"106" => "college@bbtmc.com",
			"107" => "dpsarkar1@yahoo.co.in",
			"108" => "bgmcjoypur@gmail.com",
			"109" => "contact@skbu.ac.in",
			"110" => "contact@skbu.ac.in",
			"111" => "jkcp.1948@gmail.com",
			"112" => "kashipur_mmm@yahoo.in",
			"113" => "kotshilamahavidyalaya@gmail.com",
			"114" => "mgclalpur@yahoo.co.in",
			"115" => "mb_college@rediffmail.com",
			"116" => "pradhanmuralidhar@gmail.com",
			"117" => "nsamtic@gmail.com",
			"118" => "contactindranideb@gmail.com",
			"119" => "panchakotmahavidyalaya@gmail.com",
			"120" => "rnpur_coll@rediffmail.com",
			"121" => "rc.college50@gmail.com",
			"122" => "santaldihcollege@gmail.com",
			"123" => "sttcollegepurulia@rediffmail.com",
			"124" => "vf_settamna@rediffmail.com",
			"125" => "contact@skbu.ac.in",
			"126" => "contact@skbu.ac.in",
			"127" => "amgkbedcollege@gmail.com",
			"128" => "ggdcmanbazar@gmail.com",
			"129" => "rmmttcollege@gmail.com",
			"130" => "contact@skbu.ac.in",
			"131" => "contact@skbu.ac.in",
			"132" => "contact@skbu.ac.in"

		   );
   return $emails;
}

*/


/*******Added by Kafil on 07/08/219*********/
/********** Start of login function************/
function login($username, $password){

	if(!empty($username) && !empty($password))
	{
		$qr = "SELECT * FROM college_master WHERE username='".trim($username)."'";
		$rst = mysql_query($qr);
		$num = mysql_num_rows($rst);
		$row = mysql_fetch_assoc($rst);

		if($num == 0)
		{ 
			$_SESSION["message"] = 'Incorrect Username !';
			header('Location:index.php');exit();
		}
		elseif(generateHash(trim($password),$row['password']) != $row['password'])
		{
			$_SESSION["message"] = 'Incorrect Password !';
			header('Location:index.php');exit();
		}
		else
		{
			$_SESSION["USERNAME"]    = $row['username'];
			$_SESSION["DESCRIPTION"] = $row['description'];
			setcookie('USERNAME', $row['username'], time() + (86400 * 30), "/"); // 86400 = 1
			setcookie('DESCRIPTION', $row['description'], time() + (86400 * 30), "/"); // 86400 = 1
			$_SESSION["TABLE"] = 'college_master';
			$_SESSION["college"] = true;				
			header('Location:user_auth.php');exit();
		}
			
	}
	else
	{
		header('Location:index.php');exit();
	}
}
/********** End of login function************/
function add($a,$b){
  $c=$a+$b;
  return $c;
}

function totalCountH($stream)
{
 $qr = "SELECT count(*) as cnt from student_details WHERE is_hons= '1' AND stream = '".$stream."' AND college_code = '".$_SESSION["college_code"]."' ";
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
    
}
function totalCountP($stream)
{
 $qr = "SELECT count(*) as cnt from student_details WHERE is_hons= '0' AND stream = '".$stream."' AND college_code = '".$_SESSION["college_code"]."' ";
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
    
}

function totalCountAH($stream)
{
  $qr = "SELECT count(student_details.stud_id) as cnt FROM `student_details`,student_course_opted WHERE
   student_details.stud_id = student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
         AND student_details.stream='".$stream."' AND student_details.is_hons='1' ORDER BY student_details.reg_no+0 ASC";
  //echo $qr;exit();
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
}
function totalCountAP($stream)
{
  $qr = "SELECT count(student_details.stud_id) as cnt FROM `student_details`,student_course_opted WHERE
   student_details.stud_id = student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
         AND student_details.stream='".$stream."' AND student_details.is_hons='0' ORDER BY student_details.reg_no+0 ASC";
  //echo $qr;exit();
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
}

function totalCount()
{
 $qr = "SELECT count(*) as cnt from student_details WHERE college_code = '".$_SESSION["college_code"]."' ";
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
    
}
function totalCountA()
{
  $qr = "SELECT count(student_details.stud_id) as cnt FROM `student_details`,student_course_opted WHERE
   student_details.stud_id = student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
    ORDER BY student_details.reg_no+0 ASC";
  //echo $qr;exit();
  $rows = mysql_query($qr);
  $row = mysql_fetch_assoc($rows);
  return($row[cnt]);
}


function subjectOpt($sub)
{
    $sub = substr($sub, 0,3)."HSE";
    $s = "SELECT subject,details,opt FROM subject_papers WHERE subject = '".$sub."'";    
    $r = mysql_query($s);
    $children = array();
    if(mysql_num_rows($r) > 0)
    {
        #It has children, let's get them.
        while($row = mysql_fetch_array($r))
        {          
            
                $children[$row['subject']] = $row['subject'];
                $children[$row['details']] = $row['details'];
                $children[$row['opt']] = $row['opt'];
            
        }
    }
    return $children;
}
?>
