<?php 
 
$name_page = "Monitor Hyari";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
} 

if ($_SESSION['osp_code_level']<3 AND $hyarihatto_monitor==0){
    // header("Location: hyarihatto_list.php");
    echo '<script>window.location.href = "hyarihatto_list.php";</script>';
} 

?>



                
<ul class="nav nav-tabs"><!--TAB BAR-->
    <li class="nav-item">
        <a class="nav-link active" id="tab_1" href="#">Monitor Area</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="tab_2" href="#">Historical</a>
    </li>                        
</ul><!--TAB BAR-->  



<div class="row d-none" id="tab_2_content"><!--ROW HISTORICAL-->
    <div class="card  col-md-12 " ><!--col-md-12 --> 

                        <div class="card">                         
                            <!-- FILTER RANGGAL -->
                            <div class="card-body">

                                <!-- Button CARI -->
                                <div class="form-group col-md-12 text-md-right">
                                    <?php if ($_SESSION['osp_code_level']>=4 or $hyarihatto_export == 1){?>                                            
                                        <button type="button" name="export_excel" id="export_excel" class="btn btn-danger btn-md fa-solid fa-file-excel" style="font-size:large;"></button>
                                    <?php } ?>
                                    
                                    <button type="button" name="btnSubmit" id="1" class="btn btn-primary btn-md halaman btnSubmit fa fa-search" style="font-size:medium;"></button>
                                </div>

                                <div class="row">
                                    <!-- Periode DARI -->  
                                    
                                        
                                         <!-- DEPARTEMENT -->
                                         <div class="form-group col-md-4">
                                            <label for="pilih_dept_account">Departement</label>                                            
                                            <select type="text" class="form-control" id="pilih_dept_account" name="pilih_dept_account" >                                       
                                                <?php 
                                                    if ($_SESSION['osp_code_level']>=5 OR $hyarihatto_export==1){
                                                        $query_dept = mysqli_query($link_osp,"SELECT * FROM bais_dept_account") or die(mysqli_error($link_osp));
                                                            if (mysqli_num_rows( $query_dept)>0){
                                                                while($rows_dept = mysqli_fetch_assoc( $query_dept)){
                                                                    echo '<option id="all_dept" value="All" class="d-none">All</option>';
                                                                    echo '<option value="'.$rows_dept['id_dept_account'].'">'.$rows_dept['department_account'].'</option>'; 
                                                                }
                                                            }
                                                    } else {
                                                        if($_SESSION['osp_code_level']<=3 ){
                                                            echo '<option value="All">'.$_SESSION['osp_nama_dept_account'].'</option>';
                                                        } elseif($_SESSION['osp_code_level']==4){
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
                                                <?php 
                                                    if ($_SESSION['osp_code_level']>=5 OR $hyarihatto_export==1){
                                                        $query_sect = mysqli_query($link_osp,"SELECT * FROM bais_id_section") or die(mysqli_error($link_osp));
                                                        if (mysqli_num_rows( $query_sect)>0){
                                                            while($rows_sect = mysqli_fetch_assoc( $query_sect)){
                                                                echo '<option id="all_sect" value="All" class="d-none">All</option>';
                                                                echo '<option value="'.$rows_sect['id_section'].'">'.$rows_sect['section'].'</option>'; 
                                                            }
                                                        }                                                    
                                                    } else {
                                                        if($_SESSION['osp_code_level']<=3 ){
                                                            echo '<option value="'.$_SESSION['osp_sect'].'">'.$_SESSION['osp_nama_sect'].'</option>'; 
                                                        } elseif($_SESSION['osp_code_level']==4){
                                                            $query_sect_scoop = mysqli_query($link_osp,"SELECT * FROM bais_id_section WHERE id_section = '$_SESSION[osp_sect]'") or die(mysqli_error($link_osp));
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
                                                    if($_SESSION['osp_code_level']<=3 ){
                                                        echo '<option value="'.$_SESSION['osp_grp'].'">'.$_SESSION['osp_nama_grp'].'</option>'; 
                                                    } elseif($_SESSION['osp_code_level']>=4 OR $hyarihatto_export==1) {                                                       
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
                                            <input type="text" class="form-control" id="cari_npk" name="cari_npk" placeholder="">
                                            <span class="validity"></span>
                                        </div>

                                        

                                        
                                    
                                </div>
                            </div>
                        <!-- Card -->
                        </div>


                        
                        <!-- GRAFIK -->
                        <!-- TABEL -->   
                        <div class="dataTabel">                    
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
                        </div>
    </div><!--col-md-12-->                 
</div><!--ROW HISTORICAL -->


<?php

    $bulan = date('Y-M', time());
    $awal_bulan = date('Y-m-01', time());
    $akhir_bulan = date('Y-m-t', time()); 

    // DATASET GRAFIK SECTION
    $array_label_sect = [];
    $array_total_mp_sect = [];
    $array_target_hyari_sect = [];
    $array_update_hyari_sect = [];
    $array_update_persen_sect = [];                  
        
                                 
        // GRAFIK PER_SECTION HYARIHATTO
        $query_sect = "SELECT * FROM bais_id_section";
        $result_sect=mysqli_query($link_osp,$query_sect) or die(mysqli_error($link_osp));
        if(mysqli_num_rows($result_sect)>0){
            while ($rows_sect = mysqli_fetch_assoc($result_sect)){
                // AMBIL NAMA SECTION HEAD
                $array_label_sect[] = $rows_sect['section']; //rows_sect
                

                // HITUNG TOTAL MP PER MASING-MASING SECTION HEAD
                $code_sect_loop = $rows_sect['id_section'];             
                $query_mp_sect = "SELECT npk FROM bais_org WHERE sect = '$code_sect_loop'";
                $result_mp_sect = mysqli_query($link_osp, $query_mp_sect) or die(mysqli_error($link_osp));
                if(mysqli_num_rows($result_mp_sect)>0){
                    $total_result_mp_sect = mysqli_num_rows($result_mp_sect); 
                }  

                // HITUNG TOTAL UPDATE HYARI PER MASING-MASING SECTION HEAD
                $query_update_hyari_sect = "SELECT npk FROM view_hyarihatto WHERE sect = '$code_sect_loop' AND (tglinput BETWEEN '$awal_bulan' AND '$akhir_bulan')";
                $result_update_hyari_sect = mysqli_query($link_osp, $query_update_hyari_sect) or die(mysqli_error($link_osp));
                if(mysqli_num_rows($result_update_hyari_sect)>0){
                    $total_records_update_hyari_sect = mysqli_num_rows($result_update_hyari_sect);
                    $total_update_persen_sect = round(($total_records_update_hyari_sect/$total_result_mp_sect)*100,0);
                } else {
                    $total_records_update_hyari_sect = 0;
                    $total_update_persen_sect = 0;
                }

                $array_total_mp_sect[] = $total_result_mp_sect;
                $max_array_total_mp_sect = max( $array_total_mp_sect);
                $array_target_hyari_sect[] = 97;
                $array_update_hyari_sect[] = $total_records_update_hyari_sect;      
                $array_update_persen_sect[] = $total_update_persen_sect;
                
            }
            $json_label_sect = json_encode($array_label_sect); //X axis grafik json 
            $json_total_mp_sect = json_encode($array_total_mp_sect); //Y total mp grafik json 
            $json_target_hyari_sect = json_encode($array_target_hyari_sect);
            $json_update_hyari_sect = json_encode($array_update_hyari_sect);
            $json_update_persen_sect = json_encode($array_update_persen_sect);

        }

    ?>
    
<div class="row" id="tab_1_content"><!--ROW MONITOR AREA-->  
        <div class="card col-md-12">
            <canvas id="chart_grp" style="height:400px; font-size:8px;"></canvas> 
            <div id="hero-donut" class="graph"></div>
        </div>

</div><!--ROW MONITOR AREA--> 


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



<!-- PILIHAN TAB JUDUL ###############################################################################-->
<script type="text/javascript">
    $(document).on('click', '#tab_2', function(e){
        e.preventDefault();        
        $('#tab_1').removeClass('active');
        $('#tab_1_content').addClass('d-none');
        $('#tab_2').addClass('active');
        $('#tab_2_content').removeClass('d-none');
    })

    $(document).on('click', '#tab_1', function(e){
        e.preventDefault();
        $('#tab_1').addClass('active');
        $('#tab_1_content').removeClass('d-none');
        $('#tab_2').removeClass('active');
        $('#tab_2_content').addClass('d-none');
        
        
    })
</script>

<!-- POST TABEL ######################################################################################-->
<script type="text/javascript">
    $(document).on('click', '.halaman', function(e){
        e.preventDefault()
        var page = $(this).attr("id");
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
                $('#loader').removeClass('d-none');
                $('.btnSubmit').addClass('btn-progress');                
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
            var getLink = 'hyarihatto_monitoring_export.php?start='+start+'&end='+end+'&pilih_data='+pilih_data+'&pilih_type='+pilih_type
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


<!-- MONITOR AREA TAB_1 ##############################################################################-->
<script>
    var label_sect = <?= $json_label_sect; ?>;
    var total_mp_sect = <?= $json_total_mp_sect; ?>;
    var update_hyari_sect = <?= $json_update_hyari_sect; ?>;
    var update_persen_sect = <?= $json_update_persen_sect; ?>  
    var target_hyari_sect = <?= $json_target_hyari_sect; ?>;
    var barColors = ["#4bc0c0"];    
    
    
    new Chart("chart_grp", {    
        data: {   
            labels: label_sect,
            datasets: [{ 
                type: "line",
                borderColor: "grey",
                backgroundColor: "grey",
                data: target_hyari_sect,
                label: "Target",
                yAxisID: 'right_axis' 
            }, {
                type: "line",
                borderColor: "orange",
                backgroundColor: "orange",
                data: update_persen_sect,
                label: "%",
                yAxisID: 'right_axis'   
            }, {   
                type: "bar",
                backgroundColor: barColors,
                data: total_mp_sect,
                label: "Total MP",
                yAxisID: 'left_axis'   
            }, {            
                type: "bar",
                backgroundColor: "#ff6384",
                data: update_hyari_sect,
                label: "Update Hyari",
                yAxisID: 'left_axis'  
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Grafik Bar"        
            },
            scales: {
                left_axis: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    min: 0,
                    max: <?php 
                                if($max_array_total_mp_sect<100){
                                    echo round($max_array_total_mp_sect*2, 0);
                                } elseif ($max_array_total_mp_sect<1000) {
                                    echo round($max_array_total_mp_sect*2, -2);
                                } elseif ($max_array_total_mp_sect>=1000) {
                                    echo round($max_array_total_mp_sect*2, -3);
                                }
                            ?>              
                },
                right_axis: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    min: 0,
                    max: 100,
                    grid: {
                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                },  
            }
        }
    });
</script>

<!-- GRAFIK PIE ##############################################################################-->
<script>
//     new Morris.Line({
//   // ID of the element in which to draw the chart.
//   element: 'myfirstchart',
//   // Chart data records -- each entry in this array corresponds to a point on
//   // the chart.
//   data: [
//     { year: '2008', value: 20 },
//     { year: '2009', value: 10 },
//     { year: '2010', value: 5 },
//     { year: '2011', value: 5 },
//     { year: '2012', value: 20 }
//   ],
//   // The name of the data record attribute that contains x-values.
//   xkey: 'year',
//   // A list of names of data record attributes that contain y-values.
//   ykeys: ['value'],
//   // Labels for the ykeys -- will be displayed when you hover over the
//   // chart.
//   labels: ['Value']
// });



new Morris.Donut({
    element: 'hero-donut',
    data: [
      {label: 'Shift A', value: 25 },
      {label: 'Shift B', value: 40 },
      {label: 'Shift N', value: 25 },
      {label: 'Shift N2', value: 10 }
    ],
    formatter: function (y) { return y + "%" }
  });
</script>