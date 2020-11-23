<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $POST_name = $_POST['name'];
  $POST_email = $_POST['email'];
  $POST_phone = $_POST['phone'];
  $POST_username = $_POST['username'];
  $POST_password = $_POST['password'];

  fnDOMAddElement($id, $POST_name, $POST_email, $POST_phone, $POST_username, $POST_password);
  echo "<script>";
  echo "alert('สมัครสมาชิกสำเร็จ');";
  echo "window.location ='login.php'; ";
  echo "</script>";
} else {

  echo "<script>";
  echo "alert('ไม่สามารถสมัครสมาชิกได้');";
  echo "window.location ='login.php'; ";
  echo "</script>";
}
function fnDOMAddElement($id, $POST_name, $POST_email, $POST_phone, $POST_username, $POST_password)
{

  $dom = new DOMDocument();
  $dom->load('backend/db/rents.xml');
  $users = $dom->getElementsByTagName('users');

  foreach ($users as $add_user) {

    $add_user->childNodes->item(0);

    $user = $dom->createElement('user');
    $user->setAttribute('userid', $id);

    $prop = $dom->createElement('name', $POST_name);
    $user->appendChild($prop);
    $prop = $dom->createElement('phone', $POST_phone);
    $user->appendChild($prop);
    $prop = $dom->createElement('email', $POST_email);
    $user->appendChild($prop);
    $prop = $dom->createElement('username', $POST_username);
    $user->appendChild($prop);
    $prop = $dom->createElement('password', $POST_password);
    $user->appendChild($prop);
    $prop = $dom->createElement('status', "user");
		$user->appendChild($prop);

    $add_user->appendChild($user);
  }
  $dom->save('backend/db/rents.xml');
}
