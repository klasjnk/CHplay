<?php
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ../dangnhap/login.php");
        die();  
    }
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
    <title>Quản lý khách hàng</title>
    <link rel="icon" href="../logo3.png">

</head>

<body class="admin qlkh">
    <div class="header-panel">
        <ul class="header-ul">
            <li><a class="logo" href="admin.php"><img src="../logo3.png"></a></li>
            <li><a href="admin.php">Quản lý ứng dụng</a></li>
            <li><a href="quanlykhachhang.php">Quản lý User</a></li>
            <li><a href="quanlythenap.php">Quản lí thẻ nạp</a></li>
            <li class="nav-item active"><a id="thongke" href="thongke.php">Thống kê</a></li>
            <li class="nav-item active"><a id="logout" href="../dangnhap/logout.php">Đăng xuất</a></li>
        </ul>
    </div>
    <h2 >Quản lý User</h2>
    <nav class="navbar navbar-light bg-light">
        <form></form>
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm khách hàng" name="tukhoa">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Tìm</button>
        </form>
    </nav>
    <br>
    <?php
            include "ketnoi.php";
            if (isset($_POST['search'])){
                $tukhoa = $_POST['tukhoa'];
                $sql = "SELECT * FROM khachhang WHERE HoTenKH LIKE '%$tukhoa%'";
            }else{
                $sql = "SELECT * FROM khachhang";
            }

            $query = mysqli_query($conn,$sql);
        ?>
    <table class="table table-hover" cellpadding="10">
        <thead>
            <tr class="head-table">
                <th scope="col">STT</th>
                <th scope="col">Họ và Tên</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tuỳ chỉnh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stt =1;
            while ($row = mysqli_fetch_array($query)){
                $mskh = $row['MSKH'];
                $count = "SELECT * FROM KhachHang WHERE MSKH = '$mskh' ";
                $qCount = mysqli_query($conn,$count);
                $soDH = mysqli_num_rows($qCount);
            ?>
            <tr class="body-table">
                <th scope="row"><?=$stt;?></th>
                <td><?=$row['HoTenKH']; ?></td>
                <td><?=$row['Username']; ?></td>
                <td><?=$row['Email']; ?></td>
                <?php
                    if($row['trangthai']==='2'){
                        echo '<td>Quản trị viên</td>';
                    }else if($row['trangthai']==='1'){
                        echo '<td>Developer</td>';
                    }else if($row['trangthai']==='-1'){
                        echo '<td>Tài khoản bị vô hiệu hóa</td>';
                    }else echo '<td>Khách hàng</td>';
                ?>
                <td>
                    <div class="dropdown">
                        <button onclick=<?php echo'"myFunction'.$stt.'()"'?> class="dropbtn">Set trạng thái</button>
                        <div id=<?php echo"myDropdown-".$stt?> class="dropdown-content">
                            <a href="update.php?MSKH=<?php echo $row['MSKH']; ?>&&tinhtrang=-1"><button type="button"
                                    class="btn btn-success pheduyet">Vô hiệu hóa</button></a>
                            <a href="update.php?MSKH=<?php echo $row['MSKH']; ?>&&tinhtrang=0"><button type="button"
                                    class="btn btn-success pheduyet">Khách hàng</button></a>
                            <a href="update.php?MSKH=<?php echo $row['MSKH']; ?>&&tinhtrang=1"><button type="button"
                                    class="btn btn-success pheduyet">Developer</button></a>
                            <a href="update.php?MSKH=<?php echo $row['MSKH']; ?>&&tinhtrang=2"><button type="button"
                                    class="btn btn-success pheduyet">Admin</button></a>
                        </div>
                    </div>
                </td>
                <td><a href="deleteUser.php?MSKH=<?php echo $row['MSKH']; ?>"><button type="button"
                            class="btn btn-app">Xoá</button></a></td>
            </tr>

            <?php $stt ++; } ?>
        </tbody>
    </table>
</body>
<script>
<?php
                for($i=1;$i<$stt;$i++){?>

function <?php echo"myFunction".$i?>() {
    document.getElementById(<?php echo'"myDropdown-'.$i.'"'?>).classList.toggle("show");
}
<?php } ?>
// Close the dropdown if the user clicks outside of it
<?php
                    include "../main.js";
                ?>
</script>

</html>