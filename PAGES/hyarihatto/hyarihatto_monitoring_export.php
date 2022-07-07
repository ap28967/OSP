<?php                   
include("../../CONFIG/config.php"); 

if (!isset($_SESSION['osp_user'])) {
    header("Location: ../../AUTH/auth-login.php");
}

// PHP SPREADSHEET
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

?>



            
<?php

if(isset($_GET['start'])!="" && isset($_GET['end'])!="" ){


    $startDate = date('Y-m-d', strtotime($_GET['start']));
    $endDate = date('Y-m-t', strtotime($_GET['end']));

    $mulai = strtotime($startDate);   
    $selesai = strtotime(date('Y-m-d', strtotime($_GET['end'])));



    if($_GET['pilih_type']=="dept_account"){
        $filter_tabel = "dept_account = '$_GET[pilih_data]'";
    } else if($_GET['pilih_type']=="sect"){
        $filter_tabel = "sect = '$_GET[pilih_data]'";
    } else if($_GET['pilih_type']=="grp"){
        $filter_tabel = "grp = '$_GET[pilih_data]'";
    }






    //QUERY HITUNG ALL ROWS KARYAWAN
   $queryAllKar = "SELECT npk FROM view_sesi WHERE $filter_tabel"; 
   $resultAllKar=mysqli_query($link_osp,$queryAllKar);    
   $total_records=mysqli_num_rows($resultAllKar);

  
          
 
                $sheet->setCellValueByColumnAndRow(1, 1, 'No');
                $sheet->setCellValueByColumnAndRow(2, 1, 'NPK');
                $sheet->setCellValueByColumnAndRow(3, 1, 'Nama');
                $sheet->setCellValueByColumnAndRow(4, 1, 'Jabatan');
                $sheet->setCellValueByColumnAndRow(5, 1, 'Group');
                $sheet->setCellValueByColumnAndRow(6, 1, 'Section');
                $sheet->setCellValueByColumnAndRow(7, 1, 'Department');
                            


        // LOOPING TABEL HEADER BERDASARKAN BULAN
        $b = 8;
        while ($mulai <= $selesai){
            $bulan = date('Y-M', $mulai);
            $awal_bulan = date('Y-m-d', $mulai);
            $akhir_bulan = date('Y-m-t', $mulai); 
            $kolom = $b++;    

            // CODE LOOPING BULAN 
            $sheet->setCellValueByColumnAndRow($kolom, 1, $bulan);                
                            

            $mulai = strtotime('+1 month',$mulai);  //  Increment next month 
        } //while tabel header          
                

                


 
        $i = 2;
        // QUERY ALL NPK    
        $queryAll = "SELECT * FROM view_sesi WHERE $filter_tabel ORDER BY npk "; 
        $resultAll=mysqli_query($link_osp,$queryAll);    
        if ($resultAll->num_rows > 0) {     
            while ($rows = mysqli_fetch_assoc($resultAll)){
                $j = $i++;
                $no = $j-1;
                $sheet->setCellValueByColumnAndRow(1, $j, $no);
                $sheet->setCellValueByColumnAndRow(2, $j, $rows['npk']);
                $sheet->setCellValueByColumnAndRow(3, $j, $rows['nama']);
                $sheet->setCellValueByColumnAndRow(4, $j, $rows['jabatan']);
                $sheet->setCellValueByColumnAndRow(5, $j, $rows['nama_grp']);
                $sheet->setCellValueByColumnAndRow(6, $j, $rows['nama_sect']);
                $sheet->setCellValueByColumnAndRow(7, $j, $rows['nama_dept_account']);
   
                $f = 8;            
                $mulai2 = strtotime($startDate);
                while ($mulai2 <= $selesai){
                    $kolom2 = $f++;                     
                    $bulan = date('Y-M', $mulai2);
                    $awal_bulan = date('Y-m-d', $mulai2);
                    $akhir_bulan = date('Y-m-t', $mulai2);
                    $queryHyari = "SELECT npk FROM view_hyarihatto WHERE (tglinput BETWEEN '$awal_bulan' AND '$akhir_bulan') AND npk = '$rows[npk]'"; 
                    $resultHyari=mysqli_query($link_osp,$queryHyari) or die(mysqli_error($link_osp));
                    if(mysqli_num_rows($resultHyari) > 0){
                        $sheet->setCellValueByColumnAndRow($kolom2, $j, 'O');              
                    } else {
                        $sheet->setCellValueByColumnAndRow($kolom2, $j, '-');                       
                    }                                    
                    $mulai2 = strtotime('+1 month',$mulai2);        
                }  //while status hyarihatto 
            } //while ALL NPK
        } //if $resultAll

        // Set nama tab worksheet
        $sheet->setTitle("hyarihatto");

        //membuat file name
        $date = date('d-m-y-'.substr((string)microtime(), 1, 8));
        $date = str_replace(".", "", $date);
        $filename = "hyarihatto_".$date;      

        // redirect dan download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0'); 


        //savng file
        ob_end_clean();
        // $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer = new Xlsx($spreadsheet);
        // $writer->save($filename);
        $writer->save('php://output');


        die;
        
} //Isset
?>


            





