<?php 

include('koneksi.php');


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
$id_hyarihatto = $thn.$bln."_".$_SESSION['osp_user'];
$query_status_hyarihatto = mysqli_query($link_osp, "SELECT id FROM hyarihatto WHERE id = '$id_hyarihatto' ");
if($query_status_hyarihatto->num_rows == 0) {
  $status_hyarihatto_belum = "belum";      
} else {
  $status_hyarihatto_sudah = "sudah";
}


// session_start();
?>



