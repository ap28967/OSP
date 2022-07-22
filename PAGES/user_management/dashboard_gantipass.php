<?php 
    include("../../CONFIG/config.php"); 

    if (!isset($_SESSION['osp_user'])) {
        header("Location: ../../AUTH/auth-login.php");
    }
?>




<?php

    if(isset($_POST['pass_lama'])!="" && isset($_POST['pass_baru'])!="" && isset($_POST['pass_baru_confirm'])!=""){
        $pass_lama = sha1(trim(mysqli_real_escape_string($link_osp, $_POST['pass_lama'])));
        
        $query_pass = mysqli_query($link_osp, "SELECT pass FROM bais_data_user WHERE npk = '$_SESSION[osp_user]'") or die(mysqli_error($link_osp));
        if(mysqli_num_rows($query_pass)>0){
            $current_pass = mysqli_fetch_assoc($query_pass);
            
            if($current_pass['pass']==$pass_lama){
                $password_baru = sha1(trim(mysqli_real_escape_string($link_osp, $_POST['pass_baru'])));
                mysqli_query($link_osp, "UPDATE  bais_data_user SET pass = '$password_baru' WHERE npk = '$_SESSION[osp_user]' ") or die (mysqli_error($link_osp));
                
                ?>


                <script>
                    $('#beda_lama').removeClass('d-block')
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Password berhasil diubah',
                        timer: 2000,
                        
                        icon: 'success',
                        showCancelButton: false,
                        showConfirmButton: false,
                        confirmButtonColor: '#00B9FF',
                        cancelButtonColor: '#B2BABB',            
                    })
                </script>


            <?php                
            } else {?>

            
                <script>
                    $('#beda_lama').addClass('d-block')
                    $('#kosong_lama').removeClass('d-block')
                </script>


            <?php 
            }
        }
    }
?>








