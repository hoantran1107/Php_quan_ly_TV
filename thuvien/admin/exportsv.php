<?php
require '../Classes/PHPExcel.php';

include('../config/constants.php');

$excel=new PHPExcel();
$num=1;
$sql="SELECT * FROM sinh_vien";
$res=mysqli_query($conn,$sql);

    $excel->getActiveSheet()->setCellValue('A'.$num, 'Mã sinh viên');
    $excel->getActiveSheet()->setCellValue('B'.$num, 'Họ tên');
    $excel->getActiveSheet()->setCellValue('C'.$num, 'Giới tính');
    $excel->getActiveSheet()->setCellValue('D'.$num, 'Ngày sinh');
    $excel->getActiveSheet()->setCellValue('E'.$num, 'Địa chỉ');
    $excel->getActiveSheet()->setCellValue('F'.$num, 'Khoa');
    $excel->getActiveSheet()->setCellValue('G'.$num, 'Email');
while($row=mysqli_fetch_assoc($res))
{
    $num++;
    $excel->getActiveSheet()->setCellValue('A'.$num,$row['ma_sv']);
    $excel->getActiveSheet()->setCellValue('B'.$num,$row['hoten_sv']);
    $excel->getActiveSheet()->setCellValue('C'.$num,$row['gioitinh_sv']);
    $excel->getActiveSheet()->setCellValue('D'.$num,$row['ngaysinh_sv']);
    $excel->getActiveSheet()->setCellValue('E'.$num,$row['diachi_sv']);
    $excel->getActiveSheet()->setCellValue('F'.$num,$row['khoa']);
    $excel->getActiveSheet()->setCellValue('G'.$num,$row['email']);
}
$writer= new PHPExcel_Writer_Excel2007($excel);
ob_end_clean();
$filename="tongsinhvien.xlsx";

header('Content-Disposition: attachment;filename="'.$filename.'"');
header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
//header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
$writer->save('php://output');
readfile($filename);
?>