<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(error_reporting() & ~E_NOTICE);
$success = $_GET['success'];
$orderno = $_GET['orderno'];

if ($success != '') {
?>



    <head>
        <?php include('header.php'); ?>



    </head>

    <body>

        <?php include('navbar.php'); ?>
        <div class="container" style="padding-top:50px">
            <div class="row">
                <div class="col-sm-12" style="background-color:#FFFFFF">
                    <div class="alert alert-success" role="alert" style="margin:15px;">
                        <p><strong>ทำรายการเช่าชุด <?php echo $success ?> สำเร็จ!</strong></p>
                        <p>หมายเลขเช่าของคุณคือ <strong><?php echo $orderno ?></p></strong>
                        โปรดนำหมายเลขนี้ไปติดต่อที่ร้านและแจ้งชื่อให้กับพนักงานค่ะ
                    <p></p>
                        <p>กรุณามารับชุดก่อนวันที่เช่า 3 วัน ไม่เช่นนั้นทางร้านขออนุญาตยกเลิก Order ค่ะ</P>

                        <p>หากต้องการกลับหน้าแรก
                            <a href="index.php" class="alert-link">คลิกที่นี่</a></p>
                    </div>
                </div>
            </div>




            <?php include('footer.php'); ?>

        <?php

    } else {
        echo "<script>";
        echo "window.location ='index.php'; ";
        echo "</script>";
    }
        ?>
    </body>

</html>