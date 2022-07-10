<?php
    include 'ketnoi.php';
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ../dangnhap/login.php");
        die();  
    }
    $sl="SELECT * from khachhang";
    $csl=mysqli_query($conn,$sl);
    $slkh=mysqli_num_rows($csl);

    
    $sl1="SELECT * from ungdung";
    $csl1=mysqli_query($conn,$sl1);
    $slapp=mysqli_num_rows($csl1);

    $sl2="SELECT * from khachhang where trangthai=1";
    $csl2=mysqli_query($conn,$sl2);
    $sldeveloper=mysqli_num_rows($csl2);

    $sl3="SELECT * from theloai";
    $csl3=mysqli_query($conn,$sl3);
    $sltheloai=mysqli_num_rows($csl3);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../logo3.png">
    <title>Quản lý thẻ nạp</title>
</head>

<body class="admin">
    <div class="header-panel">
        <ul class="header-ul">
            <li><a class="logo" href="admin.php"><img src="../logo3.png"></a></li>
            <li><a href="admin.php">Quản lý ứng dụng</a></li>
            <li><a href="quanlykhachhang.php">Quản lý User</a></li>
            <li><a href="quanlythenap.php">Quản lý thẻ nạp</a></li>
            <li class="nav-item active"><a id="thongke" href="thongke.php">Thống kê</a></li>
            <li class="nav-item active"><a id="logout" href="../dangnhap/logout.php">Đăng xuất</a></li>
        </ul>
        <h2 >Thống kê tổng quan</h2>
        <br>
        <div class="background-table ">
            <div class="content-table">
                <table class="table table-hover" cellpadding="10">
                    <tr class="head-table">
                        <th>Số lượng người dùng </th>
                        <th>Số lượng developer</th>
                        <th>Tổng số ứng dụng</th>
                        <th>Số lượng thể loại</th>
                    </tr>

                    <tr class="body-table">
                        <td><?=  $slkh-1; ?></td>
                        <td><?=  $sldeveloper;?></td>
                        <td><?=  $slapp; ?></td>
                        <td><?=  $sltheloai; ?></td>
                    </tr>

                </table>
            </div>
        </div>
        <!-- concccc -->
        <h2 >Thống kê thể loại</h2>
        <br>

        <div class="background-table ">
            <div class="content-table">
                <table class="table table-hover" cellpadding="10">
                    <tr class="head-table">
                        <th>Mã thể loại </th>
                        <th>Tên thể loại</th>
                        <th>Số lượng ứng dụng</th>
                    </tr>
                    <?php
                        $sl4="SELECT * from theloai";
                        $csl4=mysqli_query($conn,$sl4);
                        
                        while ($row = mysqli_fetch_array($csl4)){
                            $ok=$row['matheloai'];
                            $ap="SELECT * from ungdung where manhom='$ok'";
                            $cap=mysqli_query($conn,$ap);
                            $row1=mysqli_num_rows($cap);
                            ?>
                    <tr class="body-table">
                        <td><?= $row['matheloai'] ?></td>
                        <td><?= $row['tentheloai'] ?></td>
                        <td><?= $row1 ?></td>

                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>