<?php                   
    include("../../CONFIG/config.php"); 

    if (!isset($_SESSION['osp_user'])) {
        header("Location: ../../AUTH/auth-login.php");
    }

?>



