<meta charset="UTF-8" />
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id'];
	$user_user = $_POST['user_user'];
	$user_pass = $_POST['user_pass'];
	$user_name = $_POST['user_name'];
	$user_phone = $_POST['user_phone'];
	$user_email = $_POST['user_email'];

	fnDOMAddElement($id,$user_user, $user_pass, $user_name, $user_phone, $user_email);
	echo "<script>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location ='user.php'; ";
	echo "</script>";
} else {

	echo "<script>";
	echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
	echo "window.location ='user.php'; ";
	echo "</script>";
}
function fnDOMAddElement($id,$user_user, $user_pass, $user_name, $user_phone, $user_email)
{
	$dom = new DOMDocument();
	$dom->load('db/rents.xml');
	$users = $dom->getElementsByTagName('users');

	foreach ($users as $add_user) {

		$add_user->childNodes->item(0);

		$user = $dom->createElement('user');
		$user->setAttribute('userid', $id);

		$prop = $dom->createElement('name', $user_pass);
		$user->appendChild($prop);
		$prop = $dom->createElement('username', $user_user);
		$user->appendChild($prop);
		$prop = $dom->createElement('password', $user_pass);
		$user->appendChild($prop);
		$prop = $dom->createElement('phone', $user_phone);
		$user->appendChild($prop);
		$prop = $dom->createElement('email', $user_email);
		$user->appendChild($prop);
		$prop = $dom->createElement('status', "user");
		$user->appendChild($prop);

		$add_user->appendChild($user);
	}

	$dom->save('db/rents.xml');
}
?>