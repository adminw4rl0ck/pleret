<?php
session_start();
if (!empty($_SESSION['admin'])) {
$id=$_GET["id"];

$mysql = mysql_query("select * from retribusi where id_retribusi ='$id'");
$cek = mysql_num_rows($mysql);

if ($cek == 1) {
	$hapus=mysql_query("delete from retribusi where id_retribusi = '$id'"); ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/retribusi/sukses-hapus/" />
<?php } else { ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/retribusi/error" />
<?php }
} else { 
	include "login.php";
}