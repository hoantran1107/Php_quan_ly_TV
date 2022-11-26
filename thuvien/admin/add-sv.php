<?php ob_start(); include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>THÊM SINH VIÊN</h1>
        <br /><br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã sinh viên</td>
                    <td>
                        <input type="text" name="ma_sv" placeholder="Nhập mã sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_sv" placeholder="Nhập họ tên sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_sv" placeholder="Nhập địa chỉ sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td>
                        <input type="date" name="ngaysinh_sv" placeholder="Nhập ngày sinh">
                    </td>
                </tr>
                <tr>
                    <td>Khoa</td>
                    <td>
                        <input type="text" name="khoa" placeholder="Nhập khoa viện đào tạo">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_sv" value="Nam">Nam
                        <input type="radio" name="gioitinh_sv" value="Nữ">Nữ
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_sv" placeholder="Nhập email sinh viên">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="pwd_sv" placeholder="Nhập mật khẩu">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm sinh viên" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php
//Luu vao csdl

//kiem tra nut submit
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['ma_sv']);
    $ten = mysqli_real_escape_string($conn, $_POST['hoten_sv']);
    $diachi = mysqli_real_escape_string($conn, $_POST['diachi_sv']);
    $ngaysinh = $_POST['ngaysinh_sv'];
    $khoa = mysqli_real_escape_string($conn, $_POST['khoa']);
    $gioitinh = $_POST['gioitinh_sv'];
    $email = mysqli_real_escape_string($conn, $_POST['email_sv']);
    $raw_pwd= md5($_POST['pwd_sv']);
    $pwd= mysqli_real_escape_string($conn, $raw_pwd);

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
    


    //thuc thi cau truy van
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //kiem tra ket qua cau truy van
    if ($res == true) {
        //insert thanh cong
        //echo "insert thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='success'>Sinh viên được thêm thành công!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/manage-sv.php');
    } else {
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Sinh viên không được thêm!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/add-sv.php');
    }
}


ob_end_flush();
?>