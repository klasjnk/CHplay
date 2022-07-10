<?php
    session_start();
    include "quanly/ketnoi.php";

    if(isset($_REQUEST['edit']) and $_REQUEST['edit']!=""){
        $ms=$_GET['edit'];
        $sql = "SELECT * FROM uploadapp WHERE MSAPP = '$ms'";
        $query = mysqli_query($conn,$sql);
        $row = $query->fetch_assoc();
        $_SESSION['ms'] = $ms;
    }
    if (isset($_POST['change'])){
        $mapp = $_SESSION['ms'];
        $ten = $_POST['tenapp'];
        $gia = $_POST['gia'];
        $mnhom = $_POST['manhom'];
        $anh = $_FILES['hinh']['name'];
        $mt = $_POST['mtapp'];
        $sql = "UPDATE uploadapp SET TenAPP='$ten',Gia='$gia',MaNhom='$mnhom',MoTaAPP='$mt' ,hinh='$anh' WHERE MSAPP = '$mapp'";
        $query = mysqli_query($conn,$sql);
        
        if ($query){
            echo '<script language="javascript"> alert("Cập nhật ứng dụng thành công"); window.location="manageapp.php";</script>';
        }else{
            echo '<script language="javascript"> alert("Lỗi trong quá trình cập nhật sản phẩm. Vui lòng xem lại"); window.location="editappdeveloper.php?edit='.$mapp.'.";</script>';
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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../logo3.png">
    <title>Edit App</title>
</head>

<body class="login">
    <form method="post" enctype="multipart/form-data">
        <div>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin ứng dụng</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                Mã Ứng Dụng:
                                <input type="text" name="mapp" id="mapp" value="<?php echo $row['MSAPP']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                Tên Ứng Dụng:
                                <input type="text" name="tenapp" id="tenapp" placeholder="Tên Ứng dụng"
                                    value="<?php echo $row['TenAPP']; ?>">
                            </div>

                            <div class="form-group">
                                Giá:
                                <input type="text" name="gia" id="gia" value="<?php echo $row['Gia']; ?>">
                            </div>

                            <div class="form-group">
                                Mã Nhóm Ứng Dụng:
                                <input type="text" name="manhom" id="manhom" value="<?php echo $row['MaNhom']; ?>">
                            </div>

                            <div class="form-group">
                                Hình ảnh:
                                <input type="file" name="hinh" id="hinh">
                                <img class="editappdeveloper" src="images/<?php echo $row['Hinh']; ?>" >
                            </div>

                            <div class="form-group">
                                Mô tả ứng dụng:
                                <textarea class="form-control" name="mtapp" id="motahh"
                                    value="<?php echo $row['MoTaAPP']; ?>"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="manageapp.php"><button type="button" class="btn login-btn btn-secondary"
                                data-dismiss="modal">Cancel</button></a>
                        <button type="submit" class="btn login-btn btn-primary" id="" name="change">Save &
                            Change</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>