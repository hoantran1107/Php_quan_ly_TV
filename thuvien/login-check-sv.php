<?php
//kiem tra user da log in hay chua
if (!isset($_SESSION['usersv'])) //neu session user chua duoc thiet lap
{
    if (isset($cookie_user)) {
        if (isset($_COOKIE[$cookie_user])) {
            parse_str($_COOKIE[$cookie_user], $output);
            $sqlck = "SELECT * FROM sinh_vien WHERE ma_sv='$ma_sv' AND pwd_sv='$pwd_sv' ";
            $resck = mysqli_query($conn, $sqlck);
            if ($resck) {
                header('location:' . SITEURL);
            }
        } else {
            //user chua dang nhap
            //chuyen sang trang log in voi thong bao
            $_SESSION['no-login-message'] = '<script>setTimeout(() => {alert("Bạn hãy đăng nhập!")}, 1000);</script>';
            // header("location:".SITEURL."login-sv.php");
        }
    }
}
