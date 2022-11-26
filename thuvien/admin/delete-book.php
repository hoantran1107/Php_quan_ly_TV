<?php
    //include config
    include('../config/constants.php');
    //kiem tra co id va tenanh khong
    if(isset($_GET['id']) AND isset($_GET['tenanh']))
    {
        //lay dl va xoa
        $id = $_GET['id'];
        $tenanh = $_GET['tenanh'];

        //xoa anh neu co anh
        if($tenanh!="")
        {
            $path = "../images/book/".$tenanh;
            //xoa anh
            $remove = unlink($path);

            //neu xoa k thanh cong thi dung va in thong bao
            if($remove==false)
            {
                //thiet lap session
                $_SESSION['remove'] = "<div class='error'>Remove image failed</div>";
                //chuyen ve trang manage + stop
                header('location:'.SITEURL.'admin/manage-book.php');
                die();
            }
        }
        //xoa dl
        //chuan bi cau truy van xoa
        $sql = "DELETE FROM sach WHERE ma_sach='$id' ";

        //thuc thi cau truy van
        $res = mysqli_query($conn,$sql);

        //kiem tra ban ghi da duoc xoa chua
        if($res == true){
            //thiet lap session thong bao thanh cong
            $_SESSION['delete']="<div class='success'>Delete successfully</div>";
            header('location:'.SITEURL.'admin/manage-book.php');
        }
        else{
            //thiet lap session thong bao that bai
            $_SESSION['delete']="<div class='error'>Delete failed</div>";
            //var_dump($res);
            header('location:'.SITEURL.'admin/manage-book.php');
        }
    }
    else
    {
        //chuyen ve trang manage book
        header('location:'.SITEURL.'admin/manage-book.php');
    }
?>