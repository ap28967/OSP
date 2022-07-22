<?php 
 
    $name_page = "Detail Hyari";
    include("../header/navbar.php");
    if (!isset($_SESSION['osp_user'])) {
        header("Location: ../../AUTH/auth-login.php");
    } 

    if ($level<3 AND $hyarihatto_monitor==0){
        // header("Location: hyarihatto_list.php");
        echo '<script>window.location.href = "hyarihatto_list.php";</script>';
    } 


    $startDate = date('Y-m-01');
    $endDate = date('Y-m-t');
?>





<!--TAB 3-->  
<div class="row"><!--ROW HISTORICAL-->
    <div class="card  col-md-12 " ><!--col-md-12 --> 

                       
            <!-- FILTER RANGGAL -->
            <div class="card-body">
                <!-- Button CARI -->
                <div class="form-group col-md-12 text-md-right">
                    <?php if ($level>=4 or $hyarihatto_export == 1){?>                                            
                        <button type="button" name="export_excel" id="export_excel" class="btn btn-danger btn-md fa-solid fa-file-excel" style="font-size:large;"></button>
                    <?php } ?>
                    
                    <button type="button"  id="1" class="btn btn-primary btn-md halaman btnSubmit fa fa-search" style="font-size:medium;"></button>
                    <hr>
                </div>
                

                <div class="row">
                    <!-- DEPARTEMENT -->
                    <div class="form-group col-md-4">
                        <label for="pilih_dept_account">Departement</label>                                            
                        <select type="text" class="form-control" id="pilih_dept_account" name="pilih_dept_account" >  
                            <option id="all_dept" value="All" class="d-none">All</option>                                   
                            <?php 
                                if ($level>=5 OR $hyarihatto_export==1){
                                    $query_dept = mysqli_query($link_osp,"SELECT * FROM dept_account") or die(mysqli_error($link_osp));
                                        if (mysqli_num_rows( $query_dept)>0){
                                            while($rows_dept = mysqli_fetch_assoc( $query_dept)){
                                                
                                                echo '<option value="'.$rows_dept['id_dept_account'].'">'.$rows_dept['department_account'].'</option>'; 
                                            }
                                        }
                                } else {
                                    if($level<=3 ){
                                        echo '<option value="All">'.$dept_account.'</option>';
                                    } elseif($level==4){
                                        echo '<option value="All">All</option>';
                                    } 
                                }
                            ?>
                        </select>
                        <span class="validity"></span>                                       
                    </div>
                    <!-- SECTION -->
                    <div class="form-group col-md-4">
                        <label for="pilih_sect">Section</label>
                        <select type="text" class="form-control" id="pilih_sect" name="pilih_sect">
                            <option id="all_sect" value="All" class="d-none">All</option>
                            <?php                             
                                if ($level>=5 OR $hyarihatto_export==1){
                                    $query_sect = mysqli_query($link_osp,"SELECT * FROM section") or die(mysqli_error($link_osp));
                                    
                                    if (mysqli_num_rows( $query_sect)>0){
                                        while($rows_sect = mysqli_fetch_assoc( $query_sect)){                                            
                                            echo '<option value="'.$rows_sect['id_section'].'">'.$rows_sect['section'].'</option>'; 
                                        }
                                    }                                                    
                                } else {
                                    if($level<=3 ){
                                        echo '<option value="'.$section.'">'.$section.'</option>'; 
                                    } elseif($level==4){
                                        $query_sect_scoop = mysqli_query($link_osp,"SELECT * FROM section WHERE id_section = '$section'") or die(mysqli_error($link_osp));
                                        if (mysqli_num_rows( $query_sect_scoop)>0){
                                            while($rows_sect_scoop = mysqli_fetch_assoc( $query_sect_scoop)){
                                                echo '<option id="all_sect" value="All" class="d-none">All</option>';
                                                echo '<option value="'.$rows_sect_scoop['id_section'].'">'.$rows_sect_scoop['section'].'</option>'; 
                                            }
                                        }                                                        
                                    }

                                }
                            ?>
                        </select>   
                        <span class="validity"></span>                                    
                    </div>

                    <!-- GROUP -->
                    <div class="form-group col-md-4">
                        <label for="pilih_grp">Group</label>                                            
                        <select type="text" class="form-control dataGrp" id="pilih_grp" name="pilih_grp">
                            <!-- <option id="all_grp" value="All">All</option> -->
                            <?php 
                                if($level<=3 ){
                                    echo '<option value="'.$id_groupfrm.'">'.$groupfrm.'</option>'; 
                                } elseif($level>=4 OR $hyarihatto_export==1) {                                                       
                                            echo '<option id="all_grp" value="All" class="d-none">All</option>';  
                                }
                            ?>                                               
                        </select>                                             
                        <span class="validity"></span>                                      
                    </div>

                    <div class="form-group col-md-4 ">
                        <label for="dari_bulan">From</label>
                        <input type="month" class="form-control" id="startDate" name="startDate" placeholder="month">
                        <span class="validity"></span>
                    </div>
                    
                    <div class="form-group col-md-4 ">
                        <label for="hingga_bulan">Until</label>
                        <input type="month" class="form-control" id="endDate" name="endDate" placeholder="month" >
                        <span class="validity"></span>                                            
                    </div>

                    <div class="form-group col-md-4 ">
                        <label for="cari_npk">NPK</label>
                        <input type="text" class="form-control" id="cari_npk" name="cari_npk" placeholder=". . .">
                        <span class="validity"></span>
                    </div>

                                        
                </div>
            </div>        

    </div><!--col-md-12-->                 



