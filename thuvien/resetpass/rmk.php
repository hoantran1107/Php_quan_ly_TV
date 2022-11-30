<?php 
    $email = $_GET['email'];
?>
<?php include('../config/constants.php'); ?>

<!DOCTYPE html>

<head>
    <title>Thay đổi mật khẩu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login">

    <?php if (isset($_SESSION['thaydoimk']))
    {
        echo $_SESSION['thaydoimk'];
        unset($_SESSION['thaydoimk']);
    }
    ?>
    <!-- Signin Form Starts Here -->
    <section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Điền mật khẩu thay thế</h2>

            <form action="" method="POST" class="order">                
                <fieldset>
                    <legend>Thay đổi mật khẩu</legend>
                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="VD: Exmaple@gmail.com" class="input-responsive" value="<?php echo $email?>" readonly>

                    <div class="order-label">Mật khẩu mới</div>
                    <input type="password" name="pwd_sv" placeholder="Nhập mật khẩu" class="input-responsive" required>

                    <div class="order-label">Xác nhận lại mật khẩu</div>
                    <input type="password" name="confirm" class="input-responsive" required>
                    
                    <br><br>
                    <input type="submit" name="submit" value="Đăng kí" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $email = mysqli_real_escape_string($conn, $email);
                $raw_pwd= md5($_POST['pwd_sv']);
                $pwd= mysqli_real_escape_string($conn, $raw_pwd);
                $raw_confirm = md5($_POST['confirm']);
                $confirm = mysqli_real_escape_string($conn, $raw_confirm);

                if($pwd==$confirm)
                {
                //cau truy van
                $sql = "UPDATE sinh_vien SET
                pwd_sv='$pwd' WHERE email = '$email';
                ";
                $res= mysqli_query($conn, $sql);
                if($res == true)
                {
                    $_SESSION['thaydoimk']="<div class='success'>Thay đổi mật khẩu sinh viên thành công!</div>";
                    header('location:'.SITEURL.'login-sv.php');
                }
                }
                else{
                    $_SESSION['thaydoimk']="<div class='error'>Mật khẩu không khớp!</div>";
                    header('location:'.SITEURL.'resetpass/rmk.php');
                }
            }
            ?>
        </div>
    </section>
    <!-- Signin Form Ends Here -->

    </div>

</body>

</html>

<?php
if(isset($_POST['submit']))
{
    //lay du lieu tu form dang nhap
    $ma_sv = $_POST['ma_sv'];
    $pwd_sv = md5($_POST['pwd_sv']);

    //kiem tra co ton tai sinh vien k
    $sql = "SELECT * FROM sinh_vien WHERE ma_sv='$ma_sv' AND pwd_sv='$pwd_sv' ";

    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        //dang nhap thanh cong
        $_SESSION['login']="<div class='success text-center'>Đăng nhập thành công!</div>";
        $_SESSION['usersv']=$ma_sv;//kiem tra neu user da dang nhap hoac neu khong logout se unset no

        header("location:".SITEURL);
    }
    else{
        //dang nhap that bai
        $_SESSION['login']="<div class='error text-center'>Đăng nhập thất bại, MSSV hoặc mật khẩu sai!</div>";
        header("location:".SITEURL."login-sv.php");
    }
}
?>
<?php include('../partials-front/footer.php'); ?>