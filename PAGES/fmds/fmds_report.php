<?php 
 
$name_page = "Report FMDS";
include("../header/navbar.php");
if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}


?>






            <div class="row">
                <div class="col-md-12">  

                    <div class="card">                            
                        <div class="card-header">
                            <h4>Report FMDS</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <button type="button" id="checkAll" name="checkAll" class="btn btn-danger">Select All</button>
                                    <button type="button" id="clearAll" name="clearAll" class="btn btn-danger">Clear All</button>
                                    <button type="button" id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button>
                                </div> 
                            </div>                   
                        </div>
                        
                
                        
                        <div class="card-body row">                            
                            <div class="col-md-4">                  
                                <p><b>Problem Identification</b></p>
                                <div id="summernote1"></div>
                                
                            </div>
                            <div class="col-md-4">                  
                                <p><b>Corrective Action</b></p>
                                <div id="summernote2"></div>                                
                            </div>
                            <div class="col-md-4">                  
                                <p><b>Monitoring</b></p>
                                <div><canvas id="myChart88" style="width:100%;height:300px;"></canvas></div>                                
                            </div>
                        </div>


                        <div class="card-body row">                            
                            <div class="col-md-4">                  
                                <p><b>Problem Identification</b></p>
                                <div id="summernote3"></div>
                                
                            </div>
                            <div class="col-md-4">                  
                                <p><b>Corrective Action</b></p>
                                <div id="summernote4"></div>                                
                            </div>
                            <div class="col-md-4">                  
                                <p><b>Monitoring</b></p>
                                <div><canvas id="myChart99" style="width:100%;height:300px;"></canvas></div>                                
                            </div>
                        </div>

                        
                          


                

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
    $('#summernote1').summernote({
        placeholder: 'Place text here...',
        tabsize: 2,
        height: 200,
    });
    $('#summernote2').summernote({
        placeholder: 'Place text here...',
        tabsize: 2,
        height: 200,
    });
    $('#summernote3').summernote({
        placeholder: 'Place text here...',
        tabsize: 2,
        height: 200,
    });
    $('#summernote4').summernote({
        placeholder: 'Place text here...',
        tabsize: 2,
        height: 200,
    });
</script>


<script>
    var myHtml = $('#summernote').summernote('code');
    function funcMyHtml() {
           debugger;
           document.getElementById("myHtml").value = $('#summernote').summernote('code');
       }
</script>



<script>
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May"];
    var yValuesBar = [55, 49, 44, 24, 15];
    var yValuesLine = [20, 20, 20, 20, 20];
    var barColors = ["#63ed7a", "#63ed7a", "#63ed7a", "#63ed7a", "#fe5553"];

    new Chart("myChart88", {    
    data: {        
        labels: xValues,
        xAxisID: "Bulan",
        datasets: [{
            type: "line",
            borderColor: "#000000",
            data: yValuesLine,
            label: "Target"            
        }, {
            type: "bar",
            backgroundColor: barColors,
            data: yValuesBar,
            label : "Actual",         
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Grafik"
        }
    }
    });

    new Chart("myChart99", {
        data: {        
        labels: xValues,
        xAxisID: "Bulan",
        datasets: [{
            type: "line",
            borderColor: "#000000",
            data: yValuesLine,
            label: "Target"            
        }, {
            type: "bar",
            backgroundColor: barColors,
            data: yValuesBar,
            label : "Actual",         
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Grafik"
        }
    }
    });
</script>