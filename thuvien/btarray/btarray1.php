<?php
include('../config/constants.php');
include('../admin/partials/login-check.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src='main.js'></script>
    <style>
        input[type=text] {
            border: none;
            border-bottom: 2px solid red;
            box-sizing: border-box;
            outline: none;
        }

        input[type=text]:focus {
            background-color: lightblue;
        }

        table {
            width: 60%;
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
            $mang = array();
            $bangkhong = array();
            $mangsx = array();
            function taomang($so)
            {
                $mang = array();
                for ($i = 0; $i < $so; $i++) {
                    $mang[$i] = rand(-10, 1000);
                }
                return $mang;
            }
            function demsochan($mang)
            {
                $dem = 0;
                foreach ($mang as $value) {
                    if ($value % 2 == 0) {
                        $dem++;
                    }
                }
                return $dem;
            }
            function demnhohon($mang)
            {
                $dem = 0;
                foreach ($mang as $value) {
                    if ($value < 100) {
                        $dem++;
                    }
                }
                return $dem;
            }
            function tongam($mang)
            {
                $tong = 0;
                foreach ($mang as $value) {
                    if ($value < 0) {
                        $tong += $value;
                    }
                }
                return $tong;
            }
            function bangkhong($mang)
            {
                $m = array();
                foreach ($mang as $key => $value) {
                    $i = 0;
                    if ($value == 0) {
                        $m[$i++] = $key;
                    }
                }
                return $m;
            }
            function sapxep($mang)
            {
                $mangsx = $mang;
                for ($i = 0; $i < count($mang) - 1; $i++) {
                    for ($j = $i + 1; $j < count($mang); $j++) {
                        if ($mangsx[$i] > $mangsx[$j]) {
                            $tam = $mangsx[$i];
                            $mangsx[$i] = $mangsx[$j];
                            $mangsx[$j] = $tam;
                        }
                    }
                }
                return $mangsx;
            }
            if (isset($_POST['submit'])) {
                $n = trim($_POST['n']);
                if ((is_int($n) || ctype_digit($n)) && (int)$n > 0) {
                    $mang = taomang($n);
                    $sochan = demsochan($mang);
                    $nhohon = demnhohon($mang);
                    $tongsoam = tongam($mang);
                    $bangkhong = bangkhong($mang);
                    $mangsx = sapxep($mang);
                } else $n = "Nhập n là số nguyên dương";
            }

            ?>
            <form action="" method="POST">
                <table style="background-color: #f8a5c2;" align="center">
                    <th style="text-align: center;" colspan=2 bgcolor="#c44569">KIỂM TRA SỐ N</th>
                    <tr>
                        <td>Nhập n:</td>
                        <td>
                            <input bgcolor="yellow" type="text" name="n" required value="<?php echo $n ?? "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Mảng phát sinh:</td>
                        <td>
                            <textarea cols="20" rows="4" readonly><?php print implode(', ', $mang) ?? "" ?> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Số số chẵn trong mảng:</td>
                        <td>
                            <input type="text" readonly value="<?php echo $sochan ?? "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Số phần tử nhỏ hơn 100:</td>
                        <td>
                            <input type="text" readonly value="<?php echo $nhohon ?? "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số âm:</td>
                        <td>
                            <input type="text" readonly value="<?php echo $tongsoam ?? "" ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Vị trí các phần tử bằng 0: </td>
                        <td>
                            <textarea cols="20" rows="4" readonly><?php print implode(", ", $bangkhong) ?? "" ?> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Mảng đã sắp xếp: </td>
                        <td>
                            <textarea cols="20" rows="4" readonly><?php print implode(", ", $mangsx) ?? "" ?> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" style="font-size:20px; background-color: #FC427B;" name="submit" value="Thực hiện">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


    <?php include('../admin/partials/footer.php'); ?>