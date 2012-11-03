<?php
$page = $_GET['page'];
//mod untuk profil
if($page == 'profil') {
	include "mod/profil/profil.php";
}elseif($page == 'edit-profil'){
	include "mod/profil/ubah.php";
}

//mod untuk berita
elseif($page == 'berita'){
	include "mod/berita/berita.php";
}elseif($page == 'tambah-berita'){
	include "mod/berita/tambah.php";
} elseif($page == 'edit-berita'){
	include "mod/berita/edit.php";
}

//mod untuk fasilitas
elseif($page == 'fasilitas'){
	include "mod/fasilitas/fasilitas.php";
}elseif($page == 'isi-fasilitas'){
	include "mod/fasilitas/isi.php";
}elseif($page == 'edit-fasilitas'){
	include "mod/fasilitas/ubah.php";
}

//mod untuk retribusi
elseif($page == 'retribusi'){
	include "mod/retribusi/retribusi.php";
}elseif($page == 'tambah-retribusi'){
	include "mod/retribusi/tambah.php"; 
}elseif($page == 'edit-retribusi'){
	include "mod/retribusi/edit.php";
} elseif($page == 'kategori-retribusi'){
        include "mod/retribusi/kategori.php";
} elseif($page == 'kategori-tambah'){
        include "mod/retribusi/tambahkat.php";
}

//mod untuk jaminan kesehatan -> jamkes
elseif($page == 'jamkes'){
	include "mod/jamkes/jamkes.php";
}elseif($page == 'isi-jamkes'){
	include "mod/jamkes/isi.php";
}elseif($page == 'edit-jamkes'){
	include "mod/jamkes/ubah.php";
}

//dokter
elseif($page == 'dokter'){
	include "mod/dokter/dokter.php";
}elseif($page == 'tambah-dokter'){
	include "mod/dokter/tambah.php"; 
}elseif($page == 'edit-dokter'){
	include "mod/dokter/edit.php";
}

//layanan
elseif($page == 'layanan'){
	include "mod/layanan/layanan.php";
}elseif($page == 'isi-layanan'){
	include "mod/layanan/isi.php";
}elseif($page == 'edit-layanan'){
	include "mod/layanan/ubah.php";
}

//kritik
elseif($page == 'kritik'){
	include "mod/kritik/kritik.php";
}elseif($page == 'tanggapan'){
	include "mod/kritik/tanggapan.php";
}

//konsultasi
elseif($page == 'konsultasi'){
	include "mod/konsultasi/konsultasi.php";
}elseif($page == 'konsultasi-tanggap'){
	include "mod/konsultasi/tanggapan.php";
}
elseif($page == '404'){
	include "404.php";
}
elseif($page == 'home'){
	include "beranda.php";
} else {
	include "beranda.php";
}
