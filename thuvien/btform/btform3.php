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

        <br /><br /><br />
        <?php
        $dg = 20000;
        if (isset($_POST['submit'])) {
            $ch = trim($_POST['ch']);
            $csc = trim($_POST['csc']);
            $csm = trim($_POST['csm']);
            $tt = $_POST['tt'];
            if (!is_null($ch) and is_numeric($csc) and is_numeric($csm) and $csc > 0 and $csm > 0) {
                if ($csc > $csm) {
                    $csm  = "Chỉ số mới phải lớn hơn chỉ số cũ";
                } else {
                    $tt = ($csm - $csc) * $dg;
                }
            } else {
                if ($ch == "") {
                    $ch = "Nhập tên chủ hộ!";
                    $ch = "";
                }
                if (!is_numeric($csc) || $csc < 0) {
                    $csc = "Phải nhập vào một số dương!";
                    $tt = "";
                }
                if (!is_numeric($csm) || $csm < 0) {
                    $csm = "Phải nhập vào một số dương!";
                    $tt = "";
                }
            }
        }
        ?>
        <form action="" method="post">
            <table align="center" width="50%">
                <tr>
                    <th colspan="2">THANH TOÁN TIỀN ĐIỆN</th>
                </tr>
                <tr>
                    <td width="35%">Tên chủ hộ:</td>
                    <td>
                        <input style="width: 80%" type="text" name="ch" value="<?php echo $ch ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td width="35%">Chỉ số cũ:</td>
                    <td>
                        <input style="width: 80%" type="text" name="csc" value="<?php echo $csc ?? "" ?>">(Kw)
                    </td>
                </tr>
                <tr>
                    <td width="35%">Chỉ số mới:</td>
                    <td>
                        <input style="width: 80%" type="text" name="csm" value="<?php echo $csm ?? "" ?>">(Kw)
                    </td>
                </tr>
                <tr>
                    <td width="35%">Đơn giá</td>
                    <td>
                        <input style="width: 80%" type="text" name="dg" value="<?php echo $dg ?? "" ?>">(VNĐ)
                    </td>
                </tr>

                <tr>
                    <td>Số tiền thanh toán:</td>
                    <td>
                        <input style="width: 80%; background-color: #fdd9d9" type="text" name="tt" value="<?php echo $tt ?? "" ?>" readonly>(VNĐ)
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