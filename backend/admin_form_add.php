<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
$doc = new DOMDocument();
$doc->load('db/rents.xml');
$users = $doc->getElementsByTagName('user');
?>

<div class="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-10">
      <form name="admin" action="admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-5" align="center">
            <br>
            <h3>เพิ่มผู้ดูแลระบบ</h3>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3"> </div>
        </div>
        <?php foreach ($users as $user) {
          $userid = $user->getAttribute("userid");
          $int = (int)$userid;
          $cal = $int + 1;
        }
        ?>
        <input type="hidden" name="id" class="form-control" value="<?php echo $cal ?>" />
        <div class="form-group">
          <div class="col-sm-3" align="right">ชื่อผู้ใช้</div>
          <div class="col-sm-5" align="left">
            <input name="admin_user" type="text" required class="form-control" id="admin_user" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-3" align="right">รหัสผ่าน</div>
          <div class="col-sm-5" align="left">
            <input name="admin_pass" type="password" required class="form-control" id="admin_pass" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">ชื่อ-สกุล</div>
          <div class="col-sm-5" align="left">
            <input name="admin_name" type="text" required class="form-control" id="admin_name" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">เบอร์โทรศัพทฺ์</div>
          <div class="col-sm-5" align="left">
            <input name="admin_phone" type="text" required class="form-control" id="admin_phone" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">อีเมล์</div>
          <div class="col-sm-5" align="left">
            <input name="admin_email" type="text" required class="form-control" id="admin_email" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-3"> </div>
          <div class="col-sm-6">
            <button type="submit" class="btn btn-danger" id="btn">บันทึก</button>

          </div>

        </div>
      </form>
    </div>
  </div>

</div>