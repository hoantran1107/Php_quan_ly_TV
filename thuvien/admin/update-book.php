<?php ob_start(); include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Book</h1>

        <br><br>
<?php
        if(isset($_GET['idsach']))
        {
            //lay id va dl
            $idsach=$_GET['idsach'];
            //lay dl
            $sql = "SELECT * FROM sach WHERE ma_sach='$idsach' ";
            //thuc thi cau truy van
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                //lay dl
                $row = mysqli_fetch_assoc($res);
                $idsach = $row['ma_sach'];
                $tensach = $row['ten_sach'];
                $soluong = $row['soluong'];
                $sotrang = $row['sotrang'];
                $giasach = $row['gia_sach'];
                $namxb = $row['namxb'];
                $ma_nxb = $row['ma_nxb'];
                $ma_tl = $row['ma_tl'];
                $ma_tg = $row['ma_tg'];
                $tinhtrang = $row['tinhtrang'];
                $tomtat = $row['tomtat'];
                $tenanh = $row['anh_sach'];
            }
            else
            {
                $_SESSION['no-book-found'] = "<div class='error'>No book found</div>";
                header('location:'.SITEURL.'admin/manage-book.php');
            }
        }
        else
        {
            //chuyen ve trang manage
            header('location:'.SITEURL.'admin/manage-book.php');
        }
