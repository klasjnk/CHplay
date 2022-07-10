<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Create new Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../style.css">
</head>
<?php
        include 'connect.php';
    ?>

<body class="register">
    <form method="post" action="loaddata.php" enctype="multipart/form-data">
        <div class="register-form">
            <h1 id="h1">Đăng ký tài khoản</h1>
            <br>
            <div class="register-form-content">
                <input type="text" placeholder="Họ và tên" name="hoten" id="hoten" required>
            </div>
            <div class="register-form-content">
                <input type="text" placeholder="Tên đăng nhập" name="username" id="username" required>
            </div>
            <div class="register-form-content">
                <input type="password" placeholder="Mật khẩu" name="password" id="password" required>
            </div>
            <div class="register-form-content">
                <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" id="repassword" required>
            </div>
            <div class="register-form-content">
                <input type="email" placeholder="Email" name="email" id="email" required>
            </div>
            <div class="register-form-content">
                <input type="text" placeholder="Số điện thoại" name="sdt" id="sdt" required>
            </div>
            <div class="register-form-content">
                <input type="date" placeholder="Ngày sinh" name="ns" id="ns" required>
            </div>
            <div class="register-form-content">
                <input type="text" placeholder="Địa chỉ" name="dc" id="dc" required>
            </div>
            <input class="login-btn" type="submit" name="dangky" value="Đăng ký">
            <a href="login.php">Đăng nhập</a><br>
            <a href="../index.php">Back to home</a>
        </div>
    </form>
</body>

</html>