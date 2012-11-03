<h1 class="pagetitle">Halaman Data Dokter</h1>
<div class="column1-unit">
  <div class="contactform">
    <form method="post" action="<?php echo base_url() ?>admin/dokter/edit-dokter.php">
<?php
$id = $_GET['id'];
$sql = "select * from dokter where id_dokter = '$id'";
$query = mysql_query($sql);
$hasil = mysql_fetch_array($query);
?>
      <fieldset><legend>&nbsp;Olah Retribusi&nbsp;</legend>
        <p align="center"><span id="error"><?php echo $msg; ?></span></p>
        <input type="hidden" class="field" name="id" value="<?php echo $hasil['id_dokter'] ?>" tabindex="1" />
        <p><label class="left">Nama Dokter:</label>
           <input type="text" class="field" name="nama" tabindex="1" value="<?php echo $hasil['nama_dokter'] ?>"/></p>
        <p><label class="left">Jenis Kelamin: </label>
<?php
$jk1 = '';
$jk2 = '';
if($hasil['jk_dokter'] == 'L'){
    $jk1='checked="checked"';
} elseif($hasil['jk_dokter'] == 'P'){
    $jk2='checked="checked"';
}
?>
           <input name="jk" value="L" type="radio" <?php echo $jk1 ?>/>Laki Laki &nbsp;
           <input name="jk" value="P" type="radio" <?php echo $jk2 ?>/>Perempuan
        </p>
        <p><label class="left">Alamat:</label>
           <textarea cols="10" rows="10"tabindex="5" name="alamat"><?php echo $hasil['alamat'] ?></textarea></p>
        <p><label class="left">Spesialis:</label>
           <input type="text" class="field" name="spesial" tabindex="1" value="<?php echo $hasil['spesialis'] ?>"/></p>
                        <p><input type="submit" name="submit" id="submit" class="button" value="Publish" tabindex="6" /></p>

      </fieldset>
    </form>
  </div>              
</div>