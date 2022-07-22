<?php 
 
$name_page = "My Hyarihatto";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>


<div class="row"><!--ROW-->
    <div class="card card-header-custom col-md-12" ><!--CARD HEADER--> 
    <div class="row"  style="padding-left:15px; ">
        <div><i class="card-header-custom-icon bg-merah fas fa-car"></i></div>                            
        <div class="vertical-center card-header-custom-judul" >My Hyarihatto</div>
    </div>                  
    </div><!--CARD HEADER-->                         
                        
                         
    <!-- FILTER RANGGAL -->
    <div class="card  col-md-12"><!--col-lg-12--> 
        <div class="row"><!--ROW-->
            <div class="form-group col-md-4">
                <label for="dari_bulan">From</label>
                <input type="month" class="form-control" id="startDate" name="startDate" placeholder="month">
            </div>            
            <div class="form-group col-md-4">
                <label for="hingga_bulan">Until</label>
                <input type="month" class="form-control" id="endDate" name="endDate" placeholder="month" >                                            
            </div>
            <div class="form-group col-md-2" style="margin-top:30px;">
                <button type="button" name="btnSubmit"class="btn btn-primary btn-md halaman fa fa-search" style="font-size:medium;" id="1"></button>
            </div>
        </div> <!--ROW-->        
    </div><!--col-lg-12--> 

    <div class="card  col-md-12"><!--col-lg-12--> 
        <div class="row dataTabel"> <!--ROW--> 
            <table class="table table-striped table-responsive table-sm text-center text-nowrap" style="height: 600px;">
                <thead>
                    <tr style="background-color:#9A9791; color:white;">
                        <th scope="col">#</th>
                        <th scope="col">NPK</th>
                        <th scope="col">Foto Temuan</th>
                        <th scope="col">Temuan</th>
                        <th scope="col">Penyebab</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Risk</th>
                        <th scope="col">STOP6</th>
                        <th scope="col">ICARE</th>
                        <th scope="col">Lokasi</th>  
                        <th scope="col">Tanggal Kejadian</th>                              
                        <th scope="col">Saran</th>                
                        <th scope="col">Foto Perbaikan</th>
                        <th scope="col">Tgl Input</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope='row'></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                                 
                    </tr>
                </tbody>
            </table>
        </div><!--ROW--> 
    </div><!--col-lg-12--> 

</div><!--ROW-->

<div  id="modal01" class="modal modal-backdrop"  onclick="this.style.display='none'">
        <div class="modal-dialog  modal-dialog-centered modal-lg" >
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row  justify-content-md-center" style="max-height:400px; overflow-y: scroll;">
                        <div class="imgWrapper">
                            <img id="img01" style="max-width:100%;" class="justify-content-lg-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
<!-- <script src="assets/js/page/bootstrap-modal.js"></script> -->




<script>
    $(document).ready(function(){
        $(document).on('click', '#checkAll', function() {
            if(this.checked){
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                })
            }

        });
        $(document).on('click', '.check', function() {
            // console.log($('.check').length)
                    if($('.check:checked').length == $('.check').length){
                        $('#checkAll').prop('checked', true)
                    } else {
                        $('#checkAll').prop('checked', false)
                    }
                })
    })
</script>

<script type="text/javascript">
    $(document).on('click', '.halaman', function(e){
        e.preventDefault()
        var page = $(this).attr("id");
        // var page = $('.page_active').attr('id');
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        if(start!='' && end!=''){
            $.ajax({
                type: 'GET',
                url: "hyarihatto_list_tabel.php",
                data: {page:page,start:start,end:end},
                success: function(hasil) {
                    $('.dataTabel').html(hasil);
                }
            });
        };
    });
</script>



