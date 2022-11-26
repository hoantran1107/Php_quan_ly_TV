<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        <br><br>


        <form method="post" action="">
            <table class="tbl-30">
                <tr>
                    <td>Mật khẩu hiện tại</td>
                    <td>
                        <input type="password" name="current_password" value="<?php if (isset($current_password)) echo $current_password; ?>" placeholder="Điền mật khẩu hiện tại">
                    </td>
                </tr>
                <tr>
                    <td>Mật khẩu mới</td>
                    <td>
                        <input type="password" name="new_password" value="<?php if (isset($new_password)) echo $new_password; ?>" placeholder="Điền mật khẩu mới">
                    </td>
                </tr>
                <tr>
                    <td>Xác nhận lại mật khẩu</td>
                    <td>
                        <input type="password" name="confirm_password" value="<?php if (isset($confirm_password)) echo $confirm_password; ?>" placeholder="Xác nhận lại mật khẩu mới">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
                        <input type="submit" name="submit" value="Đổi mật khẩu" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

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
    $sql = "SELECT * FROM nhan_vien WHERE ma_nv=$id AND pwd='$current_password' ";

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
                $sql2 = "UPDATE nhan_vien SET 
                pwd='$new_password'
                WHERE ma_nv='$id'  
                ";

                $res2 = mysqli_query($conn,$sql2);
                if($res2 == true){
                    //hien thi thong bao thanh cong
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully</div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }
                else{
                    //hien thi thong bao khong thanh cong
                    $_SESSION['change-pwd'] = "<div class='error'>Changed Password Failed</div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }
            else{
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Not Match</div>";
                header("location:".SITEURL."admin/manage-admin.php");
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

<?php
include('partials/footer.php');
?>