<?php  
    $name_page = "Monitor Hyari";
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




<!--TAB 1-->  
<div class="row card" id="tab_1_content"><!--ROW MONITOR AREA-->  
    
    <!-- DONUT SLIDE HYARIHATTO -->
    <div id="carouselExampleIndicators3" class="card-body carousel slide col-md-12" data-ride="carousel" >                  
        <div class="carousel-inner" >
            <div id="donut-dept" class="card-body carousel-item active" style="height:250px;"></div>
            <div id="donut-shift" class="card-body carousel-item" style="height:250px;"></div>
            <div id="donut-kategori" class="card-body carousel-item" style="height:250px;"></div>
            <div id="donut-risk" class="card-body carousel-item" style="height:250px;"></div>
            <div id="donut-stop6" class="card-body carousel-item" style="height:250px;"></div>
            <div id="donut-icare" class="card-body carousel-item" style="height:250px;"></div>
            <div id="donut-perbaikan" class="card-body carousel-item" style="height:250px;"></div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev" >
            <span aria-hidden="true"><i class="fas fa-angle-left" style="color:black; font-size:35px; font-weight:55px;"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
            <span aria-hidden="true"><i class="fas fa-angle-right" style="color:black; font-size:35px; font-weight:55px;"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <!-- PROGRESS BAR GRAFIK PER_SECTION HYARIHATTO -->
    <div class="card-body col-md-12">  
        <hr>
        <?php
            $bulan = date('Y-M', time());
            $awal_bulan = date('Y-m-01', time());
            $akhir_bulan = date('Y-m-t', time()); 
                                        
            // GRAFIK PER_SECTION HYARIHATTO
            $query_sect = "SELECT * FROM section ORDER BY section";
            $result_sect=mysqli_query($link_osp,$query_sect) or die(mysqli_error($link_osp));
            if(mysqli_num_rows($result_sect)>0){
                while ($rows_sect = mysqli_fetch_assoc($result_sect)){
                    // AMBIL NAMA SECTION HEAD

                    // HITUNG TOTAL MP PER MASING-MASING SECTION HEAD
                    $code_sect_loop = $rows_sect['id_section'];             
                    $query_mp_sect = "SELECT npk FROM view_organization WHERE id_sect = '$code_sect_loop'";
                    $result_mp_sect = mysqli_query($link_osp, $query_mp_sect) or die(mysqli_error($link_osp));
                    if(mysqli_num_rows($result_mp_sect)>0){
                        $total_result_mp_sect = mysqli_num_rows($result_mp_sect); 
                    }  
                        
                    // HITUNG TOTAL UPDATE HYARI PER MASING-MASING SECTION HEAD
                    $query_update_hyari_sect = "SELECT npk FROM view_hyarihatto WHERE id_sect = '$code_sect_loop' AND (tglinput BETWEEN '$awal_bulan' AND '$akhir_bulan')";
                    $result_update_hyari_sect = mysqli_query($link_osp, $query_update_hyari_sect) or die(mysqli_error($link_osp));
                    if(mysqli_num_rows($result_update_hyari_sect)>0){
                        $total_records_update_hyari_sect = mysqli_num_rows($result_update_hyari_sect);
                        $total_update_persen_sect = round(($total_records_update_hyari_sect/$total_result_mp_sect)*100,0);
                    } else {
                        $total_records_update_hyari_sect = 0;
                        $total_update_persen_sect = 0;
                    }
                    ?>                    
                    <div class="card-body row ">
                        <label class="col-form-label text-md-right col-md-3"><span><b><?php echo $rows_sect['section']; ?></b></span></label>
                        <div class="col-md-7">                 
                        <div class="progress" data-height="25" name="<?php echo $rows_sect['section']; ?>">
                            <div class="progress-bar" role="progressbar" data-width="<?php echo  $total_update_persen_sect; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo  $total_update_persen_sect; ?>%</div>
                        </div>
                        </div>
                        <label class="col-form-label text-md-left col-md-2"><span><b><?php echo $total_records_update_hyari_sect; echo "/"; echo $total_result_mp_sect; ?></b></span></label>
                    </div>                    
                <?php
                }
            }
        ?>
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
<!-- General JS Scripts ###############################################################################-->



