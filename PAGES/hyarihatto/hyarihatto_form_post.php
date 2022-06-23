<?php 
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}



// Fungsi Sesi NPK
$npk           = $_SESSION['osp_user'];
$kategori      = $_POST['kategori'];
$risk          = $_POST['risk'];
$stop6         = $_POST['stop6'];
$icare         = $_POST['icare'];
$tanggal       = $_POST['tanggal'];
$lokasi        = $_POST['lokasi'];      
$temuan        = $_POST['temuan'];
$penyebab      = $_POST['penyebab'];
$saran         = $_POST['saran'];




$ekstensi =  array('png','jpg','jpeg','gif','img');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$basename = pathinfo($filename, PATHINFO_FILENAME);
$destination = '../../CACHE/hyarihatto/';

$id = $thn.$bln."_".$npk;
// $xx = $basename.'_'.$thn.$bln.".".$ext;
$xx = $id.".".$ext;



if(in_array($ext,$ekstensi) ) {
	if($ukuran < (99*1024*1024)){
        compressedImage($_FILES['foto']['tmp_name'], $destination.$xx,25);
		mysqli_query($link_osp, "INSERT INTO hyarihatto (`id`, `npk`, `kategori`, `risk`, `stop6`, `icare`, `tanggal`, `lokasi`, `temuan`, `penyebab`, `saran`, `nama_file`)
                                 VALUES('$id','$npk','$kategori','$risk','$stop6','$icare','$tanggal','$lokasi','$temuan','$penyebab','$saran','$xx')");
       
        ?>        
        <script>
        Swal.fire({
            title: 'Berhasil',
            text: 'Data Berhasil Dikirim',
            timer: 2000,
            
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonColor: '#00B9FF',
            cancelButtonColor: '#B2BABB',            
        })
        $('#formInputData').addClass('d-none');
         $('#notifSudah').removeClass('d-none'); 
            // $('#formInputData')[0].reset();  
        </script>

        <?php        
	}else{
        ?>
        <script>
         Swal.fire({
            title: 'Gagal',
            text: 'Ukuran Foto terlalu besar (Max 4MB)',
            timer: 3000,
            
            icon: 'warning',
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonColor: '#00B9FF',
            cancelButtonColor: '#B2BABB',
          })
        </script>
        <?php
    }
}else{
    ?>
    <script>
         Swal.fire({
            title: 'Gagal',
            text: 'Format file salah (Standar: jpg, jpeg, png, gif, img)',
            timer: 3000,
            
            icon: 'warning',
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonColor: '#00B9FF',
            cancelButtonColor: '#B2BABB',
          })
        </script>
    <?php	
} 
?>