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

function swap(&$k, &$key)
{
    $tam = $k;
    $k = $key;
    $key = $tam;
}

function sapxep(&$mangso, $tang)
{
    for ($i = 0; $i < count($mangso) - 1; $i++) {
        for ($j = $i + 1; $j < count($mangso); $j++) {
            if ($mangso[$i] > $mangso[$j] and $tang == true) {
                swap($mangso[$i], $mangso[$j]);
            }
            elseif ($mangso[$i] < $mangso[$j] and $tang == false){
                swap($mangso[$i], $mangso[$j]);
            }
        }
    }
    return implode(', ',$mangso);
}

if (isset($_POST['submit'])) {
    $dayso = $_POST['dayso'];
    $mangso = explode(",", $dayso);
    $mangtang = sapxep($mangso, true);
    $manggiam = sapxep($mangso, false);
}

?>

<form action="" method="POST">
    <table align="center" style="background-color: #d1ded4;width: 50%;">
        <tr>
            <th colspan="2" align="center" style="background-color: #319b97; color: white; font-size: 20px">SẮP XẾP
                MẢNG
            </th>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td>
                <input type="text" style="width: 80%" name="dayso" value="<?php echo $dayso ?? "" ?>"><b
                        style="color: red">(*)</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input style="font-size: 15px;color: darkslategrey; background-color: white" type="submit" name="submit"
                       value="Sắp xếp tăng/giảm">
            </td>
        </tr>
        <tr style="background-color: #cbe6e6;">
            <td style="color: red;">Sau khi sắp xếp</td>
            <td></td>
        </tr>
        <tr style="background-color: #cbe6e6;">
            <td>Tăng dần</td>
            <td>
                <input type="text" style="background-color: #c9fcfb"
                       value="<?php echo $mangtang ?? "" ?>" readonly>
            </td>
        </tr>
        <tr style="background-color: #cbe6e6;">
            <td>Giảm dần</td>
            <td>
                <input type="text" style="background-color: #c9fcfb"
                       value="<?php echo $manggiam ?? "" ?>" readonly>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><b style="color: red">(*)</b> Các số được nhập cách nhau bằng dấu ","</td>
        </tr>
    </table>
</form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>