<?php
    include 'ketnoi.php';

    if (isset($_POST['addapp'])){
        $ten = $_POST['tenapp'];
        $gia = $_POST['gia'];
        $mnhom = $_POST['manhom'];
        $mt = $_POST['mtapp'];

        $select = "SELECT * FROM `UngDung` WHERE MaNhom = '$mnhom'";
        $qSelect = mysqli_query($conn,$select);
        $count = mysqli_num_rows($qSelect);
        
        
        if (mysqli_num_rows($qSelect)==0){
            $mapp = $mnhom."000";
        } else{
            $sl="SELECT * from ungdung where MaNhom='$mnhom' order by MSAPP desc limit 1";
            $csl=mysqli_query($conn,$sl);
            $a=mysqli_fetch_array($csl);
            $len=strlen($a['MSAPP'])-3;
            $b=substr($a['MSAPP'],$len,strlen($a['MSAPP']));
            $dodai=(int)$b+1;
            if($dodai<10){
                $mapp=$mnhom."00".(string)$dodai;
            }
            else{
                $mapp=$mnhom."0".(string)$dodai;
            }
        }
        
        $anh = $_FILES['hinh']['name'];
        $target_dir = "../images/";
        $target_dir1 = "../files/";
        $tmp_name = $_FILES['hinh']['tmp_name'];
        $tmp_name1 = $_FILES['file']['tmp_name'];

        $file=$_FILES['file']['name'];
        move_uploaded_file($tmp_name,$target_dir.$anh);
        move_uploaded_file($tmp_name1,$target_dir1.$file);

        $sql = "INSERT INTO UngDung(MSAPP,TenAPP,Gia,MaNhom,Hinh,MoTaAPP,file) VALUES ('$mapp','$ten','$gia','$mnhom','$anh','$mt','$file') ";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo '<script language="javascript"> alert("Thêm ứng dụng công"); window.location="admin.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình thêm ứng dụng. Vui lòng xem lại"); window.location="admin.php";</script>';
        }
    }
?>