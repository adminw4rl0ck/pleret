<?php
session_start();
if (!empty($_SESSION['admin'])) {
$id=$_GET["id"];

$mysql = mysql_query("select * from berita where id_berita ='$id'");
$cek = mysql_num_rows($mysql);

if ($cek == 1) {
	$hapus=mysql_query("delete from berita where id_berita = '$id'"); ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/berita/sukses-hapus/" />
<?php } else { ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/berita/error/" />
<?php }
} else { 
	include "login.php";
}