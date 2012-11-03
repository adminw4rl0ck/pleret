<?php error_reporting(0);
include '../lib/koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
if(empty($username) OR empty($password)){
	header("location:login.php?s=emptyLogin");
} else {
	$sql = "SELECT * FROM administrator WHERE username = '$username' and password = '$password'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
	$rows = mysql_num_rows($query);
$data['level'];
	if ($rows == 1) {
		session_start();
		$_SESSION['admin'] = $data["username"];
		header("location:dashboard");
	} else {
		header("location:login.php?s=errorLogin");
	}
}