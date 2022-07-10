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
    <title>Login</title>

</head>
<?php
        session_start();
        include 'connect.php';
        if (isset($_SESSION['tenKH'])) {
            $MSKH=$_SESSION['mskh'];
            $check = "SELECT * FROM khachhang WHERE MSKH='$MSKH'";
            $query1 = mysqli_query($conn,$check);
            $row1 = $query1->fetch_assoc();
            if($row1['trangthai']==1){
                echo '<script language="javascript"> window.location="../developer.php";</script>';
            }elseif($row1['trangthai']==0){
                echo '<script language="javascript">  window.location="../index.php";</script>';
            }elseif($row1['trangthai']==2){
                echo '<script language="javascript">  window.location="../quanly/admin.php";</script>';
            }
        }
    ?>
<?php
        if(isset($_POST['dangnhap'])){
            $tendangnhap = $_POST['username'];
            $matkhau = $_POST['password'];
            $sql = "SELECT * FROM khachhang WHERE Username='$tendangnhap'";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)!=0){
                $row = $query->fetch_assoc();
                $password1=$row['Password'];
            
                if (password_verify($matkhau, $password1)){
                    

                    $_SESSION['tenKH'] = $row["HoTenKH"];
                    $_SESSION['mskh'] = $row["MSKH"];
                    $trangthai=$row["trangthai"];

                    if ($tendangnhap == "admin" && $trangthai==2){
                        header("Location:../quanly/admin.php");
                    }else if($trangthai==1){
                        header("Location:../developer.php");
                    }else if($trangthai==0){
                        header("Location:../index.php");
                    }else if($trangthai==-1){
                        echo '<script language="javascript"> alert("Tài khoản đã bị vô hiệu hóa! Vui lòng kiểm tra lại"); window.location="login.php";</script>';
                    }else{
                        echo '<script language="javascript"> alert("Tài khoản hoặc mật khẩu không đúng! Vui lòng thử lại"); window.location="login.php";</script>';
                    }

                }else{
                    echo '<script language="javascript"> alert("Tài khoản hoặc mật khẩu không đúng! Vui lòng thử lại"); window.location="login.php";</script>';
                }
            }
            
        }
    ?>

<body class="login">
    <form method="post" action="login.php">
        <div class="login-form">

            <h1>Đăng nhập</h1>
            <div class="login-form-content">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Tên người dùng" name="username" id="username">
            </div>
            <div class="login-form-content">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Mật khẩu" name="password" id="password">
            </div>
            <input class="login-btn" type="submit" name="dangnhap" value="Đăng nhập">
            <a href="../forgotpass.php"><input class="login-btn" type="button" name="dangnhap"
                    value="Fogot password"></a>
            <a href="register.php">Create new account</a>
            <br>
            <a href="../index.php">Back to home</a>
        </div>
    </form>
</body>

</html>