<?php
    include "ketnoi.php";
    if(isset($_REQUEST['MSKH']) and $_REQUEST['MSKH']!=""){
        $MSKH=$_GET['MSKH'];
        $sql = "DELETE FROM `khachhang` WHERE MSKH= '$MSKH'";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript"> alert("Xóa tài khoản thành công"); window.location="quanlykhachhang.php";</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>