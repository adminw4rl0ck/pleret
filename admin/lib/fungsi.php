<?php

/**
 *  Fungsi ini dibuat oleh JogjaDev.com
 *
 *
 */

function base_url(){
    $url = 'http://localhost/pleret/';
    return $url;
}

function getURL($url){
    
}

function set_error($s){
    $msg = '';
    if($s == 'errorLogin'){
            $msg = 'Username atau password salah';
    } 
    if($s == 'logout'){
            $msg = 'Anda telah logout';
    } 
    if($s == 'emptyLogin'){
            $msg = 'Username / Password Belum diisi.';
    }
    if($s == 'doLogin'){
            $msg = 'Anda harus login terlebih dahulu';
    }

    return $msg;
}

function check_id($id, $fields, $table){
	$sql = "select $fields from $table where $fields = $id";
	$query  = mysql_query($sql);
	$row    = mysql_fetch_array($query);
	
	if($row[$fields] == $id){
		return false;
	} else {
		return true;
	}
}

function rand_id($fields, $table){
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$id = substr(str_shuffle($chars),0,4);
	if(check_id($id,$fields, $table)){
		return $id;
	} else {
		return substr(str_shuffle($id),0,4);
	}
}

function ijin(){
	session_start();
	$sesi = $_SESSION['admin'];
	if(empty($sesi)){
		header("location:login.php?s=doLogin");
		return false;
	} 
	return true;
}