<!--TAB BAR-->              
<ul class="nav nav-tabs"  id="subtab"><!--TAB BAR-->
    <li class="nav-item">
        <a class="nav-link active" id="subtab_1" href="#">Resume</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="subtab_2" href="#">List Detail</a>
    </li>                      
</ul><!--TAB BAR--> 


    <div class="card  col-md-12 " ><!--col-md-12 --> 

        <!-- subtab_1_content -->      
        <div class="dataTabel" id="subtab_1_content"><!-- subtab_1_content -->                
            <table class="table table-sm table-responsive "  >
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
        </div><!-- subtab_1_content --> 

        <div class="d-none dataTabel2" id="subtab_2_content"><!--subtab_2_content-->
            <table class="table table-striped table-responsive table-sm text-center text-nowrap" >
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
        </div><!--subtab_2_content-->

    </div><!--col-md-12-->                 
</div><!--ROW HISTORICAL -->



<div id="notifikasi"></div>
<div id="loader" class="d-none"></div>
      

<?php
  include("../header/footer.php");
?>


<!-- General JS Scripts ###############################################################################-->
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
    <!-- Morris JS -->
    <script src="../../ASSETS/morris.js-0.5.1/raphael-min.js"></script>
    <script src="../../ASSETS/morris.js-0.5.1/morris.min.js"></script>
<!-- General JS Scripts ###############################################################################-->


<!-- PILIHAN TAB JUDUL ###############################################################################-->
<script type="text/javascript">
    // SUBTAB 1 AKTIF
    $(document).on('click', '#subtab_1', function(e){
        e.preventDefault();
        // SUBTAB
        $('#subtab').removeClass('d-none');
        $('#subtab_content').removeClass('d-none');
        $('#subtab_1').addClass('active');
        $('#subtab_1_content').removeClass('d-none');
        $('#subtab_2').removeClass('active');
        $('#subtab_2_content').addClass('d-none');      
    })

        // SUBTAB 2 AKTIF
    $(document).on('click', '#subtab_2', function(e){
        e.preventDefault();       
        // SUBTAB
        $('#subtab').removeClass('d-none');
        $('#subtab_content').removeClass('d-none'); 
        $('#subtab_1').removeClass('active');
        $('#subtab_1_content').addClass('d-none');
        $('#subtab_2').addClass('active');
        $('#subtab_2_content').removeClass('d-none');
    })
</script>


