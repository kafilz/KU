<?php include "../lib/admin-inc1.php";
$date_from_arr   = explode("/",$_POST["DATE_FROM"]);
$date_to_arr     = explode("/",$_POST["DATE_TO"]);
$date_from = $date_from_arr["2"]."-".$date_from_arr["1"]."-".$date_from_arr["0"]." 00:00:00";
$date_to = $date_to_arr["2"]."-".$date_to_arr["1"]."-".$date_to_arr["0"]." 23:59:00";
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');
 $arr1 = array("1"=>"First Time","2"=>"Second Time","3"=>"Third Time","4"=>"Fourth Time","5"=>"Fifth Time","6"=>"Sixth Time");
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Application ID', 'Enrollment No', 'Name','Guardian Name','DOB','Subjects','Mobile No','Appearing','Renewal Response'));

// fetch the data
$qr = "SELECT sco.application_no,sco.courses_chosen,sd.enrl_no,sd.s_name,sd.f_name,sd.date_of_birth,sd.sub_cate,sd.mob_no,sd.appe_cd,rn.status
       FROM student_course_opted sco, student_details sd,renewal_status rn where sco.stud_id=sd.stud_id AND rn.stud_id=sd.stud_id ";

   $rows = mysql_query($qr);

// loop over the rows, outputting them
     while ($row = mysql_fetch_assoc($rows)) {
     $arr = array();

     $arr["application_no"] = $row["application_no"];
     $arr["enrl_no"]        = $row["enrl_no"];   
     $arr["s_name"]         = $row["s_name"];
     $arr["f_name"]         = $row["f_name"]; 
     $arr["date_of_birth"]  = date("d-m-Y", strtotime($row["date_of_birth"]));
     $arr["sub_cate"]       = $row["sub_cate"];
     $arr["mobno"]          = $row["mob_no"]; 
     $arr["appearing"]      = $arr1[$row["appe_cd"]];
     $arr["status"]         = $row["status"];
    
      fputcsv($output, $arr);
   }
?>
