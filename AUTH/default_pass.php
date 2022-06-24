<?php 

include("../CONFIG/koneksi.php"); 

$query_ambil = mysqli_query($link_osp, "SELECT npk FROM bais_data_user") or die (mysqli_error($link_osp));
while ($query_ambil->num_rows > 0) {
  $result_ambil = mysqli_fetch_assoc($query_ambil);

  $npk = $result_ambil['npk'];
  $password = sha1($npk);










  mysqli_query($link_osp, "UPDATE  bais_data_user SET pass = '$password' WHERE npk = $npk ") or die (mysqli_error($link_osp));

      
} 

echo "Selesai"

  ?>


