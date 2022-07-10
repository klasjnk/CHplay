<?php
    include "ketnoi.php";
    if(isset($_REQUEST['MSAPP']) and $_REQUEST['MSAPP']!=""){
        $MSAPP=$_GET['MSAPP'];
        $sql = "DELETE FROM `UngDung` WHERE MSAPP= '$MSAPP'";
        if ($conn->query($sql) === TRUE) {
            echo '<script language="javascript"> alert("Xóa ứng dụng thành công"); window.location="admin.php";</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>