<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="menu main-content">
    <div class="wrapper">
        <h1>QUẢN LÍ THỦ THƯ</h1>

        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; //hien thi thong bao
            unset($_SESSION['delete']); //xoa bo thong bao
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }
        ?>
        <br><br>
        <!-- Button for adding admin -->
        <a href="add-admin.php" class="btn-primary">THÊM THỦ THƯ</a>
        <br /><br /><br />
        <form enctype="multipart/form-data" method="POST" action="">

            <table class="tbl-full">
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                //phan trang
                $rowsPerPage = 6;
                if (!isset($_GET['page'])) {
                    $_GET['page'] = 1;
                }
                $offset = ($_GET['page'] - 1) * $rowsPerPage;
                //tao bien dem
                $sn = 1;
                //lay du lieu tu bang nhan_vien
                $sql = "SELECT * from nhan_vien LIMIT $offset, $rowsPerPage";
                //thuc thi cau truy van
                $res = mysqli_query($conn, $sql);
                //kiem tra ket qua cau truy van
                if ($res == true) {
                    //dem so ban ghi
                    $count = mysqli_num_rows($res); //lay het cac dong
                    $maxPage = ceil($count / $rowsPerPage);
                    if ($count > 0) { //co du lieu

                        //lay tung hang
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['ma_nv'];
                            $ten = $rows['hoten_nv'];
                            $diachi = $rows['diachi_nv'];
                            $sdt = $rows['sdt_nv'];
                            $cmnd = $rows['cmnd_nv'];
                            $gioitinh = $rows['gioitinh_nv'];
                            $tenanh = $rows['anh_nv'];
                            $email = $rows['email_nv'];

                            //hien thi du lieu
                ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td>

                                    <?php
                                    //kiem tra co anh hay khong
                                    if ($tenanh != "") {
                                        //hien thi anh
                                    ?>

                                        <img src="<?php echo SITEURL; ?>images/nv/<?php echo $tenanh; ?>" width="100px">

                                    <?php

                                    } else {
                                        //hien thong bao
                                        echo "<div class='error'>Không có ảnh</div>";
                                    }
                                    ?>

                                </td>
                                <td><?php echo $ten; ?></td>
                                <td><?php echo $sdt; ?></td>
                                <td><?php if ($gioitinh == 0) echo "Nam";
                                    else echo "Nữ"; ?></td>
                                <td><?php echo $email; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>images/pwd.png" width="50px" title="Đổi mật khẩu"></a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Sửa thông tin"></a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>&tenanh=<?php echo $tenanh; ?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa thủ thư"></a>
                                </td>
                            </tr>

                <?php
                        }
                    } else {
                        //khong co du lieu
                    }
                }
                ?>


            </table>
        </form>
        <div class="clearfix"></div>

        <div style="text-align: center;">
            <?php
            $re = mysqli_query($conn, 'select * from nhan_vien');
            $numRows = mysqli_num_rows($re);
            $maxPage = floor($numRows / $rowsPerPage) + 1;
            if ($_GET['page'] > 1) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . "> << </a> ";
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> < </a> "; //gắn thêm nút Back
            }
            for ($i = 1; $i <= $maxPage; $i++) {
                if ($i == $_GET['page']) {
                    echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
                } else echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
            }
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . "> >> </a>";
            }
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>