<?php
require '../Classes/PHPExcel.php';

include('../config/constants.php');

$excel=new PHPExcel();
$num=1;
$sql="SELECT * FROM the_loai";
$res=mysqli_query($conn,$sql);

    $excel->getActiveSheet()->setCellValue('A'.$num, 'Mã thể loại');
    $excel->getActiveSheet()->setCellValue('B'.$num, 'Tên thể loại');
while($row=mysqli_fetch_assoc($res))
{
    $num++;
    $excel->getActiveSheet()->setCellValue('A'.$num,$row['ma_tl']);
    $excel->getActiveSheet()->setCellValue('B'.$num,$row['ten_tl']);
}
$writer= new PHPExcel_Writer_Excel2007($excel);
ob_end_clean();
$filename="tongtheloai.xlsx";

header('Content-Disposition: attachment;filename="'.$filename.'"');
header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
//header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
$writer->save('php://output');
readfile($filename);
?>