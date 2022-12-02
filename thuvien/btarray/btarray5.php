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
function thaythe($mangso,$canthaythe,$thaythe)
{
    foreach ($mangso as $key => &$value) {
        if($canthaythe==$value) {
            $value=$thaythe;
        }
    }
    return $mangso;
}
function xuat_mang($mang)
{
    return implode(' , ',$mang);
}
if(isset($_POST['submit']))
{
    $dayso = $_POST['dayso'];
    $canthaythe=$_POST['canthaythe'];
    $thaythe=$_POST['thaythe'];
    if($dayso != "" and  is_numeric($canthaythe)  and is_numeric($thaythe)){
        $dayso=$_POST['dayso'];
        $mangso=explode(",",$dayso);
        $mangmoi=thaythe($mangso,$canthaythe,$thaythe);
        $mang_cu = xuat_mang($mangso);
        $mang_moi = xuat_mang($mangmoi);
    }
    else {
        if ($dayso == ""){
            $dayso = "Hãy nhập dãy số";
        }
        if (!is_numeric($canthaythe)){
            $thaythe = "Hãy nhập số";
        }
        if (!is_numeric($thaythe)){
            $canthaythe = "Hãy nhập sô";
        }
    }
}


?>

<form method="post" action="" name="formthaythe">
    <table bgcolor="" align="center" style="width: 60%;">
        <tr bgcolor="#a3096f">
            <th style="color: white; font-size: 20px" colspan="2">THAY THẾ</th>
        </tr>
        <tr style="background-color:#fee0f0">
            <td width="30%">Nhập các phần tử</td>
            <td>
                <input type="text" style="width: 80%" name="dayso" value="<?php echo $dayso ?? ""?>">
            </td>
        </tr>
        <tr style="background-color:#fee0f0">
            <td>Giá trị cần thay thế</td>
            <td>
                <input  type="text" name="canthaythe" value="<?php echo $canthaythe ?? ""?>">
            </td>
        </tr>
        <tr style="background-color:#fee0f0">
            <td>Giá trị thay thế</td>
            <td>
                <input type="text" name="thaythe" value="<?php echo $thaythe ?? "" ?>">
            </td>
        </tr>
        <tr style="background-color:#fee0f0">
            <td> </td>
            <td>
                <input type="submit" name="submit" style="background-color: #c44569; font-size:25px" value="Thay thế">
            </td>
        </tr>
        <tr bgcolor="#fff4ff">
            <td>Mảng cũ</td>
            <td>
                <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php echo $mang_cu ?? ""?>">
            </td>
        </tr>
        <tr bgcolor="#fff4ff">
            <td>Mảng sau khi thay thế</td>
            <td>
                <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php echo $mang_moi ?? ""?>">
            </td>
        </tr>
        <tr bgcolor="#fff4ff">
            <td colspan="2">(<strong style="color: red;">Ghi chú:</strong> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
        </tr>
    </table>
</form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>