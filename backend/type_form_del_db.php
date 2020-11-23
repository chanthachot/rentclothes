<meta charset="UTF-8">
<?php

$typeid = $_REQUEST["ID"];


$dom = new DOMDocument();
$dom->load('db/rents.xml');
$users = $dom->documentElement;
$xpath = new DOMXPath($dom);
$result = $xpath->query('/Rents/Types/Type[@id=' . $typeid . ']');
$result->item(0)->parentNode->removeChild($result->item(0));
$dom->save('db/rents.xml');



if ($result) {
	echo "<script type='text/javascript'>";
	//echo "alert('Delete Succesfuly');";
	echo "window.location = 'type.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถแก้ไขลบมูลได้');";
	echo "</script>";
}
?>