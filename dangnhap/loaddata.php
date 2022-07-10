<?php
    include 'connect.php';
    if (isset($_POST['dangky'])){      
        $ht = $_POST['hoten'];
        $tendangnhap = $_POST['username'];
        $matkhau = $_POST['password'];
        $rematkhau = $_POST['repassword'];
        $mail = $_POST['email'];
        $dt = $_POST['sdt'];
        $ns = $_POST['ns'];
        $diachi = $_POST['dc'];
        
        
        $checkusername = "select * from khachhang where Username = '$tendangnhap'";
        $thuchien = mysqli_num_rows(mysqli_query($conn, $checkusername));
        $checkemail = "select * from khachhang where email = '$mail'";
        $thuchien2 = mysqli_num_rows(mysqli_query($conn, $checkemail));
        
        $count = "select * from khachhang";
        $dem = mysqli_query($conn,$count);
        if (mysqli_num_rows($dem)<10){
            $mskh = "KH00".(string)mysqli_num_rows($dem);
        } elseif (mysqli_num_rows($dem)>=10){
            $mskh = "KH0".(string)mysqli_num_rows($dem);
        }
        if ($thuchien == true){
            echo '<script language="javascript"> alert("Tên đăng nhập đã tồn tại"); window.location = "login.php"</script>"';
        }elseif($matkhau!=$rematkhau){
            echo '<script language="javascript"> alert("Mật khẩu xác nhận không trùng khớp"); window.location="register.php";</script>';
        }elseif($thuchien2!=0){
            echo '<script language="javascript"> alert("Email đã được đăng kí"); window.location="register.php";</script>';
        }else{
            $pass=password_hash($matkhau,PASSWORD_BCRYPT);
            $insert = "insert into khachhang(MSKH,Username,Password,HoTenKH,Email,SoDienThoai,NgaySinh,DiaChi) VALUES ('$mskh','$tendangnhap','$pass','$ht','$mail','$dt','$ns','$diachi')";
            $query1 = mysqli_query($conn,$insert);
            if($query1){
                echo '<script language="javascript"> alert("Đăng ký thành công"); window.location="login.php";</script>';
            }else{
                echo '<script language="javascript"> alert("Đăng kí không thành công"); window.location="register.php";</script>';
            }
        }
    }
?>