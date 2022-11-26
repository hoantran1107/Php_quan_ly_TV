<?php ob_start();
include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật trạng thái thẻ</h1>

        <br><br>
        <?php

        if (isset($_GET['id'])) {
            //lay id va dl
            $id = $_GET['id'];
            //lay dl
            $sql = "SELECT * FROM phieu_muon WHERE ma_pm='$id' ";
            //thuc thi cau truy van
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            
            if ($count > 0) {
                //lay dl
                $row = mysqli_fetch_array($res);
                //var_dump($row);
                $active = $row['active'];
                $ma_pm = $row['ma_pm'];
                $tra_sach = $row['tra_sach'];
                $soluongsachmuon = $row['soluong_muon'];
            }
        } else {
            //chuyen ve trang manage
            header('location:' . SITEURL . 'admin/manage-card.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == "No") echo "checked"; ?> value="No">Chưa duyệt
                    </td>
                    <td>
                        <input type="radio" name="active" <?php if ($active == "Yes") echo "checked"; ?> value="Yes">Đã duyệt
                    </td>
                    </tr>
                    <tr>
                    <td>Trả sách</td>
                    <td>
                        <input type="radio" name="tra_sach" <?php if ($tra_sach == "No") echo "checked"; ?> value="No">Chưa trả
                    </td>
                    <td>
                        <input type="radio" name="tra_sach" <?php if ($tra_sach == "Yes") echo "checked"; ?> value="Yes">Đã trả
                    </td>
                    <td>
                        Số lượng trả
                    </td>
                    <td><input type="number" name="soluongtra" min="0" max="<?php echo $soluongsachmuon ?>"  value="<?php if(isset($soluongsachmuon)) echo $soluongsachmuon; else echo ""  ?>" > 
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="ma_pm" value="<?php echo $ma_pm; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        
        //$ma_pm = $_POST['ma_pm'];
        if (isset($_POST['submit'])) {
            //lay dl tu form
           // $ma_pm = $_POST['ma_pm'];
            $active = $_POST['active'];
            $tra_sach = $_POST['tra_sach'];
            $soluongtra = $_POST['soluongtra'] +0;
            //cap nhat vao db
            $sql2 = "UPDATE phieu_muon SET
            active='$active', tra_sach = '$tra_sach'
            WHERE ma_pm='$ma_pm'";


            $res2 = mysqli_query($conn, $sql2);
            //echo $sql2;
            // Trừ số lượng trong database sau khi chấp nhận phiếu mượn
            if($active == 'Yes' and $tra_sach == 'No'){
            $sql3 = "select * from phieu_muon join sach on phieu_muon.ma_sach = sach.ma_sach where ma_pm ='$ma_pm' ";
            $query3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_assoc($query3);
            $soLuongCon = $row3['soluong'] - $row3['soluong_muon'];
            // var_dump($soLuongCon);
            $ma_sach = $row3['ma_sach'];
            // số lượng trả  
            $sql4= "UPDATE `sach` SET soluong = $soLuongCon WHERE ma_sach='$ma_sach';";
            mysqli_query($conn,$sql4);
            //thuc thi
            }

            // Cộng số lượng sau khi trả sách
            if($tra_sach == 'Yes' and $active == 'Yes'){
                $sql4 = "select * from phieu_muon join sach on phieu_muon.ma_sach = sach.ma_sach where ma_pm ='$ma_pm' ";
                $query4 = mysqli_query($conn,$sql4);
                $row4 = mysqli_fetch_assoc($query4);
                // var_dump($soLuongCon);
                $ma_sach = $row4['ma_sach'];
                $soluongmoi = $soluongtra + $row4['soluong'];
                $ngay = getdate();
                $ngay_tra=$ngay['year']."/".$ngay['mon']."/".$ngay['mday'];
                $sql6 = "UPDATE phieu_muon SET ngay_tra = '$ngay_tra' WHERE ma_pm = '$ma_pm'";
                $sql5= "UPDATE `sach` SET soluong = $soluongmoi WHERE ma_sach='$ma_sach';";
                $res3 = mysqli_query($conn,$sql5);
                mysqli_query($conn,$sql6);
            }


            //chuyen ve trang manage
            if ($res2 == true) {
                //cap nhat thanh cong
                $_SESSION['update'] = "<div class='success'>Cập nhật trạng thái phiếu mượn thành công!</div>";
                header('location:' . SITEURL . 'admin/manage-card.php');
            } else {
                //cap nhat that bai
                $_SESSION['update'] = "<div class='error'>Cập nhật trạng thái phiếu mượn thất bại!</div>";
                header('location:' . SITEURL . 'admin/manage-card.php');
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');
ob_end_flush(); ?>