<?php
require '../Classes/PHPExcel.php';

include('../config/constants.php');

$excel=new PHPExcel();
$num=1;
$sql="SELECT * FROM sach";
$res=mysqli_query($conn,$sql);

    $excel->getActiveSheet()->setCellValue('A'.$num, 'Mã sách');
    $excel->getActiveSheet()->setCellValue('B'.$num, 'Tên sách');
    $excel->getActiveSheet()->setCellValue('C'.$num, 'Số lượng');
    $excel->getActiveSheet()->setCellValue('D'.$num, 'Số trang');
    $excel->getActiveSheet()->setCellValue('E'.$num, 'Giá sách');
    $excel->getActiveSheet()->setCellValue('F'.$num, 'Năm xuất bản');
    $excel->getActiveSheet()->setCellValue('G'.$num, 'Tình trạng');
    $excel->getActiveSheet()->setCellValue('H'.$num, 'Tóm tắt');
while($row=mysqli_fetch_assoc($res))
{
    $num++;
    $excel->getActiveSheet()->setCellValue('A'.$num,$row['ma_sach']);
    $excel->getActiveSheet()->setCellValue('B'.$num,$row['ten_sach']);
    $excel->getActiveSheet()->setCellValue('C'.$num,$row['soluong']);
    $excel->getActiveSheet()->setCellValue('D'.$num,$row['sotrang']);
    $excel->getActiveSheet()->setCellValue('E'.$num,$row['gia_sach']);
    $excel->getActiveSheet()->setCellValue('F'.$num,$row['namxb']);
    $excel->getActiveSheet()->setCellValue('G'.$num,$row['tinhtrang']);
    $excel->getActiveSheet()->setCellValue('H'.$num,$row['tomtat']);
}
$writer= new PHPExcel_Writer_Excel2007($excel);
ob_end_clean();
$filename="tongsach.xlsx";

header('Content-Disposition: attachment;filename="'.$filename.'"');
header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
//header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
$writer->save('php://output');
readfile($filename);
?>