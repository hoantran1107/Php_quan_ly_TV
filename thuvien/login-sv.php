<?php include('config/constants.php'); ?>

<!DOCTYPE html>

<head>
    <title>Đăng nhập - Thư viện</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login">
        <section class="book-search">
            <div class="container">

                <br>
                <?php if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                if (isset($_SESSION['thaydoimk'])) {
                    echo $_SESSION['thaydoimk'];
                    unset($_SESSION['thaydoimk']);
                }
                
                ?>

                <!-- Login Form Starts Here -->
                <form action="" method="POST" class="order">
                    <fieldset>
                        <h2 class="text-center text-white">Đăng nhập</h2>
                        <div class="order-label">Mã số sinh viên:</div>
                        <input type="text" name="ma_sv" class="input-responsive" placeholder="VD: 61234567"><br><br>
                        <div class="order-label">Mật khẩu:</div>
                        <input type="password" name="pwd_sv" class="input-responsive" placeholder="Nhập mật khẩu"><br><br>
                        <input type="checkbox" name="remember" value="1">
                        <label>Duy trì đăng nhập</label><br><br>
                        <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary">
                        <a class="btn btn-primary text-center" href="<?php echo SITEURL."resetpass/resetpass.php"; ?>">Quên mật khẩu</a><br><br>
                        <h3 class="text-center text-white">Nếu chưa có tài khoản, hãy <a href="<?php echo SITEURL; ?>signin-sv.php">Đăng ký</a></h3>
                <!-- chuyển sang trang đăng kí -->
                    </fieldset>
                </form>
                <!-- Login Form Ends Here -->
    
                
                <div align="center"></div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
// XỬ LÝ KIỂM TRA TÀI KHOẢN MẬT MK SV CÓ TỒN TẠI HAY KHÔNG
if (isset($_POST['submit'])) {
    //lay du lieu tu form dang nhap
    $ma_sv = mysqli_real_escape_string($conn, $_POST['ma_sv']);
    $raw_pwd_sv = md5($_POST['pwd_sv']);
    $pwd_sv = mysqli_real_escape_string($conn, $raw_pwd_sv);
    $check=((isset($_POST['remember'])!=0)?1:"");

    //kiem tra co ton tai sinh vien k
    $sql = "SELECT * FROM sinh_vien WHERE ma_sv='$ma_sv' AND pwd_sv='$pwd_sv' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);
    //tồn tại tài khoản trên database
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login'] = "<div class='success text-center'>Đăng nhập thành công!</div>";
        $_SESSION['usersv'] = $ma_sv; //kiem tra neu user da dang nhap hoac neu khong logout se unset no
        //cookies để duy trỳ đăng
        if($check==1){
            setcookie($cookie_user, 'ma_sv='.$ma_sv.'&pwd_sv='.$pwd_sv, time()+$cookie_time);
        }
        header("location:".SITEURL);
    } else {
        //dang nhap that bai thì trả login-sv lại
        $_SESSION['login'] = "<div class='error text-center'>Đăng nhập thất bại, MSSV hoặc mật khẩu sai!</div>";
        header("location:".SITEURL."login-sv.php");
    }
}
?>
<?php include('partials-front/footer.php'); ?>