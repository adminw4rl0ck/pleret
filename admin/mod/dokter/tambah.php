<?php 
session_start();
if($_SESSION['admin']){
    if(empty ($_POST)){
        header('location:error');
    } else {
        $id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$spesial = $_POST['spesial']; 
	$jk = $_POST['jk']; 
	
	$sql = "insert into dokter values('$id','$nama','$jk','$alamat', '$spesial');";
	mysql_query($sql);
	header('location:tambah/sukses');
    }
} else { 
include "login.php";
} ?>