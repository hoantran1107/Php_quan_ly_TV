<?php
require '../Classes/PHPExcel.php';

include('../config/constants.php');

$excel=new PHPExcel();
$num=1;
$sql="SELECT * FROM phieu_muon";
$res=mysqli_query($conn,$sql);

    $excel->getActiveSheet()->setCellValue('A'.$num, 'Mã phiếu');
    $excel->getActiveSheet()->setCellValue('B'.$num, 'Ngày mượn');
    $excel->getActiveSheet()->setCellValue('C'.$num, 'Số lượng mượn');
    $excel->getActiveSheet()->setCellValue('D'.$num, 'Tên sách');
    $excel->getActiveSheet()->setCellValue('E'.$num, 'Mã sinh viên');
while($row=mysqli_fetch_assoc($res))
{
    $num++;
    $masach=$row['ma_sach'];
    $sqltensach="SELECT ten_sach FROM sach WHERE ma_sach='$masach' ";
    $restensach=mysqli_query($conn, $sqltensach);
    $rowtensach=mysqli_fetch_assoc($restensach);
    $tensach=$rowtensach['ten_sach'];
    $excel->getActiveSheet()->setCellValue('A'.$num,$row['ma_pm']);
    $excel->getActiveSheet()->setCellValue('B'.$num,$row['ngay_muon']);
    $excel->getActiveSheet()->setCellValue('C'.$num,$row['soluong_muon']);
    $excel->getActiveSheet()->setCellValue('D'.$num,$tensach);
    $excel->getActiveSheet()->setCellValue('E'.$num,$row['ma_sv']);
}
$writer= new PHPExcel_Writer_Excel2007($excel);
ob_end_clean();
$filename="tongluotmuon.xlsx";

header('Content-Disposition: attachment;filename="'.$filename.'"');
header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
//header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
$writer->save('php://output');
readfile($filename);
?>