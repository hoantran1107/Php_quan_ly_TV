<?php 
error_reporting(E_ERROR | E_PARSE);
ob_start();
//mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../composer/vendor/autoload.php';
include('../config/constants.php');

//khoi tao mailer, smtp
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->IsSMTP();

include('partials/menu.php');
?>
<!DOCTYPE html>

<head>
    <title>Đăng kí - Thư viện</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login">

    <?php if (isset($_SESSION['resetpass']))
    {
        echo $_SESSION['resetpass'];
        unset($_SESSION['resetpass']);
    }
    ?>
    <!-- Signin Form Starts Here -->
    <section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Điền email đã có</h2>

            <form action="resetpass.php" method="POST" class="order">                
                <fieldset>
                    <legend></legend>
                    <div class="order-label">Email</div>
                    <input type="email" name="email_sv" placeholder="VD: Exmaple@gmail.com" class="input-responsive" required>

                    <br><br>
                    <input type="submit" name="submit" value="Gửi email xác nhận" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $email = mysqli_real_escape_string($conn, $_POST['email_sv']);
                $emailgui = $_POST['email_sv'];
                //cau truy van
                $sql = "SELECT * FROM sinh_vien WHERE email='$email'";
                $res= mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                
                if($count >0)
                {
                    $mail->SMTPDebug = 1;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;
                    $mail->Host = "smtp.gmail.com";
                    $mail->Username = "hoan.tk.59cntt@ntu.edu.vn";
                    $mail->Password = "tplink1234";
                    $mail->isHTML(true);
                    $mail->addAddress("$emailgui");
                    $mail->setFrom("$emailgui");
                    $mail->Subject = "Thông báo đổi mật khẩu";
                    $content = "Gửi sinh viên,kích vào đường link này để đổi mật khẩu http://localhost/thuvien/resetpass/rmk.php?email=$emailgui";
                    //gui mail
                    $mail->msgHTML($content);
                    $mail->send();
                    $_SESSION['resetpass']="<div class='success'>Kiểm tra gmail của bạn!</div>";
                    header('location:'.SITEURL.'resetpass/resetpass.php');
                   

                }
                
                else{
                    $_SESSION['resetpass']="<div class='error'>Tài khoản không tồn tại!</div>";
                    header('location:'.SITEURL.'resetpass/resetpass.php');
                }
            }
            ?>
        </div>
    </section>
    <!-- Signin Form Ends Here -->

    </div>

</body>

</html>
<?php include('../partials-front/footer.php'); ?>