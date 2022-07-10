<?php
    session_start();
    include "quanly/ketnoi.php";
    if(isset($_REQUEST['MSAPP']) && $_REQUEST['MSAPP']!=""){
        $msapp = $_GET['MSAPP'];
        $sql = "SELECT * FROM ungdung WHERE MSAPP ='$msapp' ";
        $query = mysqli_query($conn,$sql);
        $row= mysqli_fetch_array($query);

    }
    if (isset($_SESSION['tenKH'])){
        $MSKH=$_SESSION['mskh'];
        $sql1 = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
        $query1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_array($query1);
        $trangthai=$row1['trangthai'];
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title><?php echo $row['TenAPP']; ?></title>
</head>

<body class="ctud">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="index.php"><img src="logo3.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if(isset($_SESSION['tenKH'])){ if($trangthai==1){?>
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
                        <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"></i> Trò chơi
                            điện tử</a>
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
                        <a class="dropdown-item" href="developer.php?findgame=KH000"><i class="fas fa-gamepad"></i>
                            Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH001"><i class="fas fa-gamepad"></i>
                            Khanh Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH002"><i class="fas fa-gamepad"></i> Nhật
                            Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="developer.php?findgame=KH003"><i class="fas fa-gamepad"></i> Bảo
                            Lê</a>
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
            <span class="sodu">Số dư : <?php echo $row1['SoDu']; ?>$</span>
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

        <?php }elseif($trangthai==0){?>
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
                        <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"></i>Trò chơi
                            điện tử</a>
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
                        <a class="dropdown-item" href="index.php?findgame=KH000"><i class="fas fa-user"></i>
                            Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH001"><i class="fas fa-user"></i> Khanh
                            Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH002"><i class="fas fa-user"></i> Nhật
                            Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH003"><i class="fas fa-user"></i> Bảo Lê</a>
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
            <span class="sodu">Số dư: <?php echo $row1['SoDu']; ?>$</span>
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
            </div>

        </div> <?php } }else{ ?>

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
                        <a class="dropdown-item" href="index.php?findgame=game"><i class="fas fa-gamepad"></i> Trò chơi
                            điện tử</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=book"><i class="fas fa-book"></i> Sách</a>
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
                        <a class="dropdown-item" href="index.php?findgame=KH000"><i class="fas fa-user"></i>
                            Administrator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH001"><i class="fas fa-user"></i> Khanh
                            Huỳnh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH002"><i class="fas fa-user"></i> Nhật
                            Linh</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?findgame=KH003"><i class="fas fa-user"></i> Bảo Lê</a>
                        <div class="dropdown-divider"></div>


                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#footer">Liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="dropdown nav-item">
            <span><i class="fas fa-user"></i> Tài khoản</span>
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

    <br>
    <br>
    <br>
    <br>

    <div>
        <div class="contact-box-main">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">

                        <div class="contact-form-right">
                            <h2>Gửi đánh giá cho chúng tôi</h2>
                            <?php
                            include 'contact.php';
                        ?>
                            <form id="contactForm" method="POST">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="ctud-msapp" type="text" class="form-control" id="MSAPP"
                                                name="MSAPP" value="<?php echo $msapp;?>">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Email" id="email" class="form-control"
                                                name="email" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="rating">
                                                <input type="radio" id="star5" name="rating[]" value="1" /> 1 Star
                                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                                <input type="radio" id="star4" name="rating[]" value="2" /> 2 Star
                                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                                <input type="radio" id="star3" name="rating[]" value="3" /> 3 Star
                                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                                <input type="radio" id="star2" name="rating[]" value="4" /> 4 Star
                                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                                <input type="radio" id="star1" name="rating[]" value="5" /> 5 Star
                                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="text" class="form-control" id="message"
                                                placeholder="Your Message" rows="4" data-error="Write your message"
                                                required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button text-center">
                                            <button class="btn hvr-hover" id="comment" name="comment" type="submit">Send
                                                Message</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="comment-field">

                            <h2> Bình luận </h2>
                            <ul class="list-group list-group-flush">
                                <?php
                            $comments_query = "SELECT * from comment where msud='$msapp' order by mscmt desc limit 4";
                            $comments_data = mysqli_query($conn,$comments_query);
                            
                                while ($comment=mysqli_fetch_array($comments_data)) {
                                    ?>

                                <li class="list-group-item">
                                    <div class="row comment-item">
                                        <div class="col-2">
                                            <img class="comment-img" src="images/lol.png">
                                        </div>
                                        <div class="col-10">

                                            <p class="comment-content">
                                                <strong><?= $comment["name"] ?></strong>
                                            </p>
                                            <div>

                                                <?php for($i=0;$i<$comment['star'];$i++) {?>
                                                <span class="fa fa-star checked"></span>
                                                <?php } ?>
                                                <?php for($i=0;$i<5-$comment['star'];$i++) {?>
                                                <span class="fa fa-star"></span>
                                                <?php } ?>
                                            </div>
                                            <p class="comment-time"><?= $comment["text"] ?></p>
                                            <h6 class="date">
                                                <?= $comment["ngaycmt"] ?>
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                }
                            
                            //                            ?>
                            </ul>
                        </div>


                    </div>
                    <div class="col-lg-6 col-sm-12 ctud-app">
                        <div class="mu-header-featured-img">
                            <img class="ctud-img" src="images/<?php echo $row['Hinh']; ?>" alt="">
                        </div>
                        <h1><span><?php echo $row['TenAPP'] ?></span></h1>
                        <p><?php echo $row['MoTaAPP'] ?></p>
                        <strong>
                            <p>Lượt download: <?php echo $row['luottai'] ?></p>
                        </strong>
                        <h4>Nhà phát triển: <?php echo $row['nhaphattrien'] ?></h4>
                        <div class="star">
                            <h2>Đánh giá</h2>
                            <?php for($i=0;$i<$row['star'];$i++) {?>
                            <span class="fa fa-star checked"></span>
                            <?php } ?>
                            <?php for($i=0;$i<5-$row['star'];$i++) {?>
                            <span class="fa fa-star"></span>
                            <?php } ?>
                        </div>
                        <h3 class="money">Price: <?php echo number_format($row['Gia'],0,".",",");   ?>$ </h3>

                        <div class="mu-app-download-area">


                            <button type="button" onclick="downloadapp()" class="mu-apple-btn dl"
                                id="">Download</button>
                            <?php
                                if(isset($_SESSION['mskh'])){
                                    if($row1['trangthai']==0){
                                        echo '<a href="index.php"><button class="mu-google-btn"><i class="fa fa-android"></i>Cancel</button></a>';
                                    }elseif($row1['trangthai']==1){
                                        echo '<a href="developer.php"><button class="mu-google-btn"><i class="fa fa-android"></i>Cancel</button></a>';
                                    }
                                }else{
                                    echo '<a href="index.php"><button class="mu-google-btn"><i class="fa fa-android"></i>Cancel</button></a>';
                                }
                            ?>

                        </div>
                        <script type="text/javascript">
                        function downloadapp() {

                            var txt;
                            var r = confirm(
                                "Bạn có chắc muốn tải ứng dụng ?"
                            );
                            if (r == true) {
                                window.location =
                                    "download.php?file=<?php echo $row['file']; ?>&&MSAPP=<?php echo $row['MSAPP']; ?>";
                            }


                        }
                        </script>


                    </div>
                </div>
            </div>
            <div>
                <?php 
       $manhom=$_GET['loai'];
       $game = "SELECT * FROM ungdung  WHERE MaNhom='$manhom' LIMIT 4";
        

        $qgame = mysqli_query($conn,$game);
        
        ?>
                <nav class="navbar navbar-light bg-light">
                    <div class="nav-item dropdown a-left f-left">
                        <a class="navbar-brand">
                            <h2>Cùng thể loại</h2>
                        </a>
                    </div>

                </nav>
                <div class="row row-cols-1 row-cols-md-4">
                    <?php while ($rgame = mysqli_fetch_array($qgame)){ ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <a
                                href="chitietungdung.php?MSAPP=<?php echo $rgame['MSAPP']; ?>&&loai=<?php echo $rgame['MaNhom']; ?>&&npt=<?php echo $rgame['nhaphattrien']; ?>">
                                <img class="card-img-top" src="images\<?php echo $rgame['Hinh']; ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-text"><?php echo $rgame['TenAPP']; ?></h5>
                                <div>
                                    <?php
                                        $maapp=$rgame['MSAPP'];
                                         $star = "SELECT star from ungdung where MSAPP='$maapp'";
                                        $rating1=mysqli_query($conn,$star);
                                        ?>
                                    <h6>Đánh giá</h6>
                                    <?php
                                        $rating=mysqli_fetch_array($rating1);
                                        for($i=0;$i<(int)$rating[0];$i++) {?>
                                    <span class="fa fa-star checked"></span>
                                    <?php } ?>
                                    <?php for($i=0;$i<5-(int)$rating[0];$i++) {?>
                                    <span class="fa fa-star"></span>
                                    <?php } ?>
                                </div>
                                <div>


                                    <?php if (isset($_SESSION['tenKH'])){
                                        $MSKH=$_SESSION['mskh'];
                                        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
                                        $query = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_array($query);
                                        $ls="SELECT * from lichsudownload where username ='$MSKH' and msapp='$maapp'";
                                        $thuchien = mysqli_query($conn,$ls); 
                                        $d=mysqli_num_rows($thuchien);
                                        $t='Downloaded';
                                    ?>
                                    <h3 class="card-text money"><?php
                                        if($d!=0){echo $t;} else{  echo number_format($rgame['Gia'],0,".",",").'$';} 
                                        ?>
                                    </h3>

                                    <?php }else{?>
                                    <h3 class="card-text money"><?php
                                        echo number_format($rgame['Gia'],0,".",",").'$';} 
                                        ?>
                                    </h3>



                                    <a
                                        href="chitietungdung.php?MSAPP=<?php echo $rgame['MSAPP']; ?>&&loai=<?php echo $rgame['MaNhom']; ?>&&npt=<?php echo $rgame['nhaphattrien']; ?>">
                                        <button class="btn-app like btn btn-default" title="Download" type="submit">
                                            Download
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php 
       $npt=$_GET['npt'];
       $game1 = "SELECT * FROM ungdung WHERE   nhaphattrien='$npt' LIMIT 4";
        

        $qgame1 = mysqli_query($conn,$game1);
        
        ?>
            <nav class="navbar navbar-light bg-light">
                <div class="nav-item dropdown a-left f-left">
                    <a class="navbar-brand">
                        <h2>Cùng nhà phát triển</h2>
                    </a>
                </div>

            </nav>
            <div class="row row-cols-1 row-cols-md-4">
                <?php while ($rgame1 = mysqli_fetch_array($qgame1)){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <a
                            href="chitietungdung.php?MSAPP=<?php echo $rgame1['MSAPP']; ?>&&loai=<?php echo $rgame1['MaNhom']; ?>&&npt=<?php echo $rgame1['nhaphattrien']; ?>">
                            <img class="card-img-top" src="images\<?php echo $rgame1['Hinh']; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-text"><?php echo $rgame1['TenAPP']; ?></h5>
                            <div>
                                <?php
                                        $maapp=$rgame1['MSAPP'];
                                         $star = "SELECT star from ungdung where MSAPP='$maapp'";
                                        $rating1=mysqli_query($conn,$star);
                                        ?>
                                <h6>Đánh giá</h6>
                                <?php
                                        $rating=mysqli_fetch_array($rating1);
                                        for($i=0;$i<(int)$rating[0];$i++) {?>
                                <span class="fa fa-star checked"></span>
                                <?php } ?>
                                <?php for($i=0;$i<5-(int)$rating[0];$i++) {?>
                                <span class="fa fa-star"></span>
                                <?php } ?>
                            </div>
                            <div>





                                <?php if (isset($_SESSION['tenKH'])){
                                        $MSKH=$_SESSION['mskh'];
                                        $sql = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
                                        $query = mysqli_query($conn,$sql);
                                        $row = mysqli_fetch_array($query);
                                        $ls="SELECT * from lichsudownload where username ='$MSKH' and msapp='$maapp'";
                                        $thuchien = mysqli_query($conn,$ls); 
                                        $d=mysqli_num_rows($thuchien);
                                        $t='Downloaded';
                                    ?>
                                <h3 class="card-text money"><?php
                                        if($d!=0){echo $t;} else{  echo number_format($rgame1['Gia'],0,".",",").'$';} 
                                        ?>
                                </h3>

                                <?php }else{?>
                                <h4 class="card-text money"><?php
                                        echo number_format($rgame1['Gia'],0,".",",").'$';} 
                                        ?>
                                </h4>
                                    <a
                                        href="chitietungdung.php?MSAPP=<?php echo $rgame1['MSAPP']; ?>&&loai=<?php echo $rgame1['MaNhom']; ?>&&npt=<?php echo $rgame1['nhaphattrien']; ?>">
                                        <button class="btn-app like btn btn-default" title="Download" type="submit">
                                            Download
                                        </button>
                                    </a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

</body>

</html>