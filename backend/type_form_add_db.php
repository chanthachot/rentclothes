<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$type_id = $_POST['id'];
	$type_name = $_POST['type_name'];

	fnDOMAddElement($type_id, $type_name);
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'type.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
	echo "</script>";
}
function fnDOMAddElement($type_id, $type_name)
{
	$dom = new DOMDocument();
	$dom->load('db/rents.xml');
	$types = $dom->getElementsByTagName('Types');

	foreach ($types as $add_type) {

		$add_type->childNodes->item(0);

		$type = $dom->createElement('Type');
		$type->setAttribute('id', $type_id);

		$prop = $dom->createElement('type_name', $type_name);
		$type->appendChild($prop);

		$add_type->appendChild($type);
	}

	$dom->save('db/rents.xml');
}
