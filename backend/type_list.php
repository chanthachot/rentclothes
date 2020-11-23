<?php
error_reporting(error_reporting() & ~E_NOTICE);
echo ' <table id="example1" class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr class='info'>
      <th width='5%'>id</th>
      <th >ชื่อ</th>
      <th width=5%>แก้ไข</th>
      <th width=5%>ลบ</th>
    </tr>";
echo "</thead>";

$doc = new DOMDocument();
$doc->load('db/rents.xml');
$types = $doc->getElementsByTagName("Type");

foreach ($types as $type) {
   if ($counter++ == 0) continue;
  $typeid = $type->getAttribute("id");

  $names = $type->getElementsByTagName("type_name");
  $name = $names->item(0)->nodeValue;

  echo "<tr>";
  echo "<td>" . $typeid .  "</td> ";
  echo "<td>" . $name .  "</td> ";

  //แก้ไขข้อมูล
  echo "<td><a href='type.php?act=edit&ID=$typeid' class='btn btn-warning'>แก้ไข</a></td> ";

  //ลบข้อมูล
  echo "<td><a href='type_form_del_db.php?ID=$typeid' onclick=\"return confirm('คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้ ?')\" class='btn btn-danger'>ลบ</a></td> ";
  echo "</tr>";
}
echo "</table>";
