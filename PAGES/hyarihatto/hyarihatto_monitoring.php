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
                                            <label for="pilihDept">Departement</label>
                                            <select type="text" class="form-control" id="pilihDept" name="pilihDept">
                                                <option value="">Pilih...</option>
                                                <option id="all_dept" value="" class="d-none" disabled>All</option>
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
                                            <label for="pilihSect">Section</label>
                                            <select type="text" class="form-control" id="pilihSect" name="pilihSect">
                                                <option value="">Pilih...</option>
                                                <option id="all_sect" value="" class="d-none" disabled>All</option>
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
                                            <label for="pilihGrp">Group</label>
                                            <select type="text" class="form-control" id="pilihGrp" name="pilihGrp">
                                                <option value="">Pilih...</option>
                                                <option id="all_grp" value="" class="d-none" disabled>All</option>
                                                <?php 
                                                    $query_grp = mysqli_query($link_osp,"SELECT * FROM bais_id_group") or die(mysqli_error($link_osp));
                                                    if (mysqli_num_rows( $query_sect)>0){
                                                        while($rows_grp = mysqli_fetch_assoc( $query_grp)){
                                                            echo '<option value="'.$rows_grp['id_group'].'">'.$rows_grp['nama_group'].'</option>'; 
                                                        }
                                                    }
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


                        <div class="card">
                            <div class="row">
                                <div class="card-body col-md-8">
                                    <canvas id="myChart88" style="width:100%;height:200px;"></canvas>
                                </div>                            
                                <div class="card-body col-md-4">
                                    <canvas id="myChart99" style="width:100%;height:200px;"></canvas>
                                </div>
                            </div>
                        <!-- Card -->
                        </div>




                        <div class="card">                        


                            <div class="dataTabel">  
                                <table class="table"  >
                                    <thead>
                                        <tr>
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
<!-- Page Specific JS File -->
<script src="../../ASSETS/js/page/index.js"></script>





<!-- GRAFIK -->
<script>
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["#4bc0c0"];

    new Chart("myChart88", {    
    data: {
        labels: xValues,
        datasets: [{
            type: "line",
            borderColor: "grey",
            backgroundColor: "grey",
            data:[97, 97, 97, 97, 97],
            label: "Target"
        }, {            
            type: "bar",
            backgroundColor: barColors,
            data: yValues,
            label: "Actual"
            
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Grafik Bar"
        }
    }
    });

    var donatLabel = ["UF", "UR", "UB", "SM", "MB", "SL"];
    var donatValues = ["50", "40", "30", "20", "10", "5"];
    var donatColors = ["#fe5553","#74C656", "#56C6AB ", "#5691C6", "#C6BE56", "grey"];
    new Chart("myChart99", {    
    data: {
        labels: donatLabel,
        datasets: [{
            type: "doughnut",
            data:donatValues  ,
            backgroundColor: donatColors,        
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Grafik Donut"
        }
    }
    });
</script>





<!-- POST -->
<script type="text/javascript">
    $(document).on('click', '.halaman', function(e){
        e.preventDefault()
        var page = $(this).attr("id");
        // var page = $('.page_active').attr('id');
        var start = $('#startDate').val();
        var end = $('#endDate').val();
        var pilihDept = $('#pilihDept').val();

        if(start!='' && end!=''){
            $.ajax({
                type: 'GET',
                url: "hyarihatto_monitoring_response.php",
                data: {page:page,start:start,end:end, pilihDept:pilihDept},
                success: function(hasil) {
                    $('.dataTabel').html(hasil);
                    // console.log("ok")
                }
            });
        };
    });


</script>


<script>
    // TOGGLE DEPT
     $(document).on('change', '#pilihDept', function(){
         $('#all_sect').prop('selected', true);
         $('#all_grp').prop('selected', true);
     });
    //  TOGGLE SECT
     $(document).on('change', '#pilihSect', function(){
         $('#all_dept').prop('selected', true);
         $('#all_grp').prop('selected', true);
     });
     //  TOGGLE GROUP
     $(document).on('change', '#pilihGrp', function(){
         $('#all_dept').prop('selected', true);
         $('#all_sect').prop('selected', true);
     });
</script>