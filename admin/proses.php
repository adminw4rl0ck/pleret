<?php
session_start(); error_reporting(0);
include "../lib/koneksi.php";
include "lib/fungsi.php";  
$act = $_GET["act"];
if (isset($_GET["w4rl0ck"]) AND $act == "hapus-berita") {include "mod/berita/hapus-berita.php";}
elseif(isset($_GET["w4rl0ck"]) AND $act == "edit-berita"){include "mod/berita/edit-berita.php";}
elseif(isset($_GET["w4rl0ck"]) AND $act == "edit-retribusi"){include "mod/retribusi/edit-retribusi.php";}
elseif(isset($_GET["w4rl0ck"]) AND $act == "hapus-retribusi"){include "mod/retribusi/hapus-retribusi.php";}
elseif(isset($_GET["w4rl0ck"]) AND $act == "edit-dokter"){include "mod/dokter/edit-dokter.php";}
elseif(isset($_GET["w4rl0ck"]) AND $act == "hapus-dokter"){include "mod/dokter/hapus.php";}