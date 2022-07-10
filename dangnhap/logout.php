<?php
    session_start();
    include "connect.php";
    if(isset($_SESSION['tenKH'])){
        unset($_SESSION['tenKH']);

    }
    if (isset($_SESSION['mskh'])){
        unset($_SESSION['mskh']);
    }
    $delCart = "DELETE FROM giohang";
    $qDEL = mysqli_query($conn,$delCart);
    header("Location: ../index.php");
?>