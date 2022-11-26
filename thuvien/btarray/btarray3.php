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
  #var_dump($so);
  if (isset($_POST['submit'])) {
    $so = 0;
    $so = (int) $_POST["so"];
    $mang = array();
    $max = 0;
    $min = 0;
    $tong = 0;
    function taomang($so)
    {
      for ($i = 0; $i < $so; $i++) {
        $mang[$i] = rand(0, 20);
      }
      #var_dump($mang);
      return $mang;
    }

    function xuatmang($mang)
    {
      if (isset($mang)) {
        print implode("   ", $mang);
      };
      //return implode("    ",$mang);
    }
    function tinhtong($mang)
    {
      $sum = 0;
      foreach ($mang as $key => $value) {
        $sum += $value;
      }
      return $sum;
    }
    function timmin($mang)
    {
      $min = $mang[0];
      foreach ($mang as $key => $value) {
        if ($min > $value) {
          $min = $value;
        }
      }
      return $min;
    }
    function timmax($mang)
    {
      $max = $mang[0];
      foreach ($mang as $key => $value) {
        if ($max < $value) {
          $max = $value;
        }
      }
      return $max;
    }
    if ($so >= 0) {
      $mang = taomang($so);
      $tong = tinhtong($mang);
      $min = timmin($mang);
      $max = timmax($mang);
    } else {
      echo "Số nhập vào không phải số nguyên dương!";
    }
  }
  ?>
  <form action="" method="POST">
    <table style="border: 1px solid #c44569; width: 60%;" align="center">
      <th style="text-align: center; background-color: #c44569;" colspan=2>KIỂM TRA SỐ N</th>
      <tr style="background-color: #f8a5c2;">
        <td>Nhập số phần tử: </td>
        <td>
          <input type="text" name="so" style="font-size:20px" required value="<?php if (isset($so)) echo $so; ?> ">
        </td>
      </tr>
      <tr  style="background-color: #f8a5c2;">
        <td> </td>
        <td>
          <input type="submit" name="submit" style="font-size:20px;background-color: #f5cd79;" value="Phát sinh và tính toán">
        </td>
      </tr>
      <tr>
        <td>Mảng phát sinh: </td>
        <td>
          <textarea cols="20" rows="5" style="background-color: #ea8685;" readonly><?php if (isset($mang)) echo xuatmang($mang); ?></textarea>
        </td>
      </tr>
      <tr>
        <td>Giá trị lớn nhất (Max): </td>
        <td>
          <input type="text" name="max" style="background-color: #ea8685;" readonly value="<?php if (isset($max)) echo $max; ?> ">
        </td>
      </tr>
      <tr>
        <td>Giá trị bé nhất (Min): </td>
        <td>
          <input type="text" name="min" style="background-color: #ea8685;" readonly value="<?php if (isset($min)) echo $min; ?>">
        </td>
      </tr>
      <tr>
        <td>Tổng mảng: </td>
        <td>
          <input type="text" name="tong" style="background-color: #ea8685;" readonly value="<?php if (isset($tong)) echo $tong; ?>">
        </td>
      </tr>
      <tr>
        <td colspan="2">(<b style="color:red">Ghi chú</b> Tất cả giá trị trong mảng sẽ từ 0 đến 20)</td>
      </tr>
    </table>
  </form>
    </div>
</div>
  
<?php include('../admin/partials/footer.php'); ?>