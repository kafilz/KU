<?php
function num2alpha($n)
{
    for($r = ""; $n >= 0; $n = intval($n / 26) - 1)
        $r = chr($n%26 + 0x41) . $r;
    return $r;
}

include "../lib/admin-inc1.php";
require_once '../../PHPExcel/Classes/PHPExcel.php';
require_once '../../PHPExcel/Classes/PHPExcel/RichText.php';
require_once '../../PHPExcel//Classes/PHPExcel/Writer/Excel2007.php';
require_once '../../PHPExcel//Classes/PHPExcel/Cell/AdvancedValueBinder.php';
// output headers so that the file is downloaded rather than displayed
function get_applied($stream,$is_hons)
{
        $user_sql = "SELECT COUNT(*) FROM student_details sd, student_course_opted sco WHERE sd.stud_id=sco.stud_id 
                     AND sco.`applied_on` NOT LIKE '%2017-06-23%' AND sd.stream='".$stream."' AND sd.is_hons='".$is_hons."' AND sd.coll_cod = '".$_SESSION["college_code"]."'"; 
//echo $user_sql;exit();      
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}
function get_applied1($stream,$is_hons)
{
        $user_sql = "SELECT COUNT(*) FROM student_details sd, student_course_opted sco WHERE sd.stud_id=sco.stud_id 
                     AND sco.`applied_on` LIKE '%2017-06-23%' AND sd.stream='".$stream."' AND sd.is_hons='".$is_hons."' AND sd.coll_cod = '".$_SESSION["college_code"]."'"; 
//echo $user_sql;exit();      
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}


function get_applied2($stream,$is_hons)
{
        $user_sql = "SELECT COUNT(*) FROM student_details sd, student_course_opted sco WHERE sd.stud_id=sco.stud_id 
                     AND (sco.`applied_on` LIKE '%2017-06-30%' OR sco.`applied_on` LIKE '%2017-07-01%') AND sd.stream='".$stream."' AND sd.is_hons='".$is_hons."' AND sd.coll_cod = '".$_SESSION["college_code"]."'"; 
//echo $user_sql;exit();      
	$user_rst = mysql_query($user_sql);
	$row = @mysql_fetch_array($user_rst);
	return($row[0]);
		
}


$type = array("0"=>"PROGRAM","1"=>"HONOURS");
$cast = array("1"=>"SC","2"=>"ST","3"=>"OBC","5"=>"OBC-A","6"=>"OBC-B",""=>"GENERAL");
$courseType = array(
                   "H"=>"HONOURS COURSE",
                   "P"=>"PROGRAM COURSE",
                   "E"=>"GENERIC ELECTIVE COURSE",
                   "C"=>"AECC CORE-2",
                    );
$gender = array("M"=>"MALE","F"=>"FEMALE");
$columns = array('Courses',  'No Of Students Eligible','No Of Students Applied(Phase1)','No Of Students Applied(Phase2)','No Of Students Applied(Phase3)');
$fields  = array('stream','total','applied','applied1','applied2');
$styleArray = array(
	'font' => array(
		'bold' => true,
		'size'=>10,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
		'top' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
		),
		"bottom"     => array(
                  "style" => PHPExcel_Style_Border::BORDER_THIN
                )
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => 'FFA0A0A0',
		),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
		),
	),
);
$styleArray1 = array(
                "font"    => array(
				"size"      => '9',
                "bold"      => true
              ),
			  'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	       ),

              "borders" => array(
                "top"     => array(
                  "style" => PHPExcel_Style_Border::BORDER_THIN
                )
              ),
              "fill" => array(
                "type"       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                "rotation"   => 90,
                "startcolor" => array(
                  "argb" => "CCCCBBFF"
                ),
                "endcolor"   => array(
                  "argb" => "CCCCBBFF"
                )
              )
            );	  
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Kolkata');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
require_once '../../PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Wakeel Siddique");
$objPHPExcel->getProperties()->setLastModifiedBy("Wakeel Siddique");
$objPHPExcel->getProperties()->setTitle("Candidate Listings");
$objPHPExcel->getProperties()->setSubject("Candidate Listings");
$objPHPExcel->getProperties()->setDescription("Candidate Listings, generated using PHP classes.");
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
$objPHPExcel->getProperties()->setCategory("Candidate Listings Coursewise");

 $objPHPExcel->setActiveSheetIndex(0);

 $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	  $objDrawing2->setName('knu logo');
	  $objDrawing2->setDescription('knu logo');
	  $objDrawing2->setPath('../images/knulogo.jpg');
	  $objDrawing2->setHeight(50);
	  $objDrawing2->setOffsetX(2);
	  //$objDrawing2->setOffsetY(6);
	  $objDrawing2->setCoordinates('A1');
	  $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());
	  
