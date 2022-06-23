<?php                   
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

$npk = $_SESSION['osp_user'];
$sesi_grp = $_SESSION['osp_grp']; // GANTI PAKE SESSION

?>


    <table class="table table-striped table-responsive table text-center text-nowrap">
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
$_GET['start'] = '2022-02';
$_GET['end'] = '2022-03';
$_GET['page'] = 1;

if(isset($_GET['start'])!="" && isset($_GET['end'])!="" ){
    $page = $_GET['page'];
    $startDate = date('Y-m-d', strtotime($_GET['start']));
    $endDate = date('Y-m-t', strtotime($_GET['end']));

    $mulai = strtotime($startDate);
    $selesai = strtotime($endDate);
    while ($mulai <= $selesai){
        $bulan = date('Y-M', $mulai);
        $mulai = strtotime('+1 month',$startDate);          
    
    }

?>

            


            </tr>
        </thead>
        <tbody>
       


<?php  

    // QUERY ALL NPK
    $queryAll = "SELECT * FROM view_sesi WHERE grp = '$sesi_grp'"; 
    $resultAll=mysqli_query($link_osp,$queryAll);    
    $total_records=mysqli_num_rows($resultAll);


    //QUERY HYARIHATTO
    $arrayHyari = array();
    $queryHyari = "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND grp = '$sesi_grp'"; 
    $resultHyari=mysqli_query($link_osp,$queryHyari);
    if(mysqli_num_rows($resultHyari)>0){
        while ($rowsHyari = mysqli_fetch_assoc($resultHyari)){ 
            array_push($arrayHyari, $rowsHyari['npk']);
        }
    }
    
    // Pagination
    $limit = 10;
    $limit_start = ($page-1) * $limit;    
    $no=1;
    $no = $limit_start + 1;    
    $jumlah_page = (ceil($total_records / $limit)<=0)?1:ceil($total_records / $limit);
    $jumlah_number = 2; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
    $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
    $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

    $noId = 1;
    $noLabel = 1;





    
    while ($rows = mysqli_fetch_assoc($resultAll)){  

        $noId = $noId + 1;
        $noLabel = $noLabel + 1;
        ?>

        <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $rows['npk'];?></td>
        <td><?php echo $rows['nama'];?></td>
        <td><?php echo $rows['jabatan'];?></td>
        <td><?php echo $rows['grp'];?></td>
        <td><?php echo $rows['sect'];?></td>
        <td><?php echo $rows['dept'];?></td>
        
        
        <td>
            <?php
                if (in_array($rows['npk'], $arrayHyari)){
                    echo "O";
                } else {
                    echo "X";
                }
            ?>
        </td>                                   
        </tr>

        <?php
        } 

?>
        </tbody>
    </table>
    <br>






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


<?php

}
?>
