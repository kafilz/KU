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
//$cast = array("1"=>"SC","2"=>"ST","3"=>"OBC","5"=>"OBC-A","6"=>"OBC-B",""=>"GENERAL");
$courseType = array(
                   "H"=>"HONOURS COURSE",
                   "P"=>"PROGRAM COURSE",
                   "M"=>"B.Ed (Bachelor of Education)"
                   );
$gender = array("M"=>"MALE","F"=>"FEMALE");
$columns = array('Roll No','Registration No', 'DOB','Name','Sex','Subjects','Mob. No');
$fields  = array('roll_no','reg_no','date_of_birth','s_name','sex','courses_chosen','mob_no');
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

$styleArray2 = array(
                "font"    => array(
				"size"      => '10',
                "bold"      => true
              ),
			  'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
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
$objPHPExcel->getProperties()->setTitle("Candidate Listings Applied");
$objPHPExcel->getProperties()->setSubject("Candidate Listings Applied");
$objPHPExcel->getProperties()->setDescription("Candidate Listings Applied, generated using PHP classes.");
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");
$objPHPExcel->getProperties()->setCategory("Candidate Listings Applied");

 $objPHPExcel->setActiveSheetIndex(0);
/***********************************************************************************************************************/
 $sql_stream = "SELECT DISTINCT `stream` FROM `student_details` WHERE `college_code`='".$_SESSION["college_code"]."' ";
 $rst_stream = mysql_query($sql_stream);	
/***********************************************************************************************************************/
$j=0;
while($row_stream=mysql_fetch_assoc($rst_stream)){

  foreach($type as $type_key=>$type_value){

          $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	  $objDrawing2->setName('skbu logo');
	  $objDrawing2->setDescription('skbu logo');
	  $objDrawing2->setPath('../images/ku_logo.png');
	  $objDrawing2->setHeight(50);
	  $objDrawing2->setOffsetX(20);
	  $objDrawing2->setOffsetY(6);
	  $objDrawing2->setCoordinates('A1');
	  $objDrawing2->setWorksheet($objPHPExcel->getActiveSheet());


// Add some data
$objPHPExcel->getActiveSheet()->mergeCells('A1'.":".'J2');
$objPHPExcel->getActiveSheet()->setCellValue("A1", 'University Of Kalyani 1st Semester Examination 2019');
$objPHPExcel->getActiveSheet()->getStyle("A1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
$objPHPExcel->getActiveSheet()->mergeCells('A3'.":".'J3');
$objPHPExcel->getActiveSheet()->setCellValue("A3", $_SESSION["description"]." [".$_SESSION["college_code"]."]");
$objPHPExcel->getActiveSheet()->getStyle("A3")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); 

$objPHPExcel->getActiveSheet()->getStyle("A1".":"."J3")->applyFromArray($styleArray);
//$objPHPExcel->getActiveSheet()->getStyle("G2".":"."J3")->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("A5".":"."J5")->applyFromArray($styleArray1);
// Miscellaneous glyphs, UTF-8
$row = 5;
$col = 0;

foreach($columns as $key=>$value){
if($value=="Roll No")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(20);
}
elseif($value=="Registration No")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(20);
}
elseif($value=="Name")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(22);
}
elseif($value=="Sex")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(6);
}
elseif($value=="Mob. No")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(10);
}
elseif($value=="DOB")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(14);
}
elseif($value=="Subjects")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(30);
}
/*
elseif($value=="Fees")
{
 $objPHPExcel->getActiveSheet()->getColumnDimension(num2alpha($col))->setWidth(8);

}

*/

$objPHPExcel->getActiveSheet()->setCellValue(num2alpha($col).$row, $value);
$col++;
}


$qr = "SELECT student_details.stud_id,student_details.`roll_no`,student_details.`reg_no`,student_details.`s_name`,student_details.`sex`,student_details.`mob_no`,student_details.date_of_birth,student_course_opted.courses_chosen,student_course_opted.stud_cr_id FROM `student_details`,student_course_opted WHERE
 student_details.stud_id = student_course_opted.stud_id AND student_details.college_code  = '".$_SESSION["college_code"]."' 
       AND student_details.stream='".$row_stream["stream"]."' AND student_details.is_hons='".$type_key."' ORDER BY student_details.reg_no+0 ASC";
//echo $qr;exit();
$rows = mysql_query($qr);

$row++;

while ($rw = mysql_fetch_assoc($rows)) {
       $col = 0;
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(30);  
	foreach($fields as $key=>$value){
               if($value=="sex")
               {
                $rw[$value] = $gender[trim($rw[$value])];
		
               
              }
/*
	      elseif($value=="fees")
              {
                $fees=0;
		$late_fine = 0;
		//if($rw['stud_cr_id']>'12497'){$late_fine = 100;}

	        if($row_stream['stream']=='BA' || $row_stream['stream']=='BSC' || $row_stream['stream']=='BCOM')
	        {
                    
				$fees=(125+50+40+10+practical_papers_fees($rw['stud_id'])+75+$late_fine);
			  
		}
		elseif($row_stream['stream']=='BBA' || $row_stream['stream']=='BCA')
	        {
		 		
				
				$fees=(700+50+100+150+$late_fine);
				
			
		}
			$rw[$value] = $fees."/-";
		
               
             }
	      */
              $objPHPExcel->getActiveSheet()->setCellValue(num2alpha($col).$row, $rw[$value]);
               $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getFont()->setSize(9);
		$objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setWrapText(true);
                if($value=="roll_no" || $value=="reg_no" || $value=="date_of_birth")  
		{
			$objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->applyFromArray($styleArray2);	
		} 
		/*
		elseif($value=="fees" )
               {
                $objPHPExcel->getActiveSheet()->getStyle(num2alpha($col).$row)->getAlignment()->setHorizontal                    (PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
          
               }   */          
               
	
	$col++;
	}
$row++;
}


$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C&HPlease treat this document as confidential!');
//$objPHPExcel->getActiveSheet()->setShowGridlines(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($row_stream["stream"].'_'.$type_value.'_applied_list');
$objPHPExcel->getActiveSheet()->setShowGridlines(false);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&C'.strtoupper(str_replace("_"," ",$objPHPExcel->getActiveSheet()->getTitle()))."\n [ UNDER C.B.C.S ]".' &R'." Page &P / &N\n".date("M d, Y h:i:s a"));

$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L' . "The above is the list of ".$row_stream["stream"].' '.$type_value." candidates who have submitted the examination forms .\n\n"."&R&U\nSignature of Principal/TIC with seal");
        $j++;
	if($j>0){$objPHPExcel->createSheet();}
           $objPHPExcel->setActiveSheetIndex($j);
   
  }
    
}
$objPHPExcel->removeSheetByIndex($j);



$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="all_applied_list.xlsx"');
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
