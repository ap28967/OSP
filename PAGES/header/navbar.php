<?php
  $dashboard = "../dashboard/dashboard.php";

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
  <link rel="stylesheet" href="../../ASSETS/fontawesome-free-6.1.1-web/css/all.min.css">   
  <link rel="stylesheet" href="../../ASSETS/css/custom.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="../../ASSETS/css/style.css">
  <link rel="stylesheet" href="../../ASSETS/css/components.css">
  <link rel="stylesheet" href="../../ASSETS/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../../ASSETS/modules/dropzonejs/min/dropzone.min.css">
  <link rel="stylesheet" href="../../ASSETS/morris.js-0.5.1/morris.css">

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

    .morris-hover {
    position:absolute;
    z-index:1000;
    }

    /* MORRIS RESIZE */
    .morris-hover.morris-default-style {     
      border-radius:10px;
      padding:6px;
      color:#666;
      background:rgba(255, 255, 255, 0.8);
      border:solid 2px rgba(230, 230, 230, 0.8);
      font-family:sans-serif;
      font-size:12px;
      text-align:center;
    }

    .morris-hover.morris-default-style .morris-hover-row-label {
      font-weight:bold;
      margin:0.25em 0;
    }

    .morris-hover.morris-default-style .morris-hover-point {
      white-space:nowrap;
      margin:0.1em 0;
    }

    svg { width: 100%; }
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

  <!-- FULLSCREEN BUTTON ON NAVBAR -->
  <script>
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

  <!-- JAM PADA NAVBAR ##################################################################################-->
  <script>
    $(document).ready(function(){
      if(window.screen.availWidth>=1024){
        $('#jam_a').removeClass('d-none');    
      }
    })
    window.setTimeout("waktu()", 1000); 
    function waktu() {
      var currentdate = new Date();
      setTimeout("waktu()", 1000);
      var current = currentdate.toLocaleTimeString();     
      document.getElementById("jam").innerHTML = current;
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
            <li id="button_sidebar_left"><a  href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa-solid fa-bars" style="color: grey; font-size:25px; vertical-align:middle;"></i><span style="color: black; font-size:19px; font-family:'Arial', 'Arial Narrow', 'Arial Narrow', 'Arial Narrow'; vertical-align:middle; margin-left:15px;"><?php echo $name_page; ?></span></a></li>  
          </ul>
        </form>
         


        <!-- ####################### NAVBAR TOPBAR ####################################-->        
        <ul class="navbar-nav navbar-right" >
          <!-- JAM -->
          <a id="jam_a" class="d-none" style="font-size:15px; margin-right:5px;"><i class="fa fa-clock"  style="vertical-align:middle; margin-right:3px;"></i><span id="jam" style="vertical-align:middle; color:grey; margin-right:15px; font-family:'Arial', 'Arial Narrow', 'Arial Narrow', 'Arial Narrow';"></span></a>

          <!-- FULL SCREEN TOGGLE -->
          <li><a style="padding:5px;"><i class="fa-solid fa-expand" id="fullscreen_on" style="vertical-align:middle; font-size:15px; font-weight:bold; color:black;" onclick="openFullscreen()"></i></a></li>
          <li><a style="padding:5px;"><i class="fa-solid fa-compress d-none" id="fullscreen_off" style="vertical-align:middle; font-size:15px; font-weight:bold; color:black;" onclick="closeFullscreen()"></i></a></li>
        
          <!-- NOTIFIKASI DROPDOWN -->
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
                    <div class="time text-bold"><?php echo $thn."-".$bln."-01"; ?></div>
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
            <img alt=""  src="../../ASSETS/img/avatar/avatar-5.png" class="rounded-circle" style="width:25px; height:25px;">
            
            <div class="d-sm-none d-lg-inline-block" style="color: black;"> <?php echo "Hi, ".$nama_depan; ?>&nbsp;<i class="fa fa-angle-down" style="color: black; font-size:small"></i></div></a>
            
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title" style="font-size: 8px;"><?=$role_name;?></div>
              <a href="../dashboard/dashboard.php" class="dropdown-item has-icon">
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
                     
              <!-- <li class="menu-header"></li>
              <li class="menu-header"></li> -->
             

              <li class="menu-header">PMRs</li>
              <!-- SIDEBAR HYARIHATTO -->
              <li class="nav-item dropdown buka_menu" data-name="hyarihatto" id="hyarihatto">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-car-burst"></i> <span>Hyarihatto</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="hyariform"><a href="../hyarihatto/hyarihatto_form.php">Form Hyarihatto</a></li>
                  <li class="aktif_submenu" id="ach"><a href="../hyarihatto/hyarihatto_list.php">My Hyarihatto</a></li>
                  <?php if ($level>=3 or $hyarihatto_export == 1){?> 
                    <li class="aktif_submenu" id="hyarimtr"><a  href="../hyarihatto/hyarihatto_monitoring.php">Monitor Hyarihatto</a></li>
                    <li class="aktif_submenu" id="hyaridetail"><a  href="../hyarihatto/hyarihatto_detail.php">Detail Hyarihatto</a></li>
                  <?php } ?>
                </ul>
              </li>
              <!-- SIDEBAR KY GENBUTSU -->
              <li class="nav-item dropdown buka_menu" data-name="ky_genbutsu" id="ky_genbutsu">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-motorcycle"></i> <span>Ky-Genbutsu</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="ky_genbutsu_form"><a href="#">Form Ky-Genbutsu</a></li>
                  <li class="aktif_submenu" id="ky_genbutsu_acv"><a href="#">My Ky-Genbutsu</a></li>
                    <li class="aktif_submenu" id="ky_genbutsu_mtr"><a  href="#">Monitor Ky-Genbutsu</a></li>
                </ul>
              </li>
              <!-- SAFETY PATROL -->
              <li class="nav-item dropdown buka_menu" data-name="safety_patrol" id="safety_patrol">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Safety Patrol</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="safety_patrol_form"><a href="#">Form Safety Patrol</a></li>
                  <li class="aktif_submenu" id="safety_patrol_acv"><a href="#">My Safety Patrol</a></li>
                    <li class="aktif_submenu" id="safety_patrol_mtr"><a  href="#">Monitor Safety Patrol</a></li>
                </ul>
              </li>
              <!-- SMEC -->
              <li class="nav-item dropdown buka_menu" data-name="smec" id="smec">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wrench"></i> <span>SMEC</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="smec_form"><a href="#">Form SMEC</a></li>
                  <li class="aktif_submenu" id="smec_acv"><a href="#">My SMEC</a></li>
                    <li class="aktif_submenu" id="smec_mtr"><a  href="#">Monitor SMEC</a></li>
                </ul>
              </li>
              <!-- Work Observation -->
              <li class="nav-item dropdown buka_menu" data-name="work_ob" id="work_ob">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-helmet-safety"></i><span>Work Obeservation</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="work_ob_form"><a href="#">Form </a></li>
                    <li class="aktif_submenu" id="work_ob_mtr"><a  href="#">Monitoring</a></li>
                </ul>
              </li>
              
              <li class="menu-header">PERFORMANCE</li>
              <!-- SIDEBAR SENAM -->
              <?php
                // if ($_SESSION['osp_jabatan']=='TL' OR $_SESSION['osp_jabatan']=='ATL' OR $_SESSION['osp_code_level']==3 OR $_SESSION['osp_code_level']==8){
                  if ($level>=8){
              ?>               
              <li class="nav-item dropdown buka_menu" id="senam">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-person-running"></i><span>Senam Pagi</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="senam_abs"><a class="nav-link" href="../senam/senam_absensi.php">Absensi Senam</a></li>
                  <li class="aktif_submenu" id="senam_mtr"><a class="nav-link" href="../senam/senam_monitoring.php">Monitoring Senam</a></li>                  
                </ul>
              </li>              
              <?php }?>

              <!-- GAMIFIKASI -->
              <li class="nav-item dropdown buka_menu" id="gamifikasi">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-gamepad"></i><span>Gamifikasi</a>
                <ul class="dropdown-menu">  
                  <li class="aktif_submenu" id="gamifikasi_acv"><a class="nav-link" href="../gamifikasi/gamifikasi.php">Acv Gamifikasi</a></li>
                  <li class="aktif_submenu" id="gamifikasi_judge"><a class="nav-link" href="#">Judge Gamifikasi</a></li>                  
                </ul>
              </li>

              <!-- PBK -->
              <?php if ($level>=8){?> 
              <li class="nav-item dropdown buka_menu" id="pbk" data-name="pbk" id="pbk" data-target="pbk">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>PBK</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="judgepbk"><a class="nav-link" href="../pbk/pbk_judgement.php">Judgement PBK</a></li>
                  <li class="aktif_submenu" id="exportpbk"><a class="nav-link" href="#">Export Data</a></li>
                  <li class="aktif_submenu" id="histpbk"><a class="nav-link" href="#">History PBK</a></li>
                </ul>
              </li>

              <!-- FMDS -->
              <li class="menu-header">FMDS</li>
              <li class="nav-item dropdown buka_menu" id="fmds" data-name="fmds" id="fmds" data-target="fmds">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>FMDS</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="mtrfmds"><a class="nav-link" href="../fmds/fmds_monitoring.php">Monitoring FMDS</a></li>
                  <li class="aktif_submenu" id="reportfmds"><a class="nav-link" href="../fmds/fmds_report.php">Report FMDS</a></li>
                  <li class="aktif_submenu" id="picfmds"><a class="nav-link" href="#">PIC Materi</a></li>
                  <li class="aktif_submenu" id="schedfmds"><a class="nav-link" href="#">Schedule</a></li>                  
                </ul>
              </li>

              <li class="nav-item dropdown buka_menu" id="wlp" data-name="wlp" id="wlp" data-target="wlp">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-train"></i> <span>WLP</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="mywlp"><a class="nav-link" href="#">My WLP</a></li>
                  <li class="aktif_submenu" id="reqtraining"><a class="nav-link" href="#">Request Training</a></li>
                  <li class="aktif_submenu" id="schedaec"><a class="nav-link" href="#">Schedule Training AEC</a></li>
                  <li class="aktif_submenu" id=schedint""><a class="nav-link" href="#">Schedule Training Internal</a></li>
                  <li class="aktif_submenu" id="updwlp"><a class="nav-link" href="#">Update WLP</a></li>
                </ul>
              </li>


              <!-- Setting -->
              <li class="menu-header">Setting</li>
              <li class="nav-item dropdown buka_menu" id="admin" data-name="admin" id="admin" data-target="admin">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Admin</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="usermgt"><a class="nav-link" href="../user_management/user_management.php">User Management</a></li>
                  <li class="aktif_submenu" id="updatemp"><a class="nav-link">Update MP</a></li>
                  <li class="aktif_submenu" id="setnotif"><a class="nav-link" class="beep beep-sidebar">Notifikasi</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown buka_menu" id="utility" data-name="utility" id="utility" data-target="utility">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="suptiket"><a class="nav-link" href="#">Support Ticket</a></li>
                  <li class="aktif_submenu" id="kontak"><a class="nav-link" href="#">Contact</a></li>
                  <li class="aktif_submenu" id="socmed"><a class="nav-link" href="#">Social Media</a></li>
                </ul>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>
            <?php }?> 
              
              
        </aside>
      </div>





      <!-- Main Content --> 
      <div class="main-content">        
        <section class="section" style="margin-top:25px;" >  
          <div class="section-body">













