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
        /*$toan = (float)$toan;
        $ly = (float)$ly;
        $hoa = (float)$hoa;
        $diemchuan = (float)$diemchuan;*/
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $diemchuan = $_POST['diemchuan'];
        $toan=$toan+0;
        $ly=$ly+0;
        $hoa=$hoa+0;
        $diemchuan=$diemchuan+0;
        $tongdiem = $toan + $ly + $hoa;
        $ketqua = "Rớt";
        if($toan!= 0 && $ly!=0 and $hoa!=0 and $tongdiem >= $diemchuan)
        {
            $ketqua = "Đậu";
        }
        
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#f8a5c2" align="center" style="width: 60%;">
                <tr>
                    <td  colspan=2 bgcolor="#cf6a87" align="center">KẾT QUẢ THI ĐẠI HỌC</td>
                </tr>
                <tr>
                    <td>Toán: </td>
                    <td>
                        <input type="text" name="toan" value="<?php if(isset($toan)) {echo $toan;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Lý: </td>
                    <td>
                        <input type="text" name="ly" value="<?php if(isset($ly)) {echo $ly;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hóa: </td>
                    <td>
                        <input type="text" name="hoa" value="<?php if(isset($hoa)) {echo $hoa;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Điểm chuẩn: </td>
                    <td>
                        <input type="text" style="color: red;" name="diemchuan" value="<?php if(isset($diemchuan)) {echo $diemchuan;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tổng điểm: </td>
                    <td>
                        <input type="text" style="background-color:#f7d794" name="tongdiem" readonly value="<?php if(isset($tongdiem)){ echo $tongdiem;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả thi: </td>
                    <td>
                        <input type="text" style="background-color:#f7d794" name="ketqua" readonly value="<?php if(isset($ketqua)){ echo $ketqua;} ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #c44569; font-size: 20px;" name="submit" value="Xem kết quả">
                    </td>
                </tr>
        </table>
    </form>
    </div>
</div>

    
    <?php include('../admin/partials/footer.php'); ?>