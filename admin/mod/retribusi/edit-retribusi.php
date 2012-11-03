<?php session_start();

if (!empty($_SESSION['admin'])) {
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$nama = $_POST['nama'];
$tarif = $_POST['tarif'];
mysql_query("update retribusi set nm_retribusi='$nama', id_kategori_retribusi='$jenis', 
        tarif='$tarif' where id_retribusi='$id'");  
?>
<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/retribusi/sukses-update/" />
<?php
} else {
	include "login.php";
}