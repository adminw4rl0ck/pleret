<?php error_reporting(0);
$host	= 'localhost';
$user	= 'w4rl0ck';
$pass 	= 'adminw4rl0ck';
$db 	= 'pleret';
mysql_connect($host,$user,$pass) or die("Gagal melakukan koneksi ke host");
mysql_select_db($db) or die("Gagal membuka database");
?>