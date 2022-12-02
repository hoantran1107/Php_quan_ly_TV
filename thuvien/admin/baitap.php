<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>admin/baitap-form.php" class="btn-primary">Bài tập Form</a>
        <a href="<?php echo SITEURL; ?>admin/baitap-array.php" class="btn-primary">Bài tập Array</a>
        <a href="<?php echo SITEURL; ?>admin/baitap-sql.php" class="btn-primary">Bài tập MySQL</a>

        <br /><br /><br />

        <div class="col-4 text-center">
        <?php
            $sql2="SELECT * FROM sach";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            ?>
            <h1>9 BÀI</h1>
            <br />
            PHP & FORM
        </div>
        <div class="col-4 text-center">
        <?php
            $sql3="SELECT * FROM phieu_muon WHERE active='1' ";
            $res3=mysqli_query($conn,$sql3);
            $count3=mysqli_num_rows($res3);
            ?>
            <h1>7 BÀI</h1>
            <br />
            MẢNG, CHUỖI & HÀM
        </div>
        <div class="col-4 text-center">
        <?php
            $sql4="SELECT * FROM sinh_vien";
            $res4=mysqli_query($conn,$sql4);
            $count4=mysqli_num_rows($res4);
            //var_dump($count4);
            ?>
            <h1>9 CÂU</h1>
            <br />
            KẾT HỢP PHP & MYSQL
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php include('partials/footer.php'); ?>