<?php
date_default_timezone_set("Asia/Kolkata");
ini_set('max_execution_time', 600);
$title = "SKBU EXAMINATION PORTAL";
//Remote Domain
//$DOMAIN = "http://pcdpcal.com/knu/";
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
       /*$user_sql = "SELECT count(sco.*) FROM student_course_opted sco, student_details sd WHERE sco.user_id=sd.user_id AND
                      sco.courses_chosen LIKE '%".$subject."%' AND sd.coll_cod='".$_SESSION["college_code"]."'";*/
//echo  $user_sql;exit();
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

    function number_to_word( $num = '' )
    {
        $num    = ( string ) ( ( int ) $num );
       
        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );
           
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
           
            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');
           
            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');
           
            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');
           
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
           
            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                //$hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
               
                if( $tens < 20 )
                {
                    $tens   = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
                }
                else
                {
                    $tens   = ( int ) ( $tens / 10 );
                    $tens   = ' ' . $list2[$tens] . ' ';
                    $singles    = ( int ) ( $num_part % 10 );
                    $singles    = ' ' . $list1[$singles] . ' ';
                }
                $words[]    = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
            }
           
            $commas = count( $words );
           
            if( $commas > 1 )
            {
                $commas = $commas - 1;
            }
           
            $words  = implode( ', ' , $words );
           
            //Some Finishing Touch
            //Replacing multiples of spaces with one space
            $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
            if( $commas )
            {
                $words  = str_replace_last( ',' , ' and' , $words );
            }
           
            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }
function createThumbnail($filethumb,$file,$Twidth,$Theight,$tag)
{
	
	list($width,$height,$type)=getimagesize($file);
	//echo $type;
	//exit();
	switch($type)
	{
		case 1:
			$img = ImageCreateFromGIF($file);
			break;
		case 2:
			$img=ImageCreateFromJPEG($file);
			break;
		case 3:
			$img=ImageCreateFromPNG($file);
			break;
		default:
			return false;
	}
	
	if($tag == "width") //width contraint
	{
		$Theight=round(($height/$width)*$Twidth);
	}
	elseif($tag == "height") //height constraint
	{
		$Twidth=round(($width/$height)*$Theight);
	}
	elseif($tag == "both") //both side variable
	{
		if($width > $height)
			$Theight=round(($height/$width)*$Twidth);
		else
			$Twidth=round(($width/$height)*$Theight);
	}
	
	$thumb=imagecreatetruecolor($Twidth,$Theight);
	if(imagecopyresampled($thumb,$img,0,0,0,0,$Twidth,$Theight,$width,$height))
	{
		
		switch($type)
		{
			case 1:
				ImageGIF($thumb,$filethumb);
				break;
			case 2:
				ImageJPEG($thumb,$filethumb);
				break;
			case 3:
				ImagePNG($thumb,$filethumb);
				break;
		}
		chmod($filethumb,0777);
		return true;
	}
}

function subjects()
{
  $subjects = array(
			"ANT"=>"Anthropology",
			"BNG"=>"Bengali",
			"BOT"=>"Botany",
			"BBA"=>"Business Administration",
			"CEM"=>"Chemistry",
			"BCA"=>"Computer Application",
			"COS"=>"Computer Science",
			"ECO"=>"Economics",
			"EDC"=>"Education",
			"ENG"=>"English",
			"ENV"=>"Environmental Science",
			"COM"=>"Advanced Financial Accounting",
			"GEO"=>"Geography",
			"GEL"=>"Geology",
			"HIN"=>"Hindi",
			"HIS"=>"History",
                        "KUR"=>"Kudmali",
			"LFS"=>"Life Science",
			"MTM"=>"Mathematics",
			"MCB"=>"Micro Biology",
			"MUS"=>"Music",
			"NUT"=>"Nutrition",
			"PHI"=>"Philosophy",
			"PED"=>"Physical Education",
			"PHS"=>"Physics",
			"PLS"=>"Political Science",
			"PYS"=>"Physical Science",
			"SNS"=>"Sanskrit",
			"SNT"=>"Santali",
			"STS"=>"Statistics",
			"SOC"=>"Sociology",
			"MUC"=>"Hindi Classical",
			"MUR"=>"Rabindra Sangeet",
                        "URD"=>"Urdu",
			"ZOO"=>"Zoology"
		   );
   return $subjects;
}

function ge_electives()
{
  $ge_electives = array(
			"BNG"=>"Bengali",
			"SNT"=>"Santali",
			"EDC"=>"Education",
			"ENG"=>"English",
			"PHI"=>"Philosophy",
			"SNS"=>"Sanskrit",
			"MUS"=>"Music",
			"ANT"=>"Anthropology",			
			"STS"=>"Statistics",
			"PHS"=>"Physics",
			"CEM"=>"Chemistry",
			"BOT"=>"Botany",
			"ENV"=>"Environmental Science"					
		   );
   return $ge_electives;
}



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



function practical_papers_fees($stud_id)
{


$course_qr = "SELECT courses_chosen FROM  student_course_opted WHERE stud_id='".$stud_id."'";
$course_rt = mysql_query($course_qr);
$course_rw = mysql_fetch_assoc($course_rt);
$course_rw_arr = explode(",",$course_rw['courses_chosen']);
//$course_rw_str = implode(",'",$course_rw_arr);

$userSQL2 = "SELECT SUM(fees) AS PracticalFee FROM subject_marks_th sm
              WHERE sm.tp IN('P','C') AND sm.subject IN ('" . implode("', '", $course_rw_arr) . "')";

//echo $userSQL2;exit();
            $userRST2 = mysql_query($userSQL2);
                $rw01 = @mysql_fetch_assoc($userRST2);
                return $rw01["PracticalFee"];
}

?>
