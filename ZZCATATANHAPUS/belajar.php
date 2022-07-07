<?php

include '../../CONFIG/config.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$query = mysqli_query($link_osp, "SELECT * FROM view_hyarihatto WHERE grp = '$_SESSION[osp_grp]'") or die (mysqli_error($link_osp));
if(mysqli_num_rows($query)>0){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $i = 1;
    while($rows = mysqli_fetch_assoc($query)){
        $j = $i++;
        $sheet->setCellValue('A'.$j, $rows['npk']);
        $sheet->setCellValue('B'.$j, $rows['grp']);
        $sheet->setCellValueByColumnAndRow(1, 5, 'PhpSpreadsheet');

        
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('hyarihatto.xlsx');
}
echo "selesai";
?>