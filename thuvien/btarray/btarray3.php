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
    function tao_mang($so)
    {
      for ($i = 0; $i < $so; $i++) {
        $mang[$i] = rand(0, 20);
      }
      return $mang;
    }
    function xuat_mang($mang)
    {
      return implode(", ", $mang);
    }
    function tinh_tong($mang)
    {
      $sum = 0;
      foreach ($mang as $key => $value) {
        $sum += $value;
      }
      return $sum;
    }
    function tim_min($mang)
    {
      $min = $mang[0];
      foreach ($mang as $key => $value) {
        if ($min > $value) {
          $min = $value;
        }
      }
      return $min;
    }
    function tim_max($mang)
    {
      $max = $mang[0];
      foreach ($mang as $key => $value) {
        if ($max < $value) {
          $max = $value;
        }
      }
      return $max;
    }
    $mang = array();
    if (isset($_POST['submit'])) {
      $so = trim($_POST["so"]);
      if ((is_int($so) || ctype_digit($so)) && (int)$so >= 0) {
        $mang = tao_mang($so);
        $mang_kq = xuat_mang($mang);
        $tong = tinh_tong($mang);
        $max = tim_max($mang);
        $min = tim_min($mang);
      } else {
        $so = "Nhập vào 1 số nguyên dương!";
      }
    }
    ?>
    <form action="" method="POST">
      <table style="border: 1px solid #c44569; background-color: #fffbff; width: 35%;" align="center">
        <th style="text-align: center; background-color: #a80e74; color: white; font-size: 20px" colspan=2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
        <tr style="background-color: #fedaf4;">
          <td>Nhập số phần tử: </td>
          <td>
            <input type="text" name="so" style="font-size:20px; width: 90%" required value="<?php echo $so ?? "" ?> ">
          </td>
        </tr>
        <tr style="background-color: #fedaf4;">
          <td> </td>
          <td>
            <input type="submit" name="submit" style="font-size:20px;background-color: #fffea9;" value="Phát sinh và tính toán">
          </td>
        </tr>
        <tr>
          <td>Mảng phát sinh: </td>
          <td>
            <textarea cols="20" rows="5" style="background-color: #ea8685; font-size: 15px" readonly><?php echo $mang_kq ?? "" ?></textarea>
          </td>
        </tr>
        <tr>
          <td>Giá trị lớn nhất (Max): </td>
          <td>
            <input type="text" name="max" style="background-color: #ea8685;" readonly value="<?php echo $max ?? "" ?> ">
          </td>
        </tr>
        <tr>
          <td>Giá trị bé nhất (Min): </td>
          <td>
            <input type="text" name="min" style="background-color: #ea8685;" readonly value="<?php echo $min ?? "" ?>">
          </td>
        </tr>
        <tr>
          <td>Tổng mảng: </td>
          <td>
            <input type="text" name="tong" style="background-color: #ea8685;" readonly value="<?php echo $tong ?? "" ?>">
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2">(<b style="color:red">Ghi chú</b> Tất cả giá trị trong mảng sẽ từ 0 đến 20)</td>
        </tr>
      </table>
    </form>
  </div>
</div>

<?php include('../admin/partials/footer.php'); ?>