<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>BÀI TẬP MẢNG, CHUỖI VÀ HÀM</h1>
        <br /><br />
        <br>
        <!-- BÀI TẬP FORM, ARRAY, MYSQL -->
        <a href="<?php echo SITEURL; ?>btarray/btarray1.php" class="btn-primary">Bài 1</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray2.php" class="btn-primary">Bài 2</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray3.php" class="btn-primary">Bài 3</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray4.php" class="btn-primary">Bài 4</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray5.php" class="btn-primary">Bài 5</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray6.php" class="btn-primary">Bài 6</a>
        <a href="<?php echo SITEURL; ?>btarray/btarray7.php" class="btn-primary">Bài 7</a>

        <br /><br /><br />
        <?php

if (isset($_POST['submit'])) {
    $nam = $_POST['duonglich'];
    $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array("hoi.png", "ty.png", "suu.png", "dan.png", "mao.png", "thin.png", "ti.png", "ngo.png", "mui.png", "than.png", "dau.png", "tuat.png");
    if((is_int($nam) || ctype_digit($nam)) && (int)$nam > 2){
        $nam_tinh=$nam-3;
        $can = $nam_tinh%10;
        $chi = $nam_tinh%12;
        $nam_al = $mang_can[$can];
        $nam_al = $nam_al." ".$mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = "<img src='images/$hinh'>";
    }
    else{
        $nam = "Năm là số nguyên dương > 2";
    }
}

?>



<form method="post" action="" name="formtinhnamamlich">
    <table align="center" style="background-color: #74b9ff;width: 60%;">
        <tr style="background-color: #0984e3; color: white">
            <td colspan="3" align="center">TÍNH NĂM ÂM LỊCH</td>
        </tr>
        <tr>
            <td>Năm dương lịch</td>
            <td> </td>
            <td>Năm âm lịch</td>
        </tr>
        <tr>
            <td>
                <input type="text" style="width: 100%;" name="duonglich" value="<?php echo $nam ?? "" ?>">
            </td>
            <td>
                <input type="submit" style="background-color: #fab1a0; color: red;" name="submit" value="=>">
            </td>
            <td>
                <input type="text" style="background-color: #fab1a0; color: red;" name="amlich" readonly
                       value="<?php echo $nam_al ?? ""  ?>">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><?php echo $hinh_anh ?? "" ?></td>
        </tr>
    </table>
</form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>