<?php                   
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>



            
<?php

if(isset($_GET['pilihSect'])!=""){
    $pilihSect = $_GET['pilihSect'];
?>
    <select type="text" class="form-control dataGrp" id="pilihGrp" name="pilihGrp">
        <option value="">Pilih...</option>
        <option id="all_grp" value="" class="d-none" disabled selected>All</option>

        <?php 
            $query_grp = mysqli_query($link_osp,"SELECT * FROM bais_id_group WHERE id_section = '$pilihSect'") or die(mysqli_error($link_osp));
            if (mysqli_num_rows( $query_grp)>0){
                while($rows_grp = mysqli_fetch_assoc( $query_grp)){
                    echo '<option class="callback_grp" value="'.$rows_grp['id_group'].'">'.$rows_grp['nama_group'].'</option>'; 
                }
            }
        ?>

    </select> 
<?php
} //Isset
?>




            





