<?php include('config/constants.php'); ?>

<!DOCTYPE html>

<head>
    <title>Đăng kí - Thư viện</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login">

    <?php if (isset($_SESSION['signin']))
    {
        echo $_SESSION['signin'];
        unset($_SESSION['signin']);
    }
    if (isset($_SESSION['not-match-pwd']))
    {
        echo $_SESSION['not-match-pwd'];
        unset($_SESSION['not-match-pwd']);
    }
    ?>
    <!-- Signin Form Starts Here -->
    <section class="book-search">
        <div class="container">

            <form action="" method="POST" class="order">                
                <fieldset>
                    <h2 class="text-center text-white">Điền thông tin đăng kí</h2>
                    <div class="order-label">Họ và tên</div>
                    <input type="text" name="hoten_sv" placeholder="VD: Nguyễn Văn A" class="input-responsive" required>

                    <div class="order-label">MSSV</div>
                    <input type="number" name="ma_sv" placeholder="VD: 61234567" class="input-responsive" value="<?php echo isset($id) ? $id : ""?>" required>
                    
                    <div class="order-label">Giới tính</div>
                    <input type="radio" name="gioitinh_sv" value="Nam" class="input-responsive" required>Nam
                    <input type="radio" name="gioitinh_sv" value="Nữ" class="input-responsive" required>Nữ

                    <div class="order-label">Ngày sinh</div>
                    <input type="date" name="ngaysinh_sv" value="<?php $today=date("d/m/Y"); echo $today; ?>">
                    
                    <div class="order-label">Địa chỉ</div>
                    <input type="text" name="diachi_sv" placeholder="VD: Khánh Hòa" class="input-responsive" required>

                    <div class="order-label">Khoa viện</div>
                    <input type="text" name="khoa" placeholder="VD: CNTT" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email_sv" placeholder="VD: Exmaple@gmail.com" class="input-responsive" value="<?php echo isset($email) ? $email : "" ?>" required>

                    <div class="order-label">Mật khẩu</div>
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
                $id = mysqli_real_escape_string($conn, $_POST['ma_sv']);
                $ten = mysqli_real_escape_string($conn, $_POST['hoten_sv']);
                $diachi = mysqli_real_escape_string($conn, $_POST['diachi_sv']);
                $ngaysinh = mysqli_real_escape_string($conn, $_POST['ngaysinh_sv']);
                $khoa = mysqli_real_escape_string($conn, $_POST['khoa']);
                $gioitinh = mysqli_real_escape_string($conn, $_POST['gioitinh_sv']);
                $email = mysqli_real_escape_string($conn, $_POST['email_sv']);
                $raw_pwd= md5($_POST['pwd_sv']);
                $pwd= mysqli_real_escape_string($conn, $raw_pwd);
                $raw_confirm = md5($_POST['confirm']);
                $confirm = mysqli_real_escape_string($conn, $raw_confirm);

                if($pwd==$confirm)
                {
                $sqlkt = "SELECT * from sinh_vien Where ma_sv = '$id'";
                $query = mysqli_query($conn,$sqlkt);
                $countkt = mysqli_num_rows($query);
                $sqlkt1 = "SELECT * from sinh_vien Where email='$email'";
                $query1 = mysqli_query($conn,$sqlkt1);
                $countkt1 = mysqli_num_rows($query1);

                if($countkt == 0 && $countkt1 == 0){
                     //cau truy van
                $sql = "INSERT INTO sinh_vien SET
                ma_sv='$id',
                hoten_sv='$ten',
                diachi_sv='$diachi',
                ngaysinh_sv='$ngaysinh',
                email='$email',
                khoa='$khoa',
                gioitinh_sv='$gioitinh',
                pwd_sv='$pwd' 
                ";
                $res= mysqli_query($conn, $sql);
                if($res == true)
                {
                    $_SESSION['signin']="<div class='success'>Tạo tài khoản sinh viên thành công!</div>";
                    header('location:'.SITEURL.'login-sv.php');
                }
                }
                else{
                    $_SESSION['not-match-pwd']="<div class='error'>Email đã tồn tại hoặc MSSV đã tồn tại!</div>";
                    header('location:'.SITEURL.'signin-sv.php');
                }
               
                }
                else{
                    $_SESSION['not-match-pwd']="<div class='error'>Mật khẩu không khớp!</div>";
                    header('location:'.SITEURL.'signin-sv.php');
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
if(isset($_POST['submit']) and $_SESSION['signin'] =="<div class='success'>Tạo tài khoản sinh viên thành công!</div>")
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
<?php include('partials-front/footer.php'); ?>