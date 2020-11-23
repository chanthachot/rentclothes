<?php
error_reporting(error_reporting() & ~E_NOTICE);

echo ' <table id="example1" class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr class='info'>
      <th>id</th>
      <th>ชื่อ</th>
      <th>ราคา</th>
      <th>รูป</th>
      <th>ไซส์</th>
      <th>คำอธิบาย</th>
      <th>สี</th>
      <th>ประเภท</th>
      <th>แก้ไข</th>
      <th>ลบ</th>
    </tr>";
echo "</thead>";


$doc = new DOMDocument();
$doc->load('db/rents.xml');
$clothes = $doc->getElementsByTagName("Clothe");
$types = $doc->getElementsByTagName("Type");

foreach ($clothes as $clothe) {

  $clothesid = $clothe->getAttribute("clothesid");

  $names = $clothe->getElementsByTagName("Name");
  $name = $names->item(0)->nodeValue;

  $prices = $clothe->getElementsByTagName("Pricee");
  $price = $prices->item(0)->nodeValue;

  $images = $clothe->getElementsByTagName("Image");
  $image = $images->item(0)->nodeValue;

  $sizes = $clothe->getElementsByTagName("size");
  $size = $sizes->item(0)->nodeValue;

  $descriptions = $clothe->getElementsByTagName("description");
  $description = $descriptions->item(0)->nodeValue;

  $colors = $clothe->getElementsByTagName("color");
  $color = $colors->item(0)->nodeValue;


  $typeidref = $clothe->getAttribute("typeid");

  foreach ($types as $type) {
    $typeid = $type->getAttribute("id");
    if ($typeidref == $typeid) {

      $type_names = $type->getElementsByTagName("type_name");
      $type_name = $type_names->item(0)->nodeValue;
    }
  }




  echo "<tr>";
  echo "<td>" . $clothesid .  "</td> ";
  echo "<td >" . $name .  "</td> ";
  echo "<td>" . $price . " บาท" .  "</td> ";
  if ($image != "") {
    if (strpos($image, 'http') !== false) {
      echo "<td>" . "<img src='" . $image . "'width='100'>" . "</td> ";
    } else {
      echo "<td align=center>" . "<img src='img/" . $image . "' width='100'>" . "</td>";
    }
  } else {
    echo  "<td>" . "ไม่มีรูป" . "</td> ";
  }
  echo "<td>" . $size .  "</td> ";
  echo "<td>" . $description .  "</td> ";
  echo "<td>" . $color .  "</td> ";
  echo "<td>" . $type_name .  "</td> ";

  //แก้ไขข้อมูล
  echo "<td><a href='product.php?act=edit&ID=$clothesid' class='btn btn-warning'>แก้ไข</a></td> ";

  //ลบข้อมูล
  echo "<td><a href='product_form_del_db.php?ID=$clothesid' onclick=\"return confirm('คุณแน่ใจหรือว่าต้องการลบข้อมูลนี้ ?')\" class='btn btn-danger'>ลบ</a></td> ";
  echo "</tr>";
}
echo "</table>";
