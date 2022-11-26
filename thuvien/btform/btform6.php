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
        <form action="" method="POST" name="formnhaplieu">
        <table>
            <tr>
                <td colspan="2">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td>Chọn phép tính: </td>
                <td>
                    <input type="radio" name="cong" value="Cộng">
                    <input type="radio" name="tru" value="Trừ">
                    <input type="radio" name="nhan" value="Nhân" checked>
                    <input type="radio" name="chia" value="Chia">
                    <input type="radio" name="phantram" value="Lấy dư">
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất: </td>
                <td>
                    <input type="text" name="sothunhat">
                </td>
            </tr>
            <tr>
                <td>Số thứ hai: </td>
                <td>
                    <input type="text" name="sothuhai">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Tính" name="submit">
                </td>
            </tr>

        </table>
    </form>
    </div>
</div>
    
    
    <?php include('../admin/partials/footer.php'); ?>