<?php 
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}



// Fungsi Sesi NPK
$npk                = $_SESSION['osp_user'];
$kategori           = $_POST['kategori'];
$risk               = $_POST['risk'];
$stop6              = $_POST['stop6'];
$icare              = $_POST['icare'];
$tanggal_kejadian   = $_POST['tanggal'];
$lokasi             = $_POST['lokasi'];      
$temuan             = $_POST['temuan'];
$penyebab           = $_POST['penyebab'];
$saran              = $_POST['saran'];




$ekstensi =  array('png','jpg','jpeg','gif','img');
$destination = '../../CACHE/hyarihatto/';
$id = $thn.$bln."_".$npk;


$foto_temuan = $_FILES['foto_temuan']['name'];
$foto_temuan_ukuran = $_FILES['foto_temuan']['size'];
$foto_temuan_ext = strtolower(pathinfo($foto_temuan, PATHINFO_EXTENSION));
// $basename = pathinfo($foto_temuan, PATHINFO_FILENAME);
$foto_temuan_basename = $id."_temuan.".$foto_temuan_ext;


if(isset($_FILES['foto_perbaikan'])){
    $foto_perbaikan = $_FILES['foto_perbaikan']['name'];
    $foto_perbaikan_ukuran = $_FILES['foto_perbaikan']['size'];
    $foto_perbaikan_ext = strtolower(pathinfo($foto_perbaikan, PATHINFO_EXTENSION));
    $foto_perbaikan_basename = $id."_perbaikan.".$foto_perbaikan_ext;
} else {
    $foto_perbaikan_basename = "";
}





if(in_array($foto_temuan_ext,$ekstensi) ) {
	if($foto_temuan_ukuran < ($max_size_upload*1024*1024)){

        compressedImage($_FILES['foto_temuan']['tmp_name'], $destination.$foto_temuan_basename,$image_compress_ratio);
        if(isset($_FILES['foto_perbaikan'])){
            compressedImage($_FILES['foto_perbaikan']['tmp_name'], $destination.$foto_perbaikan_basename,$image_compress_ratio);
        }
        
		mysqli_query($link_osp, "INSERT INTO hyarihatto (`id`, `npk`, `kategori`, `risk`, `stop6`, `icare`, `tanggal_kejadian`, `lokasi`, `temuan`, `penyebab`, `saran`, `foto_temuan`, `foto_perbaikan`)
                                 VALUES('$id','$npk','$kategori','$risk','$stop6','$icare','$tanggal_kejadian','$lokasi','$temuan','$penyebab','$saran','$foto_temuan_basename', '$foto_perbaikan_basename')");
       
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
        $('#notif_beep').removeClass('beep'); 
        $('#notif_hyarihatto').addClass('d-none'); 
        </script>

        <div class="card-body">
            <div class="alert alert-success">
            Terimakasih anda sudah membuat Hyarihatto bulan ini.
            </div>
        </div>

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