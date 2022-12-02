<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>QUẢN LÍ SINH VIÊN</h1>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; //hien thi thong bao
            unset($_SESSION['delete']); //xoa bo thong bao
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //hien thi thong bao
            unset($_SESSION['update']); //xoa bo thong bao
        }
        ?>
        <br /><br />
        <!-- Button for adding admin -->
        <a href="<?php echo SITEURL; ?>admin/add-sv.php" class="btn-primary">Thêm sinh viên</a>
        <br><br>
        <form action="" method="POST">
            <label>Tìm kiếm sinh viên: </label>
            <input type="search" name="search" value="">
            <input type="submit" name="tim" value="Tìm kiếm">
        </form>

        <br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Khoa</th>
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
            if(isset($_POST['tim']))
            {
                $search=$_POST['search'];
                $sql="SELECT * FROM sinh_vien WHERE ma_sv LIKE '%$search%' OR hoten_sv LIKE '%$search%' OR gioitinh_sv LIKE '%$search%' OR diachi_sv LIKE '%$search%' OR khoa LIKE '%$search%' OR email LIKE '%$search%' LIMIT $offset, $rowsPerPage ";
                $res=mysqli_query($conn, $sql);
                //
            }
            else{
            $sql = "SELECT * from sinh_vien LIMIT $offset, $rowsPerPage";
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
                        $id = $rows['ma_sv'];
                        $ten = $rows['hoten_sv'];
                        $diachi = $rows['diachi_sv'];
                        $ngaysinh = $rows['ngaysinh_sv'];
                        $ngaysinh=date("d/m/Y", strtotime($ngaysinh));
                        $khoa = $rows['khoa'];
                        $gioitinh = $rows['gioitinh_sv'];
                        $email = $rows['email'];

                        //hien thi du lieu
            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $ten; ?></td>
                            <td><?php echo $ngaysinh; ?></td>
                            <td><?php echo $khoa; ?></td>
                            <td><?php if($gioitinh=='Nam') echo "Nam";
                            else echo "Nữ"; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-sv.php?id=<?php echo $id;?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Sửa thông tin sinh viên"></a>
                                <a href="<?php echo SITEURL; ?>admin/delete-sv.php?id=<?php echo $id;?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa sinh viên"></a>
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
    $re = mysqli_query($conn, 'select * from sinh_vien');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    if ($_GET['page'] > 1){
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".(1)."> << </a> ";
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> < </a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i."> ".$i."</a> ";
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=".($maxPage) . "> >> </a>";
    }
    ?>
    </div>
    <div class="clearfix"></div>
    </div>
</div>

<?php include('partials/footer.php'); ?>