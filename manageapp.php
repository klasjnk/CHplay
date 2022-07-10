<?php
    include "quanly/ketnoi.php";
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ./dangnhap/login.php");
        die();  
    }else{
        $MSKH=$_SESSION['mskh'];
        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
    }
    if(isset($_GET['delete'])){
        $msapp=$_GET['delete'];
        $sql="DELETE FROM uploadapp where MSAPP='$msapp'";
        $thuchien=mysqli_query($conn,$sql);
        $sql1="DELETE FROM ungdung where MSAPP='$msapp'";
        $thuchien1=mysqli_query($conn,$sql1);


        if($thuchien & $thuchien1){
            echo '<script language="javascript"> alert("Xóa thành công"); window.location="manageapp.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Xóa không được"); window.location="manageapp.php";</script>';
        }

    }
    if (isset($_POST['upload'])){
        $ten = $_POST['tenapp'];
        $gia = $_POST['gia'];
        $mnhom = $_POST['manhom'];
        $mt = $_POST['mtapp'];

        $select = "SELECT * FROM `UngDung` WHERE MaNhom = '$mnhom'";
        $qSelect = mysqli_query($conn,$select);
        $select1 = "SELECT * FROM `uploadapp` WHERE MaNhom = '$mnhom' ";
        $qSelect1 = mysqli_query($conn,$select1);
        if (mysqli_num_rows($qSelect)==0 && mysqli_num_rows($qSelect1)==0){
            $mapp = $mnhom."000";
        } else{
            $sl="SELECT * from ungdung where MaNhom='$mnhom' order by MSAPP desc limit 1";
            $sl1="SELECT * from uploadapp where MaNhom='$mnhom' order by MSAPP desc limit 1";

            $csl=mysqli_query($conn,$sl);
            if(mysqli_num_rows($csl)!=0){
                $a=mysqli_fetch_array($csl);
                $len=strlen($a['MSAPP'])-3;
                $b=substr($a['MSAPP'],$len,strlen($a['MSAPP']));
                $dodai=(int)$b+1;
            }else{
                $dodai=0;
            }
            


            $csl1=mysqli_query($conn,$sl1);
            $dodai1=0;
            if(mysqli_num_rows($csl1)!=0){
                $a1=mysqli_fetch_array($csl1);
                $len1=strlen($a1['MSAPP'])-3;
                $b1=substr($a1['MSAPP'],$len1,strlen($a1['MSAPP']));
                $dodai1=(int)$b1+1;
            }
            
            
            if($dodai>=$dodai1){
                $dem=$dodai;
            }else{$dem=$dodai1;}
            if($dem<10){
                $mapp=$mnhom."00".(string)$dem;
            }
            else{
                $mapp=$mnhom."0".(string)$dem;
            }
        }
        $anh = $_FILES['hinh']['name'];
        $target_dir = "./images/";
        $target_dir1 = "./files/";
        $tmp_name = $_FILES['hinh']['tmp_name'];
        $tmp_name1 = $_FILES['file']['tmp_name'];
        $size=$_FILES['file']['size'];
        $file=$_FILES['file']['name'];
        move_uploaded_file($tmp_name,$target_dir.$anh);
        move_uploaded_file($tmp_name1,$target_dir1.$file);
        if($size<300000000){
        $sql = "INSERT INTO uploadapp(MSAPP,mskh,TenAPP,Gia,MaNhom,Hinh,MoTaAPP,file) VALUES ('$mapp','$MSKH','$ten',$gia,'$mnhom','$anh','$mt','$file') ";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo '<script language="javascript"> alert("Thêm ứng dụng thành công"); </script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình thêm ứng dụng. Vui lòng xem lại");  window.location="manageapp.php";</script>';
        }
        }
        else{
            echo '<script language="javascript"> alert("Kích thước quá lớn. Vui lòng xem lại");  window.location="manageapp.php";</script>';
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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo3.png">
    <title>Developer</title>

</head>

<body>
    <!--Header-->

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="developer.php"><img src="logo3.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse f-right" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="developer.php">Google Play<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Danh mục ứng dụng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="developer.php?findgame=game"><i class="fas fa-gamepad"
                                ></i> Trò chơi điện tử</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=edu"><i class="fas fa-book"></i> Ứng dụng
                            học tập</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=MXH"><i class="fas fa-user"></i>Mạng xã
                            hội</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=freetainhieu"><i
                                class="fas fa-book"></i>Lượt miễn phí tải nhiều</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=tainhieu"><i class="fas fa-book"></i>Lượt
                            tải nhiều</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Nhà phát triển
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="developer.php?findgame=KH000"><i class="fas fa-user"
                                ></i> Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH001"><i class="fas fa-user"
                                ></i> Khanh Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH002"><i class="fas fa-user"
                                ></i> Nhật Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH003"><i class="fas fa-user"
                                ></i> Bảo Lê</a>
                        <div class="dropdown-divider"></div>


                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="manageapp.php">Quản lí ứng dụng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="changeprofile.php">Thông tin cá nhân</a>
                </li>
            </ul>
        </div>
        <div class="dropdown nav-item">
            <span id="nguoidung"><i class="fas fa-user"></i> <?php echo $_SESSION['tenKH']; ?> </span>
            <span class="sodu">Số dư : <?php echo $row['SoDu']; ?>$</span>
            <div class="dropdown-content">
                <a href="lichsunap.php">Lịch sử nạp thẻ</a>
                <hr>
                <a href="napthecao.php">Nạp thẻ</a>
                <hr>
                <a href="lichsudownload.php">Lịch sử tải về</a>
                <hr>
                <a href="dangnhap/doimatkhau.php">Đổi mật khẩu</a>
                <hr>
                <a id="logout" href="dangnhap/logout.php">Đăng xuất</a>
            </div>
        </div>

        &ensp;
        <div class="form-inline">
            <form class="form-inline" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="tukhoa">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </div>
    </nav>


    <div class="pos-f-t">
        <nav class="navbar navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <br>
    <br>
    <?php
            $sql1="SELECT * FROM uploadapp where mskh='$MSKH'";
            $query1 = mysqli_query($conn,$sql1);
            
        ?>

    <div class="background-table ">
        <div class="content-table">
            <br>

            <h3 >Ứng dụng của tui</h3>
            <form method="post" enctype="multipart/form-data">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">Thêm ứng dụng
                    mới</button>
                
                <div class="modal fade" id="upload">
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
                                <button type="submit" class="btn btn-primary" id="upload" name="upload">Add App</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <table class="table table-hover" cellpadding="10">
                <tr class="head-table">
                    <th>Loại</th>
                    <th>Tên APP</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Tình trạng</th>
                    <th>Chỉnh sửa</th>
                    <th>Xoá</th>
                </tr>
                <?php

                           
                            while ($row1 = mysqli_fetch_array($query1)){
                                if($row1['tinhtrangud']==0){
                                    $tinhtrang='Đang chờ duyệt';
                                }elseif($row1['tinhtrangud']==1){
                                    $tinhtrang='Đã được phê duyệt';
                                }elseif($row1['tinhtrangud']==-1){
                                    $tinhtrang='Đã bị từ chối';
                                }
                                ?>


                <tr class="body-table">
                    <td><?= $row1['MaNhom'] ?></td>
                    <td><?= $row1['TenAPP'] ?></td>
                    <td><?= $row1['MoTaAPP'] ?></td>
                    <td><?=number_format($row1['Gia'],0,".",","); ?>$</td>
                    <td> <img src="images/<?php echo $row1['Hinh']; ?>"> </td>
                    <td><?php echo $tinhtrang;?></td>
                    <td>
                        <a href="editappdeveloper.php?edit=<?php echo $row1['MSAPP']?>"><button type="submit"
                                class="btn btn-primary">Chỉnh Sửa</button></a>
                    </td>
                    </td>
                    <td><a href="manageapp.php?delete=<?php echo $row1['MSAPP']?>"><button type="button"
                                class="btn btn-danger">Xoá</button></a></td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>

    <!--Footer-->
    <br>
    <hr>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>