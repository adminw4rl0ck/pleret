<?php session_start();
if(!empty($_SESSION['admin']) ) {
include "../lib/koneksi.php";
include "lib/fungsi.php";
?>
<html>
<head>
<title>Administrator Puskesmas Pleret Bantul</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/layout_admin_text.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/layout_admin.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<script>
$(document).ready(function() {

$('#error').show();
$(window).load(function(){
$('#error').fadeOut(3000);
});
});
</script>
</head>
<body>
  <div class="page-container">      
    <div class="header">
      <div class="header-top">
        <a class="sitelogo" href="#"></a>
        <div class="sitename">
          <h1><a href="<?php echo base_url() ?>admin/dashboard">Sistem Informasi Puskesmas</a></h1>
          <h2>Open Source Template</h2>
        </div>
      </div>
      <div class="header-bottom">
	  </div>
    </div>
    <div class="main">
      <div class="main-navigation">
        <div class="round-border-topright"></div>
        <h1 class="first">Navigation</h1>
        <dl class="nav3-grid">
          <dt><a href="<?php echo base_url() ?>admin/dashboard">Home</a></dt>
          <dt><a href="<?php echo base_url() ?>admin/profil">Profil</a></dt>	
          <dt><a href="<?php echo base_url() ?>admin/berita">Berita</a></dt>
          <dt><a href="<?php echo base_url() ?>admin/fasilitas">Fasilitas</a></dt>
          <dt><a href="<?php echo base_url() ?>admin/retribusi">Retribusi</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/jamkes">Jaminan Kesehatan</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/dokter">Dokter</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/layanan">Pelayanan Kami</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/kritik.php">Kritik dan Saran</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/konsultasi.php">Konsultasi</a></dt>
		  <dt><a href="<?php echo base_url() ?>admin/logout.php">Logout</a></dt>
        </dl>                       
      </div>
      <div class="main-content">
            <?php include "mod.php"; ?>
      </div> 
    </div>
    <div class="footer">
      <p>Copyright &copy; 2012 Puskesmas System Information | All Rights Reserved</p>
      <p class="credits">Design by <a href="http://www.jogjadev.com/">&copy; JogjaDev</a></p>
    </div>      
  </div> 
  
</body>
</html>

<?php } else { 
include "login.php";
} 
?>