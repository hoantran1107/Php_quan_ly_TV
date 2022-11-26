<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>QUẢN LÍ SÁCH</h1>
        <br>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['no-book-found'])) {
            echo $_SESSION['no-book-found'];
            unset($_SESSION['no-book-found']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
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
        <br>
        <!-- Button for adding book -->
        <a href="<?php echo SITEURL; ?>admin/add-book.php" class="btn-primary">THÊM SÁCH</a>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">THÊM THỂ LOẠI</a>
        <a href="<?php echo SITEURL; ?>admin/add-author.php" class="btn-primary">THÊM TÁC GIẢ</a>
        <a href="<?php echo SITEURL; ?>admin/add-nxb.php" class="btn-primary">THÊM NHÀ XUẤT BẢN</a>

        <br><br>
        <form action="" method="POST">
            <label>Tìm kiếm sách: </label>
            <input type="search" name="search" value="">
            <input type="submit" name="tim" value="Tìm kiếm">
        </form>
        <br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Ảnh sách</th>
                <th>Tên sách</th>
                <th>Năm XB</th>
                <th>Giá sách</th>
                <th>Số lượng</th>
                <th>Actions</th>
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
            if (isset($_POST['tim'])) {
                $search = $_POST['search'];
                $sql = "SELECT * FROM sach WHERE ma_sach LIKE '%$search%' OR ten_sach LIKE '%$search%' OR namxb LIKE '%$search%' OR gia_sach LIKE '%$search%' LIMIT $offset, $rowsPerPage ";
                $res = mysqli_query($conn, $sql);
                //
            }
            else{
            $sql = "SELECT * from sach LIMIT $offset, $rowsPerPage";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);}
            //kiem tra ket qua cau truy van
            if ($res == true) {
                //dem so ban ghi
                $count = mysqli_num_rows($res); //lay het cac dong
                $maxPage = ceil($count / $rowsPerPage);
                if ($count > 0) { //co du lieu

                    //lay tung hang
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $idsach = $rows['ma_sach'];
                        $ten_sach = $rows['ten_sach'];
                        $soluong = $rows['soluong'];
                        $sotrang = $rows['sotrang'];
                        $gia_sach = $rows['gia_sach'];
                        $namxb = $rows['namxb'];
                        $ma_nxb = $rows['ma_nxb'];
                        $ma_tl = $rows['ma_tl'];
                        $ma_tg = $rows['ma_tg'];
                        $tinhtrang = $rows['tinhtrang'];
                        $tomtat = $rows['tomtat'];
                        $tenanh = $rows['anh_sach'];

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

                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" width="100px">

                                <?php

                                } else {
                                    //hien thong bao
                                    echo "<div class='error'>Không có ảnh</div>";
                                }
                                ?>

                            </td>
                            <td><?php echo $ten_sach; ?></td>
                            <td><?php echo $namxb; ?></td>
                            <td><?php echo $gia_sach; ?></td>
                            <td><?php echo $soluong; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-book.php?idsach=<?php echo $idsach; ?>&tenanh=<?php echo $tenanh; ?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Sửa thông tin sách"></a>
                                <a href="<?php echo SITEURL; ?>admin/delete-book.php?idsach=<?php echo $idsach; ?>&tenanh=<?php echo $tenanh; ?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa sách"></a>
                            </td>
                        </tr>

            <?php


                    }
                }
            }
            ?>


        </table>
        <div class="clearfix"></div>

        <div style="text-align: center;">
            <?php
            $re = mysqli_query($conn, 'select * from sach');
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

<?php include('partials/footer.php'); ?>