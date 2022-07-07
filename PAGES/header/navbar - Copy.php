<?php
$dashboard = "../hyarihatto/hyarihatto_form.php";

include("../../CONFIG/config.php"); 
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>


<!DOCTYPE html>
<html lang="en" id="osp_html">




<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard | OSP</title>
  <link rel="shortcut icon" href="../../ASSETS/img/logo-osp.png" />

  <!-- General CSS Files -->  
  <link rel="stylesheet" href="../../ASSETS/modules/summernote/summernote-bs4.min.css">  
  <link rel="stylesheet" href="../../ASSETS/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../ASSETS/bootstrap/css/all.css">  
  <link rel="stylesheet" href="../../ASSETS/css/custom.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="../../ASSETS/css/style.css">
  <link rel="stylesheet" href="../../ASSETS/css/components.css">
  <link rel="stylesheet" href="../../ASSETS/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../../ASSETS/modules/dropzonejs/min/dropzone.min.css">
  


  <style>
    /* The container */
    .kotak {
      display: block;
      position: relative;
      padding-left: 100%;
      margin-bottom: 10px;
      height : 25px;
      cursor: pointer;
      font-size: 20px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border-color: white;
      border-style: 12px;
    }
    .truncate {
      position: absolute;
      white-space : nowrap;
      overflow : hidden;
      text-overflow: ellipsis;      
    }
    /* Hide the browser's default checkbox */
    .kotak input {
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }
    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;      
      left: 0;
      width: 100%;
      height : 25px;
      background-color: #eee;
      border-radius: 16px;
      padding-left: 30px;
      display: inline-block;
      font-size: 65%;   
    }
    /* On mouse-over, add a grey background color */
    .kotak:hover input ~ .checkmark {
      background-color: #ccc;
    }
    /* When the checkbox is checked, add a blue background */
    .kotak input:checked ~ .checkmark {
      /* background-color: #2196F3; */
      background-color: #74C656;
      color: white;
    }
    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }
    /* Show the checkmark when checked */
    .kotak input:checked ~ .checkmark:after {
      display: block;
    }
    /* Style the checkmark/indicator */
    .kotak .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .text-bold {
      font-weight: bold;
    }

    .modif-header{
      background-color: white;
      color: #6777ef;
    }

    .fixed-header{
      z-index: 50;
    }

    .vertical-center {
      margin: 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
  </style>


<style>
/* Center the loader */
  #loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
  }

  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 } 
    to { bottom:0px; opacity:1 }
  }

  @keyframes animatebottom { 
    from{ bottom:-100px; opacity:0 } 
    to{ bottom:0; opacity:1 }
  }

</style>


<style>
  .card-header-custom{
    margin-bottom:0px;
    background: #6777ef;
    height:50px;
  }
  .card-header-custom-icon{
    font-size:20px;
    padding:15px;
    margin-top:-50px;
    color:white;
    border-radius: 10%;
    box-shadow: 3px 3px 0px 0px white;
  }
  .card-header-custom-judul{
    margin-left:60px;
    font-size:18px;
    color:white;
    font-weight:bold;
    
  }
  .bg-merah{
    background-color: #db2164;
  }
  .bg-kuning{
    background-color: #fc930a ;
  }
  .bg-hijau{
    background-color: #58b05c;
  }
  .bg-biru{
    background-color: #13b9ce ;
  }
  .text-merah{
    color: #db2164;
  }
  .text-kuning{
    color: #fc930a;
  }
  .text-hijau{
    color: #58b05c;
  }
  .text-biru{
    color: #13b9ce;
  }
</style>

<!-- CUSTOM INPUT FILE IMAGE PREVIEW -->
<style>

.custom_file_input[type="file"]{
    display: none;
}
.custom_file_label{
    display: block;
    padding:6px;
    text-align:center; 
    color:white; 
    height:35px; 
    border-radius:20px;
}
</style>




<!-- General JS Scripts -->
<script src="../../ASSETS/bootstrap/js/jquery-3.3.1.min.js" ></script>



<!-- NAV BAR ACTIVE SELECTOR -->
<script>
  $(document).ready(function(){
    // EXPAND COLLAPSE
    $(document).on('click', '.buka_menu', function(){
        var buka_menu = $(this).attr('id');
        if(typeof(Storage) != "undefined") {
            sessionStorage.setItem('sesi_buka_menu', buka_menu);
          } else {
            console.log("Sorry, your browser does not support web storage...");
          }
    });
    $('#'+sessionStorage.getItem('sesi_buka_menu')).addClass('active');
    // ACTIVE MENU
    $(document).on('click', '.aktif_submenu', function(){
        var aktif_submenu = $(this).attr('id');
        if(typeof(Storage) != "undefined") {
            sessionStorage.setItem('sesi_aktif_submenu', $(this).attr('id'));
          } else {
            console.log("Sorry, your browser does not support web storage...");
          }
    });
  $('#'+sessionStorage.getItem('sesi_aktif_submenu')).addClass('active');
     });
</script>


<!-- SESI SIDE BAR COLLAPSE -->
<script>
    $(document).ready(function(){        
        $("#sidebarCollapse").on('click', function(e){
          e.preventDefault();
            $("#sidebar").toggleClass('active');
        });
    });
</script>



