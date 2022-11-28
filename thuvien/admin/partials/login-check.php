<?php 
    //kiem tra co cookie k, neu chua thi dang nhap
    if(!isset($_SESSION['user']))//neu session user chua duoc thiet lap
    {
        if(isset($cookie_admin))
        {
            if(isset($_COOKIE[$cookie_admin]))
            {
                parse_str($_COOKIE[$cookie_admin],$output);
                // var_dump($_COOKIE[$cookie_admin]);
                $sqlck = "SELECT * FROM nhan_vien WHERE email_nv='$usernv' AND pwd='$passnv' ";
                $resck=mysqli_query($conn,$sqlck);
                if($resck)
                {
                    header('location:'.SITEURL.'admin/');
                }
            }
            else{
                $_SESSION['no-login-message']="<div class='error text-center'>Trước tiên, hãy đăng nhập để vào trang quản trị!</div>";
                header("location:".SITEURL."admin/login.php");
            }
        }
        
    }
?>
