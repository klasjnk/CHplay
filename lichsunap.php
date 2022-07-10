<?php
    session_start();
    include "quanly/ketnoi.php";
    
    if (!isset($_SESSION['tenKH'])){
        header("Location: ./dangnhap/login.php");
        die();  
    }else{
        $MSKH=$_SESSION['mskh'];
        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        $trangthai=$row['trangthai'];
    }

?>
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
    <title>Lịch sử nạp tiền</title>
</head>

<body class="lichsunap">
<?php if($trangthai==1){?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark " >
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
                        <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"
                                ></i> Trò chơi điện tử</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=book"><i class="fas fa-book"></i> Ứng dụng học
                            tập</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=MXH"><i class="fas fa-user"></i>Mạng xã
                            hội</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=freetainhieu"><i class="fas fa-book"></i>Lượt
                            miễn phí tải nhiều</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=tainhieu"><i class="fas fa-book"></i>Lượt tải
                            nhiều</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Nhà phát triển
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="developer.php?findgame=KH000"><i class="fas fa-gamepad"
                                ></i> Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH001"><i class="fas fa-gamepad"
                                ></i> Khanh Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH002"><i class="fas fa-gamepad"
                                ></i> Nhật Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH003"><i class="fas fa-gamepad"
                                ></i> Bảo Lê</a>
                        <div class="dropdown-divider"></div>


                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="uploadapp.php">Upload ứng dụng</a>
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
    </nav><?php }else{?>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark " >
        <a class="navbar-brand" href="index.php"><img src="logo3.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse f-right" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Google Play<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Danh mục ứng dụng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"
                                ></i>Trò chơi điện tử</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=book"><i class="fas fa-book"></i> Sách </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=mxh"><i class="fas fa-facebook"></i>Mạng xã
                            hội</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=freetainhieu"><i
                                class="fas fa-facebook"></i>Free tải nhiều</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=tainhieu"><i class="fas fa-facebook"></i>Ứng
                            dụng tải nhiều</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Nhà phát triển
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?findgame=KH000"><i class="fas fa-user"
                                ></i> Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH001"><i class="fas fa-user"
                                ></i> Khanh Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH002"><i class="fas fa-user"
                                ></i> Nhật Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH003"><i class="fas fa-user"
                                ></i> Bảo Lê</a>
                        <div class="dropdown-divider"></div>


                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="changeprofile.php">Thông tin cá nhân</a>
                </li>
            </ul>
        </div>
        <div class="dropdown nav-item">
            <span id="nguoidung"><i class="fas fa-user"></i> <?php echo $_SESSION['tenKH']; ?> </span>
            <span clss="sodu">Số dư: <?php echo $row['SoDu']; ?>$</span>
            <div class="dropdown-content">
                <a href="lichsunap.php">Lịch sử nạp thẻ</a>
                <hr>
                <a href="napthecao.php">Nạp thẻ</a>
                <hr>
                <a href="lichsudownload.php">Lịch sử tải về</a>
                <hr>
                <a href="upgrade.php">Nâng cấp Developer</a>
                <hr>
                <a href="/dangnhap/doimatkhau.php">Đổi mật khẩu</a>
                <hr>
                <a id="logout" href="dangnhap/logout.php">Đăng xuất</a>
            </div> </nav>
        </div> <?php } ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h3 >Lịch Sử nạp thẻ</h3>
        <div class="row">
            <div class="col-lg-12">
                <?php
                    $ls="SELECT * from lichsunap where username ='$MSKH'";
                    $thuchien = mysqli_query($conn,$ls); 
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" >
                                <thead>
                                    <tr class="table-header">
                                        <th>Loại thẻ</th>
                                        <th>Giá </th>
                                        <th>Mã thẻ</th>
                                        <th>Ngày nạp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if ($thuchien && mysqli_num_rows($thuchien) > 0) {
                                    while ($row = mysqli_fetch_array($thuchien)) {
                                        ?>
                                    <tr>
                                        <td class="price-pr">
                                            <p><?= $row["loaithe"] ?></p>
                                        </td>

                                        <td class="price-pr">
                                            <p>$ <?= $row["sotien"] ?></p>
                                        </td>

                                        <td class="price-pr">
                                            <p><?= $row["mathe"] ?></p>
                                        </td>
                                        <td class="price-pr">
                                            <p><?= $row["ngaynap"] ?></p>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }

                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

</body>