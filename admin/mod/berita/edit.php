<?php session_start();
if(!empty($_SESSION['admin'])){
$id = $_GET['id'];
$mysql=mysql_query("select * from berita where id_berita = '$id'");
$cek=mysql_num_rows($mysql);
if($cek == 1) {
$data = mysql_fetch_array($mysql);
$id = $data['id_berita'];
$jdl = $data['judul_berita'];
$isi = $data['isi_berita'];
$tgl = $data['tanggal_berita'];
if($s == 'error'){
	$msg = 'Data berita terdapat kesalahan';
} if ($s == 'sukses'){
	$msg = 'Berita berhasil di update';
}
?>

<h1 class="pagetitle">Halaman Edit Berita</h1>         
<div class="column1-unit">
  <div class="contactform">
	<form method="post" action="<?php echo base_url(); ?>admin/berita/edit-berita.php">
	  <fieldset><legend>&nbsp;Olah Berita&nbsp;</legend>
		<span id="error" align="center"><?php echo $msg; ?></span>
		<input type="hidden" name="id" id="contact_firstname" class="field" value="<?php echo $id ?>" tabindex="1" />
		<input type="hidden" name="tgl" id="contact_familyname" class="field" value="<?php echo $tgl ?>" tabindex="1" />
		<p><label for="contact_street" class="left">Judul Berita:</label>
		   <input type="text" name="jdl_berita" id="contact_street" class="field" value="<?php echo $jdl ?>" tabindex="1" /></p>
	  </fieldset>
	  <fieldset><legend>&nbsp;Isi Berita&nbsp;</legend>
		<p><label for="contact_message" class="left">Message:</label>
		   <textarea name="berita" id="contact_message" cols="45" rows="10"tabindex="5"><?php echo $isi ?></textarea></p>
		<p><input type="submit" name="submit" id="submit" class="button" value="Publish" tabindex="6" /></p>
	  </fieldset>
	</form>
  </div>              
</div>	

<?php 
} else { ?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/berita/error" />
<?php 
}
} else {
include "login.php";
} ?>