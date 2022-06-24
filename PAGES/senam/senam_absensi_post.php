<?php 
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}


// $request = $_REQUEST;
// echo count($_POST['checkbox'])
// $arrayLength = count($request);





// Fungsi Sesi NPK
$tgl       = date('Y-m-d');
$updater    = $_SESSION['osp_user'];
$session_id_group = $_SESSION['osp_grp']; // GANTI PAKE SESSION

$query_compare = "SELECT bais_org.npk AS `npk_anggota`                              
FROM bais_org JOIN bais_id_group ON bais_org.grp = bais_id_group.id_group
WHERE bais_org.grp = '$session_id_group'";
$results = mysqli_query($link_osp, $query_compare) or die (mysqli_error($link_osp));
$total_mp = mysqli_num_rows($results);

if(isset($_POST['checkbox'])){
    $total_post = count($_POST['checkbox']);


    while ($rows = mysqli_fetch_assoc($results)){        
    $npk_anggota =  $rows['npk_anggota'];
    // echo $npk_anggota;
    // array_push($array, $npk_anggota);
        if(in_array($npk_anggota,$_POST['checkbox'])){
            // echo "ada <br>";
            $npk = $npk_anggota;
            $status = 1;
            $id_senam = $npk.$tgl;
            $query = "REPLACE senam_absensi (`id_senam`, `npk`, `status`, `updater`) VALUES('$id_senam','$npk', '$status', '$updater')";
            mysqli_query($link_osp, $query);

        } else {
            // echo "tidak ada <br>";
            $npk = $npk_anggota;
            $status = 0;
            $id_senam = $npk.$tgl;
            $query = "REPLACE senam_absensi (`id_senam`, `npk`, `status`, `updater`) VALUES('$id_senam','$npk', '$status', '$updater')";
            mysqli_query($link_osp, $query);
        }
    }
        ?>

        

                    <?php echo $total_post; echo " / "; echo $total_mp; ?>
 

          <script>
            Swal.fire({
                title: 'Berhasil',
                text: 'Data Berhasil Diupdate',
                timer: 2000,
                
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#00B9FF',
                cancelButtonColor: '#B2BABB',            
            })
        </script>

<?php    
} else {
        while ($rows = mysqli_fetch_assoc($results)){        
            $npk_anggota =  $rows['npk_anggota'];
            $npk = $npk_anggota;
            $status = 0;
            $id_senam = $npk.$tgl;
            $query = "REPLACE senam_absensi (`id_senam`, `npk`, `status`, `updater`) VALUES('$id_senam','$npk', '$status', '$updater')";
            mysqli_query($link_osp, $query);
        }

            echo 0; echo " / "; echo $total_mp; ?>

            <script>
                Swal.fire({
                    title: 'Silahkan Pilih',
                    text: 'Tidak Ada Data yang Dipilih',
                    timer: 2000,
                    
                    icon: 'info',
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonColor: '#00B9FF',
                    cancelButtonColor: '#B2BABB',            
                })
            </script>
<?php
}              
?>






      
