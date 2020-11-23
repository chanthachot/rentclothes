<meta charset="UTF-8" />

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['id'];
	$admin_user = $_POST['admin_user'];
	$admin_pass = $_POST['admin_pass'];
	$admin_name = $_POST['admin_name'];
	$admin_phone = $_POST['admin_phone'];
	$admin_email = $_POST['admin_email'];

	fnDOMAddElement($id,$admin_user, $admin_pass, $admin_name, $admin_phone, $admin_email);
	echo "<script>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location ='admin.php'; ";
	echo "</script>";
} else {

	echo "<script>";
	echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
	echo "window.location ='admin.php'; ";
	echo "</script>";
}
function fnDOMAddElement($id,$admin_user, $admin_pass, $admin_name, $admin_phone, $admin_email)
{
	$dom = new DOMDocument();
	$dom->load('db/rents.xml');
	$users = $dom->getElementsByTagName('users');

	foreach ($users as $add_user) {

		$add_user->childNodes->item(0);

		$user = $dom->createElement('user');
		$user->setAttribute('userid', $id);

		$prop = $dom->createElement('name', $admin_name);
		$user->appendChild($prop);
		$prop = $dom->createElement('phone', $admin_phone);
		$user->appendChild($prop);
		$prop = $dom->createElement('email', $admin_email);
		$user->appendChild($prop);
		$prop = $dom->createElement('username', $admin_user);
		$user->appendChild($prop);
		$prop = $dom->createElement('password', $admin_pass);
		$user->appendChild($prop);
		$prop = $dom->createElement('status', "admin");
		$user->appendChild($prop);

		$add_user->appendChild($user);
	}

	$dom->save('db/rents.xml');
}
?>