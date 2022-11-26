<?php
error_reporting(E_ERROR | E_PARSE);
ob_start();
//mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
include('../config/constants.php');

//khoi tao mailer, smtp
$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
$mail->IsSMTP();
$mail->Mailer = "smtp";

include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="mail" readonly value="<?php echo $_SESSION['user']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="mk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Gửi mail" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php
//mk
$emailnv = $_SESSION['user'];
if (isset($_POST['submit'])) {
    //
    $mk=$_POST['mk'];
    //N94-ib2-ZYF-nhung
    //
    
    //dat cac thong so can thiet
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "$emailnv";
    $mail->Password = "$mk";

    //
    $idsv = $_GET['id'];
    //
    $sql = "SELECT email FROM sinh_vien WHERE ma_sv='$idsv' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $emailsv = $row['email'];

    //thong so cho mail
    $mail->isHTML(true);
    $mail->addAddress("$emailsv");
    $mail->setFrom("$emailnv");
    $mail->Subject = "Thông báo thẻ thư viện";
    $content = "Gửi sinh viên, thẻ thư viện của bạn đã được kích hoạt, bây giờ bạn có thể tiến hành mượn sách!";

    //gui mail
    $mail->msgHTML($content);
    if (!$mail->send()) {
        //echo "Gửi email thất bại!";
        //var_dump($mail);
        $_SESSION['mail'] = "<div class='error'>Gửi email thất bại!</div>";
        header('location:' . SITEURL . 'admin/the-thu-vien.php');
    } else {
        //echo "Đã gửi mail thành công!";
        $_SESSION['mail'] = "<div class='success'>Đã gửi mail thành công!</div>";
        header('location:' . SITEURL . 'admin/the-thu-vien.php');
    }
}
include('partials/footer.php');
ob_end_flush();
?>