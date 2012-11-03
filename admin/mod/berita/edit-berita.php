<?php session_start();

if (!empty($_SESSION['admin'])) {
$id = $_POST['id'];
$tgl = $_POST['tgl'];
$isi = $_POST['berita'];
$jdl = $_POST['jdl_berita'];

mysql_query("update berita set tanggal_berita='$tgl', judul_berita='$jdl', isi_berita='$isi' where id_berita='$id'");  
?>
<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/berita/sukses-update/" />
<?php
} else {
	include "login.php";
}