<!-- PHP GRAFIK DONUT TAB 1 ############################################################################## -->
<?php
    $query_donut_all = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') ") or die(mysqli_error($link_osp));
    $donut_all = mysqli_num_rows($query_donut_all);

    // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
    $array_id_dept = [];
    $array_value_dept = [];
    $query_id_dept = mysqli_query($link_osp, "SELECT * FROM dept_account") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_id_dept)>0){
        while($rows_id_dept = mysqli_fetch_assoc($query_id_dept)){        
            $query_donut_dept = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND id_dept_account = '$rows_id_dept[id_dept_account]' ") or die(mysqli_error($link_osp));        
            $array_donut_dept[] = array('label' => $rows_id_dept['department_account'], 'value' => mysqli_num_rows($query_donut_dept)); 
        }    
        $json_donut_dept = json_encode($array_donut_dept);
    }

    // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
    $array_id_shift = [];
    $array_value_shift = [];
    $query_id_shift = mysqli_query($link_osp, "SELECT id_shift FROM shift") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_id_shift)>0){
        while($rows_id_shift = mysqli_fetch_assoc($query_id_shift)){        
            $query_donut_shift = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND shift = '$rows_id_shift[id_shift]' ") or die(mysqli_error($link_osp));        
            $array_donut_shift[] = array('label' => $rows_id_shift['id_shift'], 'value' => mysqli_num_rows($query_donut_shift)); 
        }    
        $json_donut_shift = json_encode($array_donut_shift);
    }

    // <!-- GRAFIK DONUT KATEGORI ############################################################################## -->
    $array_kategori = [];
    $array_value_kategori = [];
    $query_kategori = mysqli_query($link_osp, "SELECT kategori FROM hyarihatto_kategori") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_kategori)>0){
        while($rows_kategori = mysqli_fetch_assoc($query_kategori)){        
            $query_donut_kategori = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND kategori = '$rows_kategori[kategori]' ") or die(mysqli_error($link_osp));        
            $array_donut_kategori[] = array('label' => $rows_kategori['kategori'], 'value' => mysqli_num_rows($query_donut_kategori)); 
        }    
        $json_donut_kategori = json_encode($array_donut_kategori);
    }

    // <!-- GRAFIK DONUT RISK ############################################################################## -->
    $array_risk = [];
    $array_value_risk = [];
    $query_risk = mysqli_query($link_osp, "SELECT risk FROM hyarihatto_risk") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_risk)>0){
        while($rows_risk = mysqli_fetch_assoc($query_risk)){        
            $query_donut_risk = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND risk = '$rows_risk[risk]' ") or die(mysqli_error($link_osp));        
            $array_donut_risk[] = array('label' => $rows_risk['risk'], 'value' => mysqli_num_rows($query_donut_risk)); 
        }    
        $json_donut_risk = json_encode($array_donut_risk);
    }

    // <!-- GRAFIK DONUT STOP6 ############################################################################## -->
    $array_stop6 = [];
    $array_value_stop6 = [];
    $query_stop6 = mysqli_query($link_osp, "SELECT stop6 FROM hyarihatto_stop6") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_stop6)>0){
        while($rows_stop6 = mysqli_fetch_assoc($query_stop6)){        
            $query_donut_stop6 = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND stop6 = '$rows_stop6[stop6]' ") or die(mysqli_error($link_osp));        
            $array_donut_stop6[] = array('label' => $rows_stop6['stop6'], 'value' => mysqli_num_rows($query_donut_stop6)); 
        }    
        $json_donut_stop6 = json_encode($array_donut_stop6);
    }

    // <!-- GRAFIK DONUT ICARE ############################################################################## -->
    $array_icare = [];
    $array_value_icare = [];
    $query_icare = mysqli_query($link_osp, "SELECT icare FROM hyarihatto_icare") or die(mysqli_error($link_osp));
    if(mysqli_num_rows($query_icare)>0){
        while($rows_icare = mysqli_fetch_assoc($query_icare)){        
            $query_donut_icare = mysqli_query($link_osp, "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND icare = '$rows_icare[icare]' ") or die(mysqli_error($link_osp));        
            $array_donut_icare[] = array('label' => $rows_icare['icare'], 'value' => mysqli_num_rows($query_donut_icare)); 
        }    
        $json_donut_icare = json_encode($array_donut_icare);
    }

    // <!-- GRAFIK DONUT PERBAIKAN ############################################################################## -->
    $array_perbaikan = [];
    $query_temuan = mysqli_query($link_osp, "SELECT foto_temuan FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate')") or die(mysqli_error($link_osp));
    $temuan_foto = mysqli_num_rows($query_temuan);

    $query_perbaikan = mysqli_query($link_osp, "SELECT foto_perbaikan FROM hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND foto_perbaikan !='' ") or die(mysqli_error($link_osp));
    $perbaikan_foto = mysqli_num_rows($query_perbaikan);

    $remain_foto = $temuan_foto - $perbaikan_foto;
    

    $array_perbaikan[] =  array('label' => 'Perbaikan', 'value'=> $perbaikan_foto);
    $array_perbaikan[] =  array('label'=> 'Remain', 'value'=> $remain_foto);
    $json_perbaikan = json_encode($array_perbaikan);


?>

<!-- JS GRAFIK DONUT TAB 1 ############################################################################## -->
<script>
    $(document).ready(function(){
    
        var warna = ["#ff6384", "#ffcd56", "#4bc0c0", "#36a2eb", "#d49cb8", "#7c988c" ];
        var donut_all = <?php echo $donut_all ?>;

        // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
        var donut_dept = <?php echo $json_donut_dept; ?>;
        new Morris.Donut({
            element: 'donut-dept',
            data: donut_dept,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })

        // <!-- GRAFIK DONUT SHIFT ############################################################################## -->
        var donut_shift = <?php echo $json_donut_shift; ?>;
        new Morris.Donut({
            element: 'donut-shift',
            data: donut_shift,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })

        // <!-- GRAFIK DONUT KATEGORI ############################################################################## -->
        var donut_kategori = <?php echo $json_donut_kategori; ?>;
        new Morris.Donut({
            element: 'donut-kategori',
            data: donut_kategori,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })


        // <!-- GRAFIK DONUT RISK ############################################################################## -->
        var donut_risk = <?php echo $json_donut_risk; ?>;
        new Morris.Donut({
            element: 'donut-risk',
            data: donut_risk,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })

        // <!-- GRAFIK DONUT STOP6 ############################################################################## -->
        var donut_stop6 = <?php echo $json_donut_stop6; ?>;
        new Morris.Donut({
            element: 'donut-stop6',
            data: donut_stop6,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })

        // <!-- GRAFIK DONUT ICARE ############################################################################## -->
        var donut_icare = <?php echo $json_donut_icare; ?>;
        new Morris.Donut({
            element: 'donut-icare',
            data: donut_icare,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })

        // <!-- GRAFIK DONUT PERBAIKAN  ############################################################################## -->
        var donut_perbaikan = <?php echo $json_perbaikan; ?>;
        new Morris.Donut({
            element: 'donut-perbaikan',
            data: donut_perbaikan,
            colors: warna,
            resize: true,
            redraw: true,
            formatter: function (y) { return Math.round((y/donut_all)*100) + "%" }
        })
    })
</script>







