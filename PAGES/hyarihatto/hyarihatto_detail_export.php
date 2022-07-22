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
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;

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

    // MULAI PHP SPREADSHEET
    $spreadsheet = new Spreadsheet();

    // SHEET 1
      
    $sheet = $spreadsheet->createSheet(1);
    // $sheet = $spreadsheet->getSheet(1);
    // $sheet = $spreadsheet->getActiveSheet(); 
    $sheet->setTitle("resume");  


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


        // SHEET 2
        $sheet = $spreadsheet->createSheet(2);
        $sheet->setTitle("detail");
        $sheet->getDefaultRowDimension()->setRowHeight(50); 
        foreach (range('A','Z') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle($col)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col)->getAlignment()->setVertical('center');
        }
        $sheet
            ->getStyle('A1:N1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('EAE8E8');

        $sheet
            ->getStyle('A1:N1')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN)
            ->setColor(new Color('000000'));

        $sheet->setCellValueByColumnAndRow(1, 1, 'No');
        $sheet->setCellValueByColumnAndRow(2, 1, 'NPK');
        $sheet->setCellValueByColumnAndRow(3, 1, 'Foto Temuan');
        $sheet->setCellValueByColumnAndRow(4, 1, 'Temuan');
        $sheet->setCellValueByColumnAndRow(5, 1, 'Penyebab');
        $sheet->setCellValueByColumnAndRow(6, 1, 'Kategori');
        $sheet->setCellValueByColumnAndRow(7, 1, 'Risk');
        $sheet->setCellValueByColumnAndRow(8, 1, 'STOP6');
        $sheet->setCellValueByColumnAndRow(9, 1, 'ICARE');
        $sheet->setCellValueByColumnAndRow(10, 1, 'Lokasi');
        $sheet->setCellValueByColumnAndRow(11, 1, 'Tanggal Kejadian');
        $sheet->setCellValueByColumnAndRow(12, 1, 'Saran');
        $sheet->setCellValueByColumnAndRow(13, 1, 'Foto Perbaikan');
        $sheet->setCellValueByColumnAndRow(14, 1, 'Tanggal Input');

        $i = 2;
        $query_pembuatan = mysqli_query($link_osp, "SELECT * FROM view_hyarihatto WHERE (tglinput BETWEEN '$startDate' AND '$endDate') AND $filter_tabel ORDER BY npk DESC ") or die(mysqli_error($link_osp));   
        if(mysqli_num_rows($query_pembuatan)>0){
            while ($rows = mysqli_fetch_assoc($query_pembuatan)){
                $j = $i++;  
                $sheet->setCellValueByColumnAndRow(1, $j, $j-1);
                $sheet->setCellValueByColumnAndRow(2, $j, $rows['npk']);
                $sheet->setCellValueByColumnAndRow(4, $j, $rows['temuan']);
                $sheet->setCellValueByColumnAndRow(5, $j, $rows['penyebab']);
                $sheet->setCellValueByColumnAndRow(6, $j, $rows['kategori']);
                $sheet->setCellValueByColumnAndRow(7, $j, $rows['risk']);
                $sheet->setCellValueByColumnAndRow(8, $j, $rows['stop6']);
                $sheet->setCellValueByColumnAndRow(9, $j, $rows['icare']);
                $sheet->setCellValueByColumnAndRow(10, $j, $rows['lokasi']);
                $sheet->setCellValueByColumnAndRow(11, $j, $rows['tanggal_kejadian']);
                $sheet->setCellValueByColumnAndRow(12, $j, $rows['saran']);           
                $sheet->setCellValueByColumnAndRow(14, $j, $rows['tglinput']);

                if($rows['foto_temuan']!=""){
                    $foto_temuan = '../../CACHE/hyarihatto/'. $rows['foto_temuan'];
                    if(file_exists( $foto_temuan)){
                        $sheet->setCellValueByColumnAndRow(3, $j, 1);
                        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();                    
                        $drawing->setName('foto_temuan');
                        $drawing->setDescription('foto_temuan');
                        $drawing->setPath( $foto_temuan);
                        $drawing->setCoordinates('C'.$j);
                        $drawing->setResizeProportional(false);
                        $drawing->setWidth(80);
                        $drawing->setHeight(50);
                        $drawing->setOffsetX(6);
                        $drawing->setOffsetY(8);
                        $drawing->setRotation(0);
                        $drawing->getShadow()->setVisible(true);
                        $drawing->getShadow()->setDirection(45);
                        $drawing->setWorksheet($sheet);
                    }
                }

                if($rows['foto_perbaikan']!=""){
                    $foto_perbaikan = '../../CACHE/hyarihatto/'. $rows['foto_perbaikan'];
                    if(file_exists( $foto_perbaikan)){
                        $sheet->setCellValueByColumnAndRow(13, $j, 1);
                        $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();                    
                        $drawing2->setName('foto_perbaikan');
                        $drawing2->setDescription('foto_perbaikan');
                        $drawing2->setPath($foto_perbaikan);
                        $drawing2->setCoordinates('M'.$j);
                        $drawing2->setResizeProportional(false);
                        $drawing2->setWidth(80);
                        $drawing2->setHeight(50);
                        $drawing2->setOffsetX(19);
                        $drawing2->setOffsetY(8);
                        $drawing2->setRotation(0);
                        $drawing2->getShadow()->setVisible(true);
                        $drawing2->getShadow()->setDirection(45);
                        $drawing2->setWorksheet($sheet);
                    }
                }


            }
        }


                            
        



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


            





