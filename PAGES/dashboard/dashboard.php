<?php
    $name_page = "My Hyarihatto";
    include("../header/navbar.php");
    if (!isset($_SESSION['osp_user'])) {
        header("Location: ../../AUTH/auth-login.php");
    }
?>



<div class="row">
    <div class="col-md-4">
        <div class="card" style="height:300px; border-radius:20px; background-image:url('../../ASSETS/img/damir-bosnjak.jpg');" >
            <div class="row d-flex justify-content-center">
                <div class="card-body col-md-12 d-flex justify-content-center"><img alt=""  src="../../ASSETS/img/avatar/avatar-5.png" class="rounded-circle mr-1" style="width:120px; height:120px;"></div>
                <div class="card-body col-md-12 d-flex justify-content-center" style="padding:0px;"><h5><?php echo $nama; ?></h5></div>
                <div class="card-body col-md-12 d-flex justify-content-center" style="padding:0px;"><p><?php echo $jabatan; ?></p></div>       
            </div>
        </div>
        <div>
            <div class="card" style="background-color:white;  border-radius:20px;">
                <div class="row d-flex justify-content-center" style="padding: 20px;">
                        
                        <div class="row" style=" border-bottom-color:black;">
                            <div class="card-body col-md-6"><h5>Account Info</h5></div>
                            <div class="card-body col-md-6"><button id="ubah_pass" class="btn btn-primary" style="width:100px; height:40px; padding:0px; line-height:90%; font-size:14px;">Change Password</button></div>
                        </div>                         
                                        
                        <div class="form-group col-md-10">
                        <label>Npk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" id="tampil_npk" class="form-control" disabled value="<?php echo $npk;?>">
                        </div>
                        </div>

                        <div class="form-group col-md-10">
                        <label>User Level</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="text" id="tampil_level" class="form-control" disabled value="<?php echo $role_name; ?>">
                        </div>
                        </div>
                    <form action="#" method="POST" id="form_ganti_pass" class="needs-validation" novalidate=""></form>
                        <div class="form-group col-md-10 d-none" id="pass_lama">
                            <label>Password Lama</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" id="input_password_lama" class="form-control" placeholder="password lama" required>
                            </div>
                            <div id="kosong_lama" class="invalid-feedback">Silahkan isi password</div>
                            <div id="beda_lama" class="invalid-feedback">Password lama salah</div>                          
                        </div>
                        
                        

                        <div class="form-group col-md-10 d-none" id="pass_baru">
                            <label>Password Baru</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" id="input_password_baru" class="form-control" placeholder="password baru" required>
                            </div>
                            <div id="kosong_baru" class="invalid-feedback">Silahkan isi password</div>
                        </div>

                        <div class="form-group col-md-10 d-none" id="pass_baru_confirm">
                            <label>Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" id="input_password_baru_confirm" class="form-control" placeholder="password baru" required>
                            </div>
                            <div id="kosong_konfirm" class="invalid-feedback">Silahkan isi password</div>
                            <div id="beda_konfirm" class="invalid-feedback">Konfirmasi password salah</div>
                        </div>
                        

                        <div class="form-group col-md-10 d-none text-md-right" id="tombol_pass">
                            <button type="button" id="btn_clear" class="btn btn-danger">Clear</button>
                            <button type="button" id="btn_submit_pass" class="btn btn-primary">Ganti</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
   

    <div class="col-md-8">
        <div class="card"  style="border-radius:20px; padding:20px; border-radius:20px;">
            
            <p style="font-size: 22px;"><b>Profil Karyawan</b></p>

            <hr>
            <p><b>ORGANIZATION</b></p>
            <div class="row  ">
            <div class="form-group col-md-4">
                    <label for="division">Plant</label>
                    <input id="plant" type="text" class="form-control" value="<?php echo $plant; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="division">Division</label>
                    <input id="division" type="text" class="form-control" value="<?php echo $division; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="dept_account">Department Account  </label>
                    <input id="dept_account" type="text" class="form-control" value="<?php echo $dept_account;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="dept">Department  </label>
                    <input id="dept" type="text" class="form-control" value="<?php echo $department; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="sect">Section  </label>
                    <input id="sect" type="text" class="form-control" value="<?php echo $section; ?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="grp">Group  </label>
                    <input id="grp" type="text" class="form-control" value="<?php echo $groupfrm;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="pos_kerja">Pos Kerja  </label>
                    <input id="pos_kerja" type="text" class="form-control" value="<?php echo $pos;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="shift">Shift  </label>
                    <input id="shift" type="text" class="form-control" value="<?php echo $shift;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="shift">Jabatan  </label>
                    <input id="shift" type="text" class="form-control" value="<?php echo $jabatan;?>" disabled>
                </div>
            </div>
            
            
            <hr>
            <p><b>PERSONAL DATA</b></p>
            <div class="row  ">
                <div class="form-group col-md-6">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input id="nama_lengkap" type="text" class="form-control" value="<?php echo $nama;?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_panggilan">Nama Panggilan</label>
                    <input id="nama_panggilan" type="text" class="form-control" value="<?php echo $nama_depan;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="status_karyawan">Status Karyawan</label>
                    <input id="status_karyawan" type="text" class="form-control" value="<?php echo $status;?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="tgl_masuk">Tanggal Masuk  </label>
                    <input id="tgl_masuk" type="text" class="form-control" value="<?php echo date('d/m/Y',strtotime($tgl_masuk));?>" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="masa_kerja">Masa Kerja  </label>
                    <input id="masa_kerja" type="text" class="form-control" value="<?php echo date('Y',time())-(int)$tgl_masuk.' Tahun';?>" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="tempat_lahir">Kota Tempat Lahir  </label>
                    <input id="tempat_lahir" type="text" class="form-control" value="<?php echo $birth_city; ?>" placeholder=". . .">
                </div>
                <div class="form-group col-md-6">
                    <label for="tgl_lahir">Tanggal Lahir  </label>
                    <input id="tgl_lahir" type="date" class="form-control" value="<?php echo $birth; ?>" placeholder="date">
                </div>
                <div class="form-group col-md-6">
                    <label>No HP</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" id="telp" class="form-control" value="<?php echo $handphone; ?>" placeholder=". . .">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder=". . .">
                </div>
                <div class="form-group col-md-12">
                    <label for="alamat_domisili">Alamat Domisili</label>
                    <textarea id="alamat_domisili" type="text" class="form-control"  placeholder=". . . " style="height:80px;"><?php echo $domisili; ?></textarea>
                </div>
            </div>
            <div class="form-group col-md-12 text-md-right">
                <button type="button" id="btn_clear_profil" class="btn btn-danger">Clear</button>
                <button type="button" id="btn_update_profil" class="btn btn-primary">Update</button>
            </div>
            
        </div>
    </div>