<!-- /* Get the documentElement (<html>) to display the page in fullscreen */ -->
<script>
  // var elem = document.getElementById("osp_html");
  var elem = document.documentElement;

  function openFullscreen() {  
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) { /* Safari */
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE11 */
      elem.msRequestFullscreen();
    }
    $('#fullscreen_on').addClass('d-none');
    $('#fullscreen_off').removeClass('d-none');
    sessionStorage.setItem('screen', 'fullscreen_on');
  }


  function closeFullscreen() {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) { /* Safari */
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE11 */
      document.msExitFullscreen();
    }
    $('#fullscreen_off').addClass('d-none');
    $('#fullscreen_on').removeClass('d-none');
    sessionStorage.setItem('screen', 'fullscreen_off');
  }
</script>

<script>
  function panah_kiri(){
    if(window.screen.availWidth>=1024){
      $('#button_sidebar_left').addClass('d-none');
      $('#button_sidebar_right').removeClass('d-none');
    }
  }

  function panah_kanan(){
    $('#button_sidebar_left').removeClass('d-none');
    $('#button_sidebar_right').addClass('d-none');
  }

</script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper ">
      <div class="navbar-bg-none"></div>
      <nav class="navbar navbar-expand-lg main-navbar"  style="background-color:white; padding-left:0px; padding-right:0px;">
        <form class="form-inline mr-auto" >
          <ul class="navbar-nav mr-3">
            <li id="button_sidebar_left"><a  href="#" data-toggle="sidebar" class="nav-link nav-link-lg"  onclick="panah_kiri()"><i class="fa-solid fa-circle-chevron-left" style="color: grey; font-size:35px; vertical-align:middle;"></i><span style="color: black; font-size:18px; font-family:'Arial Narrow', 'Arial Narrow', 'Arial Narrow', 'Arial Narrow'; vertical-align:middle;">&nbsp;&nbsp;<?php echo $name_page; ?></span></a></li> 
            <li id="button_sidebar_right" class="d-none" > <a  href="#" data-toggle="sidebar" class="nav-link nav-link-lg" onclick="panah_kanan()"><i class="fa-solid fa-circle-chevron-right" style="color: grey; font-size:35px; vertical-align:middle;"></i><span style="color: black; font-size:18px; font-family:'Arial Narrow', 'Arial Narrow', 'Arial Narrow', 'Arial Narrow'; vertical-align:middle;">&nbsp;&nbsp;<?php echo $name_page; ?></span></a></li>   
          </ul>
        </form>
         


        <!-- ####################### NAVBAR NOTIFIKASI ####################################-->        
        <ul class="navbar-nav navbar-right" >
          <li><a style="padding:5px;"><i class="fa-solid fa-expand" id="fullscreen_on" style="vertical-align:middle; font-size:15px; font-weight:bold; color:black;" onclick="openFullscreen()"></i></a></li>
          <li><a style="padding:5px;"><i class="fa-solid fa-compress d-none" id="fullscreen_off" style="vertical-align:middle; font-size:15px; font-weight:bold; color:black;" onclick="closeFullscreen()"></i></a></li>
        
          <li class="dropdown dropdown-list-toggle " ><a id="notif_beep" name="notif_beep" href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if(isset($status_hyarihatto_belum)) {echo 'beep';}?>"><i class="far fa-bell" style="color:black;"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <!-- <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div> -->
              </div>
              
              <div class="dropdown-list-content dropdown-list-icons">
                <a id="notif_hyarihatto" href="../hyarihatto/hyarihatto_form.php" class="dropdown-item bg-light <?php if(isset($status_hyarihatto_sudah)) {echo "d-none";}?>">
                  <div class="dropdown-item-icon text-white bg-danger">
                    <i class=" fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc text-bold">
                      Reminder Pembuatan Hyarihatto bulan ini
                    <div class="time text-bold"><?php echo $thn."-".$bln; ?></div>
                  </div>
                </a>
                <!-- <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
              
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>-->

          

          <!-- ####################### NAVBAR PROFIL ####################################-->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown nav-link-lg nav-link-user">   
            <img alt=""  src="../../ASSETS/img/avatar/avatar-5.png" class="rounded-circle mr-1" style="width:35px; height:35px;">
            
            <div class="d-sm-none d-lg-inline-block" style="color: black;"> <?php echo "Hi,".$_SESSION['osp_nama_depan']; ?>&nbsp;<i class="fa fa-angle-down" style="color: black; font-size:small"></i></div></a>
            
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"><?="[ ".$_SESSION['osp_level']." ]"?></div>
              <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="../../AUTH/logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>


<!-- ###################################### SIDE BAR ##################################################### -->

<div class="main-sidebar" >
        <aside id="sidebar-wrapper"  >
          <div class="sidebar-brand"  >
            <a class="nav-link" href="<?php echo $dashboard; ?>"><img alt="OSP" src="../../ASSETS/img/logo-osp.png" width="95px"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a class="nav-link" href="<?php echo $dashboard; ?>">OSP</a>            
          </div>

          <ul class="sidebar-menu" >            
              <li class="menu-header"></li>
              <li class="menu-header"></li>
              <li class="nav-item dropdown buka_menu" data-name="hyarihatto" id="hyarihatto">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hyarihatto</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="hyariform"><a href="../hyarihatto/hyarihatto_form.php">Form Hyarihatto</a></li>
                  <li class="aktif_submenu" id="ach"><a href="../hyarihatto/hyarihatto_list.php">My Hyarihatto</a></li>
                  <?php if ($_SESSION['osp_code_level']>=3 or $hyarihatto_export == 1){?> 
                    <li class="aktif_submenu" id="hyarimtr"><a  href="../hyarihatto/hyarihatto_monitoring.php">Monitor Hyarihatto</a></li>
                  <?php } ?>
                </ul>
              </li>       

              
              
        </aside>
      </div>





      <!-- Main Content --> 
      <div class="main-content">        
        <section class="section" style="margin-top:25px;" >  
          <div class="section-body">













