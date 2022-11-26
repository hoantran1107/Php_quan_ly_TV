<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if(isset($_GET['category_id']))
{
$category_id=$_GET['category_id'];
$sql="SELECT ten_tl FROM the_loai WHERE ma_tl='$category_id' ";
$res= mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($res);
$ten = $row['ten_tl'];
}
else{
    header('location:'.SITEURL);
}
?>
<!-- Book search Section Starts Here -->
<section class="book-search text-center">
    <div class="container">
            
    <h2>Sách trong thể loại <a href="#" class="text-white">"<?php echo $ten; ?>"</a></h2>

    </div>
</section>
<!-- Book search Section Ends Here -->
<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Danh mục sách</h2>
        <?php
        //phan trang
        $rowsPerPage = 6;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        //
        $category_id=$_GET['category_id'];
        $sql = "SELECT * FROM sach WHERE ma_tl='$category_id' LIMIT $offset, $rowsPerPage";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $maxPage = ceil($count / $rowsPerPage);
        //
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
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
        ?>
                <div class="book-menu-box">
                    <div class="book-menu-img">
                        <?php
                        if ($tenanh == "") {
                            echo "<div class='error'>Không có ảnh!</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book menu" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="book-menu-desc">
                        <h4><a href="<?php echo SITEURL; ?>detail-book.php?idsach=<?php echo $idsach; ?>"><?php echo $tensach; ?></a></h4>
                        <p class="book-price"><?php echo $giasach; ?> VND</p>
                        <p class="book-detail"><?php echo $tomtat; ?></p><br>
                        <a href="<?php echo SITEURL; ?>muonsach.php?book_id=<?php echo $idsach; ?>" class="btn btn-primary">Mượn sách</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='error'>Không có sách nào!</div>";
        }
        ?>
        <div class="clearfix"></div>

<div style="text-align: center;">
    <?php
    $re = mysqli_query($conn, "SELECT * FROM sach WHERE ma_tl='$category_id' ");
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

    <p class="text-center">
        <a href="#">Tất cả sách</a>
    </p>
</section>
<!-- Book menu section ends here -->
<?php include('partials-front/footer.php'); ob_end_flush(); ?>