</div>

<div id="notif"></div>

<?php
  include("../header/footer.php");
?>
  


<!-- General JS Scripts -->
    <script src="../../ASSETS/bootstrap/js/jquery-3.3.1.min.js" ></script>
    <script src="../../ASSETS/bootstrap/js/popper.min.js"></script>
    <script src="../../ASSETS/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../ASSETS/bootstrap/js/jquery.nicescroll.min.js"></script>
    <script src="../../ASSETS/bootstrap/js/moment.min.js"></script>
    <script src="../../ASSETS/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../../ASSETS/bootstrap/js/jquery.sparkline.min.js"></script>
    <script src="../../ASSETS/bootstrap/js/owl.carousel.min.js"></script>
    <script src="../../ASSETS/bootstrap/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="../../ASSETS/js/scripts.js"></script>
    <script src="../../ASSETS/js/custom.js"></script>
<!-- General JS Scripts -->



<!-- SHOW MENU GANTI PASS -->
<script>
    $('#ubah_pass').on('click', function() {
        if($('#pass_lama').hasClass('d-none')){
            $('#pass_lama').removeClass('d-none')
            $('#pass_baru').removeClass('d-none')
            $('#pass_baru_confirm').removeClass('d-none')
            $('#tombol_pass').removeClass('d-none')
        } else {
            $('#pass_lama').addClass('d-none')
            $('#pass_baru').addClass('d-none')
            $('#pass_baru_confirm').addClass('d-none')
            $('#tombol_pass').addClass('d-none')
        }
    })
