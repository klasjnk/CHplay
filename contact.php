<?php
           require_once('dangnhap/connect.php');
            if (isset($_POST['comment'])){      
                $email = $_POST['email'];
                $name = $_POST['name'];
                $star = $_POST['rating'];
                $text = $_POST['text'];
                $MSAPP=$_POST['MSAPP'];
                foreach($star as $star1){
                    $rating= $star1;
                }
                $select = "SELECT * from comment";
                $qSelect = mysqli_query($conn,$select);
                $count = mysqli_num_rows($qSelect);
                
                
                if (mysqli_num_rows($qSelect)==0){
                    $mscmt = "CMT000";
                } else{
                    $sl="SELECT * from comment order by mscmt desc limit 1";
                    $csl=mysqli_query($conn,$sl);
                    $a=mysqli_fetch_array($csl);
                    $len=strlen($a['mscmt'])-3;
                    $b=substr($a['mscmt'],$len,strlen($a['mscmt']));
                    $dodai=(int)$b+1;
                    if($dodai<10){
                        $mscmt="CMT00".(string)$dodai;
                    }
                    else{
                        $mscmt="CMT0".(string)$dodai;
                    }
                }





                $date= getdate();
                $datetime= $date['mday'].'-'.$date['mon'].'-'.$date['year'].'  '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
                $comment = "INSERT into comment values ('$MSAPP','$email','$name','$rating','$text','$mscmt','$datetime')";
                $thuchien = mysqli_query($conn, $comment);
                if($thuchien){
                    $star = "SELECT avg(star) from comment where msud='$MSAPP'";
                    $rating1=mysqli_query($conn,$star);
                    $rating2=mysqli_fetch_array($rating1);
                    $update="UPDATE ungdung set star='$rating2[0]' where MSAPP='$MSAPP'";
                    mysqli_query($conn,$update);
                    $sl="SELECT * from ungdung where MSAPP='$MSAPP'";
                    $app=mysqli_fetch_array(mysqli_query($conn,$sl));
                    $npt=$app['nhaphattrien'];
                    $loai=$app['MaNhom'];

                    echo '<script language="javascript"> alert("Bình luận thành công");window.location="chitietungdung.php?MSAPP='.$MSAPP.'&&npt='.$npt.'&&loai='.$loai.'";</script>';
                }
                else{echo '<script language="javascript"> alert("Bình luận không thành công")</script>';}
            
                
            }
?>