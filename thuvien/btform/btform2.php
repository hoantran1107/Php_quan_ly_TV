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
        $bankinh = $_POST['bankinh'];
        if(is_numeric($bankinh))
        {
            $bankinh = $bankinh+0;
            $dientich = $bankinh*$bankinh* (float) 3.14;
            $chuvi = $bankinh*2* (float)3.14;
        }
        else{
            $bankinh="Vui long nhap so";
        }
    }
    if(isset($_POST['reset']))
    {
        $bankinh=$dientich=$chuvi="";
    }
    ?>
    <form action="" method="post" style="font-size: 25px;">
        <table bgcolor="#fad390" align="center" class="nav-form" style="width: 60%;">
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" style="color: white;" align="center">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</td>
                </tr>
                <tr>
                    <td>Bán kính: </td>
                    <td>
                        <input type="text" name="bankinh" value="<?php if(isset($bankinh)) {echo $bankinh;} ?>">
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
                        <input type="submit" style="background-color: #b71540; font-size: 20px;" name="submit" value="Tính">
                        <input type="submit" style="background-color: #b71540; font-size: 20px;" name="reset" value="Reset">
                    </td>
                </tr>
        </table>
    </form>
    </div>
</div>

    <?php include('../admin/partials/footer.php') ?>