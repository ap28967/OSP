<?php 
// KONEKSI
  include("../../CONFIG/config.php"); 





    $query_npk = mysqli_query($link_osp, "SELECT * FROM bais_data_user") or die (mysqli_error($link_osp));
    if(mysqli_num_rows($query_npk)>0){
        while ($rows_npk = mysqli_fetch_assoc($query_npk)) {          
          $npk = $rows_npk['npk'];
            $pass =  $npk;      
          $password = sha1($pass);
          mysqli_query($link_osp, "UPDATE  bais_data_user SET pass = '$password' WHERE npk = '$npk' ") or die (mysqli_error($link_osp));
        }
      } 
     ?>

    
     <div>Password Selesai diganti</div>

