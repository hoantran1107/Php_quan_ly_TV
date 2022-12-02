<?php include('../admin/partials/menu.php') ?>
<style>
    th {
        font-size: 20px;
        font-weight: 700;
        background-color: #038a8d;
        color: #ffffff;
    }

    table {
        background-color: #03b0b6;

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
        if (isset($_POST['submit'])) {
            $batdau = 0.0;
            $ketthuc = 0.0;
            $gkt = trim($_POST['gkt']);
            $gbd = trim($_POST['gbd']);
            $ttt = $_POST['ttt'];
            if (is_numeric($gkt) and is_numeric($gbd) and $gbd > 0 and $gkt > 0) {
                if ($gkt > $gbd) {
                    if ($gbd >= 10 and $gkt >= 10 and $gbd < 24 and $gkt <= 24) {
                        if ($gkt < 17) {
                            $ttt = ($gkt - $gbd) * 20000;
                        } elseif ($gbd >= 17) {
                            $ttt = ($gkt - $gbd) * 45000;
                        } else {
                            $ttt = (17 - $gbd) * 20000 + ($gkt - 17) * 45000;
                        }
                    } else {
                        $ttt = "Đây là giờ nghỉ!";
                    }
                } else $ttt = " Giờ kết thúc phải > Giờ bắt đầu";
            } else {
                if (!is_numeric($gbd) || $gbd < 0) {
                    $gbd = "Phải nhập vào một số dương";
                    $ttt = "";
                }
                if (!is_numeric($gkt) || $gkt < 0) {
                    $gkt = "Phải nhập vào một số dương";
                    $ttt = "";
                }
            }
        }
        ?>
        <form action="" method="post">
            <table align="center" width="50%">
                <tr>
                    <th colspan="2">TÍNH TIỀN KARAOKE</th>
                </tr>
                <tr>
                    <td width="35%">Giờ bắt đầu:</td>
                    <td>
                        <input style="width: 80%" type="text" name="gbd" value="<?php echo $gbd ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giờ kết thúc:</td>
                    <td>
                        <input style="width: 80%" type="text" name="gkt" value="<?php echo $gkt ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tiền Thanh toán:</td>
                    <td>
                        <input style="width: 80%; background-color: #fefda5" type="text" name="ttt" value="<?php echo $ttt ?? "" ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input style="background-color: #e4dfdc;" align="center" type="submit" name="submit" value="Tính tiền">
                        <input style="background-color: #e4dfdc;" align="center" type="submit" name="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>