?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Mã sách</td>
                <td>
                    <input type="text" name="ma_sach" value="<?php echo $idsach; ?>">
                </td>
            </tr>
            <tr>
                <td>Tên sách</td>
                <td>
                    <textarea type="text" name="ten_sach"><?php echo $tensach; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td>
                    <input type="number" name="soluong" value="<?php echo $soluong; ?>">
                </td>
            </tr>
            <tr>
                <td>Số trang</td>
                <td>
                    <input type="number" name="sotrang" value="<?php echo $sotrang; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá sách</td>
                <td>
                    <input type="number" name="gia_sach" value="<?php echo $giasach; ?>">
                </td>
            </tr>
            <tr>
                <td>Năm xuất bản</td>
                <td>
                    <input type="number" name="namxb" value="<?php echo $namxb; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>
                    <select name="ma_nxb">
                    <?php 
                    $sql2 ="SELECT * FROM nha_xuat_ban";
                    $res = mysqli_query($conn, $sql2);
                    if($res == true)
                    {
                    $count = mysqli_num_rows($res);
                    if($count >=1)
                    {   
                        while($row = mysqli_fetch_array($res))
                        {
                            $ma = $row['ma_nxb'];
                            $ten = $row['ten_nxb'];
                            ?>
                            <option  <?php if($ma_nxb==$ma) echo "selected"; ?> value="<?php echo $ma; ?>" >
                            <?php
                            echo $ten;
                            echo "</option>";
                        }
                    }
                    }
                    ?>
                    </select>
                    </td>
            </tr>
            <tr>
                <td>Thể loại</td>
                <td>
                    <select name="ma_tl">
                    <?php 
                    $sql2 ="SELECT * FROM the_loai";
                    $res = mysqli_query($conn, $sql2);
                    if($res == true)
                    {
                    $count = mysqli_num_rows($res);
                    if($count >=1)
                    {
                        while($row = mysqli_fetch_array($res))
                        {
                            $ma = $row['ma_tl'];
                            $ten = $row['ten_tl'];
                            ?>
                            <option  <?php if($ma_tl==$ma) echo "selected"; ?> value="<?php echo $ma; ?>" >
                            <?php
                            echo $ten;
                            echo "</option>";
                        }
                    }
                    }
                    ?>
                    </select>
                    </td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                <select name="ma_tg">
                    <?php 
                    $sql2 ="SELECT * FROM tac_gia";
                    $res = mysqli_query($conn, $sql2);
                    if($res == true)
                    {
                    $count = mysqli_num_rows($res);
                    if($count >=1)
                    {
                        while($row = mysqli_fetch_array($res))
                        {
                            $ma = $row['ma_tg'];
                            $ten = $row['ten_tg'];
                            ?>
                            <option  <?php if($ma_tg==$ma) echo "selected"; ?> value="<?php echo $ma; ?>" >
                            <?php
                            echo $ten;
                            echo "</option>";
                        }
                    }
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <textarea type="text" name="tinhtrang" cols="20" rows="5"><?php echo $tinhtrang; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td>
                    <textarea type="text" name="tomtat"  cols="20" rows="5"><?php echo $tomtat; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Ảnh hiện tại</td>
                <td>
<?php
                    if($tenanh!="")
                    {
                        //hien thi anh
?>
                            <img src="<?php echo SITEURL; ?>images/book/<?php echo $tenanh; ?>" width="150px">
<?php
                    }
                    else{
                        //hien thong bao
                        echo "<div class='error'>Image not added</div>";
                    }
?>
                </td>
            </tr>
            <tr>
                <td>Chọn ảnh</td>
                <td>
                    <input type="file" name="anh_moi" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="anh_sach" value="<?php echo $tenanh; ?>">
                    <input type="hidden" name="ma_sach" value="<?php echo $idsach; ?>">
                    <input type="submit" name="submit" value="Update" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
<?php
        if(isset($_POST['submit']))
        {
            //lay dl tu form
            $idsach = $_POST['ma_sach'];
            $ten_sach = mysqli_real_escape_string($conn, $_POST['ten_sach']);
            $soluong =$_POST['soluong'];
            $sotrang =$_POST['sotrang'];
            $gia_sach =$_POST['gia_sach'];
            $namxb =$_POST['namxb'];
            $ma_nxb = $_POST['ma_nxb'];
            $ma_tl = $_POST['ma_tl'];
            $ma_tg = $_POST['ma_tg'];
            $tinhtrang = mysqli_real_escape_string($conn, $_POST['tinhtrang']);
            $tomtat = mysqli_real_escape_string($conn, $_POST['tomtat']);
            $anhhientai=$_POST['anh_sach']; 
                    
            
            //cap nhat anh neu chon anh moi
            if(isset($_FILES['anh_moi']['name'])){
                //echo $anhhientai;
                //get detail
                $tenanh=$_FILES['anh_moi']['name'];
                if($tenanh!="")
                {
                    //co anh, tai anh len, xoa anh cu
                    //auto rename file
                    //lay duoi file
                    $ext = explode('.',$tenanh);
                    $ext = end($ext);

                    //doi ten file
                    $tenanh="Book_".rand(000,999).'.'.$ext;

                    $source_path=$_FILES['anh_moi']['tmp_name'];
                    $destination_path="../images/book/".$tenanh;
                    //upload image
                    $upload = move_uploaded_file($source_path,$destination_path);
                    //kiem tra anh da tai len hay chua
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error'>Uploaded images failed</div>";
                        header('location:'.SITEURL.'admin/manage-book.php');
                        die();
                    }
                    //xoa anh cu
                    if($anhhientai!=""){
                        $remove_path="../images/book/".$anhhientai;
                        $remove=unlink($remove_path);
                        //kiem tra anh cu da xoa hay chua, hien thong bao, stop
                        if($remove==false){
                            $_SESSION['failed-remove']="<div class='error'>Failed to remove current image</div>";
                            header('location:'.SITEURL.'admin/manage-book.php');
                            die();
                        }
                    }
                    
                }
                else{
                //khong co anh
                $tenanh=$anhhientai;
            }
        }
            else{
                $tenanh=$anhhientai;
            }
            //cap nhat vao db
            $sql2 = "UPDATE sach SET
            ten_sach='$ten_sach',
            soluong='$soluong',
            sotrang='$sotrang',
            gia_sach='$gia_sach',
            namxb='$namxb',
            ma_nxb='$ma_nxb',
            ma_tl='$ma_tl',
            ma_tg='$ma_tg',
            tinhtrang='$tinhtrang',
            anh_sach='$tenanh',
            tomtat='$tomtat' 
            WHERE ma_sach='$idsach' 
            ";
            //var_dump($sql2);

            //thuc thi
            $res2 = mysqli_query($conn, $sql2);

            //chuyen ve trang manage
            if($res2==true)
            {
                //cap nhat thanh cong
                $_SESSION['update']="<div class='success'>Update book successfully</div>";
                header('location:'.SITEURL.'admin/manage-book.php');
            }
            else{
                //cap nhat that bai
                $_SESSION['update']="<div class='error'>Update book failed</div>";
                header('location:'.SITEURL.'admin/manage-book.php');                
            }
        }
?>
    </div>
</div>

<?php include('partials/footer.php'); ob_end_flush(); ?>