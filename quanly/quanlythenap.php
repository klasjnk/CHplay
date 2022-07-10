<?php
    include 'ketnoi.php';
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ../dangnhap/login.php");
        die();  
    }
    function mathe() {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 14; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function Seri() {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 14; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    if(isset($_GET['delete'])){
        $MSSeri=$_GET['delete'];
        $sql="DELETE FROM thenap Where MSSeri='$MSSeri'";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo '<script language="javascript"> alert("Xóa thẻ nạp thành công"); window.location="quanlythenap.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Xóa không thành công vui lòng xem lại. Vui lòng xem lại"); window.location="quanlythenap.php";</script>';
        }
    }
    if(isset($_POST['addthenap'])){
        $MSSeri=Seri();
        $MSThe=Mathe();
        $loaithe=$_POST['loaithe'];
        foreach($loaithe as $loaithe1){
            $mang= $loaithe1;
        }
        $menhgia=$_POST['Menhgia'];
        foreach($menhgia as $menhgia1){
            $tien= $menhgia1;
        }
        $thenap="SELECT * FROM thenap";
        $query1 = mysqli_query($conn,$thenap);
        $check1 =mysqli_fetch_array($query1);
        
        $sql="INSERT INTO thenap VALUES('$MSThe','$MSSeri','$tien','$mang')";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo '<script language="javascript"> alert("Thêm thẻ nạp thành công"); window.location="quanlythenap.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Thêm không thành công vui lòng xem lại. Vui lòng xem lại"); window.location="quanlythenap.php";</script>';
        }
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
        <h2>Quản lý thẻ nạp</h2>
        <nav class="navbar navbar-light bg-light">
            <form method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addthenap">Thêm thẻ nạp
                    mới</button>
                <div class="modal fade" id="addthenap">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin thẻ nạp</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body form-thenap">
                                <form>
                                    <div >
                                        Chọn mệnh giá:
                                        <select name="Menhgia[]" id="Menhgia" class="btn btn-primary">
                                            <option value="10">10$</option>
                                            <option value="20">20$</option>
                                            <option value="50">50$</option>
                                            <option value="100">100$</option>
                                            <option value="500">500$</option>
                                        </select>
                                    </div>
                                    <div >
                                        Chọn loại thẻ:
                                        <select name="loaithe[]" id="loaithe" class="btn btn-primary">
                                            <option value="mobi">MobiFone</option>
                                            <option value="viettel">Viettel</option>
                                            <option value="vina">VinaPhone</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="addthenap" name="addthenap">Thêm thẻ
                                    nạp</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Tìm</button>
            </form>
        </nav>
        <br>
        <?php
            if (isset($_POST['search'])){
                $tukhoa = $_POST['tukhoa'];
                $sql= "SELECT * FROM thenap WHERE Loaithe LIKE '%$tukhoa%'";
            }else{
                $sql = "SELECT * FROM thenap";
            }
            $query = mysqli_query($conn,$sql);
        ?>
        <div class="background-table ">
            <div class="content-table">
                <table class="table table-hover" cellpadding="10">
                    <tr class="head-table">
                        <th>Loại thẻ </th>
                        <th>Số Seri</th>
                        <th>Mã thẻ</th>
                        <th>Mệnh giá</th>
                        <th>Xoá</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_array($query)){
                            ?>
                    <tr class="body-table">
                        <td><?= $row['Loaithe'] ?></td>
                        <td><?= $row['MSSeri'] ?></td>
                        <td><?= $row['MSThe'] ?></td>
                        <td><?=number_format($row['Sotien'],0,".",","); ?>$</td>
                        <td><a class="cc" href="quanlythenap.php?delete=<?php echo $row['MSSeri']; ?>"><button type="button"
                                    class="btn btn-danger">Xoá</button></a></td>
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