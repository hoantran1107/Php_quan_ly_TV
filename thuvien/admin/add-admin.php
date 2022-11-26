<?php ob_start(); include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];//hien thi thong bao
            unset($_SESSION['add']);//xoa bo thong bao
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];//hien thi thong bao
            unset($_SESSION['upload']);//xoa bo thong bao
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã thủ thư</td>
                    <td>
                        <input type="text" name="ma_nv" placeholder="Nhập mã thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input type="text" name="hoten_nv" placeholder="Nhập họ tên thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <input type="text" name="diachi_nv" placeholder="Nhập địa chỉ thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <input type="tel" name="sdt_nv" placeholder="Nhập số điện thoại thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>CMND</td>
                    <td>
                        <input type="text" name="cmnd_nv" placeholder="Nhập CMND thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td>
                        <input type="radio" name="gioitinh_nv" value="0">Nam
                        <input type="radio" name="gioitinh_nv" value="1" checked>Nữ
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email_nv" placeholder="Nhập email thủ thư">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" name="pwd" placeholder="Nhập mật khẩu">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td>
                        <input type="file" name="anh_nv">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
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
    $id = mysqli_real_escape_string($conn, $_POST['ma_nv']);
    $ten = mysqli_real_escape_string($conn, $_POST['hoten_nv']);
    $email = mysqli_real_escape_string($conn, $_POST['email_nv']);
    $sdt = $_POST['sdt_nv'];
    $cmnd = $_POST['cmnd_nv'];
    $gioitinh = $_POST['gioitinh_nv'];
    $diachi = mysqli_real_escape_string($conn, $_POST['diachi_nv']);
    $raw_pwd= md5($_POST['pwd']);
    $pwd= mysqli_real_escape_string($conn, $raw_pwd);


    //kiem tra anh duoc chon chua
    //print_r($_FILES['anh_nv']);

    //die();//kiem tra va dung tai day
    if(isset($_FILES['anh_nv']['name']))
    {
        //tai anh lên
        //ten, nguon, dich
        $tenanh=$_FILES['anh_nv']['name'];
        //auto rename file
        //lay duoi file
        $ext = end(explode('.',$tenanh));

        //doi ten file
        $tenanh="Admin_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['anh_nv']['tmp_name'];
        $destination_path="../images/nv/".$tenanh;
        //upload image
        $upload = move_uploaded_file($source_path,$destination_path);

        //kiem tra anh da tai len hay chua
        if($upload==false)
        {
            $_SESSION['upload']="<div class='error'>Uploaded images failed</div>";
            header('location:'.SITEURL.'admin/add-admin.php');
            die();
        }
    }
    else{
        //khong tai anh va gan gia tri la ''
        $tenanh='';
    }

    //cau truy van
    $sql = "INSERT INTO nhan_vien SET
    ma_nv='$id',
    hoten_nv='$ten',
    diachi_nv='$diachi',
    sdt_nv='$sdt',
    email_nv='$email',
    cmnd_nv='$cmnd',
    pwd='$pwd',
    gioitinh_nv='$gioitinh',
    anh_nv='$tenanh'  
    ";
    
    

    //thuc thi cau truy van
    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    //kiem tra ket qua cau truy van
    if($res == true) {
        //insert thanh cong
        //echo "insert thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='success'>Admin is added successfully!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else {
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Admin is added failed!</div>";
        //chuyen trang toi manage admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}


ob_end_flush();
?>