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
    <title>Login</title>

</head>
<?php
        include "connect.php";
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
    ?>
<?php
        include 'connect.php';
        if(isset($_POST['changepass'])){
            $old_pass = $_POST['old-pass'];
            $new_pass = $_POST['new-pass'];
            $renew_pass = $_POST['renew-pass'];
            $pass=password_hash($old_pass,PASSWORD_BCRYPT);
            if (!password_verify($old_pass,$row['Password'])){
                echo '<script language="javascript"> alert("Mật khẩu không đúng! Vui lòng thử lại"); window.location="doimatkhau.php";</script>';
            }else if($new_pass!=$renew_pass){
                echo '<script language="javascript"> alert("Mật khẩu mới không khớp! Vui lòng thử lại"); window.location="doimatkhau.php";</script>';
            }else {
                $pass_new=password_hash($new_pass,PASSWORD_BCRYPT);
                $sql1 = "UPDATE khachhang SET Password='$pass_new' WHERE MSKH='$MSKH'";
                $query1 = mysqli_query($conn,$sql1);
                if($query1){
                    $trangthai=$row['trangthai'];
                    if($trangthai==2){
                        echo '<script language="javascript"> alert("Đổi mật khẩu thành công"); window.location="../quanly/admin.php";</script>';
                    }elseif($trangthai==0){
                        echo '<script language="javascript"> alert("Đổi mật khẩu thành công"); window.location="../index.php";</script>';
                    }elseif($trangthai==1){
                        echo '<script language="javascript"> alert("Đổi mật khẩu thành công"); window.location="../developer.php";</script>';
                    }
                }
            }
        }

    ?>

<body class="login">
    <form method="post" action="doimatkhau.php">
        <div class="login-form">

            <h1>Đổi mật khẩu</h1>
            <div class="login-form-content">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Nhập mật khẩu cũ" name="old-pass" id="old-pass">
            </div>
            <div class="login-form-content">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Nhập mật khẩu mới" name="new-pass" id="new-pass">
            </div>
            <div class="login-form-content">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Nhập lại mật khẩu mới" name="renew-pass" id="renew-pass">
            </div>
            <input class="btn login-btn" type="submit" name="changepass" value="Đổi mật khẩu">
            <a href="forgotpassword.php">Forgot your password !</a>
            <br>
            <a href="../index.php">Back to home</a>
        </div>
    </form>
</body>

</html>