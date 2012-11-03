<?php 
session_start();
if($_SESSION['admin']){
    if(empty($_POST)){
        header('location:error');
    } else {
        $jenis = $_POST['jenis'];
	$id = $_POST['id'];
	$sql = "insert into kategori_retribusi values('$id','$jenis');";
	mysql_query($sql); 
?>
	<meta http-equiv="refresh" content="0;URL=<?php echo base_url(); ?>admin/retribusi" />
<?php
    }
} else { 
    include "login.php";
} ?>