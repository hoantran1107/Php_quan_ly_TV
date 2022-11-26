<?php include('partials/menu.php'); ?>
<!-- Main content section starts -->
<div class="menu main-content">
    <div class="wrapper">
        <h1>TRANG QUẢN TRỊ THƯ VIỆN</h1>

        <?php if (isset($_SESSION['login']))
        {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
        }
        ?>
        <br><br>
        <div class="col-4 text-center">
            <?php
            $sql="SELECT * FROM the_loai";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br />
            Thể loại<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exporttl.php">Xuất excel</a>

        </div>
        <div class="col-4 text-center">
        <?php
            $sql2="SELECT * FROM sach";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            Sách<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exportsach.php">Xuất excel</a>

        </div>
        <div class="col-4 text-center">
        <?php
            $sql3="SELECT * FROM phieu_muon WHERE active='Yes' ";
            $res3=mysqli_query($conn,$sql3);
            $count3=mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            Tổng lượt mượn<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/export.php">Xuất excel</a>
        </div>
        <div class="col-4 text-center">
        <?php
            $sql4="SELECT * FROM sinh_vien";
            $res4=mysqli_query($conn,$sql4);
            $count4=mysqli_num_rows($res4);
            //var_dump($count4);
            ?>
            <h1><?php echo $count4; ?></h1>
            <br />
            Tổng sinh viên<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exportsv.php">Xuất excel</a>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>