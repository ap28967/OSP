<?php 
 
$name_page = "Judgement PBK"; 
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}


?>





       
        <div class="col-lg-12">
              <div class="row">

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>Body 1</h6></div>
                  <div class="card card-statistic-2">                    
                    <canvas id="myChart77" style="width:100%;height:150px;"></canvas>
                  </div>
                </div>

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>Body 2</h6></div>
                  <div class="card card-statistic-2">                    
                    <canvas id="myChart88" style="width:100%;height:150px;"></canvas>
                  </div>
                </div>

                <!-- CARD -->
                <div class=" col-lg-4 col-md-4 col-sm-12">
                  <div class="card-header modif-header"><h6>BQC</h6></div>
                  <div class="card card-statistic-2">                    
                    <canvas id="myChart99" style="width:100%;height:150px;"></canvas>
                  </div>
                </div>

               
              
                <!-- row -->
              </div>
                <!-- class -->
            </div>


        <div class="section-body">

            <div class="row">
                <div class="col-md-12">  

                    <div class="card">                            
                        <div class="card-header">
                            <h4>Judgement PBK</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <button type="button" id="btnView" name="btnView" class="btn btn-primary">View</button>
                                    <button type="button" id="btnExport" name="btnExport" class="btn btn-primary">Export</button>
                                    <button type="button" id="btnPrint" name="btnPrint" class="btn btn-primary">Print</button>
                                </div> 
                            </div>                   
                        </div>
                        
                        <table class="table table-responsive table-stripped text-nowrap table-md">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkAll">
                                            <label for="checkAll" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th scope="col">No</th>
                                    <th scope="col">Npk</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Dept</th>
                                    <th scope="col">FRM</th>
                                    <th scope="col">Ket FRM</th>
                                    <th scope="col">SPV</th>
                                    <th scope="col">Ket SPV</th>
                                    <th scope="col">MGR</th>
                                    <th scope="col">Ket MGR</th>
                                    <th scope="col">DH</th>
                                    <th scope="col">Ket DH</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input check" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td scope="row">1</td>
                                    <td>34563</td>
                                    <td>Asep Saepudin</td>
                                    <td>Body 2</td>
                                    <td>BS</td>
                                    <td>Juara SS</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td><button type="button" class="btn btn-warning btn-sm">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="col">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input check" id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td scope="row">2</td>
                                    <td>7543</td>
                                    <td>Yayan Jatnika</td>
                                    <td>Body 2</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td><button type="button" class="btn btn-warning btn-sm">Detail</button></td>
                                </tr>
                                <tr>
                                    <td scope="col">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input check" id="checkbox-3">
                                            <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td scope="row">3</td>
                                    <td>13243</td>
                                    <td>Edi Suteja</td>
                                    <td>Body 2</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td>B</td>
                                    <td>-</td>
                                    <td><button type="button" class="btn btn-warning btn-sm">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>

                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" >First</a></li>
                            <li class="page-item" style="color:#6777ef"><a class="page-link" >1</a></li>
                            <li class="page-item disabled"><a class="page-link" >Last</a></li>
                        
                       
                          


                

                        <!-- <div class="card-footer">                                
                        </div> -->
                    
                        <!-- <div class="card-body dataGrafik">  
                        </div> -->


                    



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
<script src="../../ASSETS/modules/summernote/summernote-bs4.js"></script>
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
            console.log($('.check').length)
                    if($('.check:checked').length == $('.check').length){
                        $('#checkAll').prop('checked', true)
                    } else {
                        $('#checkAll').prop('checked', false)
                    }
                })
    })
</script>


<script>
    var xValues = ["IST", "BS", "B", "C", "K"];
    var yValuesActual = [3, 49, 250, 55, 15];
    var yValuesDist = [5, 40, 200, 100, 0];
    var barColors = ["#fe5553"];

    new Chart("myChart77", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesActual,
            label: "Actual"
        }, {
            backgroundColor: "#000000",
            data: yValuesDist,
            label: "D.Normal"
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: false,
        text: "Body 1"
        }
    }
    });


    new Chart("myChart88", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesActual,
            label: "Actual"
        }, {
            backgroundColor: "#000000",
            data: yValuesDist,
            label: "D.Normal"
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: false,
        text: "Body 2"
        }
    }
    });


    new Chart("myChart99", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValuesActual,
            label: "Actual"
        }, {
            backgroundColor: "#000000",
            data: yValuesDist,
            label: "D.Normal"
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "BQC"
        }
    }
    });
</script>