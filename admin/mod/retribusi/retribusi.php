<?php
include "../../lib/fungsi.php";
$s = $_GET['s'];
if($s == 'suksesUpdate'){
    $msg = 'Retribusi Berihasil Diupdate';
} if($s == 'tambah-retribusi'){
    $msg = 'Berhasil Ditambah';
} if($s == 'sukses_hapus'){
	$msg = 'Data retribusi berhasil dihapus';
} if($s == 'error'){
	$msg = 'Terjadi kesalahan';
}
?>

<h1 class="pagetitle">Halaman Retribusi</h1>
<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="<?php echo base_url() ?>admin/retribusi/tambah">
              <fieldset><legend>&nbsp;Olah Retribusi&nbsp;</legend>
                <p align="center"><span id="error"><?php echo $msg; ?></span></p>
                <p><label class="left">ID Retribusi:</label>
                   <input type="text" class="field" value="<?php echo rand_id('id_retribusi','retribusi') ?>" tabindex="1" name="id"/></p>
                <p><label class="left">Jenis Pelayanan:</label>
                    <select name="jenis" class="combo">
                        <option value="0">Jenis Layanan</option>
<?php
$sql = "select * from kategori_retribusi";
$mysql = mysql_query($sql);
while ($data = mysql_fetch_array($mysql)){
?>
                        <option value="<?php echo $data['id_kategori_retribusi'] ?>"><?php echo $data['jenis_retribusi'] ?></option>
<?php } ?>
                   </select>
                   <a href="<?php echo base_url(); ?>admin/retribusi/kategori" >+ Tambah Jenis Layanan</a>
                </p>
                <p><label class="left">Nama Retribusi:</label>
                   <input type="text" class="field" name="nama" tabindex="1" /></p>
				<p><label class="left">Tarif:</label>
                   <input type="text" class="field" name="tarif" tabindex="1" /></p>
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
$mysql = mysql_query("select * from retribusi order by id_retribusi desc limit $from, $max_results");

?>
		
		 <h1 class="block">Data Retribusi</h1>
        <div class="column1-unit">
          <table>
            <tr>
			<th class="top" scope="col">ID Retribusi</th>
			<th class="top" scope="col">Jenis Pelayanan</th>
			<th class="top" scope="col">Nama Retribusi</th>
			<th class="top" scope="col">Tarif</th>
			<th class="top" scope="col">Aksi</th>
			</tr>
<?php
while($data=mysql_fetch_array($mysql)){
$jenis = $data['id_kategori_retribusi'];
$sql = "select jenis_retribusi from kategori_retribusi where id_kategori_retribusi = '$jenis'";
$query = mysql_query($sql);
$fetch = mysql_fetch_array($query);
$layanan = $fetch['jenis_retribusi'];
?>                        
            <tr>
				<th scope="row"><?php echo $data['id_retribusi'] ?></th>
				<td><?php echo $layanan ?></td>
				<td><?php echo $data['nm_retribusi'] ?></td>
				<td><?php echo $data['tarif'] ?></td>
				<td>
                                    <a href="<?php echo base_url() ?>admin/retribusi/edit/<?php echo $data['id_retribusi'] ?>" title="Ubah Detail Retribusi">Edit</a> | 
                                    <a href="<?php echo base_url() ?>admin/retribusi/hapus/<?php echo $data['id_retribusi'] ?>" title="Hapus Retribusi">Hapus</a>
                                </td>
			</tr>
<?php } ?>
          </table>
<?php
$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM retribusi"),0); 
$total_pages = ceil($total_results / $max_results); 
for($i = 1; $i <= $total_pages; $i++){ 

	if(($page) == $i){ 
	echo "<a class='button-green' href=".$url."admin/retribusi/page-$i/>$i</a>"; 
	}
	else
	{ 
	echo "<a class='button-green' href=".$url."admin/retribusi/page-$i/>$i</a>";
	} 
} 
?>
        </div>          
        <hr class="clear-contentunit" /> 