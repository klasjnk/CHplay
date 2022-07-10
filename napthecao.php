<?php
    include 'quanly/ketnoi.php';
    session_start();
    if (!isset($_SESSION['tenKH'])) {
        header("Location: ./dangnhap/login.php");
        die();  
    }
    $MSKH=$_SESSION['mskh'];
    $sl="select * from khachhang where MSKH='$MSKH'";
    $csl=mysqli_query($conn,$sl);
    $row=mysqli_fetch_array($csl);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="logo3.png">
    <link rel="stylesheet" href="style.css">
    <title>Nạp Thẻ</title>

</head>
<?php
        if(isset($_POST['napthe'])){
            $soseri = $_POST['soseri'];
            $mathe = $_POST['mathe'];
            $loaithe=$_POST['loaithe'];
            foreach($loaithe as $loaithe1){
                $mang= $loaithe1;
            }
            $sql = "SELECT * from thenap where  MSSeri='$soseri' and MSThe='$mathe' and Loaithe='$mang'";
            $query = mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)!=0){
                $tienz=mysqli_fetch_array($query);
                $tien=$tienz['Sotien'];
                $sql1="UPDATE khachhang SET SoDu=SoDu +'$tien' Where MSKH='$MSKH'";
                $query1 = mysqli_query($conn,$sql1);
                $date= getdate();
                $datetime= $date['mday'].'-'.$date['mon'].'-'.$date['year'].'  '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
                $select = "SELECT * from lichsunap";
                $qSelect = mysqli_query($conn,$select);
                
                
                
                if (mysqli_num_rows($qSelect)==0){
                    $msls = "LSN000";
                } else{
                    $sl="SELECT * from lichsunap order by msls desc limit 1";
                    $csl=mysqli_query($conn,$sl);
                    if( $csl){
                        $a=mysqli_fetch_array($csl);
                        $len=strlen($a['msls'])-3;
                        $b=substr($a['msls'],$len,strlen($a['msls']));
                        $dodai=(int)$b+1;
                        if($dodai<10){
                            $msls="LSN00".(string)$dodai;
                        }
                        else{
                            $msls="LSN0".(string)$dodai;
                        }
                    }
                }


                if ($query1 && $tien!=''){
                    $lichsu="INSERT into lichsunap values('$msls','$MSKH','$mathe','$tien','$mang','$datetime')";
                    $complete=mysqli_query($conn,$lichsu);
                    echo '<script language="javascript"> alert("Bạn đã nạp '.$tien.'$ vào tài khoản"); window.location="index.php";</script>';
                    $sql2 = "DELETE FROM thenap WHERE  MSSeri='$soseri' and MSThe='$mathe' and Loaithe='$mang'";
                    mysqli_query($conn,$sql2);  
                }else{
                    echo '<script language="javascript"> alert("Lỗi trong quá trình nạp thẻ111. Vui lòng xem lại")</script>';
                }
            }else{
                echo '<script language="javascript"> alert("Lỗi trong quá trình nạp thẻ. Vui lòng xem lại")</script>';
            }
            
        }
    ?>

<body class="login">
    <div class="container">

        <form method="post">
            <div class="login-form">
                <h1>Nạp tiền</h1>
                <div class="login-form-content">
                    <i class="fas fa-credit-card" aria-hidden="true"></i>
                    <input type="text" placeholder="Số seri" name="soseri" id="soseri">
                </div>
                <div class="login-form-content">
                    <i class="fas fa-credit-card" aria-hidden="true"></i>
                    <input type="text" placeholder="Mã thẻ" name="mathe" id="mathe">
                </div>


                <select  class="login-form-content loaithe" name="loaithe[]" id="">
                    <option name=loaithe[] value="mobi">Mobiphone</option>
                    <option name=loaithe[] value="viettel">Viettel</option>
                    <option name=loaithe[] value="vina">Vinaphone</option>
                </select>

                <button class="login-btn" type="submit" name="napthe" value="Đăng nhập">Nạp thẻ</button>
                <a <?php if($row['trangthai']==0) { ?> href="index.php" <?php } else{ ?>href="developer.php"
                    <?php } ?>>Back to home</a>

            </div>
        </form>
    </div>
</body>

</html>