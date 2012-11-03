<?php 
session_start();
if($_SESSION['admin']){
    if(empty($_POST)){
        header('location:error');
    } else {
        $id = $_POST['id'];
	$jenis = $_POST['jenis'];
        $nama = $_POST['nama'];
        $tarif = $_POST['tarif'];
	$sql = "insert into retribusi values('$nama','$id', '$tarif', '$jenis');";
	mysql_query($sql); 
?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/retribusi/tambah/sukses/" />
<?php
    }
} else { 
    include "login.php";
} ?>