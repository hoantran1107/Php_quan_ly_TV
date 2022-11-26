<?php ob_start(); include('partials-front/menu.php'); ?>
<?php
if(!isset($_GET['id']))
{
    //echo "H";
    header('location:'.SITEURL);
}
else{
    $sql1="SELECT * FROM sinh_vien WHERE ma_sv='$id' ";
    $res1=mysqli_query($conn, $sql1);
    $count1=mysqli_num_rows($res1);
    if($count1==0)
    {
        //echo "K";
        header('location:'.SITEURL);
    }
}
?>
<section class="book-search">
    <div class="container">
        <h2 class="text-center text-white">Thay đổi mật khẩu</h2>
        <br><br>


        <form method="post" action="" class="order">
            <fieldset>
            <div class="order-label">Mật khẩu hiện tại</div>
            <input type="password" name="current_password" value="<?php if (isset($current_password)) echo $current_password; ?>" placeholder="Điền mật khẩu hiện tại">
            
            <div class="order-label">Mật khẩu mới</div>
            <input type="password" name="new_password" value="<?php if (isset($new_password)) echo $new_password; ?>" placeholder="Điền mật khẩu mới">

            <div class="order-label">Xác nhận lại mật khẩu</div>
            <input type="password" name="confirm_password" value="<?php if (isset($confirm_password)) echo $confirm_password; ?>" placeholder="Xác nhận lại mật khẩu mới">

            <br><br>
            <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
            <input type="submit" name="submit" value="Đổi mật khẩu" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<?php
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //lay thong tin de update
    $id = $_GET['id'];
    $raw_current_password = md5($_POST['current_password']);
    $current_password = mysqli_real_escape_string($conn, $raw_current_password);
    $raw_new_password = md5($_POST['new_password']);
    $new_password = mysqli_real_escape_string($conn, $raw_new_password);
    $raw_confirm_password = md5($_POST['confirm_password']);
    $confirm_password = mysqli_real_escape_string($conn, $raw_confirm_password);

    //chuan bi cau truy van
    $sql = "SELECT * FROM sinh_vien WHERE ma_sv=$id AND pwd_sv='$current_password' ";

    $res = mysqli_query($conn, $sql);

    //var_dump($res);
    //var_dump($sql);

    if($res == true)
    {
        //echo "co du lieu";
        $count = mysqli_num_rows($res);
        if($count == 1)
        {
            //co the doi mk
            echo "User found";
            if($new_password==$confirm_password)
            {
                //echo "Password match";
                $sql2 = "UPDATE sinh_vien SET 
                pwd_sv='$new_password'
                WHERE ma_sv='$id'  
                ";

                $res2 = mysqli_query($conn,$sql2);
                if($res2 == true){
                    //hien thi thong bao thanh cong
                    $_SESSION['change-pwd'] = "<div class='success text-center'>Đổi mật khẩu thành công</div>";
                    header("location:".SITEURL."detail.php?sv_id=".$id);
                }
                else{
                    //hien thi thong bao khong thanh cong
                    $_SESSION['change-pwd'] = "<div class='error text-center'>Đổi mật khẩu thất bại</div>";
                    header("location:".SITEURL."detail.php?sv_id=".$id);
                }
            }
            else{
                $_SESSION['pwd-not-match'] = "<div class='error text-center'>Mật khẩu không khớp</div>";
                header("location:".SITEURL."detail.php?sv_id=".$id);
            }
        }
        else {
            //khong the doi mk
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
            header("location:".SITEURL."admin/manage-admin.php");
        }
    }
}

?>
<?php include('partials-front/footer.php'); ob_end_flush(); ?>