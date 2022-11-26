<?php ob_start(); include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Book</h1>
        <br>
        <?php if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //hien thi thong bao
            unset($_SESSION['add']); //xoa bo thong bao
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];//hien thi thong bao
            unset($_SESSION['upload']);//xoa bo thong bao
        }
        ?><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Mã sách</td>
                    <td>
                        <input type="text" name="ma_sach" placeholder="Nhập mã sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td>
                        <textarea rows="5" type="text" name="ten_sach" placeholder="Nhập tên sách" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="soluong" placeholder="Nhập số lượng sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Số trang</td>
                    <td>
                        <input type="number" name="sotrang" placeholder="Nhập số trang sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Giá sách</td>
                    <td>
                        <input type="number" name="gia_sach" placeholder="Nhập giá sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Năm xuất bản</td>
                    <td>
                        <input type="number" name="namxb" placeholder="Nhập năm xuất bản sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Mã nhà xuất bản</td>
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
                            echo "<option value='$ma'>";
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
                    <td>Mã thể loại</td>
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
                            echo "<option value='$ma'>";
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
                    <td>Mã tác giả</td>
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
                            echo "<option value='$ma'>";
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
                        <input type="text" name="tinhtrang" placeholder="Nhập tình trạng sách" required>
                    </td>
                </tr>
                <tr>
                    <td>Tóm tắt</td>
                    <td>
                        <textarea rows="5" required type="text" name="tomtat" placeholder="Nhập tóm tắt nội dung sách"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Ảnh sách</td>
                    <td>
                        <input type="file" name="anh_sach">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Book" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php include('partials/footer.php') ?>
<?php
//Luu vao csdl
//kiem tra nut submit
if (isset($_POST['submit'])) {
    $idsach = mysqli_real_escape_string($conn, $_POST['ma_sach']);
    $ten_sach = mysqli_real_escape_string($conn, $_POST['ten_sach']);
    $soluong = $_POST['soluong'];
    $sotrang = $_POST['sotrang'];
    $gia_sach = $_POST['gia_sach'];
    $namxb = $_POST['namxb'];
    $ma_nxb = $_POST['ma_nxb'];
    $ma_tl = $_POST['ma_tl'];
    $ma_tg = $_POST['ma_tg'];
    $tinhtrang = mysqli_real_escape_string($conn, $_POST['tinhtrang']);
    $tomtat = mysqli_real_escape_string($conn, $_POST['tomtat']);
    $tenanh='';
    
    //kiem tra anh duoc chon chua
    //print_r($_FILES['anh_nv']);

    //die();//kiem tra va dung tai day
    if(isset($_FILES['anh_sach']['name']))
    {
        //tai anh lên
        //ten, nguon, dich
        $tenanh=$_FILES['anh_sach']['name'];

        //upload anh khi anh khong duoc chon
        if($tenanh!="")
        {


        //auto rename file
        //lay duoi file
        $ext = explode('.',$tenanh);
        $ext = end($ext);

        //doi ten file
        $tenanh="Book_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['anh_sach']['tmp_name'];
        $destination_path="../images/book/".$tenanh;
        //upload image
        $upload = move_uploaded_file($source_path,$destination_path);
        //kiem tra anh da tai len hay chua
        if($upload==false)
        {
            $_SESSION['upload']="<div class='error'>Uploaded images failed</div>";
            header('location:'.SITEURL.'admin/add-book.php');
            die();
        }
    }
    }
    else{
        //khong tai anh va gan gia tri la ''
        $tenanh='';
    }
    //cau truy van
    $sql = "INSERT INTO sach SET
    ma_sach='$idsach',
    ten_sach='$ten_sach',
    soluong='$soluong',
    sotrang='$sotrang',
    gia_sach='$gia_sach',
    namxb='$namxb',
    ma_nxb='$ma_nxb',
    ma_tl='$ma_tl',
    ma_tg='$ma_tg',
    tinhtrang='$tinhtrang',
    tomtat='$tomtat',
    anh_sach='$tenanh' 
    ";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Book is added successfully!</div>";
        echo "Thanh cong";
        header('location:'.SITEURL.'admin/manage-book.php');
        }
        else{
        //insert khong thanh cong
        //echo "insert khong thanh cong";
        //tao session de hien thi thong bao
        $_SESSION['add'] = "<div class='error'>Book is added failed!</div>";
        //chuyen trang toi manage admin 
        header("location:".SITEURL.'admin/add-book.php');
    }
}
ob_end_flush();
?>