 <?php
  error_reporting(error_reporting() & ~E_NOTICE);
  echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
  echo "<tr class='info'>
                      <th>id</th>
                      <th>ชื่อผู้เช่า</th>
                      <th>อีเมล์</th>
                      <th>เบอร์โทรศัพท์</th>
                      <th>หมายเลขเช่า</th>
                      <th>รายการ</th>
                      <th>วันที่ทำรายการ</th>
                      <th>เวลาที่ทำรายการ</th>
                      <th>วันที่เช่า</th>
                      <th>วันที่คืน</th>
                      <th>สถานะ</th>
                      <th>เปลี่ยนสถานะ</th>
                      <th>ลบ</th>
                    </tr>";
  echo "</thead>";


  $doc = new DOMDocument();
  $doc->load('db/rents.xml');
  $RentLists = $doc->getElementsByTagName("RentList");
  $rentStatuses = $doc->getElementsByTagName("RentStatus");
  $clothes = $doc->getElementsByTagName("Clothe");
  $users = $doc->getElementsByTagName("user");

  foreach ($RentLists as $RentList) {

    $rentid = $RentList->getAttribute("rentid");

    $status = $RentList->getAttribute("status");

    $useridref = $RentList->getAttribute("userid");

    $clothesidref = $RentList->getAttribute("clothesidref");

    foreach ($clothes as $clothe) {
      $clothesid = $clothe->getAttribute("clothesid");
      if ($clothesid == $clothesidref) {
        $clothes_names = $clothe->getElementsByTagName("Name");
        $clothes_name = $clothes_names->item(0)->nodeValue;
      }
    }

    $OrderNos = $RentList->getElementsByTagName("OrderNo");
    $OrderNo = $OrderNos->item(0)->nodeValue;

    $DateRents = $RentList->getElementsByTagName("DateRent");
    $DateRent = $DateRents->item(0)->nodeValue;

    $TimeRents = $RentList->getElementsByTagName("TimeRent");
    $TimeRent = $TimeRents->item(0)->nodeValue;

    $DateGives = $RentList->getElementsByTagName("DateGive");
    $DateGive = $DateGives->item(0)->nodeValue;

    $DateReturns = $RentList->getElementsByTagName("DateReturn");
    $DateReturn = $DateReturns->item(0)->nodeValue;


    foreach ($rentStatuses as $rentStatus) {
      $statusid = $rentStatus->getAttribute("rentstatusid");
      if ($status == $statusid) {

        $status_names = $rentStatus->getElementsByTagName("status_name");
        $status_name = $status_names->item(0)->nodeValue;
      }
    }

    foreach ($users as $user) {
      $userid = $user->getAttribute("userid");
      if ($userid == $useridref) {

        $names = $user->getElementsByTagName("name");
        $name = $names->item(0)->nodeValue;

        $emails = $user->getElementsByTagName("email");
        $email = $emails->item(0)->nodeValue;

        $phones = $user->getElementsByTagName("phone");
        $phone = $phones->item(0)->nodeValue;


        echo "<tr>";
        echo "<td>" . $rentid .  "</td> ";
        echo "<td>" . $name .  "</td> ";
        echo "<td>" . $email .  "</td> ";
        echo "<td>" . $phone .  "</td> ";
        echo "<td>" . $OrderNo .  "</td> ";
        echo "<td> <a href='../product_detail.php?ID=$clothesidref'>" . $clothes_name .  "</a></td> ";
        echo "<td>" . $DateRent .  "</td> ";
        echo "<td>" . $TimeRent .  "</td> ";
        echo "<td>" . $DateGive .  "</td> ";
        echo "<td>" . $DateReturn .  "</td> ";
        echo "<td>" . $status_name .  "</td> ";

        //เปลี่ยนสถานะ
        if ($status == "1") {
          echo "<td><a href='rent_change_status_db.php?status=$status&changeto=2&rentid=$rentid' class='btn btn-info'>มารับแล้ว</a></td>";
        } else if ($status == "2") {
          echo "<td><a href='rent_change_status_db.php?status=$status&changeto=3&rentid=$rentid' class='btn btn-warning'>รับคืนแล้ว</a></td>";
        } else {
          echo "<td><a href='' class='btn btn-success' disabled>รายการเสร็จสิ้น</a></td>";
        }


        //ลบข้อมูล
        echo "<td><a href='rent_delete_db.php?ID=$rentid' onclick=\"return confirm('คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้ ?')\" class='btn btn-danger'>ลบ</a></td>";
        echo "</tr>";
      }
    }
  }
  echo "</table>";
  ?>



        