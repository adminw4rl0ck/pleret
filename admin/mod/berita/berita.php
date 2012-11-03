<?php
include "../../lib/fungsi.php";
$dt =  date('Y-m-d h:i:s');
$s = $_GET['s'];
if($s == 'tambah-berita'){
	$msg = 'Berita Berhasil Masuk';
} if($s == 'idSama'){
	$msg = 'Terjadi Kesalahan Input Berita';
} if($s == 'sukses_hapus'){
	$msg = 'Data berita berhasil dihapus';
} if($s == 'error'){
	$msg = 'Terjadi Kesalahan';
} if($s == 'suksesUpdate'){
	$msg = 'Berita berhasil update';
}
?>
<h1 class="pagetitle">Halaman Berita</h1>         
		<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="<?php echo base_url(); ?>admin/berita/tambah">
              <fieldset><legend>&nbsp;Olah Berita&nbsp;</legend>
                <p align="center"><span id="error"><?php echo $msg; ?></span></p>
                <p><label for="contact_firstname" class="left">ID Berita:</label>
                   <input type="text" name="id" id="contact_firstname" class="field" value="<?php echo rand_id('id_berita','berita') ?>" tabindex="1" /></p>
                <p><label for="contact_familyname" class="left">Tanggal Berita:</label>
                   <input type="text" name="tgl" id="contact_familyname" class="field" value="<?php echo $dt ?>" tabindex="1" /></p>
                <p><label for="contact_street" class="left">Judul Berita:</label>
                   <input type="text" name="jdl_berita" id="contact_street" class="field" value="" tabindex="1" /></p>
              </fieldset>
              <fieldset><legend>&nbsp;Isi Berita&nbsp;</legend>
                <p><label for="contact_message" class="left">Message:</label>
                   <textarea name="berita" id="contact_message" cols="45" rows="10"tabindex="5"></textarea></p>
                <p><input type="submit" name="submit" id="submit" class="button" value="Publish" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>              
        </div>	
<?php
$url = base_url();
$page = $_GET['hal'];
if(!isset($_GET['hal'])){
	$page = 1;
}else{
	$page = $_GET['hal']; 
}
$max_results = 2;
$from = (($page * $max_results) - $max_results);
$mysql = mysql_query("select * from berita order by id_berita desc limit $from, $max_results");

?>
<h1 class="block">Daftar Berita</h1>
        <div class="column1-unit">
          <table>
            <tr>
				<th class="top" scope="col">ID Berita</th>
				<th class="top" scope="col">Tanggal Berita</th>
				<th class="top" scope="col">Judul Berita</th>
				<th class="top" scope="col">Isi Berita</th>
				<th class="top" scope="col">Aksi</th>
			</tr>
<?php
while($data=mysql_fetch_array($mysql)){

?>
            <tr>
				<th scope="row"><?php echo $data['id_berita']; ?></th>
				<td><?php echo $data['tanggal_berita']; ?></td>
				<td><?php echo $data['judul_berita']; ?></td>
				<td><?php echo $data['isi_berita']; ?></td>
				<td>
					<a href="<?php echo base_url(); ?>admin/berita/edit/<?php echo $data['id_berita']; ?>" title="Edit Berita">Edit</a> | <a href="<?php echo base_url(); ?>admin/berita/hapus/<?php echo $data['id_berita']; ?>" title="Hapus Berita">Hapus</a>
				</td>
			</tr>
<?php

}

?>
          </table>
<?php
$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM berita"),0); 
$total_pages = ceil($total_results / $max_results); 
for($i = 1; $i <= $total_pages; $i++){ 

	if(($page) == $i){ 
	echo "<a class='button-green' href=".$url."admin/berita/page-$i/>$i</a>"; 
	}
	else
	{ 
	echo "<a class='button-green' href=".$url."admin/berita/page-$i/>$i</a>";
	} 
} 
?>
        </div>          
        <hr class="clear-contentunit" />