<?php 

$name_page = "Form Hyarihatto";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");  
}



?>




          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-md-6 col-lg-6">  
              <div class="card">
                <?php if(isset($status_hyarihatto_belum)){?>
                <form method="POST" action="" id="formInputData" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  <div class="card-header">
                    <h4>Form Hyarihatto</h4>
                    <div class="card-header-action">
                      <div class="btn-group">
                        <button type="reset" id="btnReset" name="btnReset" class="btn btn-danger">Reset</button>
                        <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>

                
                  
                      <div class="card-body">
                      <!-- // Temuan Resiko Bahaya -->
                      <div class="form-group">
                          <label for="temuan">Temuan Resiko Bahaya</label>
                          <input id="temuan" type="text" class="form-control" name="temuan" placeholder="Deskripsikan Temuan Resiko Bahaya" required>
                          <div class="invalid-feedback">
                              Silahkan isi temuan resiko bahaya
                            </div>
                        </div>
                        <!-- // PEnyabab KEjadian -->
                        <div class="form-group">
                          <label for="penyebab">Penyebab</label>
                          <input id="penyebab" type="text" class="form-control" name="penyebab" placeholder="Deskripsikan Penyebab" required>
                          <div class="invalid-feedback">
                              Silahkan isi penyebab
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="saran">Saran Perbaikan</label>
                            <input id="saran" type="text" class="form-control" name="saran" placeholder="Deskripsikan Saran Perbaikan" required>
                            <div class="invalid-feedback">
                              Silahkan isi saran perbaikan
                            </div>
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
                            <div class="invalid-feedback">
                              Silahkan pilih
                            </div>
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
                            <div class="invalid-feedback">
                              Silahkan pilih
                            </div>
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
                            <div class="invalid-feedback">
                              Silahkan pilih
                            </div>
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
                            <div class="invalid-feedback">
                              Silahkan pilih
                            </div>
                          </div>                  
                        </div>
                        <!-- // Lokasi Kejadian -->
                        <div class="form-row">                        
                          <div class="form-group col-md-7">
                            <label for="lokasi">Lokasi</label>
                            <input id="lokasi" type="text" class="form-control" name="lokasi" placeholder="Deskripsikan Lokasi Kejadian" required>
                            <div class="invalid-feedback">
                              Silahkan isi lokasi kejadian
                            </div>
                          </div>
                          <!-- // Tanggal Kejadian -->
                          <div class="form-group col-md-2">
                            <label for="tanggal">Tanggal Kejadian</label>
                            <input id="tanggal" type="date" class="form-control" name="tanggal" placeholder="date" required>
                            <div class="invalid-feedback">
                              Silahkan pilih tanggal
                            </div>
                          </div>
                          <!-- // Upload Gambar -->
                          <div class="form-group col-md-3">
                            <label for="foto">Upload Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="readURL(this);" required>        
                            <div class="invalid-feedback">
                              Silahkan pilih foto
                            </div>                          
                          </div>
                          <!-- // Preview Gambar -->
                          <div class="form-group col-md-12 bg-light">
                            <div class="row  justify-content-md-center" style="max-height:300px; overflow-y: scroll;">
                              <img id="blah" class="col-md-6" style="width:100%; " /> <!-- PREVIE FOTO -->
                            </div>
                          </div>
                        </div>                                          
                      </div>   
                      <!-- // Tombol Submit  -->
                      <!-- <div class="card-footer"> -->
                        <!-- <button type="reset" id="btnReset" name="btnReset" class="btn btn-danger">Reset</button>
                        <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button> -->
                      <!-- </div> -->
                      </form>
                      <div class="card-body d-none" id="notifSudah">
                        <div class="alert alert-success">
                          Terimakasih anda sudah membuat Hyarihatto bulan ini.
                        </div>
                      </div>
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

                </div>                
              </div>
            </div>
          </div>
        </section>
      </div>
    </form>
    <div id="notifikasi"></div>



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
  <!-- <script src="../../ASSETS/js/page/index.js"></script> -->



  <script>

$(function () {
    // $('#btnSubmit').on('click', function (e) {
    $('#formInputData').on('submit', function (e) {
      e.preventDefault()
      const foto = $('#foto').prop('files')[0];
      const kategori = $('#kategori').val();
      const risk = $('#risk').val();
      const stop6 = $('#stop6').val();
      const icare = $('#icare').val();
      const tanggal = $('#tanggal').val();
      const lokasi = $('#lokasi').val();
      const temuan = $('#temuan').val();
      const penyebab = $('#penyebab').val();
      const saran = $('#saran').val();
      


      var formData = new FormData();
      formData.append('foto', foto);
      formData.append('kategori', kategori);
      formData.append('risk', risk);
      formData.append('stop6', stop6);
      formData.append('icare', icare);
      formData.append('tanggal',tanggal);
      formData.append('lokasi', lokasi);
      formData.append('temuan', temuan);
      formData.append('penyebab',penyebab);
      formData.append('saran', saran);
      if(foto !='' && kategori != '' && risk !='' && stop6 !='' && icare!='' && tanggal != '' && lokasi !='' && temuan !='' && penyebab !='' && saran !=''){
        $.ajax({
          type: 'post',
          url: 'hyarihatto_form_post.php',
          contentType: false,
          cache: false,
          processData: false,
          data: formData,
          success: function (msg) {
            $('#notifikasi').html(msg);
            // $('#formInputData').style.visibility = "hidden";
            // $('#notifsudah').style.visibility = "visible";
           
          }
        })

      }
    })
  })
</script>
  

  

<script type="text/javascript">/* script JQuery untuk load gambar pada bagian preview */
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
