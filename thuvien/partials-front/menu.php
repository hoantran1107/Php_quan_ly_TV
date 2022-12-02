<?php include('config/constants.php');
include('login-check-sv.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- tien te -->
    <?php
    if (!function_exists('currency_format')) {
        function formamt_price($priceFloat)
        {
            $symbol = ' vnđ';
            $symbol_thousand = '.';
            $decimal_place = 0;
            $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
            return $price . $symbol;
        }
    }
    ?>
    <!-- Navbar starts here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/Logo.png" class="img-logo img-responsive" alt="Library Logo">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>book.php">Sách</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Thể loại</a>
                    </li>
                    <!-- 
                        Thông báo hạn thẻ ... 
                     -->
                    <li>
                        <?php
                        if (isset($_SESSION['usersv']))
                            echo "<a href=" . SITEURL . "logout-sv.php>Đăng xuất</a>";
                        if (!isset($_SESSION['usersv'])) {

                            echo "<a href='" . SITEURL . "login-sv.php'>Đăng nhập</a>";
                        }
                        ?>
                    </li>
                    <?php
                    if (isset($_SESSION['usersv'])) {
                        $id = $_SESSION['usersv'];
                        $sql = "SELECT * FROM sinh_vien WHERE ma_sv='$id' ";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if ($count == 1) {
                            $row = mysqli_fetch_assoc($res);
                            $ten = $row['hoten_sv'];
                        }
                        echo "<li>" . $ten . "</li>";
                        echo "<li>
                    <a href=" . SITEURL . "detail.php?sv_id=" . $id . "><img src='images/girl.png' title='Xem chi tiết thông tin sinh viên' width='4%' height='auto'></a>
                </li>
                <li>
                    <a href=" . SITEURL . "phieumuon.php?sv_id=" . $id . "><img src='images/backpack.png' title='Xem chi tiết phiếu mượn' width='4%' height='auto'></a>
                </li>";
                    }
                    ?>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar ends here -->