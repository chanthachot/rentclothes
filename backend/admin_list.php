 <?php
  error_reporting(error_reporting() & ~E_NOTICE);
  echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
  echo "<tr class='info'>
                      <th width='5%'>id</th>
                      <th width=10%>ชื่อผู้ใช้</th>
                      <th width=10%>รหัสผ่าน</th>
                      <th width=20%>ชื่อ-สกุล</th>
                      <th width=20%>อีเมล์</th>
                      <th width=20%>เบอร์โทรศัพท์</th>
                      <th width=5%>แก้ไข</th>
                      <th width=5%>ลบ</th>
                    </tr>";
  echo "</thead>";


  $doc = new DOMDocument();
  $doc->load('db/rents.xml');
  $users = $doc->getElementsByTagName("user");

  foreach ($users as $user) {

    $userid = $user->getAttribute("userid");

    $names = $user->getElementsByTagName("name");
    $name = $names->item(0)->nodeValue;

    $emails = $user->getElementsByTagName("email");
    $email = $emails->item(0)->nodeValue;

    $phones = $user->getElementsByTagName("phone");
    $phone = $phones->item(0)->nodeValue;

    $usernames = $user->getElementsByTagName("username");
    $username = $usernames->item(0)->nodeValue;

    $passwords = $user->getElementsByTagName("password");
    $password = $passwords->item(0)->nodeValue;

    $statuses = $user->getElementsByTagName("status");
    $status = $statuses->item(0)->nodeValue;

    if ($status == "admin") {


      echo "<tr>";
      echo "<td>" . $userid .  "</td> ";
      echo "<td>" . $username .  "</td> ";
      echo "<td>" . $password .  "</td> ";
      echo "<td>" . $name .  "</td> ";
      echo "<td>" . $email .  "</td> ";
      echo "<td>" . $phone .  "</td> ";
      //แก้ไขข้อมูล
      echo "<td><a href='admin.php?act=edit&ID=$userid' class='btn btn-warning'>แก้ไข</a></td>";


      //ลบข้อมูล
      echo "<td><a href='admin_form_del_db.php?ID=$userid' onclick=\"return confirm('คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้ ?')\" class='btn btn-danger'>ลบ</a></td>";
      echo "</tr>";
    }
  }
  echo "</table>";
  ?>



        