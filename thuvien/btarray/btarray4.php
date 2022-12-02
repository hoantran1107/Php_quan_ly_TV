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
function timkiem($mangso,$so)
{
    $ketqua="Không tìm thấy ".$so;
    foreach ($mangso as $key => $value) {
        if($so==$value) {
            $ketqua="Tìm thấy ".$so." tại vị trí thứ ".++$key." của mảng";
        }
    }
    return $ketqua;
}

function xuatmang($mang)
{
    return implode(", ", $mang);
}

if(isset($_POST["submit"]))
{
    $dayso = $_POST["dayso"];
    $so = $_POST["so"];
    $mangso = explode(",", $dayso);
    $mang = xuatmang($mangso);
    $ketqua = timkiem($mangso,$so);
}

?>

<form method="POST" action="" name="formtimkiem">
    <table bgcolor="#d1ded4" align="center" style="width: 50%;">
        <tr style="color: #f3eef8; font-size: 20px" bgcolor="#359999">
            <th colspan="2">TÌM KIẾM</th>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td><input style="width: 80%" type="text" name="dayso" value="<?php echo $dayso ?? ""?> " >
            </td>
        </tr>
        <tr>
            <td>Nhập số cần tìm</td>
            <td>
                <input type="text" style="width: 40px" name="so" value="<?php if (isset($_POST["so"])) echo $_POST["so"]?>">
            </td>
        </tr>
        <tr>
            <td>  </td>
            <td>
                <input type="submit" style="background-color: #96caff; font-size: 20px;" name="submit" width="30px" value="Tìm kiếm">
            </td>
        </tr>
        <tr>
            <td>Mảng</td>
            <td>
                <input type=text readonly value="<?php echo $mang ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả tìm kiếm</td>
            <td>
                <input type=text style="width: 80%; background-color: #cafffb; color: red" value="<?php echo $ketqua ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2" readonly bgcolor="#76d1cf">(Các phần tử trong mảng sẽ cách nhau dấu ",")</td>
        </tr>
    </table>
</form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>