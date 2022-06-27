<?php 
 
$name_page = "Monitor Hyarihatto";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>





                <div class="row">
                    <div class="col-md-12">  

                        <div class="card">                         
                            <!-- FILTER RANGGAL -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Periode DARI -->  
                                    
                                        <div class="form-group col-md-2 ">
                                            <label for="dari_bulan">From</label>
                                            <input type="month" class="form-control" id="startDate" name="startDate" placeholder="month">
                                            <span class="validity"></span>
                                        </div>
                                       
                                        <!-- Periode HINGGA -->
                                        <div class="form-group col-md-2 ">
                                            <label for="hingga_bulan">Until</label>
                                            <input type="month" class="form-control" id="endDate" name="endDate" placeholder="month" >
                                            <span class="validity"></span>                                            
                                        </div>
                                         <!-- DEPARTEMENT -->
                                         <div class="form-group col-md-2">
                                            <label for="pilih_dept_account">Departement</label>
                                            <select type="text" class="form-control" id="pilih_dept_account" name="pilih_dept_account">
                                                <!-- <option value="">Pilih...</option> -->
                                                <option id="all_dept" value="All" class="d-none">All</option>
                                                <?php 
                                                    $query_dept = mysqli_query($link_osp,"SELECT * FROM bais_dept_account") or die(mysqli_error($link_osp));
                                                    if (mysqli_num_rows( $query_dept)>0){
                                                        while($rows_dept = mysqli_fetch_assoc( $query_dept)){
                                                            echo '<option value="'.$rows_dept['id_dept_account'].'">'.$rows_dept['department_account'].'</option>'; 
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <span class="validity"></span>                                       
                                        </div>
                                        <!-- SECTION -->
                                        <div class="form-group col-md-2">
                                            <label for="pilih_sect">Section</label>
                                            <select type="text" class="form-control" id="pilih_sect" name="pilih_sect">
                                                <!-- <option value="">Pilih...</option> -->
                                                <option id="all_sect" value="All" class="d-none">All</option>
                                                <?php 
                                                    $query_sect = mysqli_query($link_osp,"SELECT * FROM bais_id_section") or die(mysqli_error($link_osp));
                                                    if (mysqli_num_rows( $query_sect)>0){
                                                        while($rows_sect = mysqli_fetch_assoc( $query_sect)){
                                                            echo '<option value="'.$rows_sect['id_section'].'">'.$rows_sect['section'].'</option>'; 
                                                        }
                                                    }
                                                ?>
                                            </select>   
                                            <span class="validity"></span>                                    
                                        </div>
                                        <!-- GROUP -->
                                        <div class="form-group col-md-2">
                                            <label for="pilih_grp">Group</label>
                                            <select type="text" class="form-control dataGrp" id="pilih_grp" name="pilih_grp">
                                                <!-- <option value="_" class="d-none">Pilih...</option> -->
                                                <option id="all_grp" value="All">All</option>
                                                <?php 
                                                    // $query_grp = mysqli_query($link_osp,"SELECT * FROM bais_id_group") or die(mysqli_error($link_osp));
                                                    // if (mysqli_num_rows( $query_grp)>0){
                                                    //     while($rows_grp = mysqli_fetch_assoc( $query_grp)){
                                                    //         echo '<option value="'.$rows_grp['id_group'].'">'.$rows_grp['nama_group'].'</option>'; 
                                                    //     }
                                                    // }
                                                ?>
                                            </select> 
                                            <span class="validity"></span>                                      
                                        </div>
                                        <!-- Button CARI -->
                                        <div class="form-group col-md-2 text-md-right">
                                            <button type="button" name="export_excel"class="btn btn-primary btn-md halaman fa-solid fa-file-excel" style="font-size:medium;" id="export_excel"></button>
                                            <button type="button" name="btnSubmit"class="btn btn-primary btn-md halaman fa fa-search" style="font-size:medium;" id="1"></button>
                                        </div>
                                    
                                </div>
                            </div>
                        <!-- Card -->
                        </div>


                        <div class="card dataTabel">
                            <!-- GRAFIK -->
                            <!-- TABEL -->
                            <div>  
                                <table class="table table-sm"  >
                                    <thead>
                                        <tr style="background-color:#9A9791; color:white;">
                                            <th scope="col">#</th>
                                            <th scope="col">NPK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Group</th>
                                            <th scope="col">Section</th>
                                            <th scope="col">Dept</th>
                                            <th scope="col">Bulan</th>
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        <!-- Card -->
                        </div>




                    <!-- Col -->
                    </div>
                <!-- Row -->
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
<script src="../../ASSETS/bootstrap/js/chart.min.js"></script>
<script src="../../ASSETS/js/custom.js"></script>









<!-- POST -->
<script type="text/javascript">
    $(document).on('click', '.halaman', function(e){
        e.preventDefault()
        var page = $(this).attr("id");
        // var page = $('.page_active').attr('id');
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        var pilih_dept_account = $('#pilih_dept_account').val();
        var pilih_sect = $('#pilih_sect').val();
        var pilih_grp = $('#pilih_grp').val();
        var pilih_data;
        var pilih_type;


        if(start!="" && end!="" && (pilih_dept_account!=null || pilih_sect!=null || pilih_grp!=null)){    
            
            if (pilih_dept_account!="All" && pilih_sect=="All" && pilih_grp=="All"){
                pilih_data = pilih_dept_account;
                pilih_type = "dept_account";
            } else if (pilih_dept_account=="All" && pilih_sect!="All" && pilih_grp=="All"){
                pilih_data = pilih_sect;
                pilih_type = "sect";
            } else if (pilih_dept_account=="All" && pilih_sect!="All" && pilih_grp!="All"){
                pilih_data = pilih_grp;
                pilih_type = "grp";
            }

                $.ajax({
                    type: 'GET',
                    url: "hyarihatto_monitoring_tabel.php",
                    data: {
                        page               : page,
                        start              : start,
                        end                : end,
                        pilih_data         : pilih_data,
                        pilih_type         : pilih_type
                    },             
                    success: function(hasil) {
                        $('.dataTabel').html(hasil);                    
                    }
                });
        };
    });
</script>










<!-- TOGGLE INPUT SELECTOR -->
<script>
    // TOGGLE DEPT
     $(document).on('change', '#pilih_dept_account', function(){
        $('#all_sect').prop('selected', true);
        $('#all_grp').prop('selected', true);
        $('.callback_grp').addClass('d-none');
        
     });

    //  TOGGLE SECT
     $(document).on('change', '#pilih_sect', function(){
        $('#all_dept').prop('selected', true);
        $('#all_grp').prop('selected', true);
        // var page = $(this).attr("id");
        var pilih_sect = $('#pilih_sect').val();
        if(pilih_sect != ''){
            $.ajax({
                type: 'GET',
                url: "hyarihatto_monitoring_select.php",
                data: {pilih_sect:pilih_sect},
                success: function(hasil) {
                    $('.dataGrp').html(hasil);
                }
            });
        };
     });

     //  TOGGLE GROUP
     $(document).on('change', '#pilih_grp', function(){
         $('#all_dept').prop('selected', true);
     });
</script>



