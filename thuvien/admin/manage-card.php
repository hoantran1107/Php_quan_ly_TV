<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>QUẢN LÍ MƯỢN TRẢ SÁCH</h1>
        <br />
        <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['delete-pm']))
        {
            echo $_SESSION['delete-pm'];
            unset($_SESSION['delete-pm']);
        }
        if(isset($_SESSION['tra']))
        {
            echo $_SESSION['tra'];
            unset($_SESSION['tra']);
        }
        ?>
        <br>
        <!-- Button for adding admin -->
        <a href="<?php echo SITEURL; ?>admin/manage-card.php" class="btn-primary">Phiếu mượn</a>
        <a href="<?php echo SITEURL; ?>admin/the-thu-vien.php" class="btn-primary">Thẻ thư viện</a>
        <a href="<?php echo SITEURL; ?>admin/trasach.php" class="btn-primary" title="Xác nhận trả sách">Trả sách</a>
        <br><br>
        <form action="" method="POST">
            <label>Tìm kiếm phiếu mượn: </label>
            <input type="search" name="search" value="">
            <input type="submit" name="tim" value="Tìm kiếm">
        </form>
        <br /><br />

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Họ tên sinh viên</th>
                <th>MSSV</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Trả sách</th>
            </tr>
            <?php
            //phan trang
        $rowsPerPage = 6;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        if (isset($_POST['tim'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM phieu_muon join sinh_vien on phieu_muon.ma_sv=sinh_vien.ma_sv join sach on phieu_muon.ma_sach=sach.ma_sach WHERE hoten_sv LIKE '%$search%' OR ten_sach LIKE '%$search%'  LIMIT $offset, $rowsPerPage ";
            $res = mysqli_query($conn, $sql);
            //
        }
        else{
            $sql="SELECT * FROM phieu_muon ORDER by ma_pm DESC LIMIT $offset, $rowsPerPage ";
            $res= mysqli_query($conn, $sql);}
            $count=mysqli_num_rows($res);
            $maxPage = ceil($count / $rowsPerPage);
            //
            $sn=1;
            if($count>0){
                while($row=mysqli_fetch_assoc($res))
                {
                    $ma_pm=$row['ma_pm'];
                    $ngay_muon=$row['ngay_muon'];
                    $soluong_muon=$row['soluong_muon'];
                    $ma_sach=$row['ma_sach'];
                    $ma_sv=$row['ma_sv'];

                    $sql2="SELECT hoten_sv FROM sinh_vien WHERE ma_sv='$ma_sv' ";
                    $res2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($res2);
                    $hoten_sv = $row2['hoten_sv'];

                    $sql3="SELECT ten_sach FROM sach WHERE ma_sach='$ma_sach' ";
                    $res3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($res3);
                    $ten_sach = $row3['ten_sach'];
                    $active=$row['active'];
                    $tra_sach = $row['tra_sach'];
                    ?>
                    <tr>
                    <td><?php echo 6*($_GET['page']-1) + $sn++; ?></td>
                    <td><?php echo $hoten_sv; ?></td>
                    <td><?php echo $ma_sv; ?></td>
                    <td><?php echo $ten_sach; ?></td>
                    <td><?php echo $soluong_muon; ?></td>
                    <td><?php if($active=="No") echo "<div class='error'>Chưa duyệt</div>"; else echo "<div class='success'>Đã duyệt</div>"; ?></td>
                    <td><?php if($tra_sach=="No") echo "<div class='error'>Chưa trả</div>"; else echo "<div class='success'>Đã trả</div>"; ?></td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/update-card.php?id=<?php echo $ma_pm;?>"><img src="<?php echo SITEURL; ?>images/edit.png" width="50px" title="Đổi trạng thái phiếu mượn"></a>
                    <a href="<?php echo SITEURL; ?>admin/delete-pm.php?id=<?php echo $ma_pm;?>"><img src="<?php echo SITEURL; ?>images/delete.png" width="50px" title="Xóa phiếu mượn"></a>    
                </td>
                    </tr>
                    <?php
                }
            }
            else{
                echo "<tr><td colspan='7' class='error' >Hiện không có phiếu mượn nào</td></tr>";
            }
            ?>
        </table>
        <div class="clearfix"></div>

<div style="text-align: center;">
    <?php
    $re = mysqli_query($conn, 'select * from phieu_muon');
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