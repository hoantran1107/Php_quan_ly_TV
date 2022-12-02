<?php include('partials-front/menu.php'); ?>
<!-- Book search section starts here -->
<section class="book-search text-center">
    <div class="container">
        <form action="<?php echo SITEURL; ?>book-search.php" method="POST">
            <input type="search" name="search" placeholder="Tìm sách ..." required>
            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- Book search section ends here -->

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

        $sql = "SELECT * FROM sach LIMIT $offset, $rowsPerPage";
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
                <div class="book-menu-box">
                    <div class="book-menu-img">
                        <?php
                        if ($tenanh == "") {
                            echo "<div class='error'>Không có ảnh</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book menu" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="book-menu-desc">
                        <h4><a href="<?php echo SITEURL; ?>detail-book.php?idsach=<?php echo $idsach; ?>"><?php echo $tensach; ?></a></h4>
                        <p class="book-price"><?php echo formamt_price($giasach); ?> </p>
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
            $re = mysqli_query($conn, 'select * from sach');
            $numRows = mysqli_num_rows($re);
            $maxPage = floor($numRows / $rowsPerPage) + 1;
            if ($_GET['page'] > 1) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . "> << </a> ";
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> < </a> "; //gắn thêm nút Back
            }
            for ($i = 1; $i <= $maxPage; $i++) {
                if ($i == $_GET['page']) {
                    echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
                } else echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
            }
            if ($_GET['page'] < $maxPage) {
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";  //gắn thêm nút Next
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . "> >> </a>";
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
<?php include('partials-front/footer.php'); ?>