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

// SPECIAL USER ############################################################################################
if(isset($_SESSION['osp_user'])){
  $query_user_special = mysqli_query($link_osp, "SELECT * FROM user_special WHERE npk = '$_SESSION[osp_user]'");
    if(mysqli_num_rows($query_user_special)>0){
      while($rows_user_special = mysqli_fetch_assoc($query_user_special)){
       $hyarihatto_monitor =  $rows_user_special['hyarihatto_monitor'];
       $hyarihatto_export = $rows_user_special['hyarihatto_export'];
      } 
    } else {
        $hyarihatto_monitor =  0;
        $hyarihatto_export = 0;
    }


}


// GENERAL SETTING ########################################################################################
if(isset($_SESSION['osp_user'])){
  $query_general_setting = mysqli_query($link_osp, "SELECT * FROM setting WHERE parameter = 'max_size_upload'");
    if(mysqli_num_rows($query_general_setting)>0){
      while($rows_general_setting = mysqli_fetch_assoc($query_general_setting)){
       $max_size_upload =  $rows_general_setting['value'];
      } 
    }
    $query_general_setting = mysqli_query($link_osp, "SELECT * FROM setting WHERE parameter = 'image_compress_ratio'");
    if(mysqli_num_rows($query_general_setting)>0){
      while($rows_general_setting = mysqli_fetch_assoc($query_general_setting)){
       $image_compress_ratio =  $rows_general_setting['value'];
      } 
    }  
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


?>



