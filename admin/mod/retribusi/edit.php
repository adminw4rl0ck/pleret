<?php
include "../../lib/fungsi.php";
$id = $_GET['id'];
$sql = "select * from retribusi where id_retribusi = '$id' ";
$query = mysql_query($sql);
$hasil = mysql_fetch_array($query);
$kategori = $hasil['id_kategori_retribusi'];
$jenis = "select * from kategori_retribusi where id_kategori_retribusi = '$kategori'";
$hasil2 = mysql_fetch_array(mysql_query($jenis));
$kat = $hasil2['jenis_retribusi'];
?>

<h1 class="pagetitle">Halaman Retribusi</h1>
<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="<?php echo base_url() ?>admin/retribusi/edit-retribusi.php">
              <fieldset><legend>&nbsp;Olah Retribusi&nbsp;</legend>
               <input type="hidden" class="field" value="<?php echo $hasil['id_retribusi'] ?>" tabindex="1" name="id"/>
               <p><label class="left">Jenis Pelayanan:</label>
                    <select name="jenis" class="combo">
                        <option value="0">Jenis Layanan</option>
<?php
$sql = "select * from kategori_retribusi";
$mysql = mysql_query($sql);
$checked = '';
while ($data = mysql_fetch_array($mysql)){
if($hasil2['id_kategori_retribusi'] == $data['id_kategori_retribusi'] ){
    $checked = 'selected="selected"';
}
?>
                        <option value="<?php echo $data['id_kategori_retribusi'] ?>" <?php echo $checked ?>><?php echo $data['jenis_retribusi'] ?></option>
<?php } ?>
                   </select>
                </p>
                <p><label class="left">Nama Retribusi:</label>
                   <input type="text" class="field" name="nama" tabindex="1" value="<?php echo $hasil['nm_retribusi'] ?>"/></p>
				<p><label class="left">Tarif:</label>
                   <input type="text" class="field" name="tarif" tabindex="1" value="<?php echo $hasil['tarif'] ?>" /></p>
				<p><input type="submit" name="submit" id="submit" class="button" value="Publish" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>              
        </div>