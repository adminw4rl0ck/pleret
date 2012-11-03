<?php session_start();

if (!empty($_SESSION['admin'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$spesial = $_POST['spesial'];

mysql_query("update dokter set nama_dokter='$nama', jk_dokter='$jk', alamat='$alamat', spesialis='$spesial' where id_dokter='$id'");  
?>
<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/dokter/sukses-update/" />
<?php
} else {
	include "login.php";
}