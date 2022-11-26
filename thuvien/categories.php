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
<!-- Categories section starts here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Khám phá sách</h2>
        <?php
        //phan trang
        $rowsPerPage = 6;
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        //
        $sql = "SELECT * FROM the_loai ORDER BY ma_tl ASC LIMIT $offset, $rowsPerPage";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $maxPage = ceil($count / $rowsPerPage);
        //
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['ma_tl'];
                $ten = $row['ten_tl'];
                $tenanh = $row['anh_tl'];
        ?>
            <a href="<?php echo SITEURL; ?>category-book.php?category_id=<?php echo $id; ?>">
                <div class="box-3 float-container">
                    <?php
                    if($tenanh=="")
                    {
                        echo "<div class='error'>Khong co anh</div>";
                    }
                    else{
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
            echo "<div class='error'>Khong co the loai nao!</div>";
        }
        ?>
        <div class="clearfix"></div>
        <div style="text-align: center;">
        
    <?php
    //phân trang
    $re = mysqli_query($conn, 'select * from the_loai ORDER BY ma_tl ASC');
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
</section>
<!-- Categories section ends here -->
<?php include('partials-front/footer.php'); ?>