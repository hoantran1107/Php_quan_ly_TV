<?php include('../admin/partials/menu.php') ?>
<style>
        th {
            font-size: 20px;
            font-weight: 700;
            background-color: #e14e7f;
            color: #ffffff;
        }

        table {
            background-color: #fee8fa;

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
            $toan = trim($_POST['toan']);
            $ly = trim($_POST['ly']);
            $hoa = trim($_POST['hoa']);
            $dc = trim($_POST['dc']);
            $td = $_POST['td'];
            $kq = $_POST['kq'];
            if (is_numeric($toan) and is_numeric($ly) and is_numeric($hoa) and is_numeric($dc) and $toan <= 10 and $ly <= 10 and $hoa <= 10 and $dc <= 30 and $dc > 0 and $ly > 0 and $toan > 0 and $hoa > 0) {
                $td = $toan + $ly + $hoa;
                if ($td >= $dc) {
                    $kq = "đậu";
                } else $kq = "rớt";
            } else {
                if (!is_numeric($toan) || $toan < 0 || $toan > 10) {
                    $toan = "Phải nhập vào một số dương < 10!";
                    $td = $kq = "";
                }
                if (!is_numeric($ly) || $ly < 0 || $hoa > 10) {
                    $ly = "Phải nhập vào một số dương < 10!";
                    $td = $kq = "";
                }
                if (!is_numeric($hoa) || $hoa < 0 || $ly > 10) {
                    $hoa = "Phải nhập vào một số dương < 10!";
                    $td = $kq = "";
                }
                if (!is_numeric($dc) || $dc < 0 || $dc > 30) {
                    $dc = "Phải nhập vào một số dương < 30!";
                    $td = $kq = "";
                }
            }
        }

        ?>
        <form action="" method="post">
            <table align="center" width="50%">
                <tr>
                    <th colspan="2">KẾT QUẢ THI ĐẠI HỌC</th>
                </tr>
                <tr>
                    <td width="35%">Toán:</td>
                    <td>
                        <input style="width: 80%" type="text" name="toan" value="<?php echo $toan ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td width="35%">Lý:</td>
                    <td>
                        <input style="width: 80%" type="text" name="ly" value="<?php echo $ly ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td width="35%">Hóa:</td>
                    <td>
                        <input style="width: 80%" type="text" name="hoa" value="<?php echo $hoa ?? "" ?>">
                    </td>
                </tr>
                <tr>
                    <td width="35%">Điểm chuẩn:</td>
                    <td>
                        <input style="width: 80%; color: red" type="text" name="dc" value="<?php echo $dc ?? "" ?>">
                    </td>
                </tr>

                <tr>
                    <td>Tổng điểm:</td>
                    <td>
                        <input style="width: 80%; background-color: #fefcee" type="text" name="td" value="<?php echo $td ?? "" ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Kết quả thi:</td>
                    <td>
                        <input style="width: 80%; background-color: #fefcee" type="text" name="kq" value="<?php echo $kq ?? "" ?>" readonly>
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