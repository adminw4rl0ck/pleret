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
$mysql = mysql_query("select * from kritik_saran order by id_kritik_saran desc limit $from, $max_results");

?>

<h1 class="pagetitle">Halaman Kritik Saran</h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top">No.</th>
            <th class="top">Komentar</th>
            <th class="top">Aksi</th>
        </tr>
<?php $no = 1;
while($data=mysql_fetch_array($mysql)){

?>
        <tr>
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $data['tanggal_berita']; ?></td>
            <td>
                    <a href="<?php echo base_url(); ?>admin/kritik/lihat/<?php echo $data['id_berita']; ?>" title="Edit Berita">Lihat Detail</a>
            </td>
        </tr>
<?php
$no++;
}

?>
          </table>
<?php
$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM kritik_saran"),0); 
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