<?php
    //include config
    include('../config/constants.php');

        //xoa dl
        //chuan bi cau truy van xoa
        $sql = "DELETE FROM phieu_muon WHERE active='No' ";

        //thuc thi cau truy van
        $res = mysqli_query($conn,$sql);

        //kiem tra ban ghi da duoc xoa chua
        if($res == true){
            //thiet lap session thong bao thanh cong
            $_SESSION['tra']="<div class='success'>Xác nhận trả sách thành công!</div>";
            header('location:'.SITEURL.'admin/manage-card.php');
        }
        else{
            //thiet lap session thong bao that bai
            $_SESSION['tra']="<div class='error'>Xóa trả sách thất bại!</div>";
            //var_dump($res);
            header('location:'.SITEURL.'admin/manage-card.php');
        }

?>