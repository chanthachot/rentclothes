<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta charset="UTF-8">
<?php
$get_userid = $_GET["ID"];


$doc = new DOMDocument();
$doc->load('db/rents.xml');
$users = $doc->getElementsByTagName("user");

foreach ($users as $user) {
  $userid = $user->getAttribute("userid");
  if ($userid == $get_userid) {
    $names = $user->getElementsByTagName("name");
    $name = $names->item(0)->nodeValue;

    $phones = $user->getElementsByTagName("phone");
    $phone = $phones->item(0)->nodeValue;

    $emails = $user->getElementsByTagName("email");
    $email = $emails->item(0)->nodeValue;

    $usernames = $user->getElementsByTagName("username");
    $username = $usernames->item(0)->nodeValue;

    $passwords = $user->getElementsByTagName("password");
    $password = $passwords->item(0)->nodeValue;

    break;
  }
}

?>
<div class="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-10">

      <form name="register" action="admin_form_edit_db.php" method="POST" id="register" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-3"> </div>
          <div class="col-sm-5" align="center">
            <br>
            <h3>แก้ไขผู้ดูแลระบบ</h3>
          </div>
        </div>
        <input type="hidden" name="admin_id" value="<?php echo $get_userid; ?>" />
        <div class="form-group">
          <div class="col-sm-3"> </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">ชื่อผู้ใช้</div>
          <div class="col-sm-5" align="left">
            <input name="admin_user" type="text" required class="form-control" id="admin_user" value="<?php echo $username; ?>" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-3" align="right">รหัสผ่าน </div>
          <div class="col-sm-5" align="left">
            <input name="admin_pass" type="text" required class="form-control" id="admin_pass" value="<?php echo $password; ?>" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">ชื่อ-สกุล</div>
          <div class="col-sm-5" align="left">
            <input name="admin_name" type="text" required class="form-control" id="admin_name" value="<?php echo $name; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">อีเมล์</div>
          <div class="col-sm-5" align="left">
            <input name="admin_email" type="text" required class="form-control" id="admin_email" value="<?php echo $email; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3" align="right">เบอร์โทรศัพท์</div>
          <div class="col-sm-5" align="left">
            <input name="admin_phone" type="text" required class="form-control" id="admin_phone" value="<?php echo $phone; ?>" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-3"> </div>
          <div class="col-sm-6">

            <button type="submit" class="btn btn-warning" id="btn">แก้ไข</button>

          </div>

        </div>
      </form>
    </div>
  </div>

</div>