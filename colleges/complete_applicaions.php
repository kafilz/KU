<?php include_once("../lib/connection.php");
$type = array("0"=>"PROGRAM","1"=>"HONOURS");
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$_REQUEST["stream"].'_'.$type[$_REQUEST["is_hons"]].'.csv');
 // create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// output the column headings
fputcsv(
$output, array(        "FORM_NO",
			"CC",
			"O_CATE",
			"CATE",
			"COLL_COD",
			"INP_YR",
			"ROLL_NO",
			"REG_NO",
			"REG_YR",
			"M_F",
			"SC_ST",
			"PH",
			"S_NAME",
			"F_NAME",
			"SUB1",
			"SUB2",
                        "OPT2",
			"SUB3",
			"LANG",
			"ENV_C",
			"LANG_C",
			"ADD1",
			"ADD2",
			"ADD3",
			"PIN",
			"OFFICE_NO",
			"OFFICE_NO1",
			"APPLIED_ON",
			"PHASE",
			"APPLIED_TIME"));

$qr = "SELECT sd.*,DATE_FORMAT(sco.applied_on, '%d/%m/%Y') AS appDate,DATE_FORMAT(sco.applied_on, '%H:%i:%S') AS appTime,sco.courses_chosen,
	sco.application_no,sco.office_no FROM `student_details` sd, student_course_opted sco 
        WHERE sd.stud_id=sco.stud_id AND sco.stud_cr_id>10820 AND  sd.stream='".$_REQUEST["stream"]."' AND sd.is_hons='".$_REQUEST["is_hons"]."' ORDER BY sd.coll_cod ASC ";
//echo $qr;exit();
   $rows = mysql_query($qr);

// loop over the rows, outputting them
     $total = 0;
     while ($row = mysql_fetch_assoc($rows)) {
    /*if(in_array($row["stud_id"],$phase2)){$phase = '2';}
   else{$phase = '1';}*/

     $courses_chosen_arr       = explode(",",$row["courses_chosen"]);
     $arr = array();
     
     $arr["FORM_NO"]           = $row["formno"];
     $arr["CC"]                = $row["cc"];
     $arr["O_CATE"]            = $row["o_cate"];
     $arr["CATE"]              = $row["cate"];
     $arr["COLL_COD"]          = $row["coll_cod"];
     $arr["INP_YR"]            = $row["inp_yr"];
     $arr["ROLL_NO"]           = $row["roll_no"];
     $arr["REG_NO"]            = $row["reg_no"];
     $arr["REG_YR"]            = $row["reg_yr"];
     $arr["M_F"]               = $row["sex"];

     $arr["SC_ST"]             = $row["cast"];
     $arr["PH"]                = $row["ph"];
     $arr["S_NAME"]            = $row["s_name"];
     $arr["F_NAME"]            = $row["f_name"];
     $arr["SUB1"]              = $courses_chosen_arr["0"];
     if(($_REQUEST["stream"]=='B.A' && $_REQUEST["is_hons"]=='1') || ($_REQUEST["stream"]=='B.SC' && $_REQUEST["is_hons"]=='1') || ($_REQUEST["stream"]=='B.COM' && $_REQUEST["is_hons"]=='1') || ($_REQUEST["stream"]=='BBA' && $_REQUEST["is_hons"]=='1') || ($_REQUEST["stream"]=='BBAT' && $_REQUEST["is_hons"]=='1') || ($_REQUEST["stream"]=='B.COM' && $_REQUEST["is_hons"]=='0'))
     {
     $usb2_arr                 = explode("-",$courses_chosen_arr["1"]);
     $arr["SUB2"]              = $usb2_arr["0"];
     $arr["GRP"]               = $usb2_arr["1"];
     $arr["SUB3"]              = '';
     $arr["LANG"]              = $courses_chosen_arr["2"];
     $arr["ENV_C"]             = '';
     $arr["LANG_C"]            = '';
     }
     elseif($_REQUEST["stream"]=='BCA' && $_REQUEST["is_hons"]=='1')
     {
     
     $arr["SUB2"]              = '';
     $arr["GRP"]               = '';
     $arr["SUB3"]              = '';
     $arr["LANG"]              = $courses_chosen_arr["1"];
     $arr["ENV_C"]             = '';
     $arr["LANG_C"]            = '';
     }
     elseif(($_REQUEST["stream"]=='B.A' && $_REQUEST["is_hons"]=='0') || ($_REQUEST["stream"]=='B.SC' && $_REQUEST["is_hons"]=='0'))
     {
     $usb2_arr                 = explode("-",$courses_chosen_arr["1"]);
     $arr["SUB2"]              = $usb2_arr["0"];
     $arr["GRP"]               = $usb2_arr["1"];
     $arr["SUB3"]              = $courses_chosen_arr["2"];
     $arr["LANG"]              = $courses_chosen_arr["3"];
     $arr["ENV_C"]             = '';
     $arr["LANG_C"]            = '';
     }

     $arr["ADD1"]             = $row["add1"];
     $arr["ADD2"]             = $row["add2"];
     $arr["ADD3"]             = $row["add3"];
     $arr["PIN"]              = $row["pin"];
     $arr["OFFICE_NO"]        = '';
     $arr["OFFICE_NO1"]       = ($row['inp_yr']+1).$row['formno'] ."-".$row["office_no"];
     $arr["APPLIED_ON"]       = $row["appDate"];
     $arr["PHASE"]            = '3';
     $arr["APPLIED_TIME"]     = $row["appTime"];
     
     
       
    fputcsv($output, $arr);
 }

  ?>
