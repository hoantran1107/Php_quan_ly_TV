<?php include('config.php'); ?>
<!DOCTYPE html>

<head>
<meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../btsql/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img{
            width: 40%;
        }
        td{
            text-align: center;
            width: 150px;
            padding-top: 0;
            margin-top: 0;
        }
        img{
            width: 60px;
            height: 60px;
        }
        th{
            color: brown;
            background-color: burlywood;
            font-size: 20px;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
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
        <?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'VNĐ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    ?>
    <table align="center" border="1">
        <tr>
            <th colspan="5">THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
        <?php
        //

        $sql = "SELECT * FROM sua";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($res == true) {
            echo "<tr>";
            $dem=1;
            while ($row = mysqli_fetch_assoc($res)) {
                $dem++;
                $ma=$row['Ma_sua'];
                $ten_sua = $row['Ten_sua'];
                $ma_hang_sua = $row['Ma_hang_sua'];
                $ma_loai_sua = $row['Ma_loai_sua'];
                $trong_luong = $row['Trong_luong'];
                $don_gia = $row['Don_gia'];
                $hinh = $row['Hinh'];
                $sql2 = "SELECT Ten_hang_sua FROM hang_sua WHERE Ma_hang_sua='$ma_hang_sua' ";
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $ten_hang_sua = $row2['Ten_hang_sua'];
                $sql3 = "SELECT Ten_loai FROM loai_sua WHERE Ma_loai_sua='$ma_loai_sua' ";
                $res3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($res3);
                $ten_loai = $row3['Ten_loai'];
                //
                echo "<td><b>";
                ?>
                <a href='btsql7-display.php?id=<?php echo $ma; ?>'><?php echo  $ten_sua; ?></a></b>
                <?php
                echo "<br>".$trong_luong." gr - ";
                echo " ".currency_format($don_gia)."<br>";
                ?>
                <img src="Hinh_sua/<?php echo $hinh; ?>">
                <?php 
                if($dem==6)
                {
                    echo "</tr>";
                    echo "<tr>";
                    $dem=1;
                }
            }
            }
        ?>
    </table>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>