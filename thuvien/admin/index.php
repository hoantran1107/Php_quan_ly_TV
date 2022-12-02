<?php include('partials/menu.php'); ?>

<!-- Main content section starts -->
<div class="menu main-content">
    <div class="wrapper">
        <h1>TRANG QUẢN TRỊ THƯ VIỆN</h1>

        <?php if (isset($_SESSION['login']))
        {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
        }
        ?>
        <br><br>
        <div class="col-4 text-center">
            <?php
            $sql="SELECT * FROM the_loai";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br />
            Thể loại<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exporttl.php">Xuất excel</a>

        </div>
        <div class="col-4 text-center">
            <?php
            $sql2="SELECT * FROM sach";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br />
            Sách<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exportsach.php">Xuất excel</a>

        </div>
        <div class="col-4 text-center">
            <?php
            $sql3="SELECT * FROM phieu_muon WHERE active='Yes' ";
            $res3=mysqli_query($conn,$sql3);
            $count3=mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
            <br />
            Tổng lượt mượn<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/export.php">Xuất excel</a>
        </div>
        <div class="col-4 text-center">
            <?php
            $sql4="SELECT * FROM sinh_vien";
            $res4=mysqli_query($conn,$sql4);
            $count4=mysqli_num_rows($res4);
            //var_dump($count4);
            ?>
            <h1><?php echo $count4; ?></h1>
            <br />
            Tổng sinh viên<br><br>
            <a class="btn btn-secondary" href="<?php echo SITEURL; ?>admin/exportsv.php">Xuất excel</a>

        </div>
        <!-- start -->
        <?php 
        $info = [];
        $info1= [];
        //$today = date("d/m/y");
        $today = new DateTime();
        $format = "d/m/Y";
        $formatedLastDay = $today->format($format);
       // 21-30 = 9 ngay
       // push 21 

       array_push($info,$today->format($format));
        for($i=1;$i<=6;$i++){
           array_push($info,$today->modify('-1 day')->format($format));
        }
       $info = array_reverse($info);
      // var_dump($info);
       foreach( $info as $value){
           $newformat = DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
          // var_dump($newformat);
           $sql = "SELECT ngay_muon,sum(soluong_muon) as soluong FROM `phieu_muon` where ngay_muon = '$newformat' GROUP BY ngay_muon ORDER BY ngay_muon";
           $query = mysqli_query($conn,$sql);
           if(mysqli_num_rows($query) == 0){
               array_push($info1,0);
           }
           if($row = mysqli_fetch_array($query)){
               array_push($info1,$row['soluong']);
           }
               
       }

          $ngay_muon = json_encode($info);
          $soluong = json_encode($info1);
        
       if(isset($_POST['submit'])){
            $ngaybd =$_POST['start'];
            $ngaykt =$_POST['end'];
         $start = date_create($_POST['start']);
         $end =  date_create($_POST['end']);
         $info = [];
         $info1= [];
         $today = new DateTime();
         $format = "d/m/Y";
         $formatedLastDay = $today->format($format);
        $diff = date_diff ($start, $end);
        array_push($info,$end->format($format));
         for($i=1;$i<=$diff->format("%a") + 0;$i++){
            array_push($info,$end->modify('-1 day')->format($format));
         }
         
        $info = array_reverse($info);
        foreach($info as $value){
            $newformat = DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $sql = "SELECT ngay_muon,sum(soluong_muon) as soluong FROM `phieu_muon` where ngay_muon = '$newformat' GROUP BY ngay_muon ORDER BY ngay_muon";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query) == 0){
                array_push($info1,0);
            }
            if($row = mysqli_fetch_array($query)){
                array_push($info1,$row['soluong']+0);
            }
                
        }
     
           $ngay_muon = json_encode($info);
           $soluong = json_encode($info1);
       }
        ?>
        <style>
            table{
                margin-top: 20%;
                background-color: #fff
            }
            td{
                width: 25%;
            
            }
            input[type=date]{
                width: 90%;
            }
        </style>
        <form action="" method="post">
            <table width=50%>
                <tr><td colspan="2"><h2>Thống kê sách mượn</h2></td></tr>
                <tr>
                    <td>Ngày bắt đầu:</td>
                    <td><input type="date" name="start" value="<?php echo isset($ngaybd)  ?$ngaybd : ""?>"></td>
                    <td>Ngày kết thúc:</td>
                    <td><input type="date" name="end" value="<?php echo isset($ngaykt)  ?$ngaykt : ""?>" ></td>
                </tr>
                <tr>
                    <td><button style="border: none; cursor: pointer; font-size: 18px" type="submit" name="submit" class="btn-secondary">Báo cáo</button></td>
                </tr>
               
            </table>
            <div>
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php  echo $ngay_muon;?>,
                datasets: [{
                    label: 'Số sách mượn',
                    data: <?php echo $soluong;?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        </form>
        <!-- end -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main content section ends -->

<?php include('partials/footer.php'); ?>