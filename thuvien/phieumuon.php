<?php ob_start();
include('partials-front/menu.php'); ?>
<?php
if (isset($_GET['sv_id'])) {

    //kiem tra the tv
    $idsv = $_GET['sv_id'];
    $sqltv = "SELECT ma_sv FROM the_thu_vien WHERE ma_sv='$idsv' and active='Yes' ";
    $restv = mysqli_query($conn, $sqltv);
    $counttv = mysqli_num_rows($restv);
    if ($counttv <= 0) {
        $_SESSION['chua-co-the'] = "<div class='error text-center'>Chưa có thẻ thư viện, đăng kí thẻ tại đây!</div>";
        header('location:'.SITEURL.'add-card.php?sv_id='.$idsv);
    }
} else {
    header('location:'.SITEURL);
}
?>
<!-- Book search section starts here -->
<section class="book-search">
    <div class="container">
        <?php
        if(isset($_SESSION['delete-pm']))
        {
            echo $_SESSION['delete-pm'];
            unset($_SESSION['delete-pm']);
        }
        if(isset($_SESSION['trasach']))
        {
            echo $_SESSION['trasach'];
            unset($_SESSION['trasach']);
        }
        if(isset($_SESSION['muonsach']))
        {
            echo $_SESSION['muonsach'];
            unset($_SESSION['muonsach']);
        }
        ?>
        <h2 class="text-white" style="margin: 1%;">Danh sách mượn</h2>
        <form action="" method="POST" class="order" style="width: 100%;">
        <?php
        $sql = "SELECT * FROM phieu_muon WHERE ma_sv='$idsv' GROUP BY ma_sach ";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        while($row = mysqli_fetch_assoc($res)){
        //
        $ma_pm=$row['ma_pm'];
        $ngay = getdate();
        $ngay_muonsach = $row['ngay_muon'];
        $ngay_tra = $row['ngay_tra'];
        $date = new DateTime($ngay_muonsach);
        $date2 = new DateTime($ngay_tra);
        $ngay_muon=$ngay['year']."/".$ngay['mon']."/".$ngay['mday'];
        $soluong_muon = $row['soluong_muon'];
        $ma_sach = $row['ma_sach'];
        $sqlsach = "SELECT * FROM sach WHERE ma_sach='$ma_sach' ";
        $ressach = mysqli_query($conn, $sqlsach);
        $rowsach = mysqli_fetch_assoc($ressach);
        $ten_sach = $rowsach['ten_sach'];
        $tenanh = $rowsach['anh_sach'];
        ?>
        <div class="book-menu-box" style="width: 60%">
            <div class="book-menu-img">
                <?php
                if ($tenanh == "") {
                    echo "<div class='error text-center'>Không có ảnh!</div>";
                } else {
                ?>
                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book" class="img-responsive img-curve">
                <?php
                }
                ?>
            </div>

            <div class="book-menu-desc">
                <h3><a href="<?php echo SITEURL; ?>detail-book.php?idsach=<?php echo $ma_sach; ?>"><?php echo $ten_sach; ?></a></h3>
                <div class="order-label">Số lượng: <?php echo $soluong_muon; ?></div>
                <div class="order-label">Ngày mượn: <?php echo date_format($date,"d/m/Y"); ?></div>
                <div class="order-label">Ngày trả: <?php if($ngay_tra == null) echo "Sách chưa trả"; else echo date_format($date2,"d/m/Y"); ?></div>
                
                <a href="<?php echo SITEURL; ?>delete-phieumuon.php?idpm=<?php echo $ma_pm; ?>" class="btn btn-primary">Xóa</a>
            </div>

        </div>
        <div class="clearfix"></div>
        <?php
        }
        ?>
            <input type="date" name="ngay_muon" style="margin: 1%;background-color: inherit; font-size: larger; font-weight: bolder; color: white;" required value="Ngày mượn: <?php if(isset($ngay_muon)) echo $ngay_muon; ?>"><br>
            <input type="submit" name="submit" value="Xác nhận" title="Xác nhận danh sách mượn" style="margin: 1%;" class="btn btn-primary">
            <input type="submit" name="trasach" value="Trả sách" title="Xác nhận danh sách trả" style="margin: 1%;" class="btn btn-primary">

        </form>
        <?php
        if (isset($_POST['submit'])) {
            $ngay_muon=$_POST['ngay_muon'];

            $sql3 = "UPDATE phieu_muon SET
                active='Yes',
                ngay_muon='$ngay_muon' 
                WHERE ma_sv='$idsv' 
                ";

            $res3 = mysqli_query($conn, $sql3);
            if ($res3 == true) {
                $_SESSION['muonsach'] = "<div class='success text-center'>Xác nhận phiếu mượn thành công</div>";
                //header('location:'.SITEURL.'');
            } else {
                $_SESSION['muonsach'] = "<div class='error text-center'>Xác nhận phiếu mượn không thành công</div>";
                //header('location:'.SITEURL);
            }
        }
        if(isset($_POST['trasach']))
        {
            $sqltra="UPDATE phieu_muon SET active='No' WHERE ma_sv='$idsv' ";
            $restra=mysqli_query($conn, $sqltra);
            if ($restra == true) {
                $_SESSION['trasach'] = "<div class='text-white text-center'>Đăng kí trả sách thành công</div>";
                //header('location:'.SITEURL.'');
            } else {
                $_SESSION['trasach'] = "<div class='text-white text-center'>Đăng kí trả sách không thành công</div>";
                //header('location:'.SITEURL);
            }
        }
        ?>
    </div>
</section>
<!-- Book search section ends here -->


<?php include('partials-front/footer.php');
ob_end_flush(); ?>