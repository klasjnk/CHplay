<?php
    include 'ketnoi.php';
    if (isset($_SESSION['tenKH'])){
        $MSKH=$_SESSION['mskh'];
        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
    }
?>
<nav class="header navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="logo3.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(isset($_SESSION['tenKH']) && $_SESSION['tenKH']!="Administrator"){?>
    <div class="collapse navbar-collapse f-right" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">DEMO 10 ĐIỂM<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Danh mục ứng dụng
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"
                            style="color: red"></i> Trò chơi điện tử</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?findgame=edu"><i class="fas fa-book"></i> Ứng dụng học
                        tập</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?findgame=mxh"><i class="fas fa-facebook"></i>Mạng xã
                        hội</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profile.php">Thông tin cá nhân</a>
            </li>
        </ul>
    </div>
    <div class="dropdown nav-item">
        <span id="nguoidung"><i class="fas fa-user"></i> <?php echo $_SESSION['tenKH']; ?> </span>
        <span style="padding-left:10px;">Số dư : <?php echo $row['SoDu']; ?> Đ</span>
        <div class="dropdown-content">
            <a href="napthecao.php">Nạp thẻ</a>
            <hr>
            <a href="/dangnhap/doimatkhau.php">Đổi mật khẩu</a>
            <hr>
            <a id="logout" href="/dangnhap/logout.php">Đăng xuất</a>
        </div>
    </div>
    <?php }else{ ?>
    <div class="collapse navbar-collapse f-right" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Demo 10 điểm<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Danh mục ứng dụng
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"
                            style="color: red"></i> Trò chơi điện tử</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?findgame=edu"><i class="fas fa-book"></i> Ứng dụng học
                        tập</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?findgame=MXH"><i class="fas fa-facebook"></i>Mạng xã
                        hội</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#footer">Liên hệ</a>
            </li>
        </ul>
    </div>
    <div class="dropdown nav-item">
        <span style="color: #f9f9f9"><i class="fas fa-user"></i> Tài khoản</span>
        <div class="dropdown-content">
            <a href="dangnhap\login.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
            <hr>
            <a href="dangnhap\register.php"><i class="fas fa-user-plus"></i> Đăng ký</a>
        </div>
    </div>
    <?php } ?>

    &ensp;
    <div class="form-inline">
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="tukhoa">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
        </form>
    </div>
</nav>


<div class="pos-f-t">
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>