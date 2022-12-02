<?php include('../admin/partials/menu.php') ?>
<style>
        th {
            font-size: 20px;
            font-weight: 700;
            background-color: #fed679;
            color: #b3702a;
        }

        table {
            background-color: #fff9db;

        }

    </style>
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
    $dai = trim($_POST['dai']);
    $rong = trim($_POST['rong']);
    $S = $_POST['S'];
    if(is_numeric($rong) and is_numeric($dai) and $rong > 0 and $dai > 0){
        $S = $rong * $dai;
    }
    else{
        if(!is_numeric($dai) || $dai< 0){
            $dai = "Phải nhập vào một số dương!";
        }
        if (!is_numeric($rong) || $rong < 0){
            $rong = "Phải nhập vào một số dương!";
        }
    }
}

?>
<form action="" method="post">
    <table align="center" width="50%">
        <tr>
            <th colspan="2">DIỆN TÍCH HÌNH CHỮ NHẬT</th>
        </tr>
        <tr>
            <td width="35%">Chiều dài:</td>
            <td>
                <input style="width: 80%" type="text" name="dai" value="<?php echo $dai ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td>
                <input style="width: 80%" type="text" name="rong" value="<?php echo $rong ?? "" ?>">
            </td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td>
                <input style="width: 80%; background-color: #fdd9d9" type="text" name="S" value="<?php echo $S ?? "" ?>"
                       readonly>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input style="background-color: #e4dfdc; color: #7b6e77" align="center" type="submit" name="submit" value="Tính">
                <input style="background-color: #e4dfdc; color: #7b6e77" align="center" type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>
