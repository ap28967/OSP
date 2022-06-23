<?php                   
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

$npk = $_SESSION['osp_user'];
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
            <th scope="col">Kategori</th>
            <th scope="col">Risk</th>
            <th scope="col">STOP6</th>
            <th scope="col">ICARE</th>
            <th scope="col">Tanggal Kejadian</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Temuan</th>
            <th scope="col">Penyebab</th>
            <th scope="col">Saran</th>
            <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
       


<?php


if(isset($_GET['start'])!="" && isset($_GET['end'])!="" ){
    $page = $_GET['page'];
    $startDate = $_GET['start'].'-01';
    $endDate = $_GET['end'].'-31';    
    

    
    
    $queryAll = "SELECT npk FROM hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND npk = '$npk'"; 
    if ($resultAll=mysqli_query($link_osp,$queryAll)){    
        $total_records=mysqli_num_rows($resultAll);
        mysqli_free_result($resultAll);
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

    $query = "SELECT * FROM hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND npk = '$npk'  ORDER BY id DESC LIMIT $limit_start,$limit";   
    $results = mysqli_query($link_osp, $query) or die (mysqli_error($link_osp));
    while ($rows = mysqli_fetch_assoc(@$results)){
            // Checkbox
        $noId = $noId + 1;
        $noLabel = $noLabel + 1;
        ?>

        <tr>
        <!-- <td scope="row">
            <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input check" id="checkbox-<?php 
                                                                                                                        // echo $noId++;
                                                                                                                                        ?>">
                <label for="checkbox-<?php 
                                            // echo $noLabel++;
                                                            ?>" class="custom-control-label">&nbsp;</label>
            </div>
        </td> -->
        <td><?php echo $no++;?></td>
        <td><?php echo $rows['npk'];?></td>
        <td><?php echo $rows['kategori'];?></td>
        <td><?php echo $rows['risk'];?></td>
        <td><?php echo $rows['stop6'];?></td>
        <td><?php echo $rows['icare'];?></td>
        <td><?php echo $rows['tanggal'];?></td>
        <td>
            <?php if (STRLEN($rows['lokasi'])>=15) {
                    echo SUBSTR($rows['lokasi'],0,15)."...";
                } else {
                    echo $rows['lokasi'];
                }
            ?>
        </td>
        <td><?php echo $rows['temuan'];?></td>
        <td><?php echo $rows['penyebab'];?></td>
        <td><?php echo $rows['saran'];?></td>
        <td align="center"><img src="../../CACHE/hyarihatto/<?php echo $rows['nama_file'];?>" style="width:25px;cursor:pointer" onclick="onClick(this)" ></td>                                   
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
    <!-- </nav> -->


<?php
}
?>
