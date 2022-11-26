<?php include('config.php'); ?>

<!DOCTYPE html>
<head>
<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../btsql/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="<?php echo SITEURL; ?>admin/index.php">TRANG CHỦ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-admin.php">THỦ THƯ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-sv.php">SINH VIÊN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-book.php">SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-card.php">MƯỢN SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/baitap.php">BÀI TẬP</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/thongtincanhan.php">THÔNG TIN CÁ NHÂN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/logout.php">ĐĂNG XUẤT</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu section ends -->
<div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP PHP KẾT HỢP MYSQL</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>btsql/btsql1.php" class="btn-primary">Bài 1</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql2.php" class="btn-primary">Bài 2</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql3.php" class="btn-primary">Bài 3</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql4.php" class="btn-primary">Bài 4</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql5.php" class="btn-primary">Bài 5</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql6.php" class="btn-primary">Bài 6</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql7.php" class="btn-primary">Bài 7</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql8.php" class="btn-primary">Bài 8</a>
        <a href="<?php echo SITEURL; ?>btsql/btsql9.php" class="btn-primary">Bài 9</a>

        <br /><br /><br />
        <h3 align="center" style="color: blue; font-family: Verdana, Geneva, Tahoma, sans-serif;">THÔNG TIN HÃNG SỮA</h3>
    <table align="center" border="1">
        <tr>
            <th>Mã hãng sữa</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>
        <?php
        $sql = "SELECT * FROM hang_sua";
        $res = mysqli_query($conn, $sql);
        if($res == true)
        {
            $count = mysqli_num_rows($res);
            if($count >=1)
            {

                while ($rows=mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>".$rows['Ma_hang_sua']."</td>";
                    echo "<td>".$rows['Ten_hang_sua']."</td>";
                    echo "<td>".$rows['Dia_chi']."</td>";
                    echo "<td>".$rows['Dien_thoai']."</td>";
                    echo "<td>".$rows['Email']."</td>";
                    echo "</tr>";
                }
            }
        }
        
        ?>
    </table>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>