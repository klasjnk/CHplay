<?php
    include "quanly/ketnoi.php";
    session_start();
    $mskh =   $_SESSION['mskh'];
    $select = "SELECT * FROM khachhang WHERE MSKH = '$mskh'";
    $query = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($query);

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
                <?php
        include 'verify.php';
    ?>
                <form method="POST">
                    <div class="card h-100" >
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Edit Profile</h6>
                                    <input type="text" class="form-control" id="MSKH" name="MSKH"
                                        value="<?php echo $mskh;?>" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="fullName"
                                            placeholder="Enter full name"required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="email" class="form-control" id="eMail"
                                            placeholder="Enter email ID" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="sdt" class="form-control" id="phone"
                                            placeholder="Enter phone number"required>
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street">Address</label>
                                        <input type="name" name="diachi" class="form-control"
                                            placeholder="Enter Address"required>
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <a <?php if($row['trangthai']==0) { ?> href="index.php"
                                            <?php } else{ ?>href="developer.php" <?php } ?>><button type="button"
                                                id="submit" name="submit" class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" id="submit" name="change"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    </form>
</body>

</html>