// Add some data
$objPHPExcel->getActiveSheet()->mergeCells('A1'.":".'E2');
$objPHPExcel->getActiveSheet()->setCellValue("A1", 'KAZI NAZRUL UNIVERSITY 2nd Semester Examination 2017');
$objPHPExcel->getActiveSheet()->getStyle("A1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
$objPHPExcel->getActiveSheet()->mergeCells('A3'.":".'E3');
$objPHPExcel->getActiveSheet()->setCellValue("A3", $_SESSION["description"]." [".$_SESSION["college_code"]."]");
$objPHPExcel->getActiveSheet()->getStyle("A3")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); 

//$objPHPExcel->getActiveSheet()->mergeCells('G2'.":".'J3');
//$objPHPExcel->getActiveSheet()->setCellValue("G2", $_SESSION["description"]." [".$_SESSION["college_code"]."]");
//$objPHPExcel->getActiveSheet()->getStyle("G2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); 
$objPHPExcel->getActiveSheet()->getStyle("A1".":"."E3")->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle("G2".":"."J3")->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("A5".":"."E5")->applyFromArray($styleArray1);
// Miscellaneous glyphs, UTF-8
$row = 5;
$col = 0;

foreach($columns as $key=>$value){
if($value=="Courses")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(14);
}
else{
	$objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(25);
    }


$objPHPExcel->getActiveSheet(0)->setCellValue(num2alpha($col).$row, $value);
$col++;
}

$qr = "SELECT stream,is_hons,COUNT(*) AS total FROM `student_details` WHERE `coll_cod` = '".$_SESSION["college_code"]."' 
       GROUP BY stream, `is_hons` ORDER BY stream ASC "; 
//echo $qr;exit();
$rows = mysql_query($qr);

$row++;
        $total = 0;
        $total_applied = 0;
	$total_applied1 = 0;
        $total_applied2 = 0;
	$applied = 0;
	$applied1 = 0;
	$applied2 = 0;
while ($rw = mysql_fetch_assoc($rows)) {

       $col = 0;
	foreach($fields as $key=>$value){
               if($value=="applied")
               {
		$applied     = get_applied($rw["stream"],$rw["is_hons"]);
		$insert_value = $applied;
		 $total_applied += $applied;	
                               
               }
		elseif($value=="applied1")
               {
		$applied1     = get_applied1($rw["stream"],$rw["is_hons"]);
		$insert_value = $applied1;
		 $total_applied1 += $applied1;	
                               
               }
		elseif($value=="applied2")
               {
		$applied2     = get_applied2($rw["stream"],$rw["is_hons"]);
		$insert_value = $applied2;
		 $total_applied2 += $applied2;	
                               
               }
               elseif($value=="stream")
	       {
		$insert_value = $rw["stream"]." ".$type[$rw["is_hons"]];
	       }
		else
		{
		 $insert_value = $rw[$value];	
		}

	           
              $objPHPExcel->getActiveSheet()->setCellValue(num2alpha($col).$row, $insert_value);
               $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getFont()->setSize(9);               
               $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
		
	
	$col++;
	}
               $total += $rw["total"];
               //$total_applied += $applied;
	       //$total_applied1 += $applied1;
   $row++;
}
$row++;

$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C&HPlease treat this document as confidential!');
//$objPHPExcel->getActiveSheet()->setShowGridlines(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);


$objPHPExcel->getActiveSheet()->setCellValue(num2alpha(0).$row, 'Total');
$objPHPExcel->getActiveSheet()->setCellValue(num2alpha(1).$row, $total);
$objPHPExcel->getActiveSheet()->setCellValue(num2alpha(2).$row, $total_applied);
$objPHPExcel->getActiveSheet()->setCellValue(num2alpha(3).$row, $total_applied1);
$objPHPExcel->getActiveSheet()->setCellValue(num2alpha(4).$row, $total_applied2);
$objPHPExcel->getActiveSheet()->getStyle("A".$row.":"."E".$row)->applyFromArray($styleArray);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('coursewise-total');
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C'.strtoupper(str_replace("_"," ",$objPHPExcel->getActiveSheet()->getTitle()))."\n [ UNDER C.B.C.S ]".' &R'." Page &P / &N\n".date("M d, Y h:i:s a"));


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-type:xls');
header('Content-Disposition: attachment;filename="coursewise-total.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
