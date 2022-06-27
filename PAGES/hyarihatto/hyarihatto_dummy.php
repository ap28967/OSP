<?php 
include("../../CONFIG/config.php"); 

// if (!isset($_SESSION['osp_user'])) {
//     header("Location: ../../AUTH/auth-login.php");
// }

$i = 1;

$query_npk = mysqli_query($link_osp, "SELECT * FROM bais_org");

if(mysqli_num_rows($query_npk)>0){  
    while($result_npk = mysqli_fetch_assoc($query_npk)){

        // Fungsi Sesi NPK
        $npk           = $result_npk['npk'];
        $kategori      = "Unsafe Condition";
        $risk          = "High Risk";
        $stop6         = "Car";
        $icare         = "Integrity";
        $tanggal       = "2022-05-01";
        $lokasi        = "Jakut";      
        $temuan        = "Accident Car";
        $penyebab      = "Ngebut";
        $saran         = "Jangan Ngebut";
        $filename      = "foto.png";
        $id            = $thn.$bln."_".$npk;




        mysqli_query($link_osp, "INSERT INTO hyarihatto (`id`, `npk`, `kategori`, `risk`, `stop6`, `icare`, `tanggal`, `lokasi`, `temuan`, `penyebab`, `saran`, `nama_file`, `tglinput`)
                                    VALUES('$id','$npk','$kategori','$risk','$stop6','$icare','$tanggal','$lokasi','$temuan','$penyebab','$saran','$filename', '2022-05-22 10:15')");
            

        echo $i++ . '<br>';
    }
}
echo "Selesai";

?>