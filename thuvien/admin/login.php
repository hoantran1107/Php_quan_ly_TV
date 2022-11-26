<?php include('../config/constants.php');
?>

<!DOCTYPE html>

<head>
    <title>Đăng nhập - Thư viện</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<section class="book-search">
    <div class="container">
    <div class="login"  style="background-color: #f8a5c2; border-radius: 2%;">
    <h1 class="text-center">Login</h1><br><br>

    <?php if (isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    <br><br>
    <!-- Login Form Starts Here -->
    <form action="" method="POST" class="text-center">
    Email đăng nhập:<br>
    <input type="email" name="username" placeholder="Nhập email của bạn"><br><br>
    Mật khẩu:<br>
    <input type="password" name="password" placeholder="Nhập mật khẩu"><br><br>
    <input type="checkbox" name="remember" value="1">
    <label>Duy trì đăng nhập</label><br><br>
    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"><br><br>
   
    </form>
    <!-- Login Form Ends Here -->

    <p class="text-center">Created by <a href="#">Lê Thị Hồng Nhung</a></p>
    </div>
    </div>
</section>
</body>

</html>

<?php
if(isset($_POST['submit']))
{
    //lay du lieu tu form dang nhap
    $usernv = mysqli_real_escape_string($conn,$_POST['username']);
    $raw_pass=md5($_POST['password']);
    $pass = mysqli_real_escape_string($conn,$raw_pass);
    $check=((isset($_POST['remember'])!=0)?1:"");

    //kiem tra co ton tai admin k
    $sql = "SELECT * FROM nhan_vien WHERE email_nv='$usernv' AND pwd='$pass' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login']="<div class='success'>Đăng nhập thành công!</div>";
        $_SESSION['user']=$usernv;//kiem tra neu user da dang nhap hoac neu khong logout se unset no
        //
        //session_destroy();
        if($check==1){
            setcookie($cookie_admin, 'usernv='.$usernv.'&passnv='.$pass, time()+$cookie_time);
        }

        header("location:".SITEURL."admin/");
    }
    else{
        //dang nhap that bai
        $_SESSION['login']="<div class='error text-center'>Đăng nhập thất bại, email hoặc mật khẩu không khớp</div>";
        header("location:".SITEURL."admin/login.php");
    }
}


?>