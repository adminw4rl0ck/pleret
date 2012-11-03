<?php 
session_start();
if($_SESSION['admin']){
    if(empty($_POST)){
	header('location:tambah/error');        
    } else {
        $id = $_POST['id'];
	$jdl = $_POST['jdl_berita'];
	$tgl = $_POST['tgl'];
	$berita = $_POST['berita']; 

	$sql = "insert into berita values('$id','$tgl','$jdl','$berita');";
	mysql_query($sql);
	header('location:tambah/sukses');
    }
} else { 
include "login.php";
} ?>