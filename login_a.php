<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);
if (isset($_REQUEST['username'])) {

  $POST_username = $_POST['username'];
  $POST_password = $_POST['password'];


  $doc = new DOMDocument();
  $doc->load('backend/db/rents.xml');
  $users = $doc->getElementsByTagName("user");

  foreach ($users as $user) {
    $userid = $user->getAttribute("userid");

    $names = $user->getElementsByTagName("name");
    $name = $names->item(0)->nodeValue;

    $usernames = $user->getElementsByTagName("username");
    $username = $usernames->item(0)->nodeValue;

    $passwords = $user->getElementsByTagName("password");
    $password = $passwords->item(0)->nodeValue;

    $statuses = $user->getElementsByTagName("status");
    $status = $statuses->item(0)->nodeValue;

    if ($POST_username == $username && $POST_password == $password) {
      $_SESSION["UserID"] = $status;
      $_SESSION["User"] = $userid;
    } else {
      echo "<script>";
      echo "alert(\"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง\");";
      echo "window.location = 'login.php'; ";
      echo "</script>";
    }

    if ($_SESSION["UserID"]) { //ถ้าเป็น admin ให้กระโดดไปหน้า admin
      Header("Location: index.php");
    }
  }
}
