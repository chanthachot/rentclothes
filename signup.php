<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(error_reporting() & ~E_NOTICE);

$doc = new DOMDocument();
$doc->load('backend/db/rents.xml');
$users = $doc->getElementsByTagName('user');
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
    </style>
    <div class="container" style="padding-top:100px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="background-color:#FFFFFF">
                <h3 align="center">
                    </br>
                    <span class="glyphicon glyphicon-lock"> </span>
                    สมัครสมาชิก</h3>
                </br>
                <form name="formsignup" action="signup_a.php" method="POST" id="signup" class="form-horizontal">
                    <?php foreach ($users as $user) {
                        $userid = $user->getAttribute("userid");
                        $int = (int)$userid;
                        $cal = $int + 1;
                    }
                    ?>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $cal ?>" />
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control" required placeholder="ชื่อ" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control" required placeholder="อีเมล์" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="username" class="form-control" required placeholder="ชื่อผู้ใช้" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" required placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" />
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="btn">สมัคร </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>