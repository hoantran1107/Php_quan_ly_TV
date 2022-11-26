<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if (isset($_GET['sv_id'])) {
    $sv_id = $_GET['sv_id'];
}
else{
    header('location:'.SITEURL);
}
?>
<!-- Card section starts here -->
<section class="book-search">
        <div class="container">
            <?php 
                $idsv=$_SESSION['usersv'];
                $sqltv="SELECT ma_the,ma_sv,hsd,thoigiancap FROM the_thu_vien WHERE ma_sv='$idsv' and active='Yes'";
                $restv=mysqli_query($conn, $sqltv);
                $counttv=mysqli_num_rows($restv);
                if($counttv >= 1){
                    echo "<h2 class='text-center text-white'>Thẻ hết hạn đăng kí thẻ mới</h2>'";
                }
                else 
                echo "<h2 class='text-center text-white'>Đăng kí thẻ thư viện</h2>'";
                $rowThe = mysqli_fetch_array($restv);
                // $date = new DateTime($rowThe['thoigiancap']);
                // $date-> modify('+'.$rowThe['hsd'].' month');
                //var_dump($date);
                
            ?>

            <form action="" method="POST" class="order">   
                <fieldset>
                    <!-- <legend>Thông tin làm thẻ</legend> -->
                    <div class="order-label">MSSV</div>
                    <input type="text" name="ma_sv" placeholder="Nhập vào mã sinh viên" class="input-responsive"  value="<?php echo $sv_id; ?>">

                    <div class="order-label">Hạn thẻ</div>
                    <select name="hsd" class="input-responsive">
                        <option value="3">3 tháng</option>
                        <option value="6">6 tháng</option>
                        <option value="9">9 tháng</option>
                        <option value="12">12 tháng</option>
                    </select>
                    
                    <div class="order-label">Thời gian cấp</div>
                    <input type="date" name="thoigiancap" value="<?php $today=date('D-m-Y'); echo $today; ?>" required>
                    <input type="hidden" value="<?php if(isset($er)) echo $er; ?>">
                    <br><br>
                    <input type="submit" name="xn" value="Xác nhận" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['xn']))
            {
                $ma_sv=$_POST['ma_sv'];
                $hsd=$_POST['hsd'];
                $thoigiancap=$_POST['thoigiancap'];
                // xóa thẻ thư viện cũ
                $idsv=$_SESSION['usersv'];
                $sqltv="SELECT ma_the,ma_sv,hsd,thoigiancap FROM the_thu_vien WHERE ma_sv='$idsv' and active='Yes'";
                $restv=mysqli_query($conn, $sqltv);
                $counttv=mysqli_num_rows($restv);
                if($counttv >= 1){
                    $sqlnew = "DELETE FROM `the_thu_vien` WHERE ma_sv='$idsv'";
                    mysqli_query($conn,$sqlnew);
                }
                
                
                // tạo thẻ vào database
                $sql3="INSERT INTO the_thu_vien SET
                ma_sv='$ma_sv',
                thoigiancap='$thoigiancap',
                hsd='$hsd',
                active='No' 
                ";

                $res3=mysqli_query($conn,$sql3);
                if ($res3 == true) {
                    $_SESSION['the']="<div class='success text-center'>Gửi yêu cầu làm thẻ thư viện thành công!</div>";
                    header('location:'.SITEURL);
                }
                else{
                    $_SESSION['the']="<div class='error text-center'>Gửi yêu cầu làm thẻ thư viện thất bại!</div>";
                    header('location:'.SITEURL);
                }
            }
            ?>
        </div>
    </section>
<!-- Book search section ends here -->


<?php include('partials-front/footer.php'); ob_end_flush(); ?>