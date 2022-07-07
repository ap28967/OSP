<?php 

$name_page = "Form Hyari";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");  
}



?>

  <?php if(isset($status_hyarihatto_belum)){?>
    <div class="row notifikasi"><!--row-->

    <form method="POST" action="" id="formInputData" class="needs-validation col-md-12" novalidate="" enctype="multipart/form-data">

      <div class="card card-header-custom col-md-12" ><!--CARD HEADER--> 
          <div class="row"  style="padding-left:15px; ">
            <div><i class="card-header-custom-icon bg-merah fas fa-exclamation-triangle "></i></div>                            
            <div class="vertical-center card-header-custom-judul" >Temuan Bahaya</div>
          </div>                  
      </div><!--CARD HEADER--> 
      <div class="card col-md-12"><!--col-lg-12--> 

        
       
          
        
        
        

        


          <div class="row col-lg-12 col-md-12">
            <div class="card col-lg-3 col-md-3">

              <div class="form-group">
                <!-- FOTO TEMUAN -->
                <label >Foto Temuan</label>  
                <div id="foto_temuan" class="custom_file">
                  <input id="upload-button-1" class="custom_file_input" type="file"  accept="image/*" required>
                  <label for="upload-button-1" class="col-md-12 custom_file_label bg-biru"><i class="fas fa-upload"></i> &nbsp; Pilih Foto</label>
                  <img id="chosen-image-1" class="col-md-12 custom_file_image" src="../../ASSETS/img/view.jpg" style="margin-top:10px; height:200px; box-shadow: 1px 1px 10px 1px #E1DDDB;"/>
                  <!-- <div style="color:#d04250; font-size:12px;" class="d-none">Silahkan pilih foto</div>                          -->
                </div> 
                
                
                  
              </div>
            </div> 
            
            <div class="card col-lg-9 col-md-9">
              <!-- // Temuan Resiko Bahaya -->
              <div class="form-row">   
                <div class="form-group col-md-12">
                  <label for="temuan">Temuan Resiko Bahaya</label>
                  <input id="temuan" type="text" class="form-control" name="temuan" placeholder="Deskripsikan Temuan Resiko Bahaya" required>
                  <div class="invalid-feedback">Silahkan isi temuan resiko bahaya</div>
                </div>

                <!-- // PEnyabab KEjadian -->
                <div class="form-group col-md-12">
                  <label for="penyebab">Penyebab</label>
                  <input id="penyebab" type="text" class="form-control" name="penyebab" placeholder="Deskripsikan Penyebab" required>
                  <div class="invalid-feedback">Silahkan isi penyebab</div>
                </div>
              </div>
                  
              <!-- // KAtegori Temuan -->
              <div class="form-row">                      
                <div class="form-group col-md-3">
                  <label for="kategori">Kategori Temuan</label>
                  <select id="kategori" type="text" class="form-control" name="kategori"  required >
                    <!-- <option selected></option> -->
                    <option value="">Pilih...</option>
                    <?php
                      $query = "select kategori FROM hyarihatto_kategori";
                      $results = mysqli_query($link_osp, $query) or die (mysqli_error($link_osp));
                      while ($rows = mysqli_fetch_assoc(@$results)){ 
                        ?>
                        <option value="<?php echo $rows['kategori'];?>"><?php echo $rows['kategori'];?></option>
                        <?php
                      } 
                    ?>
                  </select>                          
                  <div class="invalid-feedback">Silahkan pilih</div>
                </div> 

                <!-- // Kategori Risk -->
                <div class="form-group col-md-3">
                  <label for="risk">Kategori Risk</label>
                  <select id="risk" type="text" class="form-control" name="risk" required>
                    <option value="">Pilih...</option>
                    <?php
                      $query = "select risk FROM hyarihatto_risk";
                      $results = mysqli_query($link_osp, $query) or die (mysqli_error($link_osp));
                      while ($rows = mysqli_fetch_assoc(@$results)){ 
                        ?>
                        <option value="<?php echo $rows['risk'];?>"><?php echo $rows['risk'];?></option>
                        <?php
                      } 
                    ?>
                  </select>
                  <div class="invalid-feedback">Silahkan pilih</div>
                </div>

                <!-- // KAtegori STOP6 -->
                <div class="form-group col-md-3">
                  <label for="stop6">Kategori STOP6</label>
                  <select id="stop6" type="text" class="form-control" name="stop6" required>
                    <option value="">Pilih...</option>
                    <?php
                      $query = "select stop6 FROM hyarihatto_stop6";
                      $results = mysqli_query($link_osp, $query) or die (mysqli_error($link_osp));
                      while ($rows = mysqli_fetch_assoc(@$results)){ 
                        ?>
                        <option value="<?php echo $rows['stop6'];?>"><?php echo $rows['stop6'];?></option>
                        <?php
                      } 
                    ?>
                  </select>
                  <div class="invalid-feedback">Silahkan pilih</div>
                </div>

                <!-- // KAtegori ICARE -->
                <div class="form-group col-md-3">
                  <label for="icare">Kategori ICARE</label>
                  <select id="icare" type="text" class="form-control" name="icare" required>
                    <option value="">Pilih...</option> 
                    <?php
                      $query = "select icare FROM hyarihatto_icare";
                      $results = mysqli_query($link_osp, $query) or die (mysqli_error($link_osp));
                      while ($rows = mysqli_fetch_assoc(@$results)){ 
                        ?>
                        <option value="<?php echo $rows['icare'];?>"><?php echo $rows['icare'];?></option>
                        <?php
                      } 
                    ?>
                  </select>
                  <div class="invalid-feedback">Silahkan pilih</div>
                </div>                  
              </div><!--FORM ROW-->


              <!-- // Lokasi Kejadian -->
              <div class="form-row">                        
                <div class="form-group col-md-8">
                  <label for="lokasi">Lokasi</label>
                  <input id="lokasi" type="text" class="form-control" name="lokasi" placeholder="Deskripsikan Lokasi Kejadian" required>
                  <div class="invalid-feedback">Silahkan isi lokasi kejadian</div>
                </div>
                <!-- // Tanggal Kejadian -->
                <div class="form-group col-md-4">
                  <label for="tanggal">Tanggal Kejadian</label>
                  <input id="tanggal" type="date" class="form-control" name="tanggal" placeholder="date" required>
                  <div class="invalid-feedback">Silahkan pilih tanggal</div>
                </div>
              </div><!--FORM ROW-->
            </div> <!--CARD BODY-->
          </div> <!--ROW-->
        </div><!--col-lg-12-->  
                
        

        <div class="card card-header-custom col-md-12" ><!--CARD HEADER--> 
          <div class="row"  style="padding-left:15px; ">
            <div><i class="card-header-custom-icon bg-merah fas fa-wrench "></i></div>                            
            <div class="vertical-center card-header-custom-judul" >Perbaikan</div>
          </div>                  
        </div><!--CARD HEADER--> 

        <div class="card col-md-12"><!--col-lg-12-->
          <div class="row"><!--FORM ROW-->
            <div class="card col-md-9"> <!--CARD-->                    
          
              <div class="form-group"><!--FORM GROUP-->
                <label for="saran">Saran Perbaikan</label>
                <input id="saran" type="text" class="form-control" name="saran" placeholder="Deskripsikan Saran Perbaikan" required>
                <div class="invalid-feedback">Silahkan isi saran perbaikan</div>
              </div><!--FORM GROUP-->
          
              <div class="form-group"><!--FORM GROUP-->                         
                <div class="control-label">Apakah sudah dilakukan perbaikan?</div>
                <div class="custom-switches-stacked mt-2">
                  <label class="custom-switch">
                    <input id="belum_improve" type="radio" name="radioHyari"  value="belum" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Belum</span>
                  </label>
                  <label class="custom-switch">
                    <input id="sudah_improve" type="radio" name="radioHyari" value="sudah" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Sudah</span>
                  </label>
                </div>   
              </div><!--FORM GROUP-->
            </div><!--CARD-->

            <div class="card col-md-3"><!--CARD-->

              <!-- FOTO PERBAIKAN-->
              <div id="kolom_foto_perbaikan" class="form-group d-none">
                <label >Foto Temuan</label>  
                <div id="foto_perbaikan">
                  <input id="upload-button-2" class="custom_file_input" type="file"  accept="image/*">
                  <label for="upload-button-2" class="col-md-12 custom_file_label bg-biru"><i class="fas fa-upload"></i> &nbsp; Pilih Foto</label>
                  <img id="chosen-image-2" class="col-md-12 custom_file_image" src="../../ASSETS/img/view.jpg" style="margin-top:10px; height:200px; box-shadow: 1px 1px 10px 1px #E1DDDB;"/>                           
                </div> 

            </div><!--CARD-->
          </div><!--FORM ROW-->  
              

          <div class="card-footer col-md-12 text-md-right">
          <!-- <div class="btn-group"> -->
            <button type="reset" id="btnReset" name="btnReset" class="btn btn-danger">Reset</button>
            <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button>
          <!-- </div> -->
          </div>
        






      </div><!--card col-lg-12--> 
      </form>
    </div><!--row--> 
   


          <?php
          } elseif (isset($status_hyarihatto_sudah)) {?>


            <div class="card-body">
              <div class="alert alert-success">
                Terimakasih anda sudah membuat Hyarihatto bulan ini.
              </div>
            </div>



            <?php
          }
          ?>

          






    <!-- <div id="notifikasi"></div> -->



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

  <!-- Page Specific JS File -->
  <script src="../../ASSETS/modules/dropzonejs/min/dropzone.min.js"></script>





