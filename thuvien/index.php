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

<?php
//hiện thị thông báo đăng nhập thành công và các thông báo khác 1 lần
if (isset($_SESSION['muonsach'])) {
    echo $_SESSION['muonsach'];
    unset($_SESSION['muonsach']);
}
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if (isset($_SESSION['the'])) {
    echo $_SESSION['the'];
    unset($_SESSION['the']);
}
if (isset($_SESSION['update-sv'])) {
    echo $_SESSION['update-sv'];
    unset($_SESSION['update-sv']);
}
?>

<!-- Categories section starts here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Khám phá sách</h2>
        <?php
        $sql = "SELECT * FROM the_loai LIMIT 3";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['ma_tl'];
                $ten = $row['ten_tl'];
                $tenanh = $row['anh_tl'];
        ?>
                <a href="<?php echo SITEURL; ?>category-book.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($tenanh == "") {
                            echo "<div class='error'>Không có ảnh</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $tenanh; ?>" alt="Book" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                        <h3 class="float-text text-white"><?php echo $ten; ?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<div class='error'>Không có thể loại nào!</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories section ends here -->

<!-- Book menu section starts here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Danh mục sách</h2>
        <?php
        $sql = "SELECT * FROM sach LIMIT 6";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
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
                            echo "<div class='error'>Khong co anh</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" alt="Book menu" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="book-menu-desc">
                        <h4><a href="<?php echo SITEURL; ?>detail-book.php?idsach=<?php echo $idsach; ?>"><?php echo $tensach; ?></a></h4>
                        <p class="book-price"><?php echo formamt_price($giasach); ?></p>
                        <p class="book-detail"><?php echo $tomtat; ?></p><br>
                        <a href="<?php echo SITEURL; ?>muonsach.php?book_id=<?php echo $idsach; ?>" class="btn btn-primary">Mượn sách</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div class='error'>Khong co sach nao!</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="<?php echo SITEURL; ?>book.php">Tất cả sách</a>
    </p>
</section>
<!-- Book menu section ends here -->
<?php include('partials-front/footer.php'); ?>