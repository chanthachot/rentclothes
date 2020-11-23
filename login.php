<!DOCTYPE html>
<html lang="en">
<?php session_start();
error_reporting(error_reporting() & ~E_NOTICE);
if ($_SESSION["UserID"]) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}

?>

<head>
    <?php include('header.php'); ?>
</head>

<body>
    <?php include('navbar.php'); ?>

    <style type="text/css">
        #btn {
            width: 100%;
        }

        #signup {}
    </style>
    <div class="container" style="padding-top:100px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="background-color:#FFFFFF">
                <h3 align="center">
                    </br>
                    <span class="glyphicon glyphicon-lock"> </span>
                    เข้าสู่ระบบ</h3>
                </br>
                <form name="formlogin" action="login_a.php" method="POST" id="login" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="username" class="form-control" required placeholder="ชื่อผู้ใช้" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" required placeholder="รหัสผ่าน" />
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="btn">เข้าสู่ระบบ </button>
                            <br> <br>
                            <div class="signup" align="right">
                                ยังไม่มีบัญชี ? <a href="signup.php">สมัครสมาชิก</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>