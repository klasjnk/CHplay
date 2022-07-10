<?php
    include 'ketnoi.php';
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ../dangnhap/login.php");
        die();  
    }
    
    if(isset($_GET['delete'])){
        $matheloai=$_GET['delete'];
        $sql="DELETE FROM theloai Where matheloai='$matheloai'";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo '<script language="javascript"> alert("Xóa thể loại thành công"); window.location="quanlytheloai.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Xóa thể loại không thành công vui lòng xem lại. Vui lòng xem lại"); window.location="quanlytheloai.php";</script>';
        }
    }
    if(isset($_POST['addtheloai'])){
        $matheloai=$_POST['matheloai'];
        $tentheloai=$_POST['tentheloai'];
        $sql1="select * from  theloai where matheloai='$matheloai'";
        $query1 = mysqli_query($conn,$sql1);

        if(mysqli_num_rows($query1)==0){
            $sql="INSERT INTO theloai VALUES('$matheloai','$tentheloai')";
            $query = mysqli_query($conn,$sql);
            if ($query){
                echo '<script language="javascript"> alert("Thêm thể loại thành công"); window.location="quanlytheloai.php";</script>';
            }
        }else{
            echo '<script language="javascript"> alert("Thể loại đã tồn tại! Vui lòng nhập lại."); window.location="quanlytheloai.php";</script>';
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
        <h2 >Quản lý thể loại</h2>
        <nav class="navbar navbar-light bg-light">
            <form method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtheloai">Thêm thể
                    loại mới</button>
                <button type="button" class="btn btn-primary" ><a
                    href="pheduyetapp.php">Phê duyệt ứng dụng</a></button>
                <button type="button" class="btn btn-primary" ><a
                href="admin.php">Quản lý ứng dụng</a></button>
                <div class="modal fade" id="addtheloai">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin thể loại</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body form-theloai">
                                <form>
                                    <div >

                                        <input type="text" name="matheloai" placeholder="Nhập mã thể loại">
                                    </div>
                                    <div >

                                        <input type="text" name='tentheloai' placeholder="Nhập tên thể loại">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="addtheloai" name="addtheloai">Thêm thể
                                    loại</button>
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
                $sql= "SELECT * FROM theloai WHERE tentheloai LIKE '%$tukhoa%'";
            }else{
                $sql = "SELECT * FROM theloai";
            }
            $query = mysqli_query($conn,$sql);
        ?>
        <div class="background-table ">
            <div class="content-table">
                <table class="table table-hover" cellpadding="10">
                    <tr class="head-table">
                        <th>Mã thể loại</th>
                        <th>Tên thể loại</th>
                        <th>Chỉnh sửa thể loại</th>
                        <th>Xóa thể loại</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_array($query)){
                            ?>
                    <tr class="body-table">
                        <td><?= $row['matheloai'] ?></td>
                        <td><?= $row['tentheloai'] ?></td>

                        <td><a href="edittheloai.php?edit=<?php echo $row['matheloai']; ?>"><button type="button"
                                    class="btn btn-info">Chỉnh sửa</button></a></td>
                        <td><a href="quanlytheloai.php?delete=<?php echo $row['matheloai']; ?>"><button type="button"
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