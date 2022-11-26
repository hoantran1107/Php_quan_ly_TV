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
        <br><br><br>
        <?php
    if(isset($_POST['submit']))
    {       
        $rong = $_POST['rong'];
        $dai = $_POST['dai'];
        if(is_numeric($dai) && is_numeric($rong))
        {
            $rong=$rong+0;
            $dai=$dai+0;
            $dientich = $rong * $dai;
            $chuvi = ($dai + $rong)*2;
        }
        else{
            $dai="Vui long nhap so";
            $rong="Vui long nhap so";
        }
    }
    if(isset($_POST['reset']))
    {
        $rong=$dai=$chuvi=$dientich="";
    }
?>
    <form action="" method="post" style="font-size:25px; width: 100%;" >
        <table bgcolor="#fad390" style="width: 60%;">
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" align="center">TÍNH TOÁN TRÊN HÌNH CHỮ NHẬT</td>
                </tr>
                <tr>
                    <td>Chiều dài: </td>
                    <td>
                        <input type="text" name="dai" value="<?php if(isset($dai)) {echo $dai;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chiều rộng: </td>
                    <td>
                        <input type="text" name="rong" value="<?php if(isset($rong)) {echo $rong;} ?>">
                    </td>
                </tr>

                <tr>
                    <td>Diện tích: </td>
                    <td>
                        <input type="text" name="dientich" style="background-color: #82ccdd;" readonly value="<?php if(isset($dientich)){ echo $dientich;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chu vi: </td>
                    <td>
                        <input type="text" name="chuvi" style="background-color: #82ccdd;" readonly value="<?php if(isset($chuvi)){ echo $chuvi;} ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #38ada9; color: white; font-size:20px" name="submit"  value="Tính">
                        <input type="submit" style="background-color: #38ada9; color: white; font-size:20px" name="reset"  value="Reset">

                    </td>
                </tr>
        </table>
    </form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>
