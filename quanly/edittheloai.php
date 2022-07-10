<?php
    session_start();
    include "ketnoi.php";

    if(isset($_REQUEST['edit']) and $_REQUEST['edit']!=""){
        $ms=$_GET['edit'];
        $sql = "SELECT * FROM theloai WHERE matheloai = '$ms'";
        $query = mysqli_query($conn,$sql);
        $row = $query->fetch_assoc();
        $_SESSION['ms'] = $ms;
    }
    if(isset($_POST['saveandchangetheloai'])){
        $matheloai=$_POST['matheloai'];
        $tentheloai=$_POST['tentheloai'];
        $sql = "update theloai set matheloai='$matheloai' where matheloai='$ms'  ";
        $query = mysqli_query($conn,$sql);
        $sql1 = "update theloai set tentheloai='$tentheloai' where matheloai='$ms'";
        $query1 = mysqli_query($conn,$sql1);
        if($query &&$query1){
            echo '<script language="javascript"> alert("Chỉnh sửa thành công"); window.location="quanlytheloai.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Chỉnh sửa không thành công"); window.location="quanlytheloai.php";</script>';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../style1.css">
    <link rel="icon" href="../logo2.png">
    <title>Edit Thể loại</title>
</head>

<body class="login">
    <form method="post" enctype="multipart/form-data">
        <div>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin thể loại</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                Mã thể loại:
                                <input type="text" name="matheloai" value="<?php echo $row['matheloai']; ?>">
                            </div>

                            <div class="form-group">
                                Tên thể loại:
                                <input type="text" name="tentheloai" placeholder="Tên Ứng dụng"
                                    value="<?php echo $row['tentheloai']; ?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="../quanly/quanlytheloai.php"><button type="button" class="btn login-btn btn-secondary"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" class="btn login-btn btn-primary" id="" name="saveandchangetheloai">Save &
                            Change</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>