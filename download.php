<?php

// phải đăng nhập mới được tải file
    require_once('quanly/ketnoi.php');
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ./dangnhap/login.php");
        die();  
    } // kết thúc kiểm tra đăng nhập
    $name = $_GET['file'];
    $msapp=$_GET['MSAPP'];
    $mskh=$_SESSION['mskh'];
    $sql="SELECT * FROM khachhang WHERE MSKH='$mskh'";
    $query = mysqli_query($conn,$sql);
    $sql1="SELECT *FROM ungdung WHERE  MSAPP='$msapp' and file='$name'";
    $query1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($query);
    $row1 = mysqli_fetch_array($query1);
    $mapp=$row1['MSAPP'];
    $loai=$row1['MaNhom'];
    $npt=$row1['nhaphattrien'];
    $tien=$row['SoDu'];
    $gia=$row1['Gia'];

    $count = "SELECT * from lichsudownload";
    $dem = mysqli_query($conn,$count);
    if (mysqli_num_rows($dem)<10){
        $msls = "LSD00".(string)mysqli_num_rows($dem);
    } elseif (mysqli_num_rows($dem)>=10){
        $msls = "LSD0".(string)mysqli_num_rows($dem);
    }
    $check="SELECT msapp from lichsudownload where username='$mskh' and msapp='$msapp'";
    $connectcheck=mysqli_query($conn,$check);
    $checkdownload=mysqli_fetch_array($connectcheck);
    
    if($checkdownload!=0){
        $fileDir = __DIR__ . '/files/'; // thư mục nơi các file đang được lưu
                $filePath = $fileDir . $name;
            
                if (!file_exists($filePath)) {
                    die('Tập tin không tồn tại');
                }
            
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));
                flush(); // Flush system output buffer
                readfile($filePath);
                die();
    }
    elseif((string)$tien>=(string)$gia){
        if (empty($_GET['file'])) {
            die('Vui lòng cung cấp tên tập tin');
        }else{
            
            $updatetien="UPDATE khachhang set SoDu=SoDu-'$gia' WHERE MSKH='$mskh'";
            $taigame=mysqli_query($conn,$updatetien);
            $ls="INSERT into lichsudownload values('$msls','$mskh','$msapp')";
            $lsdownload=mysqli_query($conn,$ls);

            $luottai="SELECT * from lichsudownload where msapp='$msapp'";
            $cluottai=mysqli_query($conn,$luottai);
            $countluottai=mysqli_num_rows($cluottai);
            $tainhieu="UPDATE ungdung set luottai='$countluottai' where MSAPP='$msapp'";
            $ctainhieu=mysqli_query($conn,$tainhieu);
            if($taigame){
                $fileDir = __DIR__ . '/files/'; // thư mục nơi các file đang được lưu
                $filePath = $fileDir . $name;
            
                if (!file_exists($filePath)) {
                    die('Tập tin không tồn tại');
                }
            
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));
                flush(); // Flush system output buffer
                readfile($filePath);
                
                die();
                
            }
        
        
        }
    }else{
        $trangthai=$row['trangthai'];
        if($trangthai==1){
            echo '<script language="javascript"> alert("Số dư không khả dụng");window.location="developer.php";</script>';
        }elseif($trangthai==0){
            echo '<script language="javascript"> alert("Số dư không khả dụng");window.location="index.php";</script>';
        }
    }
    
?>