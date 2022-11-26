<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if(isset($_SESSION['usersv']))
{
    $id = $_SESSION['usersv'];
    //var_dump($id);
    $sql="SELECT * FROM sinh_vien WHERE ma_sv='$id' ";
    $res= mysqli_query($conn, $sql);
    $count=mysqli_num_rows($res);
    //var_dump($count);
    if($count==1){
    $row=mysqli_fetch_assoc($res);
    $ten=$row['hoten_sv'];
    $gioitinh = $row['gioitinh_sv'];
    $ngaysinh = $row['ngaysinh_sv'];
    $ngaysinh=date("d/m/Y", strtotime($ngaysinh));
    $diachi= $row['diachi_sv'];
    $khoa = $row['khoa'];
    $email = $row['email'];}
    else{
        //echo "H";
        header('location:'.SITEURL);
    }
}
else{
    //echo "K";
    header('location:'.SITEURL);
}
?>
<!-- Detail search Section Starts Here -->
<section class="book-search">
        <div class="container">
            
            <h2 class="text-center text-white">Chỉnh sửa thông tin sinh viên</h2>
            
            <form action="" method="POST" class="order">
                <fieldset>
                    <!-- <legend>Chi tiết</legend> -->
                    <div class="order-label">Mã sinh viên</div>
                    <input type="text" name="ma_sv" class="input-responsive" value="<?php echo $id; ?>" required>

                    <div class="order-label">Họ tên</div>
                    <input type="text" name="hoten_sv" class="input-responsive" value="<?php echo $ten; ?>" required>
                    
                    <div class="order-label">Giới tính</div>
                    <input type="text" name="gioitinh_sv" class="input-responsive" value="<?php echo $gioitinh; ?>" required>

                    <div class="order-label">Ngày sinh</div>
                    <input type="date" name="ngaysinh_sv" class="input-responsive" value="<?php echo $ngaysinh; ?>" required>

                    <div class="order-label">Địa chỉ</div>
                    <input type="text" name="diachi_sv" class="input-responsive" value="<?php echo $diachi; ?>" required>

                    <div class="order-label">Khoa</div>
                    <input type="text" name="khoa" class="input-responsive" value="<?php echo $khoa; ?>" required>

                    <div class="order-label">Email</div>
                    <input type="text" name="email" class="input-responsive" value="<?php echo $email; ?>" required>

                    <br><br>
                    <input type="submit" name="submit" value="Thoát" class="btn btn-primary">
                    <input type="submit" name="update" value="Chỉnh sửa" class="btn btn-primary">

                </fieldset>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                header('location:'.SITEURL);
            }
            if(isset($_POST['update']))
            {
                //chinh sua thong tin vao db
                $idsv = mysqli_real_escape_string($conn, $_POST['ma_sv']);
                $tensv = mysqli_real_escape_string($conn, $_POST['hoten_sv']);
                $diachisv = mysqli_real_escape_string($conn, $_POST['diachi_sv']);
                $ngaysinhsv = $_POST['ngaysinh_sv'];
                $khoasv = mysqli_real_escape_string($conn, $_POST['khoa']);
                $gioitinhsv = $_POST['gioitinh_sv'];
                $emailsv = mysqli_real_escape_string($conn, $_POST['email']);

                //
                $sql3 = "UPDATE sinh_vien SET
                hoten_sv='$tensv',
                diachi_sv='$diachisv',
                ngaysinh_sv='$ngaysinhsv',
                email='$emailsv',
                gioitinh_sv='$gioitinhsv',
                khoa='$khoasv'
                WHERE ma_sv='$idsv' 
                ";                
                //
                $res3=mysqli_query($conn,$sql3);
                if($res3==true){
                    $_SESSION['update-sv']="<div class='success text-center'>Cập nhật thông tin thành công!</div>";
                    header('location:'.SITEURL);
                }
                else{
                    $_SESSION['update-sv']="<div class='error text-center'>Cập nhật thông tin thất bại!</div>";
                    header('location:'.SITEURL);
                }
            }
            ?>
        </div>
    </section>
<!-- Detail search Section Ends Here -->
<?php include('partials-front/footer.php'); ob_end_flush(); ?>