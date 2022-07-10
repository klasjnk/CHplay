<?php
    include "quanly/ketnoi.php";
    session_start();
    $mskh =   $_SESSION['mskh'];
    $select = "SELECT * FROM khachhang WHERE MSKH = '$mskh'";
    $query = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($query);
    $trangthai=$row['trangthai'];
    if(isset($_POST['upgrade'])){
        if($row['SoDu']>=500){

            $upgrade="UPDATE khachhang set trangthai=1 where MSKH='$mskh'";
            $upgrade1="UPDATE khachhang set SoDu=SoDu-500 where MSKH='$mskh'";
            $query1 = mysqli_query($conn,$upgrade);
            $query12 = mysqli_query($conn,$upgrade1);
            if($query1 && $query12){
                echo '<script language="javascript"> alert("Nâng cấp thành công . Đang đăng xuất");window.location="Dangnhap/logout.php";</script>';
            }else{
                echo '<script language="javascript"> alert("Nâng cấp không thành công .");window.location="upgrade.php";</script>';
            }

        }else{
            echo '<script language="javascript"> alert("Số dư không khả dụng. Vui lòng kiểm tra lại");window.location="upgrade.php";</script>';
        }
    }

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo3.png">
    <title>Google Play</title>

</head>
<?php if( $trangthai==0){ ?>

<body class="profile">
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name"><?= $row['HoTenKH']; ?></h5>
                                <h6 class="user-email"><?=$row['Email'];?></h6>
                            </div>
                            <div class="about">
                                <h5>About</h5>
                                <p> Số điện thoại: <?= $row['SoDienThoai']; ?> </p>
                                <p> Địa chỉ: <?= $row['DiaChi']; ?> </p>
                                <p>Trạng thái: <?php if($row['trangthai']==0){?>Khách hàng<?php } else{ ?>Developer
                                    <?php } ?></p>
                                <p> Số dư: <?= $row['SoDu']; ?>$ </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

                <form method="POST">
                    <div class="card h-100">
                        <div class="card-body" >
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Điều khoản</h6>
                                    <input id="MSKH1" type="text" class="form-control" id="MSKH" name="MSKH"
                                        value="<?php echo $mskh;?>">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group" class="updvl">
                                        <ul>
                                            <li>
                                                <p> Chịu trách nhiệm pháp lí với ứng dụng mà mình đăng tải.</p>
                                            </li>
                                            <li>
                                                <p> Không được phép vi phạm bản quyền ứng dụng.</p>
                                            </li>
                                            <li>
                                                <p> Khi sao chép sản phẩm của người khác hoặc lừa dối người dùng, nhà
                                                    phát triển sẽ gây tổn hại cho người dùng và cộng đồng nhà phát
                                                    triển. Bạn không được sử dụng sản phẩm của người khác theo cách gây
                                                    nhầm lẫn hoặc không công bằng.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <ul>
                                            <li>
                                                <p> Trước khi gửi một ứng dụng cho Google Play, hãy đảm bảo ứng dụng này
                                                    tuân thủ các chính sách nội dung và các luật địa phương.</p>
                                            </li>
                                            <li>
                                                <p> Trước khi gửi một ứng dụng dành cho trẻ em đến Cửa hàng Google Play,
                                                    bạn có trách nhiệm đảm bảo ứng dụng của mình phù hợp với trẻ em và
                                                    tuân thủ tất cả các luật liên quan.</p>
                                            </li>

                                        </ul>
                                    </div>
                                </div>


                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Chi phí nâng cấp</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <h3> 500$ </h3>

                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a href="index.php"><button type="button" id="submit" name="submit"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" id="submit" name="upgrade"
                                            class="btn btn-primary">Upgrade</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php }else{
            if($trangthai==1){
                echo '<script language="javascript"> alert("Bạn đã là nhà phát triển"); window.location="developer.php";</script>'; 
            }
            
        } ?>

</html>