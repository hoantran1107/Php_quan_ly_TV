<?php ob_start(); include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Thêm tác giả</h1>
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
                    <td>Mã tác giả</td>
                    <td>
                        <input type="text" name="ma_tg" placeholder="Ví dụ: NC (Nam Cao)">
                    </td>
                </tr>
                <tr>
                    <td>Tên tác giả</td>
                    <td>
                        <input type="text" name="ten_tg" placeholder="Ví dụ: Nam Cao">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm tác giả" class="btn-secondary">
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
    $id = mysqli_real_escape_string($conn, $_POST['ma_tg']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten_tg']);
 
    //cau truy van
    $sql = "INSERT INTO tac_gia SET
    ma_tg='$id',
    ten_tg='$ten' 
    ";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Thêm tác giả thành công!</div>";
        //echo "Thanh cong";
        header('location:'.SITEURL.'admin/manage-book.php');
        }
        else{
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Thêm tác giả thất bại!</div>";
        //chuyen trang toi manage admin 
        header("location:".SITEURL.'admin/add-author.php');
    }
}
ob_end_flush();
?>