<?php error_reporting(0);

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "select * from administrator where username = '$username' and password = '$password'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$rows = mysql_num_rows($query);

if ($rows == 1) {

session_start();

$_SESSION['admin'] = $data["admin"];

header("location:index.php");
  
} else {
 
header("location:login.php?s=errorLogin");
  
}