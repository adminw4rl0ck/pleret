<?php
include "../../lib/fungsi.php";
$s = $_GET['s'];
if($s == 'tambah-dokter'){
    $msg = 'Data Dokter Berhasil Dimasukkan';
}if($s == 'suksesUpdate'){
    $msg = 'Data Dokter berhasil diupdate';
}if($s == 'sukses-hapus'){
    $msg = 'Data dokter berhasil dihapus';
}if($s == 'error'){
    $msg = 'Terjadi kesalahan';
}
?>

<h1 class="pagetitle">Halaman Data Dokter</h1>
<div class="column1-unit">
  <div class="contactform">
    <form method="post" action="<?php echo base_url() ?>admin/dokter/tambah">
      <fieldset><legend>&nbsp;Olah Retribusi&nbsp;</legend>
        <p align="center"><span id="error"><?php echo $msg; ?></span></p>
        <p><label class="left">ID Dokter:</label>
           <input type="text" class="field" name="id" value="<?php echo rand_id('id_retribusi','retribusi') ?>" tabindex="1" /></p>
        <p><label class="left">Nama Dokter:</label>
           <input type="text" class="field" name="nama" tabindex="1" /></p>
        <p><label class="left">Jenis Kelamin: </label>
           <input name="jk" value="L" type="radio"/>Laki Laki &nbsp;
           <input name="jk" value="P" type="radio"/>Perempuan
        </p>
        <p><label class="left">Alamat:</label>
           <textarea cols="10" rows="10"tabindex="5" name="alamat"></textarea></p>
        <p><label class="left">Spesialis:</label>
           <input type="text" class="field" name="spesial" tabindex="1" /></p>
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
$mysql = mysql_query("select * from dokter order by nama_dokter desc limit $from, $max_results");

?>
		
 <h1 class="block">Daftar Dokter</h1>
        <div class="column1-unit">
          <table>
            <tr>
                <th class="top" scope="col">ID Dokter</th>
                <th class="top" scope="col">Nama Dokter</th>
                <th class="top" scope="col">Jenis Kelamin</th>
                <th class="top" scope="col">Spesialis</th>
                <th class="top" scope="col">Aksi</th>
            </tr>
<?php
while($data = mysql_fetch_array($mysql)) {
?>
            <tr>
                <th scope="row"><?php echo $data['id_dokter'] ?></th>
                <td><?php echo $data['nama_dokter'] ?></td>
                <td><?php echo $data['jk_dokter'] ?></td>
                <td><?php echo $data['spesialis'] ?></td>
                <td>
                    <a href="<?php echo base_url() ?>admin/dokter/edit/<?php echo $data['id_dokter'] ?>" title="Ubah detail dokter">Edit</a> | 
                    <a href="<?php echo base_url() ?>admin/dokter/hapus/<?php echo $data['id_dokter'] ?>" title="Hapus data dokter">Hapus</a>
                </td>
            </tr>
<?php } ?>
          </table>
<?php
$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM dokter"),0); 
$total_pages = ceil($total_results / $max_results); 
for($i = 1; $i <= $total_pages; $i++){ 

	if(($page) == $i){ 
	echo "<a class='button-green' href=".$url."admin/dokter/page-$i/>$i</a>"; 
	}
	else
	{ 
	echo "<a class='button-green' href=".$url."admin/dokter/page-$i/>$i</a>";
	} 
} 
?>
        </div>          
        <hr class="clear-contentunit" />