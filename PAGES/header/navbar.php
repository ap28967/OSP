<?php
include("../../CONFIG/config.php"); 
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>


<!DOCTYPE html>
<html lang="en">




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
  </style>
  <style>
    .text-bold {
      font-weight: bold;
    }
  </style>
  <style>
    .modif-header{
      background-color: white;
      color: #6777ef;
    }
  </style>
  <style>
    .fixed-header{
      z-index: 50;
    }
  </style>


<!-- General JS Scripts -->
<script src="../../ASSETS/bootstrap/js/jquery-3.3.1.min.js" ></script>






</head>

<body>
  <div id="app">
    <div class="main-wrapper ">
      <div class="navbar-bg-none"></div>
      <nav class="navbar navbar-expand-lg main-navbar"  style="background-color:#6777ef;">
        <form class="form-inline mr-auto" >
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg "><i class="fa-solid fa-bars"></i><span style="color: white; font-size:18px; font-family:'Arial Narrow', 'Arial Narrow', 'Arial Narrow', 'Arial Narrow';">&nbsp;&nbsp;<?php echo $name_page; ?></span></a></li>
            
            <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
          </ul>
          <!-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div> -->
         
          
        <!-- ####################### NAVBAR NOTIFIKASI ####################################-->
        </form>
        <ul class="navbar-nav navbar-right" >
          <li class="dropdown dropdown-list-toggle" ><a name="notif_navbar" href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if(isset($status_hyarihatto_belum)) {echo 'beep';}?>"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <!-- <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div> -->
              </div>
              
              <div class="dropdown-list-content dropdown-list-icons ">
                <a href="../hyarihatto/hyarihatto_form.php" class="dropdown-item <?php if(isset($status_hyarihatto_belum)) {echo "bg-light";}?>">
                  <div class="dropdown-item-icon text-white <?php if(isset($status_hyarihatto_belum)) {echo "bg-danger";}else{echo "bg-success";}?>">
                    <i class="fas <?php if(isset($status_hyarihatto_belum)) {echo "fa-exclamation-triangle";}else{echo "fa-check";}?>"></i>
                  </div>
                  <div class="dropdown-item-desc <?php if(isset($status_hyarihatto_belum)) {echo "text-bold";}?>">
                      Reminder Pembuatan Hyarihatto bulan ini
                    <div class="time <?php if(isset($status_hyarihatto_belum)) {echo "text-bold";}?>">17 Hours Ago</div>
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
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a> -->
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>

          <!-- ####################### NAVBAR PROFIL ####################################-->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="" 
                            <?php
                                  // echo "src=\"//adm-fs/BODY/BODY02/Body Plant/BAIS/employee-photo/". $karyawan['npk'] . '.JPG"'; 
                            ?> 
            class="rounded-circle mr-1" style="width:35px; height:35px;"> -->
            <img alt=""  src="../../CACHE/foto_karyawan/<?php echo $_SESSION['osp_user'] . '.JPG"'; ?> class="rounded-circle mr-1" style="width:35px; height:35px;">
            <div class="d-sm-none d-lg-inline-block"> <?php echo "Hi,".$_SESSION['osp_nama_depan']; ?></div></a>
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

<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a class="nav-link" href="../index.php"><img alt="OSP" src="../../ASSETS/img/logo-osp.png" width="95px"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a class="nav-link" href="../index.php">OSP</a>
            
          </div>
          <ul class="sidebar-menu">            
              <li class="menu-header"></li>
              <li class="menu-header"></li>

              <li class="nav-item dropdown buka_menu" data-name="dasb" id="dasb">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="gamifi"><a href="../gamifikasi/gamifikasi.php">Gamifikasi</a></li>
                  <li><a class="aktif_submenu" id="judge" href="#">Judgement Gamifikasi</a></li>                  
                </ul>
              </li>

              <li class="nav-item dropdown buka_menu" data-name="hyarihatto" id="hyarihatto">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hyarihatto</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="hyariform"><a href="../hyarihatto/hyarihatto_form.php">Form Hyarihatto</a></li>
                  <li class="aktif_submenu" id="ach"><a href="../hyarihatto/hyarihatto_list.php">My Hyarihatto</a></li>
                  <li class="aktif_submenu" id="hyarimtr"><a  href="../hyarihatto/hyarihatto_monitoring.php">Monitor Hyarihatto</a></li>
                </ul>
              </li>       

              <li class="nav-item dropdown buka_menu" id="senam">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Senam Pagi</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="senam_abs"><a class="nav-link" href="../senam/senam_absensi.php">Absensi Senam</a></li>
                  <li class="aktif_submenu" id="senam_mtr"><a class="nav-link" href="../senam/senam_monitoring.php">Monitoring Senam</a></li>                  
                </ul>
              </li>
              <li class="nav-item dropdown buka_menu" id="pbk" data-name="pbk" id="pbk" data-target="pbk">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>PBK</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="judgepbk"><a class="nav-link" href="../pbk/pbk_judgement.php">Judgement PBK</a></li>
                  <li class="aktif_submenu" id="exportpbk"><a class="nav-link" href="#">Export Data</a></li>
                  <li class="aktif_submenu" id="histpbk"><a class="nav-link" href="#">History PBK</a></li>
                </ul>
              </li>     
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
              <li class="nav-item dropdown buka_menu" id="admin" data-name="admin" id="admin" data-target="admin">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Admin</span></a>
                <ul class="dropdown-menu">
                  <li class="aktif_submenu" id="usermgt"><a class="nav-link">User Management</a></li>
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
        </aside>
      </div>


      <script>
  $(document).ready(function(){
    $(document).on('click', '.buka_menu', function(){
        var buka_menu = $(this).attr('id');
        if(typeof(Storage) != "undefined") {
            sessionStorage.setItem('sesi_buka_menu', buka_menu);
          } else {
            console.log("Sorry, your browser does not support web storage...");
          }
    });
    // console.log(sessionStorage.setItem('activeclpse'));
    $('#'+sessionStorage.getItem('sesi_buka_menu')).addClass('active');



    $(document).on('click', '.aktif_submenu', function(){
        var aktif_submenu = $(this).attr('id');
        if(typeof(Storage) != "undefined") {
            sessionStorage.setItem('sesi_aktif_submenu', $(this).attr('id'));
          } else {
            console.log("Sorry, your browser does not support web storage...");
          }
    });
  // console.log(aktif_submenu);
  $('#'+sessionStorage.getItem('sesi_aktif_submenu')).addClass('active');
     });
</script>




      <!-- Main Content --> 
      <div class="main-content ">        
        <section class="section">          
          <br>
          <div class="section-body">












