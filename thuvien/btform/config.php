<?php include('../admin/partials/menu.php') ?>
<style>
  table {
    padding: 5px 5px;
    font-size: 16px;
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
    <a href="<?php echo SITEURL; ?>btform/bt9_index.html" class="btn-primary">Bài 9</a>
    <br /><br /><br />
    <?php
    $ten = $_POST['ten'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
    $gioitinh = $_POST['gioitinh'];
    $quocgia = $_POST['quocgia'];
    $hocvan = $_POST['hocvan'];
    $note = $_POST['note'];
    ?>

    <form action="btform8.html" method="POST">
      <table style="border: 1px solid black" align="center">
        <th>Bạn đã nhập thành công dưới đây là thông tin của bạn</th>
        <tr>
          <td>Họ tên: <?php echo $ten ?? "" ?></td>
        </tr>
        <tr>
          <td>Address: <?php echo $diachi ?? "" ?></td>
        </tr>
        <tr>
          <td>Phone: <?php echo $dienthoai ?? "" ?></td>
        </tr>
        <tr>
          <td>Gender: <?php echo $gioitinh ?? "" ?></td>
        </tr>
        <tr>
          <td>Country: <?php echo $quocgia ?? "" ?></td>
        </tr>
        <tr>
          <td>Note: <?php echo $note ?? "" ?></td>
        </tr>
        <tr>
          <td><button class="back" href="javascript:window.history.back(-1);">Quay lại</button></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include('../admin/partials/footer.php'); ?>