</script>


<!-- CLEAR FORM GANTI PASS -->
<script>
    $('#btn_clear').on('click', function(){
        $('#input_password_lama').val('')
        $('#input_password_baru').val('')
        $('#input_password_baru_confirm').val('')
    })
</script>


<!-- POST GANTI PASS -->
<script>
    $('#btn_submit_pass').on('click', function(){
        var pass_lama = $('#input_password_lama').val()
        var pass_baru = $('#input_password_baru').val()
        var pass_baru_confirm = $('#input_password_baru_confirm').val()

        if(pass_lama!="" && pass_baru!="" && pass_baru_confirm!=""){
            if(pass_baru != pass_baru_confirm){
                $('#kosong_lama').removeClass('d-block')
                $('#kosong_baru').removeClass('d-block')
                $('#kosong_konfirm').removeClass('d-block')
                $('#beda_konfirm').addClass('d-block')
            } else {
                $('#kosong_lama').removeClass('d-block')
                $('#kosong_baru').removeClass('d-block')
                $('#kosong_konfirm').removeClass('d-block')
                $('#beda_konfirm').removeClass('d-block')
                // QUERY GANTI PASSWORD


                $.ajax({
                    type: 'POST',
                    url: 'dashboard_gantipass.php',           
                    data: {
                        pass_lama           : pass_lama,
                        pass_baru           : pass_baru,
                        pass_baru_confirm   : pass_baru_confirm
                    },
                    success: function (msg) {
                        $('#notif').html(msg);
                    }
                })

                
            }
        } else if(pass_lama=="" && pass_baru!="" && pass_baru_confirm!=""){
            $('#kosong_lama').addClass('d-block')
            $('#kosong_baru').removeClass('d-block')
            $('#kosong_konfirm').removeClass('d-block')
            $('#beda_konfirm').removeClass('d-block')
        } else if(pass_lama!="" && pass_baru=="" && pass_baru_confirm!=""){
            $('#kosong_lama').removeClass('d-block')
            $('#kosong_baru').addClass('d-block')
            $('#kosong_konfirm').removeClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                 
        } else if(pass_lama=="" && pass_baru=="" && pass_baru_confirm!=""){
            $('#kosong_lama').addClass('d-block')
            $('#kosong_baru').addClass('d-block')
            $('#kosong_konfirm').removeClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                 
        } else if(pass_lama!="" && pass_baru!="" && pass_baru_confirm==""){
            $('#kosong_lama').removeClass('d-block')
            $('#kosong_baru').removeClass('d-block')
            $('#kosong_konfirm').addClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                  
        } else if(pass_lama=="" && pass_baru!="" && pass_baru_confirm==""){
            $('#kosong_lama').addClass('d-block')
            $('#kosong_baru').removeClass('d-block')
            $('#kosong_konfirm').addClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                  
        } else if(pass_lama!="" && pass_baru=="" && pass_baru_confirm==""){
            $('#kosong_lama').removeClass('d-block')
            $('#kosong_baru').addClass('d-block')
            $('#kosong_konfirm').addClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                 
        } else if(pass_lama=="" && pass_baru=="" && pass_baru_confirm==""){
            $('#kosong_lama').addClass('d-block')
            $('#kosong_baru').addClass('d-block')
            $('#kosong_konfirm').addClass('d-block')
            $('#beda_konfirm').removeClass('d-block')                                  
        } 
    })
</script>



<!-- SETTING NAV BAR ACTIVE SAAT URL BARU PERTAMA KALI DI LOAD SEBELUM REDIRECT-->
<script>
  // $(document).ready(function(){
      var buka_menu = 'dashboard';
      var aktif_submenu = 'dashboard_profil';
      if(typeof(Storage) != "undefined") {
          sessionStorage.setItem('sesi_buka_menu', buka_menu);
          sessionStorage.setItem('sesi_aktif_submenu', aktif_submenu);

          $('#'+sessionStorage.getItem('sesi_aktif_submenu')).addClass('active');
          $('#'+sessionStorage.getItem('sesi_aktif_submenu')).addClass('active');
      } else {
        console.log("Sorry, your browser does not support web storage...");
      }
  // })
</script>