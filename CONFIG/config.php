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

// PROFIL USER #############################################################################################
if(isset($_SESSION['osp_user'])){
  $query_organization = mysqli_query($link_osp, "SELECT * FROM view_organization WHERE npk = '$_SESSION[osp_user]'") or die(mysqli_error($link_osp));
  if(mysqli_num_rows($query_organization)>0){
      $profil_organization = mysqli_fetch_assoc($query_organization); 
      
      
      $plant = $profil_organization['plant'];
      $division = $profil_organization['division'];
      $department = $profil_organization['dept'];
      $dept_account = $profil_organization['dept_account'];
      $section = $profil_organization['section'];
      $groupfrm = $profil_organization['groupfrm'];
      $pos = $profil_organization['pos'];
      
      $id_plant = $profil_organization['id_plant'];
      $id_division = $profil_organization['id_division'];
      $id_department = $profil_organization['id_dept'];
      $id_dept_account = $profil_organization['id_dept_account'];
      $id_section = $profil_organization['id_sect'];
      $id_groupfrm = $profil_organization['id_grp'];
      $id_pos = $profil_organization['id_post_leader'];



      $npk = $profil_organization['npk'];
      $nama = $profil_organization['nama'];
      $nama_depan = $profil_organization['nama_depan'];
      $shift = $profil_organization['shift'];
      $jabatan = $profil_organization['jabatan'];
      $status = $profil_organization['status'];
      $tgl_masuk = $profil_organization['tgl_masuk'];
      
      
      
  }

  $query_user = mysqli_query($link_osp, "SELECT * FROM view_user WHERE npk = '$_SESSION[osp_user]'") or die(mysqli_error($link_osp));
  if(mysqli_num_rows($query_user)>0){
      $profil_user = mysqli_fetch_assoc($query_user);
      $level = $profil_user['level'];
      $id_role = $profil_user['id_role'];
      $role_name = $profil_user['role_name'];
  }


  $query_karyawan = mysqli_query($link_osp, "SELECT * FROM karyawan_profile WHERE npk = '$_SESSION[osp_user]'") or die(mysqli_error($link_osp));
  if(mysqli_num_rows($query_karyawan)>0){
      $profil_karyawan = mysqli_fetch_assoc($query_karyawan);
      $birth_city = $profil_karyawan['birth_city'];
      $birth = $profil_karyawan['birth'];
      $handphone = $profil_karyawan['handphone'];
      $email = $profil_karyawan['email'];
      $domisili = $profil_karyawan['domisili'];
  } else {
      $birth_city = '';
      $birth = '';
      $handphone = '';
      $email = '';
      $domisili = '';
  }
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



