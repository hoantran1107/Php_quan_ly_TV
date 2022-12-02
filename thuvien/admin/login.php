<?php include('../config/constants.php');
?>

<!DOCTYPE html>

<head>
    <title>Đăng nhập - Thư viện</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login">
    <section class="book-search">
        <div class="container">
        <?php if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                ?>

                <!-- Login Form Starts Here -->
                <form action="" method="POST" class="order">
                    <fieldset>
                    <h2 class="text-center text-white">Đăng nhập Admin</h2>
                    <div class="order-label">Email đăng nhập:</div>
                    <input type="email" name="username" class="input-responsive" placeholder="Nhập email của bạn"><br><br>
                    <div class="order-label">Mật khẩu:</div>
                    <input type="password" name="password" class="input-responsive" placeholder="Nhập mật khẩu" required><br><br>
                    <input type="checkbox" name="remember" value="1" required>
                    <label>Duy trì đăng nhập</label><br><br>
                    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"><br><br>
                    </fieldset>

                </form>
        </div>
    </section>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    //lay du lieu tu form dang nhap
    //mysqli_real_escape_string thay đổi các kí tự đặt biệt để phù hợp với câu lệnh sql
    $usernv = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_pass = md5($_POST['password']);
    $pass = mysqli_real_escape_string($conn, $raw_pass);
    $check = ((isset($_POST['remember']) != 0) ? 1 : "");

    //kiem tra co ton tai admin k
    $sql = "SELECT * FROM nhan_vien WHERE email_nv='$usernv' AND pwd='$pass' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login'] = "<div class='success'>Đăng nhập thành công!</div>";
        $_SESSION['user'] = $usernv;
        //kiem tra neu user da dang nhap hoac neu khong logout se unset no
        //
        //session_destroy();
        if ($check == 1) {
            setcookie($cookie_admin, 'usernv=' . $usernv . '&passnv=' . $pass, time() + $cookie_time);
        }

        header("location:" . SITEURL . "admin/");
    } else {
        //dang nhap that bai
        $_SESSION['login'] = "<div class='error text-center'>Đăng nhập thất bại, email hoặc mật khẩu không khớp</div>";
        header("location:" . SITEURL . "admin/login.php");
    }
}


?>