<?php 

// Set Zona Waktu
date_default_timezone_set('Asia/Jakarta');
// Start Session
session_start();


//koneksi database osp ################################################################################################
$dbhost_osp = "localhost";
$dbuser_osp = "root";
$dbpass_osp = "";
$dbname_osp = "osp_db";
$link_osp = mysqli_connect($dbhost_osp,$dbuser_osp,$dbpass_osp,$dbname_osp);
if (!$link_osp) {
    // die("<script>alert('Gagal tersambung dengan database.')</script>");
    header("location: ../CONFIG/404.html");
}


// FUNCTION ################################################################################################
// fungsi waktu
$t = time();
$date = date("Y-m-d");
$thn = substr($date,0,4);
$bln = substr($date,5,2);
$tgl = substr($date,8,2);


// Fungsi Compress Image
function compressedImage($source, $path, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);
    imagejpeg($image, $path, $quality);
}




// NOTIFIKASI #############################################################################################
// Untuk Check Sudah Isi Form Hyarihatto apa Belum
if(isset($_SESSION['osp_user'])){
  $id_hyarihatto = $thn.$bln."_".$_SESSION['osp_user'];
  $query_status_hyarihatto = mysqli_query($link_osp, "SELECT id FROM hyarihatto WHERE id = '$id_hyarihatto' ");
  if($query_status_hyarihatto->num_rows == 0) {
    $status_hyarihatto_belum = "belum";      
  } else {
    $status_hyarihatto_sudah = "sudah";
  }
}

// session_start();
?>



