<?php
session_start();
session_destroy();
header("location:login.php?s=logout&d=doLogin");
?>