<!-- POST TABEL ######################################################################################-->
<script type="text/javascript">
    $(document).on('click', '.halaman', function(e){
        e.preventDefault()
        // SETTING TAB 1 agar grafik size nya tidak error
        $('#subtab').removeClass('d-none');
        $('#subtab_content').removeClass('d-none');
        $('#subtab_1').addClass('active');
        $('#subtab_1_content').removeClass('d-none');
        $('#subtab_2').removeClass('active');
        $('#subtab_2_content').addClass('d-none'); 
        // variable
        var page = $(this).attr("id");
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        var pilih_dept_account = $('#pilih_dept_account').val();
        var pilih_sect = $('#pilih_sect').val();
        var pilih_grp = $('#pilih_grp').val();
        var pilih_npk = $('#cari_npk').val();
        var pilih_data;
        var pilih_type;

        if(pilih_npk==""){
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
        } else {
            pilih_data = pilih_npk;
            pilih_type = "npk";
        }


            if((start!="") && (end!="") && (pilih_data!=undefined) && (pilih_type!=undefined)){
                $('#loader').removeClass('d-none');
                $('.btnSubmit').addClass('btn-progress');
                // <!-- POST RESUME -->                
                $.ajax({
                    type: 'GET',
                    url: "hyarihatto_detail_resume.php",
                    data: {
                        page               : page,
                        start              : start,
                        end                : end,
                        pilih_data         : pilih_data,
                        pilih_type         : pilih_type
                    },             
                    success: function(hasil) {
                        $('.dataTabel').html(hasil);
                        // $('#loader').addClass('d-none'); 
                        // $('.btnSubmit').removeClass('btn-progress');   
                                          
                    }
                })
                // <!-- POST DETAIL PEMBUATAN -->
                $.ajax({
                    type: 'GET',
                    url: "hyarihatto_detail_pembuatan.php",
                    data: {
                        page               : page,
                        start              : start,
                        end                : end,
                        pilih_data         : pilih_data,
                        pilih_type         : pilih_type
                    },             
                    success: function(hasil) {
                        $('.dataTabel2').html(hasil);
                        $('#loader').addClass('d-none'); 
                        $('.btnSubmit').removeClass('btn-progress');   
                                          
                    }
                })
            } else {
                Swal.fire({
                    title: 'Pilih Data',
                    text: 'Silahkan pilih Tanggal & Area',
                    timer: 2000,            
                    icon: 'info',
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonColor: '#00B9FF',
                    cancelButtonColor: '#B2BABB',
                }) 
            }        
            
    });
</script>


<!-- EXPORT EXCEL #####################################################################################-->
<script>
    $('#export_excel').on('click', function(e){
        e.preventDefault();
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        var pilih_dept_account = $('#pilih_dept_account').val();
        var pilih_sect = $('#pilih_sect').val();
        var pilih_grp = $('#pilih_grp').val();
        var pilih_data;
        var pilih_type;

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

        if((start!="") && (end!="") && (pilih_data!=undefined) && (pilih_type!=undefined)){
            // var getLink = $(this).attr('href');
            var getLink = 'hyarihatto_detail_export.php?start='+start+'&end='+end+'&pilih_data='+pilih_data+'&pilih_type='+pilih_type
            document.location.href=getLink;
        } else {
            Swal.fire({
                title: 'Pilih Data',
                text: 'Silahkan pilih Tanggal & Area',
                timer: 2000,            
                icon: 'info',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#00B9FF',
                cancelButtonColor: '#B2BABB',
          })
        }
    });
</script>	



<!-- TOGGLE INPUT SELECTOR ###########################################################################-->
<script>
    // TOGGLE DEPT
     $(document).on('change', '#pilih_dept_account', function(){
        $('#all_sect').prop('selected', true);
        $('#all_grp').prop('selected', true);
        $('.callback_grp').addClass('d-none');
        $('#cari_npk').val('');
        
     });

    //  TOGGLE SECT
     $(document).on('change', '#pilih_sect', function(){
        $('#all_dept').prop('selected', true);
        $('#all_grp').prop('selected', true);
        $('#cari_npk').val('');
        // var page = $(this).attr("id");
        var pilih_sect = $('#pilih_sect').val();
        console.log(pilih_sect)
        if(pilih_sect != ''){
            $.ajax({
                type: 'GET',
                url: "hyarihatto_detail_selector.php",
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
         $('#cari_npk').val('');
     });
</script>



<!-- FUNCTION VIEW IMAGE -->
<script> 
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }
</script>




