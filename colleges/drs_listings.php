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
$type = array("0"=>"PROGRAM","1"=>"HONOURS");
$cast = array("1"=>"SC","2"=>"ST","3"=>"OBC","5"=>"OBC-A","6"=>"OBC-B",""=>"GENERAL");
$courseType = array(
                   "H"=>"HONOURS COURSE",
                   "P"=>"PROGRAM COURSE",
                   "E"=>"GENERIC ELECTIVE COURSE",
                   "C"=>"AECC CORE-2",
                    );
$gender = array("M"=>"MALE","F"=>"FEMALE");
$columns = array("ROLL NUMBER",  "REGISTRATION NUMBER","SEX","CAST","PH","STUDENT'S NAME\nGUARDIAN'S NAME","SUBJECTS TAKEN","OFFICE NO");
$fields  = array('roll_no',  'reg_no','sex','cast','ph','name','courses_chosen','office_no');
$styleArray = array(
	'font' => array(
		'bold' => true,
		'size'=>11,
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
			'argb' => 'FFFFFFFF',
		),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
		),
	),
);
$styleArray1 = array(
                "font"    => array(
				"size"      => '10',
                "bold"      => true
              ),
			  'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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
                  "argb" => "FFFFFFFF"
                ),
                "endcolor"   => array(
                  "argb" => "FFFFFFFF"
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
	  $objDrawing2->setOffsetX(20);
	  $objDrawing2->setOffsetY(6);
	  $objDrawing2->setCoordinates('A1');
	  $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());


          /*$objDrawing2 = new PHPExcel_Worksheet_Drawing();
	  $objDrawing2->setName('tick image');
	  $objDrawing2->setDescription('tick image');
	  $objDrawing2->setPath('../images/tick.png');
	  $objDrawing2->setHeight(20);
	  $objDrawing2->setOffsetX(40);
	  //$objDrawing2->setOffsetY(6);
	  $objDrawing2->setCoordinates('J5');
	  $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());*/
	  
// Add some data
$objPHPExcel->getActiveSheet()->mergeCells('A1'.":".'H2');
$objPHPExcel->getActiveSheet()->setCellValue("A1", 'KAZI NAZRUL UNIVERSITY 2nd Semester Examination 2017');
$objPHPExcel->getActiveSheet()->getStyle("A1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
$objPHPExcel->getActiveSheet()->mergeCells('A3'.":".'H3');
$objPHPExcel->getActiveSheet()->setCellValue("A3", $_SESSION["description"]." [".$_SESSION["college_code"]."]");
$objPHPExcel->getActiveSheet()->getStyle("A3")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); 

//$objPHPExcel->getActiveSheet()->mergeCells('G2'.":".'J3');
//$objPHPExcel->getActiveSheet()->setCellValue("G2", $_SESSION["description"]." [".$_SESSION["college_code"]."]");
//$objPHPExcel->getActiveSheet()->getStyle("G2")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); 
$objPHPExcel->getActiveSheet()->getStyle("A1".":"."H3")->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle("G2".":"."J3")->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("A5".":"."H5")->applyFromArray($styleArray1);
// Miscellaneous glyphs, UTF-8
$row = 5;
$col = 0;

foreach($columns as $key=>$value){
$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(30);  
if($value=="ROLL NUMBER")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(15);
}
elseif($value=="REGISTRATION NUMBER")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(20);
}
elseif($value=="SEX")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(7);
}
elseif($value=="CAST")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(10);
}
elseif($value=="PH")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(8);
}
elseif($value=="STUDENT'S NAME\nGUARDIAN'S NAME")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(26);
}
elseif($value=="SUBJECTS TAKEN")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(16);
}
elseif($value=="OFFICE NO")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(12);
}


$objPHPExcel->getActiveSheet()->setCellValue(num2alpha($col).$row, $value);
$objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$col++;
}

$qr = "SELECT student_details.*,student_course_opted.courses_chosen,student_course_opted.office_no FROM `student_details`,student_course_opted WHERE
      student_details.stud_id=student_course_opted.stud_id AND student_details.coll_cod  = '".$_SESSION["college_code"]."' 
       AND student_details.stream='".$_REQUEST["stream"]."' AND student_details.is_hons='".$_REQUEST["is_hons"]."' ORDER BY student_details.sub1 ASC";
//echo $qr;exit();
$rows = mysql_query($qr);

$row++;

while ($rw = mysql_fetch_assoc($rows)) {
       $col = 0;
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(30);  
	foreach($fields as $key=>$value){
               
	       if($value=="roll_no")
               {
                
		$rw[$value] = $rw["cate"]."-".$rw["inp_yr"].$rw["coll_cod"]."-".$rw["roll_no"];
               
               }
	       elseif($value=="reg_yr")
               {
                $rw[$value] = ($rw[$value]-1)."-".($rw[$value]-2000);
               
               }
               elseif($value=="sex")
               {
                $rw[$value] = $gender[$rw[$value]];
		
               
              }
		elseif($value=="cast")
               {
                $rw[$value] = $cast[$rw[$value]];
		
               
              }
	      elseif($value=="name")
              { 
		$rw[$value] = $rw["s_name"]."\n".$rw["f_name"];
             }
	     elseif($value=="courses_chosen")
              {
                $rw[$value] = str_replace(",","/",$rw[$value]);
		
               
             }
           
	     elseif($value=="reg_no")
             {
               	
		$rw[$value] = $rw["reg_no"]." of ".($rw["reg_yr"]-1)."-".($rw["reg_yr"]-2000);	
		
             }
              $objPHPExcel->getActiveSheet()->setCellValue(num2alpha($col).$row, $rw[$value]);
               $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getFont()->setSize(9);
		$objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setWrapText(true);               
               if($value=="roll_no" || $value=="reg_yr" || $value=="reg_no")
               {
                $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setHorizontal                    (PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 


               
               } 
	
	$col++;
	}
$row++;
}
//$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C&HPlease treat this document as confidential!');
//$objPHPExcel->getActiveSheet()->setShowGridlines(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($_REQUEST["stream"].'_'.$type[$_REQUEST["is_hons"]].'_drs_list');
$objPHPExcel->getActiveSheet()->setShowGridlines(false);

/*
$objDrawing = new PHPExcel_Worksheet_HeaderFooterDrawing();
$objDrawing->setName('knu logo');
$objDrawing->setPath('../images/knulogo.jpg');
$objDrawing->setHeight(60);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->addImage($objDrawing, PHPExcel_Worksheet_HeaderFooter::IMAGE_HEADER_LEFT);*/
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C'.strtoupper(str_replace("_"," ",$objPHPExcel->getActiveSheet()->getTitle()))."\n [ UNDER C.B.C.S ]".' &R'." Page &P / &N\n".date("M d, Y h:i:s a"));
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L' . "Certify that above candidates regularly pursued their studies and attended\n 75% of classes held in both theory and practical throughout the semester\n"."&R&U\nSignature of Principal/TIC with seal");

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$_REQUEST["stream"].'_'.$type[$_REQUEST["is_hons"]].'_drs_list.xlsx"');
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
