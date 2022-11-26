<?php ob_start();
include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật trạng thái thẻ</h1>

        <br><br>
        <?php
        if (isset($_GET['id'])) {
            //lay id va dl
            $id = $_GET['id'];
            //lay dl
            $sql = "SELECT * FROM the_thu_vien WHERE ma_the='$id' ";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                //lay dl
                $row = mysqli_fetch_assoc($res);
                $active = $row['active'];
                $ma_the = $row['ma_the'];
            }
        } else {
            //chuyen ve trang manage
            header('location:'.SITEURL.'admin/the-thu-vien.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == "No") echo "checked"; ?> value="No">Chưa duyệt
                    </td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == "Yes") echo "checked"; ?> value="Yes">Đã duyệt
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="ma_the" value="<?php echo $ma_the; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            //lay dl tu form
            $ma_the = $_POST['ma_the'];
            $active = $_POST['active'];



            //cap nhat vao db
            $sql2 = "UPDATE the_thu_vien SET
            active='$active' 
            WHERE ma_the='$ma_the' 
            ";

            //thuc thi
            $res2 = mysqli_query($conn, $sql2);

            //chuyen ve trang manage
            if ($res2 == true) {
                //cap nhat thanh cong
                $_SESSION['update-the'] = "<div class='success'>Cập nhật trạng thái thẻ thư viện thành công!</div>";
                header('location:'.SITEURL.'admin/the-thu-vien.php');
            } else {
                //cap nhat that bai
                $_SESSION['update-the'] = "<div class='error'>Cập nhật trạng thái thẻ thư viện thất bại!</div>";
                header('location:'.SITEURL.'admin/the-thu-vien.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');
ob_end_flush(); ?>