<?php 
$dashboard = "Location: ../PAGES/hyarihatto/hyarihatto_form.php";

include("../CONFIG/config.php"); 

if (isset($_SESSION['osp_user'])) {
  header($dashboard);
}

if (isset($_POST['submit'])) {
  $npk = trim(mysqli_real_escape_string($link_osp, $_POST['npk']));
  $password = sha1(trim(mysqli_real_escape_string($link_osp, $_POST['password'])));

  $query_login = mysqli_query($link_osp, "SELECT * FROM view_sesi WHERE npk = '$npk' AND pass = '$password' ") or die (mysqli_error($link_osp));
  if ($query_login->num_rows > 0) {
      $result_login = mysqli_fetch_assoc($query_login);


      $_SESSION['osp_user'] =  $npk;
      $_SESSION['osp_nama'] =  $result_login['nama'];
      
      // $_SESSION['level'] = 
      $_SESSION['osp_nama_depan'] =  $result_login['nama_depan'];
      $_SESSION['osp_jabatan'] =  $result_login['jabatan'];
      $_SESSION['osp_level'] =  $result_login['level'];
      $_SESSION['osp_code_level'] =  $result_login['code_level'];
      $_SESSION['osp_role_name'] =  $result_login['role_name'];
      $_SESSION['osp_grp'] =  $result_login['grp'];
      $_SESSION['osp_sect'] =  $result_login['sect'];
      $_SESSION['osp_dept_account'] =  $result_login['dept_account'];
      $_SESSION['osp_divisi'] =  $result_login['divisi'];
      $_SESSION['osp_nama_grp'] =  $result_login['nama_grp'];
      $_SESSION['osp_nama_sect'] =  $result_login['nama_sect'];
      $_SESSION['osp_nama_dept_account'] =  $result_login['nama_dept_account'];

      mysqli_free_result($query_login);      

      header($dashboard);
  } else {
      $pesan = "galat";  
      // echo "<script>alert('NPK atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}


  ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login | OSP</title>
  <link rel="shortcut icon" href="../../ASSETS/img/logo-osp.png" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../assets/bootstrap/css/all.css" >

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../assets/img/logo-OSP.png" alt="logo" width="150" class="shadow-light ">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <?php
                  if(isset($pesan)){?>
                  <!--jika password dan user salah keluarkan alert gagal-->
                    <div class="alert alert-danger alert-dismissible fade show" >
                      <label for="aa" style="cursor: pointer;"><b> Login gagal - </b> username atau password salah!"</label>
                      <button id="aa" name="aa" type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                      </button>
                      <!-- <span><b> Login gagal - </b> username atau password salah!"</span> -->
                    </div>
              <?php
                  }
              ?>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="npk">NPK</label>
                    <input id="npk" type="text" class="form-control" name="npk" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Silahkan isi NPK anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                    Silahkan isi Password anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">default password : npk</div>
                </div>
                <!-- <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> -->

                

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; BodyDiv 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/bootstrap/js/jquery-3.3.1.min.js" ></script>
  <script src="../assets/bootstrap/js/popper.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/bootstrap/js/jquery.nicescroll.min.js"></script>
  <script src="../assets/bootstrap/js/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
