<meta charset="UTF-8">
<?php

$get_status = $_REQUEST["status"];
$changeto = $_REQUEST["changeto"];
$get_rentid = $_REQUEST["rentid"];


$doc = new DOMDocument();
$users = $doc->documentElement;
$xpath = new DOMXPath($doc);
$doc->load('db/rents.xml');
$RentLists = $doc->getElementsByTagName("RentList");



foreach ($RentLists as $RentList) {
	$status = $RentList->getAttribute("status");
	$rentid = $RentList->getAttribute("rentid");
	if ($get_status == $status && $rentid == $get_rentid) {
		$status1 = $RentList->setAttribute("status", $changeto);
	}
}

$doc->save('db/rents.xml');


if ($doc) {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'rent.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถแก้ไขข้อมูลได้');";
	echo "</script>";
}
?>