<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Giới thiệu</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  <script src='main.js'></script>
</head>

<body>


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
      <a href="<?php echo SITEURL; ?>btform/trangnhaplieu.php" class="btn-primary">Bài 6</a>
      <a href="<?php echo SITEURL; ?>btform/bt7_trangnhaplieu.php" class="btn-primary">Bài 7</a>
      <a href="<?php echo SITEURL; ?>btform/btform8.html" class="btn-primary">Bài 8</a>
      <a href="<?php echo SITEURL; ?>btform/bt9_index.php" class="btn-primary">Bài 9</a>

      <br /><br /><br />
      <div class="container-sm">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="bt9_index.php">Index</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bt9_trangchu.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bt9_gioithieu.php">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="bt9_tintuc.php">Tin tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bt9_lienhe.php">Liên hệ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bt9_diendan.php">Diễn đàn</a>
          </li>
        </ul>

        <h3>Đây là trang thông tin được cập nhật đầy đủ và chi tiết nhất!</h3>
      </div>
    </div>
  </div>

  <?php include('../admin/partials/footer.php'); ?>
</body>

</html>