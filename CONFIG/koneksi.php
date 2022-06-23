<?php

// Set Zona Waktu
date_default_timezone_set('Asia/Jakarta');
// Start Session
session_start();


//koneksi database osp
$dbhost_osp = "localhost";
$dbuser_osp = "root";
$dbpass_osp = "";
$dbname_osp = "osp_db";
$link_osp = mysqli_connect($dbhost_osp,$dbuser_osp,$dbpass_osp,$dbname_osp);
if (!$link_osp) {
    // die("<script>alert('Gagal tersambung dengan database.')</script>");
    header("location: errors-404.html");
}

?>