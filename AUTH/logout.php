<?php 
 
session_start();
session_destroy();
 
header("Location: ../AUTH/auth-login.php");
 
?>