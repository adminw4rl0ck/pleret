<?php
session_start();
if (!empty($_SESSION['admin'])) {
$id=$_GET["id"];

$mysql = mysql_query("select * from dokter where id_dokter ='$id'");
$cek = mysql_num_rows($mysql);

if ($cek == 1) {
	$hapus=mysql_query("delete from dokter where id_dokter = '$id'"); ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/dokter/sukses-hapus/" />
<?php } else { ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/dokter/error/" />
<?php }
} else { 
	include "login.php";
}