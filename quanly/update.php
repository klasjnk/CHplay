<?php
    include "ketnoi.php";
    if(isset($_REQUEST['MSKH']) and $_REQUEST['MSKH']!=""){
        $MSKH=$_GET['MSKH'];
        $tinhtrang = $_GET['tinhtrang'];
        $sql1="UPDATE khachhang SET trangthai='$tinhtrang' Where MSKH='$MSKH'";
        $query1 = mysqli_query($conn,$sql1);
        if ($query1){
            echo '<script language="javascript"> alert("Cập nhật tình trạng thành công"); window.location="quanlykhachhang.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình cập nhật tình trạng. Vui lòng xem lại"); window.location="quanlykhachhang.php";</script>';
        }
    }
    if (isset($_POST['saveandchange'])){
        $mapp = $_SESSION['ms'];
        $ten = $_POST['tenapp'];
        $gia = $_POST['gia'];
        $mnhom = $_POST['manhom'];
        $mt = $_POST['mtapp'];
        $sql = "UPDATE UngDung SET TenAPP='$ten',Gia='$gia',MaNhom='$mnhom',MoTaAPP='$mt' WHERE MSAPP = '$mapp'";
        $query = mysqli_query($conn,$sql);
        
        if ($query){
            echo '<script language="javascript"> alert("Cập nhật sản phẩm thành công"); window.location="admin.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình cập nhật sản phẩm. Vui lòng xem lại"); window.location="editApp.php?MSAPP='.$mapp.'";</script>';
        }
    }
    if(isset($_GET['pheduyet'])){
        $MSAPP=$_GET['pheduyet'];
        $sql2="SELECT * FROM uploadapp Where MSAPP='$MSAPP'";
        $query2 = mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($query2);
        $tenapp=$row2['TenAPP'];
        $gia=$row2['Gia'];
        $mnhom =$row2['MaNhom'];
        $mt = $row2['MoTaAPP'];
        $anh =$row2['Hinh'];
        $file =$row2['file'];
        $update = "INSERT INTO ungdung(MSAPP,TenAPP,Gia,MaNhom,Hinh,MoTaAPP,file) VALUES ('$MSAPP','$tenapp','$gia','$mnhom','$anh','$mt','$file') ";
        $query3 = mysqli_query($conn,$update);
        $updatett = "UPDATE uploadapp set tinhtrangud=1 where MSAPP='$MSAPP'";
        $query4 = mysqli_query($conn,$updatett);
        if ($query3 && $query4){
            echo '<script language="javascript"> alert("Cập nhật tình trạng thành công"); window.location="pheduyetapp.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình cập nhật tình trạng. Vui lòng xem lại"); window.location="pheduyetapp.php";</script>';
        }
    }
?>