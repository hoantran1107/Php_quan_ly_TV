<?php ob_start();
include('partials-front/menu.php'); ?>

<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Thông tin sách</h2>
        <div>
            <?php
            if (isset($_GET['idsach'])) {
                $idsach = $_GET['idsach'];
                $sql = "SELECT * FROM sach WHERE ma_sach='$idsach' ";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                //var_dump($res);
                //tien te
                if (!function_exists('currency_format')) {
                    function currency_format($number, $suffix = 'VNĐ')
                    {
                        if (!empty($number)) {
                            return number_format($number, 0, ',', '.') . "{$suffix}";
                        }
                    }
                }
                $row = mysqli_fetch_assoc($res);
                $idsach = $row['ma_sach'];
                $tensach = $row['ten_sach'];
                $soluong = $row['soluong'];
                $sotrang = $row['sotrang'];
                $giasach = $row['gia_sach'];
                $namxb = $row['namxb'];
                $ma_nxb = $row['ma_nxb'];
                $ma_tl = $row['ma_tl'];
                $ma_tg = $row['ma_tg'];
                $tinhtrang = $row['tinhtrang'];
                $tomtat = $row['tomtat'];
                $tenanh = $row['anh_sach'];
                //
                $sqlxb = "SELECT ten_nxb FROM nha_xuat_ban WHERE ma_nxb='$ma_nxb' ";
                $resxb = mysqli_query($conn, $sqlxb);
                $rowxb = mysqli_fetch_assoc($resxb);
                $ten_nxb = $rowxb['ten_nxb'];
                //
                $sqltg = "SELECT ten_tg FROM tac_gia WHERE ma_tg='$ma_tg' ";
                $restg = mysqli_query($conn, $sqltg);
                $rowtg = mysqli_fetch_assoc($restg);
                $ten_tg = $rowtg['ten_tg'];
                //
                $sqltl = "SELECT ten_tl FROM the_loai WHERE ma_tl='$ma_tl' ";
                $restl = mysqli_query($conn, $sqltl);
                $rowtl = mysqli_fetch_assoc($restl);
                $ten_tl = $rowtl['ten_tl'];
            ?>
                    <h3 style="text-align: center; color: darkblue;"><?php echo $tensach . " - " . $ten_tg; ?></h3><br>
                    <div style="width: 30%;float: left; padding-right: 2%;">
                            <?php
                            if ($tenanh == "") {
                                echo "<div class='error'>Không có ảnh</div>";
                            } else {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book menu"  class="img-responsive img-curve">
                            <?php
                            }
                            ?>
                        </div>
                    <div>
                        <p><b>Tên nhà xuất bản: </b><?php echo $ten_nxb; ?></p><br>
                        <p><b>Năm xuất bản: </b><?php echo $namxb; ?></p><br>
                        <p><b>Số trang: </b><?php echo $sotrang; ?> - <?php echo currency_format($giasach); ?></p><br>
                        <p><b>Số lượng: </b><?php echo $soluong; ?></p><br>
                        <p><b>Thể loại: </b><?php echo $ten_tl; ?></p><br>
                        <p><b>Tình trạng: </b><?php echo $tinhtrang; ?></p><br>
                        <p><b>Tóm tắt: </b><?php echo $tomtat; ?></p><br>
                    </div>
            <?php
            } else {
                header('location:'.SITEURL);
            }
            ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="javascript:window.history.back(-1);">Quay lại</a>
    </p>
</section>
<!-- Book menu section ends here -->
<?php include('partials-front/footer.php');
ob_end_flush(); ?>