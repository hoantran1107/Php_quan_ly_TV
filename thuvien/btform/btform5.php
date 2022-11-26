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
        $batdau=0.0;
        $ketthuc=0.0;
        $batdau = $_POST['batdau'];
        $ketthuc = $_POST['ketthuc'];
        //$tienthanhtoan=0;
        if($ketthuc>$batdau)
        {
            if($batdau>=10 and $ketthuc>=10 and $batdau<24 and $ketthuc<=24)
            {
                if($ketthuc<17)
                {
                    $tienthanhtoan = ($ketthuc - $batdau)*20000;
                }
                elseif($batdau>=17)
                {
                    $tienthanhtoan = ($ketthuc - $batdau)*45000;
                }
                else {
                    $tienthanhtoan = (17-$batdau)*20000 + ($ketthuc-17)*45000;
                }
            }
            else{
                echo "Đây là giờ nghỉ!";
            }
        }
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#33d9b2" align="center" style="width: 60%;">
                <tr>
                    <td  colspan=2 bgcolor="#218c74" style="color:white" align="center">TÍNH TIỀN KARAOKE</td>
                </tr>
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td>
                        <input type="text" name="batdau" value="<?php if(isset($batdau)) {echo $batdau;} ?>">(h)
                    </td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </td>
                    <td>
                        <input type="text" name="ketthuc" value="<?php if(isset($ketthuc)){ echo $ketthuc;} ?>">(h)
                    </td>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </td>
                    <td>
                        <input type="text" name="tienthanhtoan" style="background-color: #ffda79;" readonly value="<?php if(isset($tienthanhtoan)){ echo $tienthanhtoan;} ?>">(VNĐ)
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #218c74; font-size: 20px;" name="submit" value="Tính tiền">
                    </td>
                </tr>

        </table>
    </form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>