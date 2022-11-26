<?php ob_start(); include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm nhà xuất bản</h1>
        <br>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        ?><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã nhà xuất bản</td>
                    <td>
                        <input type="text" name="ma_nxb" placeholder="Ví dụ: TN">
                    </td>
                </tr>
                <tr>
                    <td>Tên nhà xuất bản</td>
                    <td>
                        <input type="text" name="ten_nxb" placeholder="Ví dụ: Nhà xuất bản Thanh Niên">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm nhà xuất bản" class="btn-secondary">
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
    $id = mysqli_real_escape_string($conn, $_POST['ma_nxb']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten_nxb']);
    
    
    //cau truy van
    $sql = "INSERT INTO nha_xuat_ban SET
    ma_nxb='$id',
    ten_nxb='$ten'  
    ";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Thêm nhà xuất bản thành công!</div>";
        //echo "Thanh cong";
        header('location:'.SITEURL.'admin/manage-book.php');
        }
        else{
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Thêm nhà xuất bản thất bại!</div>";
        //chuyen trang toi manage admin 
        header("location:".SITEURL.'admin/add-category.php');
    }
}
ob_end_flush();
?>