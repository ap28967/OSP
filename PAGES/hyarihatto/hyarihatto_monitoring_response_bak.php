<?php                   
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

?>



            
<?php
$_GET['start'] = '2022-01';
$_GET['end'] = '2022-01';
$_GET['page'] = 1;
echo $_SESSION['osp_code_level'];
if(isset($_GET['start'])!="" && isset($_GET['end'])!="" ){
    $page = $_GET['page'];
    $startDate = date('Y-m-d', strtotime($_GET['start']));
    $endDate = date('Y-m-t', strtotime($_GET['end']));

    $mulai = strtotime($startDate);   
    $selesai = strtotime(date('Y-m-d', strtotime($_GET['end'])));

    // FILTER DATA TABEL BERDASARKAN LEVEL SESSION
    if ($_SESSION['osp_code_level'] >= 2 && $_SESSION['osp_code_level']<=3){
        $filter_tabel = "grp = '$_SESSION[osp_grp]'";
    } elseif ($_SESSION['osp_code_level'] == 4) {
        $filter_tabel ="sect = '$_SESSION[osp_sect]'";
    } elseif ($_SESSION['osp_code_level'] >= 5 && $_SESSION['osp_code_level']<=6){
        $filter_tabel ="dept = '$_SESSION[osp_dept]'";
    } elseif ($_SESSION['osp_code_level'] >= 7) {
        $filter_tabel ="division = '$_SESSION[osp_division]'";
    // } elseif ($_SESSION['osp_level'] == 8) {
        // $filter_tabel ="division = '$_SESSION[osp_division]'";
    }

   

    // QUERY HITUNG ALL ROWS KARYAWAN
   $queryAllKar = "SELECT * FROM view_sesi WHERE $filter_tabel"; 
   $resultAllKar=mysqli_query($link_osp,$queryAllKar);    
   $total_records=mysqli_num_rows($resultAllKar);
   mysqli_free_result($resultAllKar);
//    echo $queryAllKar;
    // Pagination
    $no=1;        
    $limit =5;
    $limit_start = ($page-1) * $limit;    

    $no = $limit_start + 1;    
    $jumlah_page = (ceil($total_records / $limit)<=0)?1:ceil($total_records / $limit);
    $jumlah_number = 3; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
    $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
    $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

    // $noId = 1;
    // $noLabel = 1;
    echo $total_records;
  ?>
  

  <table class="table table-striped table-responsive text-center text-nowrap">
        <thead>
            <tr>
            <!-- <th scope="col"> -->
            <!-- <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkAll">
                <label for="checkAll" class="custom-control-label">&nbsp;</label>
            </div> -->
            <!-- </th> -->
            <th scope="col">#</th>
            <th scope="col">NPK</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Group</th>
            <th scope="col">Section</th>
            <th scope="col">Dept</th>
  <?php

  
    while ($mulai <= $selesai){
        $bulan = date('Y-M', $mulai);
        $awal_bulan = date('Y-m-d', $mulai);
        $akhir_bulan = date('Y-m-t', $mulai);

        //CODE LOOPING BULAN
        echo '<th scope="col">'.$bulan.'</th>';
         //Increment next month 
         $mulai = strtotime('+1 month',$mulai); 
    } //while tabel header          
        ?>   

        </tr>
        </thead>       
        <tbody>

<?php
    // QUERY ALL NPK
    $queryAll = "SELECT * FROM view_sesi WHERE $filter_tabel ORDER BY npk LIMIT $limit_start,$limit  "; 
    $resultAll=mysqli_query($link_osp,$queryAll);    
    if ($resultAll->num_rows > 0) {
        while ($rows = mysqli_fetch_assoc($resultAll)){  

            // $noId = $noId + 1;
            // $noLabel = $noLabel + 1;
            ?>

            <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $rows['npk'];?></td>
            <td><?php echo $rows['nama'];?></td>
            <td><?php echo $rows['jabatan'];?></td>
            <td><?php echo $rows['nama_grp'];?></td>
            <td><?php echo $rows['nama_sect'];?></td>
            <td><?php echo $rows['nama_dept_account'];?></td>


            <?php
            $mulai2 = strtotime($startDate);
            while ($mulai2 <= $selesai){
                $bulan = date('Y-M', $mulai2);
                $awal_bulan = date('Y-m-d', $mulai2);
                $akhir_bulan = date('Y-m-t', $mulai2);
                //QUERY HYARIHATTO
                // $arrayHyari = array();
                $queryHyari = "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$awal_bulan' AND '$akhir_bulan') AND npk = '$rows[npk]' AND  $filter_tabel"; 
                $resultHyari=mysqli_query($link_osp,$queryHyari);
                // echo '<td>O</td>';
                if(mysqli_num_rows($resultHyari)>0){
                        echo '<td>O</td>';                
                } else {
                    echo '<td>-</td>';
                }
                $mulai2 = strtotime('+1 month',$mulai2);        
            }  //while status hyarihatto 

                ?>                                
            </tr>

            <?php
        } //while ALL NPK
    } //if $resultAll
} //Isset
?>

        </tbody>
    </table>
    <br>
    <nav>
        <ul class="pagination">
            <?php

            if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" >First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" ><span aria-hidden="true">&laquo;</span></a></li>';
            } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1" style="color:#6777ef"><a class="page-link" >First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'" style="color:#6777ef"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            }

            for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active page_active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"  style="color:#6777ef"><a class="page-link" >'.$i.'</a></li>';
            }


            if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" ><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" >Last</a></li>';
            } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'" style="color:#6777ef"><a class="page-link" ><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'" style="color:#6777ef"><a class="page-link" >Last</a></li>';
            }

            
            ?>
        </ul>
    </nav>


            





