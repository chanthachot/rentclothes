<meta charset="UTF-8">
<?php

$get_clothesid = $_POST["get_clothesid"];
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
$image = $_POST['image'];
$upload = $_FILES['p_img']['name'];
if ($upload != '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path = "img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'], ".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname = $numrand . $date1 . $type;

	$path_copy = $path . $newname;
	$path_link = "img/" . $newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
} else {
	$newname = $image;
}

$doc = new DOMDocument();
$clothes = $doc->documentElement;
$xpath = new DOMXPath($doc);
$doc->load('db/rents.xml');
$clothes = $doc->getElementsByTagName("Clothe");
$types = $doc->getElementsByTagName("Type");

$POST_name = $_POST['name'];
$POST_price = $_POST['price'];
$POST_size = $_POST['size'];
$POST_typeidref = $_POST['type_id'];
$POST_color = $_POST['color'];
$POST_description = $_POST['description'];
$POST_image = $newname;

foreach ($clothes as $clothe) {
	$clothesid = $clothe->getAttribute("clothesid");
	if ($clothesid == $get_clothesid) {

		$names = $clothe->getElementsByTagName("Name");
		$name = $names->item(0)->nodeValue="";
		$name = $names->item(0)->appendChild($doc->createTextNode($POST_name));

		$prices = $clothe->getElementsByTagName("Pricee");
		$price = $prices->item(0)->nodeValue="";
		$price = $prices->item(0)->appendChild($doc->createTextNode($POST_price));

		$images = $clothe->getElementsByTagName("Image");
		$image = $images->item(0)->nodeValue="";
		$image = $images->item(0)->appendChild($doc->createTextNode($POST_image));

		$sizes = $clothe->getElementsByTagName("size");
		$size = $sizes->item(0)->nodeValue="";
		$size = $sizes->item(0)->appendChild($doc->createTextNode($POST_size));

		$descriptions = $clothe->getElementsByTagName("description");
		$description = $descriptions->item(0)->nodeValue="";
		$description = $descriptions->item(0)->appendChild($doc->createTextNode($POST_description));

		$colors = $clothe->getElementsByTagName("color");
		$color = $colors->item(0)->nodeValue="";
		$color = $colors->item(0)->appendChild($doc->createTextNode($POST_color));


		$typeidref = $clothe->setAttribute("typeid", $POST_typeidref);
	
		break;
	}
}
$doc->save('db/rents.xml');

if ($doc) {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถแก้ข้อมูลได้');";
	echo "</script>";
}
?>