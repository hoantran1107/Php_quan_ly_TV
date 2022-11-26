<?php
    include('../config/constants.php'); 
    include('../admin/partials/login-check.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Thư viện - Trang chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src='main.js'></script>
    <style>
    input[type=text] {
        border: none;
        border-bottom: 2px solid red;
        box-sizing: border-box;
        outline: none;
    }

    input[type=text]:focus {
        background-color: lightblue;
    }
    table{
        width: 60%;
    }
    </style>
</head>

<body>
<!-- Menu section starts -->
<div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="<?php echo SITEURL; ?>admin/index.php">TRANG CHỦ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-admin.php">THỦ THƯ</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-sv.php">SINH VIÊN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-book.php">SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/manage-card.php">MƯỢN SÁCH</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/baitap.php">BÀI TẬP</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/thongtincanhan.php">THÔNG TIN CÁ NHÂN</a></li>
                <li><a href="<?php echo SITEURL; ?>admin/logout.php">ĐĂNG XUẤT</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu section ends -->
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
$so=0;
$mang=array();
$sochan=0;
$nhohon=0;
$tongsoam =0;
$bangkhong=array();
$mangsx;
if(isset($_POST['submit']))
{$so = $_POST['number'];$so +=0;
    if($so >0 && is_int($so) && is_numeric($so))
    {
        $mang = taomang($so);
        $sochan = demsochan($mang);
        $nhohon = demhonkhong($mang);
        $tongsoam = tongsoam($mang);
        $bangkhong = bangkhong($mang);
        $mangsx = simple_quick_sort($mang);
    }
    else{
        echo "Số nhập vào không phải số nguyên dương!";
    }
}
function taomang($so)
{
  $mang=array();
  for($i=0;$i<$so;$i++)
        {
            $mang[$i] = rand(-1000,1000);
        }
  return $mang;
}
function xuatmang($mang)
{
    if(isset($mang)) {print implode("   ", $mang);}
}
function demsochan($mang)
{
  $sochan=0;
  foreach ($mang as $key => $value) {
    if($value % 2 ==0)
    {
        $sochan+=1;
    }
  }
  return $sochan;
}
function demhonkhong($mang)
{
  $nhohon=0;
  foreach ($mang as $key => $value) {
    if($value<100)
    {
        $nhohon+=1;
    }
  }
  return $nhohon;
}
function tongsoam($mang)
{
  $tongsoam=0;
  $dem=0;
  foreach ($mang as $key => $value) {
    if($value<0)
    {
        $tongsoam+=$value;
        $dem++;
    }
  }
  if($dem==0) echo "Khong ton tai so am trong mang";
  return $tongsoam;
}
function bangkhong($mang)
{
  $bangkhong=array();
  foreach ($mang as $key => $value) {
    $j=0;
    if($value==0)
    {
        $bangkhong[$j++]=$key;
    }
  }
  return $bangkhong;
}
function sapxep($mang)
{
  $mangsx=$mang;
        #var_dump($mangsx);
        for ($i=0; $i < count($mang)-1; $i++) { 
            for ($j=$i+1; $j < count($mang); $j++) { 
                if($mangsx[$i]>$mangsx[$j])
                {
                    $tam=0;
                    $tam=$mangsx[$i];
                    $mangsx[$i]=$mangsx[$j];
                    $mangsx[$j]=$tam;
                }
            }
        }
        #var_dump($mangsx);
        return $mangsx;
}
function simple_quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(simple_quick_sort($left), array($pivot), simple_quick_sort($right));
    }
}

?>
    <form action="" method="POST">
        <table style="background-color: #f8a5c2;" align="center">
            <th style="text-align: center;" colspan=2 bgcolor="#c44569">KIỂM TRA SỐ N</th>
            <tr>
                <td>Nhập n: </td>
                <td>
                    <input bgcolor="yellow" type="text" name="number" required value="<?php if(isset($so)) echo $so; ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng phát sinh: </td>
                <td>
                    <textarea cols="20" rows="4"
                        readonly><?php if(isset($mang)) {print implode(", ", $mang); /*print join(',', $mang);*/}  ?> </textarea>
                </td>
            </tr>
            <tr>
                <td>Số số chẵn trong mảng: </td>
                <td>
                    <input type="text" name="sochan" readonly value="<?php if(isset($sochan)) echo $sochan; ?>">
                </td>
            </tr>
            <tr>
                <td>Số phần tử nhỏ hơn 100: </td>
                <td>
                    <input type="text" name="nhohon" readonly value="<?php if(isset($nhohon)) echo $nhohon; ?>">
                </td>
            </tr>
            <tr>
                <td>Tổng số âm: </td>
                <td>
                    <input type="text" name="tongsoam" readonly value="<?php if(isset($tongsoam)) echo $tongsoam; ?>">
                </td>
            </tr>
            <tr>
                <td>Vị trí các phần tử bằng 0: </td>
                <td>
                    <textarea cols="20" rows="4"
                        readonly><?php if(isset($bangkhong)) {print implode(", ", $bangkhong); /*print join(',', $mang);*/}  ?> </textarea>
                </td>
            </tr>
            <tr>
                <td>Mảng đã sắp xếp: </td>
                <td>
                    <textarea cols="20" rows="4"
                        readonly><?php if(isset($mangsx)) {print implode(", ", $mangsx); /*print join(',', $mang);*/}  ?> </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" >
                    <input type="submit" style="font-size:20px; background-color: #FC427B;" name="submit" value="Thực hiện">
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>


<?php include('../admin/partials/footer.php'); ?>