<script>


sessionStorage.setItem('radioHyari', 'Belum');
  $("input[name$='radioHyari']").on('click', function() {
    var selected = $(this).val();
    if(selected == 'belum'){
      $('#kolom_foto_perbaikan').addClass('d-none');
      sessionStorage.setItem('radioHyari', 'Belum');
      $('#upload-button-2').val('');
      $('#chosen-image-2').attr('src', '../../ASSETS/img/view.jpg')
      
    } else {
        $('#kolom_foto_perbaikan').removeClass('d-none');
        sessionStorage.setItem('radioHyari', 'Sudah');
    }    
  });

  

  $('#formInputData').on('submit', function (e) {
    e.preventDefault()  
    const kategori = $('#kategori').val();
    const risk = $('#risk').val();
    const stop6 = $('#stop6').val();
    const icare = $('#icare').val();
    const tanggal = $('#tanggal').val();
    const lokasi = $('#lokasi').val();
    const temuan = $('#temuan').val();
    const penyebab = $('#penyebab').val();
    const saran = $('#saran').val();
    const foto_temuan = $('#upload-button-1').prop('files')[0];
    const foto_perbaikan = $('#upload-button-2').prop('files')[0];  

    var formData = new FormData();
    formData.append('kategori', kategori);
    formData.append('risk', risk);
    formData.append('stop6', stop6);
    formData.append('icare', icare);
    formData.append('tanggal',tanggal);
    formData.append('lokasi', lokasi);
    formData.append('temuan', temuan);
    formData.append('penyebab',penyebab);
    formData.append('saran', saran);
    formData.append('foto_temuan', foto_temuan);
    formData.append('foto_perbaikan', foto_perbaikan);  
    



    if(foto_temuan==undefined){ 
      Swal.fire({
            title: 'Foto Temuan',
            text: 'Silahkan pilih foto Temuan',
            timer: 2000,            
            icon: 'info',
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonColor: '#00B9FF',
            cancelButtonColor: '#B2BABB',
      }) 
    } else {
      if (sessionStorage.getItem('radioHyari')==="Sudah" && foto_perbaikan==undefined){ 
          Swal.fire({
                title: 'Foto Perbaikan',
                text: 'Silahkan pilih foto Perbaikan',
                timer: 2000,            
                icon: 'info',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#00B9FF',
                cancelButtonColor: '#B2BABB',
          })
      } else {
        if(kategori!=='' && risk!=='' && stop6!=='' && icare!=='' && tanggal!=='' && lokasi!=='' && temuan!=='' && penyebab!=='' && saran!==''){
          $.ajax({
            type: 'post',
            url: 'hyarihatto_form_post.php',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (msg) {
              $('.notifikasi').html(msg);
              // $('#formInputData').style.visibility = "hidden";
              // $('#notifsudah').style.visibility = "visible";           
            }
          })
        }
      }
    } 
  })
</script>
  

<!-- PILIH FILE PREVIEW CUSTOM -->
<script>
  let limit_size = <?php echo $max_size_upload;?>*1024*1024;  
  $('.custom_file_input').bind('change', function() {
      if(this.files[0].size >limit_size){
        $(this).val('');
        $(this).siblings('.custom_file_image').attr('src', '../../ASSETS/img/view.jpg')
        Swal.fire({
            title: 'Gagal',
            text: 'Ukuran Foto terlalu besar (Max 5MB)',
            timer: 2500,            
            icon: 'warning',
            showCancelButton: false,
            showConfirmButton: false,
            confirmButtonColor: '#00B9FF',
            cancelButtonColor: '#B2BABB',
          })
      } else {
        let reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = () => {
            $(this).siblings('.custom_file_image').attr('src', reader.result);
        }
      }
  });
</script>




<!-- SETTING NAV BAR ACTIVE SAAT URL BARU PERTAMA KALI DI LOAD SEBELUM REDIRECT-->
<script>
  // $(document).ready(function(){
      var buka_menu = 'hyarihatto';
      var aktif_submenu = 'hyariform';
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
