<?php
    //include config
    include('../config/constants.php');
    //kiem tra co id va tenanh khong
    if(isset($_GET['id']))
    {
        //lay dl va xoa
        $id = $_GET['id'];

        //xoa dl
        //chuan bi cau truy van xoa
        $sql = "DELETE FROM phieu_muon WHERE ma_pm='$id' ";

        //thuc thi cau truy van
        $res = mysqli_query($conn,$sql);

        //kiem tra ban ghi da duoc xoa chua
        if($res == true){
            //thiet lap session thong bao thanh cong
            $_SESSION['delete-pm']="<div class='success'>Xóa phiếu mượn thành công!</div>";
            header('location:'.SITEURL.'admin/manage-card.php');
        }
        else{
            //thiet lap session thong bao that bai
            $_SESSION['delete-pm']="<div class='error'>Xóa phiếu mượn thất bại!</div>";
            //var_dump($res);
            header('location:'.SITEURL.'admin/manage-card.php');
        }
    }
    else
    {
        //chuyen ve trang manage book
        header('location:'.SITEURL.'admin/manage-card.php');
    }
?>