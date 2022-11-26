<?php
    include('../config/constants.php'); 
    include('../admin/partials/login-check.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        table{
            width: 50%;
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
        <h1>BÀI TẬP MẢNG, CHUỖI VÀ HÀM</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>btarray/btarray1.php" class="btn-primary">Bài 1</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray2.php" class="btn-primary">Bài 2</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray3.php" class="btn-primary">Bài 3</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray4.php" class="btn-primary">Bài 4</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray5.php" class="btn-primary">Bài 5</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray6.php" class="btn-primary">Bài 6</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray7.php" class="btn-primary">Bài 7</a>

        <br /><br /><br />
        <?php
    function lasont($so)
    {
        $bool = true;
        for ($i = 2; $i < $so; $i++) {
            if ($so % $i == 0) {
                $bool = false;
            }
        }
        return $bool;
    }
    function tichsont($mang)
    {
        $tich = 1;
        foreach ($mang as $key => $value) {
            if (lasont($value)) {
                $tich *= $value;
            }
        }
        return $tich;
    }
    if (isset($_POST["submit"])) {
        $dayso = $_POST["dayso"];
        $mangso = explode(",", $dayso);
        $tong = 0;
        foreach ($mangso as $key => $value) {
            $tong += $value;
        }
        $tich = tichsont($mangso);
    }
    ?>
    <table bgcolor="#78e08f" align="center">
        <form action="" method="POST" align="center">
            <th colspan="2" style="text-align: center; background-color: #38ada9;">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            <tr>
                <td>Dãy số: </td>
                <td><input type="text" name="dayso" value="<?php if (isset($_POST["dayso"])) {
                                                                echo $_POST["dayso"];
                                                            } ?>"><b style="color: red">(*)</b></td>
            </tr>
            <tr>
            <tr>
                <td> </td>
                <td><input type="submit" style="font-size:15px; background-color: #fad390;" name="submit" value="Tổng dãy số"></td>
            </tr>
            <td>Tích: </td>
            <td><input type="text" style="background-color: #b8e994;color: red;" name="tongdayso" readonly value="<?php if (isset($tong)) {
                                                                        echo $tong;
                                                                    } ?>"></td>
            </tr>
            <td>Tích số nguyên tố: </td>
            <td><input type="text" style="background-color: #b8e994;color: red;" name="tichsonguyento" readonly value="<?php if (isset($tich)) {
                                                                                echo $tich;
                                                                            } ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><b style="color: red">(*)</b>Các số được nhập cách nhau dấu phẩy ","</td>
            </tr>
        </form>
    </table>
    </div>
</div>
    
<?php include('../admin/partials/footer.php'); ?>