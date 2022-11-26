<?php include('../admin/partials/menu.php') ?>

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
        <a href="<?php echo SITEURL; ?>btform/pheptinh.php" class="btn-primary">Bài 6+7</a>
        <a href="<?php echo SITEURL; ?>btform/btform8.html" class="btn-primary">Bài 8</a>

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

  <form action="btform8.html" method="POST" style="border: 1px solid grey; width: 60%; margin: 3%; padding:3%">
    <b style="font-weight: bolder;">Bạn đã nhập thành công, đây là thông tin của bạn:</b><br>

    <b>Họ tên:
    <?php if (isset($ten)) {
          echo $ten;
        } ?></b><br>


    <b>Địa chỉ:
     <?php if (isset($diachi)) {
          echo $diachi;
        } ?></b><br>


    <b>Điện thoại:

    <?php if (isset($dienthoai)) {
          echo $dienthoai;
        } ?></b><br>



    <b>Gender:

     <?php if (isset($gioitinh)) {
          echo $gioitinh;
        } ?></b><br>



    <b>Country:

    <?php if (isset($quocgia)) {
          echo $quocgia;
        } ?></b><br>



    <b>Note:

    <?php if (isset($note)) {
          echo $note;
        } ?></b><br>



    <button class="back" href="javascript:window.history.back(-1);">Quay lại</button>



  </form>
    </div>
</div>
<?php include('../admin/partials/footer.php'); ?>
