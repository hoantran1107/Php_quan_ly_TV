<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP PHP & FORM</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>btform/btform1.php" class="btn-primary">Bài 1</a>
        <a href="<?php echo SITEURL; ?>btform/btform2.php" class="btn-primary">Bài 2</a>
        <a href="<?php echo SITEURL; ?>btform/btform3.php" class="btn-primary">Bài 3</a>
        <a href="<?php echo SITEURL; ?>btform/btform4.php" class="btn-primary">Bài 4</a>
        <a href="<?php echo SITEURL; ?>btform/btform5.php" class="btn-primary">Bài 5</a>
        <a href="<?php echo SITEURL; ?>btform/pheptinh.php" class="btn-primary">Bài 6+7</a>
        <a href="<?php echo SITEURL; ?>btform/btform8.html" class="btn-primary">Bài 8</a>

        <br /><br /><br />
        <?php
    if(isset($_POST['submit']))
    {       
        $chuho = $_POST['chuho'];
        $chisocu = $_POST['chisocu'];
        $chisomoi = $_POST['chisomoi'];
        $dongia = $_POST['dongia'];
        $chisocu=$chisocu+0;
        $chisomoi=$chisomoi+0;
        $dongia=$dongia+0;
        $tien = ($chisomoi - $chisocu) * $dongia;
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#fad390" align="center" style="width: 60%;"> 
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" align="center">THANH TOÁN TIỀN ĐIỆN</td>
                </tr>
                <tr>
                    <td>Tên chủ hộ: </td>
                    <td>
                        <input type="text" name="chuho" value="<?php if(isset($chuho)) {echo $chuho;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số cũ: </td>
                    <td>
                        <input type="text" name="chisocu" value="<?php if(isset($chisocu)) {echo $chisocu;} ?>"> (KW)
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số mới: </td>
                    <td>
                        <input type="text" name="chisomoi" value="<?php if(isset($chisomoi)) {echo $chisomoi;} ?>"> (KW)
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá: </td>
                    <td>
                        <input type="text" name="dongia" value="<?php if(isset($dongia)) {echo $dongia;} else $dongia=20000; ?>"> (VNĐ)
                    </td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán: </td>
                    <td>
                        <input type="text" name="tien" style="background-color: #82ccdd;" readonly value="<?php if(isset($tien)){ echo $tien;} ?>"> (VNĐ)
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #38ada9; font-size: 20px;" name="submit" value="Tính">
                    </td>
                </tr>
        </table>
    </form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>