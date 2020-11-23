<meta charset="UTF-8">
<?php

$doc = new DOMDocument();
$users = $doc->documentElement;
$xpath = new DOMXPath($doc);
$doc->load('db/rents.xml');
$types = $doc->getElementsByTagName("Type");

$type_id = $_REQUEST["type_id"];
$type_name = $_REQUEST["type_name"];


foreach ($types as $type) {
	$typeid = $type->getAttribute("id");
	if ($typeid == $type_id) {

		$names = $type->getElementsByTagName("type_name");
		$name = $names->item(0)->nodeValue = "";
		$name = $names->item(0)->appendChild($doc->createTextNode($type_name));
		break;
	}
}
$doc->save('db/rents.xml');

if ($doc) {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'type.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถแก้ไขข้อมูลได้');";
	echo "</script>";
}
?>