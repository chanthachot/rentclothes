<meta charset="UTF-8">
<?php

$doc = new DOMDocument();
$users = $doc->documentElement;
$xpath = new DOMXPath($doc);
$doc->load('db/rents.xml');
$users = $doc->getElementsByTagName("user");

$admin_id = $_REQUEST['admin_id'];
$admin_user = $_REQUEST['admin_user'];
$admin_pass = $_REQUEST['admin_pass'];
$admin_name = $_REQUEST['admin_name'];
$admin_email = $_REQUEST['admin_email'];
$admin_phone = $_REQUEST['admin_phone'];


foreach ($users as $user) {
	$userid = $user->getAttribute("userid");
	if ($userid == $admin_id) {

		$names = $user->getElementsByTagName("name");
		$name = $names->item(0)->nodeValue="";
		$name = $names->item(0)->appendChild($doc->createTextNode($admin_name));

		$phones = $user->getElementsByTagName("phone");
		$phone = $phones->item(0)->nodeValue="";
		$phone = $phones->item(0)->appendChild($doc->createTextNode($admin_phone));

		$emails = $user->getElementsByTagName("email");
		$email = $emails->item(0)->nodeValue="";
		$email = $emails->item(0)->appendChild($doc->createTextNode($admin_email));

		$usernames = $user->getElementsByTagName("username");
		$username = $usernames->item(0)->nodeValue="";
		$username = $usernames->item(0)->appendChild($doc->createTextNode($admin_user));

		$passwords = $user->getElementsByTagName("password");
		$password = $passwords->item(0)->nodeValue="";
		$password = $passwords->item(0)->appendChild($doc->createTextNode($admin_pass));
	
		break;
	}
}
$doc->save('db/rents.xml');


if ($doc) {
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'admin.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สามารถแก้ไขข้อมูลได้');";
	echo "window.location = 'admin.php'; ";
	echo "</script>";
}
?>