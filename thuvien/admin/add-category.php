<?php ob_start(); include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm thể loại</h1>
        <br>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];//hien thi thong bao
            unset($_SESSION['upload']);//xoa bo thong bao
        }
        ?><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã thể loại</td>
                    <td>
                        <input type="text" name="ma_tl" placeholder="Ví dụ: TN (Truyện ngắn)">
                    </td>
                </tr>
                <tr>
                    <td>Tên thể loại</td>
                    <td>
                        <input type="text" name="ten_tl" placeholder="Ví dụ: Tiểu thuyết">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh đại diện</td>
                    <td>
                        <input type="file" name="anh_tl">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm thể loại" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php include('partials/footer.php') ?>
<?php
//Luu vao csdl
//kiem tra nut submit
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['ma_tl']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten_tl']);
    $tenanh='';
    
    //kiem tra anh duoc chon chua
    //print_r($_FILES['anh_nv']);

    //die();//kiem tra va dung tai day
    if(isset($_FILES['anh_tl']['name']))
    {
        //tai anh lên
        //ten, nguon, dich
        $tenanh=$_FILES['anh_tl']['name'];

        //upload anh khi anh khong duoc chon
        if($tenanh!="")
        {


        //auto rename file
        //lay duoi file
        $ext = explode('.',$tenanh);
        $ext = end($ext);

        //doi ten file
        $tenanh="Category_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['anh_tl']['tmp_name'];
        $destination_path="../images/category/".$tenanh;
        //upload image
        $upload = move_uploaded_file($source_path,$destination_path);
        //kiem tra anh da tai len hay chua
        if($upload==false)
        {
            $_SESSION['upload']="<div class='error'>Thêm ảnh đại diện thất bại!</div>";
            header('location:'.SITEURL.'admin/add-category.php');
            die();
        }
    }
    }
    else{
        //khong tai anh va gan gia tri la ''
        $tenanh='';
    }
    //cau truy van
    $sql = "INSERT INTO the_loai SET
    ma_tl='$id',
    ten_tl='$ten',
    anh_tl='$tenanh' 
    ";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Thêm thể loại thành công!</div>";
        //echo "Thanh cong";
        header('location:'.SITEURL.'admin/manage-book.php');
        }
        else{
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Thêm thể loại thất bại!</div>";
        //chuyen trang toi manage admin 
        header("location:".SITEURL.'admin/add-category.php');
    }
}
ob_end_flush();
?>