<meta charset="UTF-8">
<?php

$userid = $_REQUEST["ID"];


$dom = new DOMDocument();
$dom->load('db/rents.xml');
$users = $dom->documentElement;
$xpath = new DOMXPath($dom);
$result = $xpath->query('/Rents/users/user[@userid=' . $userid . ']');
$result->item(0)->parentNode->removeChild($result->item(0));
$dom->save('db/rents.xml');


if ($result) {
	echo "<script type='text/javascript'>";
	//echo "alert('Delete Succesfuly');";
	echo "window.location = 'user.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถลบข้อมูลได้');";
	echo "</script>";
}
?>