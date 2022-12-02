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
        <a href="<?php echo SITEURL; ?>btform/trangnhaplieu.php" class="btn-primary">Bài 6</a>
        <a href="<?php echo SITEURL; ?>btform/bt7_trangnhaplieu.php" class="btn-primary">Bài 7</a>
        <a href="<?php echo SITEURL; ?>btform/btform8.html" class="btn-primary">Bài 8</a>
        <a href="<?php echo SITEURL; ?>btform/bt9_index.php" class="btn-primary">Bài 9</a>
        <br><br><br>
        <?php
        if (isset($_POST['submit'])) {
            $sothunhat = trim($_POST['sothunhat']);
            $sothuhai = trim($_POST['sothuhai']);
            $pheptinh = $_POST['pheptinh'];
        }


        ?>
        <form action="bt7_trangketqua.php" method="POST" name="formnhaplieu">
            <table align="center" style="width: 50%; border: 1px solid black">
                <tr>
                    <td colspan="2" style="color: #85a3c2; font-weight: 700" align="center">PHÉP TÍNH TRÊN HAI SỐ</td>
                </tr>
                <tr>
                    <td style="color: #bd7c5c; font-weight: 600; float: right">Chọn phép tính: </td>
                    <td style="color: #d7623b">
                        <input type="radio" name="pheptinh" value="Cộng"> Cộng
                        <input type="radio" name="pheptinh" value="Trừ"> Trừ
                        <input type="radio" name="pheptinh" value="Nhân"> Nhân
                        <input type="radio" name="pheptinh" value="Chia"> Chia
                    </td>
                </tr>
                <tr>
                    <td style="color: blue; float: right; font-weight: 600">Số thứ nhất: </td>
                    <td>
                        <input type="text" name="sothunhat">
                    </td>
                </tr>
                <tr>
                    <td style="color: blue; float: right; font-weight: 600">Số thứ hai: </td>
                    <td>
                        <input type="text" name="sothuhai">
                    </td>
                </tr>
                <tr>
                    <td colspan=2 style="text-align: center;">
                        <input type="submit" style="background-color: #dae0e6; font-size: 20px;" value="Tính" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php include('../admin/partials/footer.php'); ?>