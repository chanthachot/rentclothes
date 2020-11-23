<meta charset="UTF-8">
<?php
error_reporting(error_reporting() & ~E_NOTICE);
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());
//รับค่าไฟล์จากฟอร์ม

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$POST_id = $_POST['id'];
	$POST_name = $_POST['name'];
	$POST_price = $_POST['price'];
	$POST_size = $_POST['size'];
	$POST_typeidref = $_POST['type_id'];
	if ($POST_typeidref == "type_id") {
		$POST_typeidref = "0";
	}
	$POST_color = $_POST['color'];
	$POST_description = $_POST['description'];

	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	//img
	$upload = $_FILES['p_img'];
	if ($upload <> '') {

		//โฟลเดอร์ที่เก็บไฟล์
		$path = "img/";
		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['p_img']['name'], ".");
		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname = 'img' . $numrand . $date1 . $type;
		$path_copy = $path . $newname;
		$path_link = "img/" . $newname;
		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
	}

	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	fnDOMAddElement($POST_id, $POST_name, $POST_price, $POST_size, $POST_typeidref, $POST_color, $POST_description, $newname);

	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
}
function fnDOMAddElement($POST_id, $POST_name, $POST_price, $POST_size, $POST_typeidref, $POST_color, $POST_description, $newname)
{
	$dom = new DOMDocument();
	$dom->load('db/rents.xml');
	$clothes = $dom->getElementsByTagName('Clothes');

	foreach ($clothes as $add_clothe) {

		$add_clothe->childNodes->item(2);

		$clothe = $dom->createElement('Clothe');
		$clothe->setAttribute('clothesid', $POST_id);
		$clothe->setAttribute('typeid', $POST_typeidref);

		$prop = $dom->createElement('Name', $POST_name);
		$clothe->appendChild($prop);
		$prop = $dom->createElement('Pricee', $POST_price);
		$clothe->appendChild($prop);
		$prop = $dom->createElement('Image', $newname);
		$clothe->appendChild($prop);
		$prop = $dom->createElement('size', $POST_size);
		$clothe->appendChild($prop);
		$prop = $dom->createElement('description', $POST_description);
		$clothe->appendChild($prop);
		$prop = $dom->createElement('color', $POST_color);
		$clothe->appendChild($prop);

		$add_clothe->appendChild($clothe);
	}

	$dom->save('db/rents.xml');
}
?>