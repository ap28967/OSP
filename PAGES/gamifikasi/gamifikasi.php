<?php 
$name_page = "Gamifikasi";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");  
}

?>



            <div class="col-lg-12">
              <div class="row">

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>First Rank</h6></div>
                  <div class="card card-statistic-2">
                    <div class="card-stats">
                      <div class="card-stats-title">Anugrah Pratama / 28967</div>
                      <div class="card-stats-items">
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">24</div>
                            <div class="card-stats-item-label">Point</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">70%</div>
                            <div class="card-stats-item-label">Progress</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Completed</div>
                          </div>
                      </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                          <h4>Total Poin</h4>
                      </div>
                      <div class="card-body">
                          3750
                      </div>
                    </div>
                  </div>
                </div>

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>Second Rank</h6></div>
                  <div class="card card-statistic-2">
                    <div class="card-stats">
                      <div class="card-stats-title">Anugrah Pratama / 28967</div>
                      <div class="card-stats-items">
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">24</div>
                            <div class="card-stats-item-label">Point</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">67%</div>
                            <div class="card-stats-item-label">Progress</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Completed</div>
                          </div>
                      </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                          <h4>Total Poin</h4>
                      </div>
                      <div class="card-body">
                          1110
                      </div>
                    </div>
                  </div>
                </div>

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>Third Rank</h6></div>
                  <div class="card card-statistic-2">
                    <div class="card-stats">
                      <div class="card-stats-title">Anugrah Pratama / 28967</div>
                      <div class="card-stats-items">
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">24</div>
                            <div class="card-stats-item-label">Point</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">63%</div>
                            <div class="card-stats-item-label">Progress</div>
                          </div>
                          <div class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Completed</div>
                          </div>
                      </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                      <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                          <h4>Total Poin</h4>
                      </div>
                      <div class="card-body">
                          1110
                      </div>
                    </div>
                  </div>
                </div>
                
              
                <!-- row -->
              </div>
                <!-- class -->
            </div>
          

           

          <div class="row">           
            <div class="col-lg-12">
              <div class="card" >
                  <div class="card-header">
                    <h4>My Achievement</h4>
                  </div>
                  
                  <div class="card-body col-md-12">
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-fire"></span>&nbsp;<span><b>Kehadiran</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="kehadiran">
                          <div class="progress-bar" role="progressbar" data-width="81%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">81%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-clock"></span>&nbsp;<span><b>Jam Absen</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="jam_absen">
                          <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-blind"></span>&nbsp;<span><b>Senam</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="senam">
                          <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fa-brands fa-microsoft"></span>&nbsp;<span><b>Meeting</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="meeting">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-cogs"></span>&nbsp;<span><b>Overtime</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="overtime">
                          <div class="progress-bar" role="progressbar" data-width="50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-file"></span>&nbsp;<span><b>Buat SS</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="buat_ss">
                          <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-file-text"></span>&nbsp;<span><b>Buat SS >2</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="buat_ss_2">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-clipboard"></span>&nbsp;<span><b>SS Level Up</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="ss_level_up">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-line-chart"></span>&nbsp;<span><b>Best SS</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="best_ss">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-gear"></span>&nbsp;<span><b>Aktif QCC</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="aktif_qcc">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-heart"></span>&nbsp;<span><b>ICARE Day</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="icare_day">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-h-square"></span>&nbsp;<span><b>Hyarihatto</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="hyarihatto">
                          <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-car"></span>&nbsp;<span><b>Partisipasi Event</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="partisipasi_event">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="fas fa-plane"></span>&nbsp;<span><b>Juara Event</b></span></label>
                      <div class="col-md-8">                 
                        <div class="progress" data-height="20" name="juara_event">
                          <div class="progress-bar" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                      </div>
                    </div>

         
                  <div class="card-body row">
                      <Div class="col-md-9"></Div>
                      <div class="col-md-3">
                        <p style="font-size: large;">Total Point : <b style="color:red;">1750</b></p>
                      </div>
                  </div><!--card-->

                </div><!--card-body row-->
              </div><!--col-lg-12-->
            </div><!--row-->

            <div class="row"> 
              <div class="col-lg-12">
                <div class="card">                  
                  <div class="card-header">
                    <h4>Top Rank</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped text-nowrap" >
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NPK</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Departement</th>
                          <th scope="col">Poin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>44131</td>
                          <td>Rio</td>
                          <td>Body 2</td>
                          <td>3750</td>
                        </tr>  
                      </tbody>
                    </table>
                  </div> <!--card-body-->
                </div> <!--card-->
              </div> <!--col-lg-12-->
            </div><!--row-->
          

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
<!-- <script src="../../ASSETS/bootstrap/js/summernote-bs4.js"></script> -->
<script src="../../ASSETS/bootstrap/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->
<script src="../../ASSETS/js/scripts.js"></script>
<script src="../../ASSETS/js/custom.js"></script>

<!-- Page Specific JS File -->
<!-- <script src="../../ASSETS/js/page/index.js"></script> -->



