<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if(isset($_GET['sv_id']))
{
    $id = $_GET['sv_id'];
    $sql="SELECT * FROM sinh_vien WHERE ma_sv='$id' ";
    $res= mysqli_query($conn, $sql);
    $count=mysqli_num_rows($res);
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
        header('location:'.SITEURL);
    }
}
else{
    header('location:'.SITEURL);
}
?>
<!-- Detail search Section Starts Here -->
<section class="book-search">
        <div class="container">
            
        <?php
        if(isset($_SESSION['change-pwd']))
        {
            echo  $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        if(isset($_SESSION['pwd-not-match']))
        {
            echo  $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        ?>
            <h2 class="text-center text-white">Thông tin sinh viên</h2>
            
            <form action="" method="POST" class="order">
                <fieldset align="center" style="border: none;">
            <?php
            $sql2="SELECT ma_sv FROM the_thu_vien WHERE ma_sv='$id' and active='Yes' ";
            $res2 = mysqli_query($conn, $sql2);
            $count2=mysqli_num_rows($res2);
            if($count2==0){
                //
                echo "<div class='error'>Chưa có thẻ thư viện</div>";
                ?>
                    <a href="<?php echo SITEURL; ?>add-card.php?sv_id=<?php echo $id; ?>" class="btn btn-primary">Đăng kí thẻ thư viện</a>
                <?php
            }
            else{
                echo "<div class='success'>Đã có thẻ thư viện</div>";
            }
            ?></fieldset>
                <fieldset>
                    <legend>Chi tiết</legend>
                    <div class="order-label">Mã sinh viên</div>
                    <input type="text" class="input-responsive" value="<?php echo $id; ?>" readonly>

                    <div class="order-label">Họ tên</div>
                    <input type="text" class="input-responsive" value="<?php echo $ten; ?>" readonly>
                    
                    <div class="order-label">Giới tính</div>
                    <input type="text" class="input-responsive" value="<?php echo $gioitinh; ?>" readonly>

                    <div class="order-label">Ngày sinh</div>
                    <input type="text"class="input-responsive" value="<?php echo $ngaysinh; ?>" readonly>

                    <div class="order-label">Địa chỉ</div>
                    <input type="text" class="input-responsive" value="<?php echo $diachi; ?>" readonly>

                    <div class="order-label">Khoa</div>
                    <input type="text"class="input-responsive" value="<?php echo $khoa; ?>" readonly>

                    <div class="order-label">Email</div>
                    <input type="text" class="input-responsive" value="<?php echo $email; ?>" readonly>

                    <br><br>
                    <input type="submit" name="submit" value="Thoát" class="btn btn-primary">
                    <input type="submit" name="update" value="Chỉnh sửa" class="btn btn-primary">
                    <input type="submit" name="changepwd" value="Đổi mật khẩu" class="btn btn-primary">

                </fieldset>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                header('location:'.SITEURL);
            }
            if(isset($_POST['update']))
            {
                header('location:'.SITEURL.'update-sv-sv.php');
            }
            if(isset($_POST['changepwd']))
            {
                header('location:'.SITEURL.'changepwd-sv.php?id='.$id);
            }
            ?>
        </div>
    </section>
<!-- Detail search Section Ends Here -->
<?php include('partials-front/footer.php'); ob_end_flush(); ?>