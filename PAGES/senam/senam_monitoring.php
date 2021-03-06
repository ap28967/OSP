<?php 
 
$name_page = "Monitor Senam";
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
                                        </div>
                                       
                                        <!-- Periode HINGGA -->
                                        <div class="form-group col-md-2 ">
                                            <label for="hingga_bulan">Until</label>
                                            <input type="month" class="form-control" id="endDate" name="endDate" placeholder="month" >                                            
                                        </div>
                                         <!-- DEPARTEMENT -->
                                         <div class="form-group col-md-2">
                                            <label for="pilihDept">Departement</label>
                                            <select type="text" class="form-control" id="pilihDept" name="pilihDept">
                                                <option value="">Pilih...</option>
                                                <option value="Body 1">Body 1</option> 
                                                <option value="Body 2">Body 2</option> 
                                                <option value="BQC">BQC</option>
                                            </select>                                       
                                        </div>
                                        <!-- DEPARTEMENT -->
                                        <div class="form-group col-md-4">
                                            <label for="pilihDept">Section</label>
                                            <select type="text" class="form-control" id="pilihDept" name="pilihDept">
                                                <option value="">Pilih...</option>
                                                <option value="Komite QCCSS">Komite QCCSS</option>
                                            </select>                                       
                                        </div>
                                        <!-- Button CARI -->
                                        <div class="form-group col-md-2">
                                            <button type="button" name="btnSubmit"class="btn btn-primary btn-md halaman fa fa-search" style="font-size:medium;" id="1"></button>
                                        </div>
                                    
                                </div>
                            </div>

                            <!-- <div class="card-body dataGrafik">  
                            </div> -->



                            <div class="row">
                                <div class="card-body col-md-8">
                                    <canvas id="myChart88" style="width:100%;height:300px;"></canvas>
                                </div>                            
                                <div class="card-body col-md-4">
                                    <canvas id="myChart99" style="width:100%;height:300px;"></canvas>
                                </div>
                            </div>



                        <!-- Card -->
                        </div>
                    <!-- Col -->
                    </div>
                <!-- Row -->
                </div>
            <!-- Section Body    -->
            </div>            
        <!-- Section -->
        </section> 
    <!-- Main Content       -->
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






<script>
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["#fe5553"];

    new Chart("myChart88", {    
    data: {
        labels: xValues,
        datasets: [{
            type: "line",
            borderColor: "#000000",
            data:[30, 30, 30, 30, 30],
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
                url: "hyarihatto_monitoring_grafik.php",
                data: {page:page,start:start,end:end},
                success: function(hasil) {
                    $('.dataGrafik').html(hasil);
                }
            });
        };
    });


</script>

