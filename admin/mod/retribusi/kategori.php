<?php
if($_SESSION['admin']){
    $s = $_GET['s'];
    if($s == 'error'){
        $msg = 'Terjadi Kesalahan';
    }
?>
<h1 class="pagetitle">Halaman Retribusi</h1>
<div class="column1-unit">
    <div class="contactform">
        <form method="POST" action="<?php echo base_url() ?>admin/retribusi/kategori/tambah">
            <p><a href="<?php echo base_url() ?>admin/retribusi">&laquo; Back</a></p>
            <p align="center"><span id="error"><?php echo $msg; ?></span></p>
            <p>
                <label class="left">Jenis Layanan</label>
                <input type="text" class="field" name="jenis" tabindex="1" />
                <input type="hidden" name="id" value="<?php echo rand_id('id_berita','berita') ?>"/>
            </p>
            <p>
                <input type="submit" id="submit" class="button" name="submit" value="Tambah" tabindex="6" />
            </p>
        </form>
    </div>
</div>
<?php 
} else {
    include "login.php";
}
?>