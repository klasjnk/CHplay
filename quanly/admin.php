<?php
    include 'addApp.php';
    include 'ketnoi.php';
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ../dangnhap/login.php");
        die();  
    }else{
        $MSKH=$_SESSION['mskh'];
        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        $trangthai=$row['trangthai'];
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
    <title>Admintrator</title>
</head>

<body class="admin">
    <?php if($trangthai==2){?>
    <div class="header-panel" >
        <ul class="header-ul">
            <li><a class="logo" href="admin.php"><img src="../logo3.png"></a></li>
            <li class="nav-item active"><a href="admin.php">Quản lý ứng dụng</a></li>
            <li class="nav-item active"><a href="quanlykhachhang.php">Quản lý User</a></li>
            <li class="nav-item active"><a href="quanlythenap.php">Quản lý thẻ nạp</a></li>
            <li class="nav-item active"><a id="thongke" href="thongke.php">Thống kê</a></li>
            <li class="nav-item active"><a id="logout" href="../dangnhap/logout.php">Đăng xuất</a></li>
        </ul>
        <h2>Quản lý ứng dụng</h2>
        <nav class="navbar navbar-light bg-light">
            <form method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addApp">Thêm ứng dụng
                    mới</button>
                <button type="button" class="btn btn-primary" ><a
                        href="quanlytheloai.php">Quản lí thể loại</a></button>
                <button type="button" class="btn btn-primary" ><a
                href="pheduyetapp.php">Phê duyệt ứng dụng</a></button>
                <div class="modal fade" id="addApp">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin ứng dụng</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <input type="text" name="tenapp" id="tenapp" placeholder="Tên Ứng Dụng">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="gia" id="gia" placeholder="Giá">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="manhom" id="manhom" placeholder="Mã Nhóm Ứng Dụng">
                                    </div>

                                    <div class="form-group">
                                        Hình ảnh:
                                        <input type="file" name="hinh" id="hinh" placeholder="Hình ảnh">
                                    </div>
                                    <div class="form-group">
                                        File:
                                        <input type="file" name="file" id="file" placeholder="File">
                                    </div>

                                    <div class="form-group">
                                        Mô tả Ứng dụng:
                                        <textarea class="form-control" name="mtapp" id="mtapp"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="addapp" name="addapp">Add App</button>
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
                $sql= "SELECT * FROM UngDung WHERE TenAPP LIKE '%$tukhoa%' or MaNhom LIKE '%$tukhoa%'";
            }else{
                $sql = "SELECT * FROM UngDung";
            }
            $query = mysqli_query($conn,$sql);
        ?>
        <div class="background-table ">
            <div class="content-table">
                <h3>Ứng dụng hiện tại</h3>
                <table class="table table-hover" cellpadding="10">
                    <tr class="head-table">
                        <th>Loại</th>
                        <th>Tên APP</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Chỉnh sửa</th>
                        <th>Xoá</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_array($query)){
                            ?>
                    <tr class="body-table">
                        <td><?= $row['MaNhom'] ?></td>
                        <td><?= $row['TenAPP'] ?></td>
                        <td><?= $row['MoTaAPP'] ?></td>
                        <td><?=number_format($row['Gia'],0,".",","); ?> vnđ</td>
                        <td> <img src="../images/<?php echo $row['Hinh']; ?>"> </td>
                        <td><a href="editApp.php?MSAPP=<?php echo $row['MSAPP']; ?>"><button type="button"
                                    class="btn btn-info">Chỉnh sửa</button></a></td>
                        <td><a href="deleteApp.php?MSAPP=<?php echo $row['MSAPP']; ?>"><button type="button"
                                    class="btn btn-danger">Xoá</button></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php }else{
            if($trangthai===0){
                echo '<script language="javascript"> alert("Bạn không phải là quản trị viên"); window.location="../index.php";</script>'; 
            }else{
                echo '<script language="javascript"> alert("Bạn không phải là quản trị viên"); window.location="../developer.php";</script>'; 
            }
            
        }?>
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