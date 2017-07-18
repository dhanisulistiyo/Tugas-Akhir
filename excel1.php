<?php

error_reporting(E_ALL);
 
date_default_timezone_set('Europe/London');
 
/** Include PHPExcel */
require_once '/Classes/PHPExcel.php';
 
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
 
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
 ->setLastModifiedBy("Data Siswa SMPN 5 ********")
 ->setTitle("Data Siswa SMPN 5 ********")
 ->setSubject("Data Siswa SMPN 5 ********")
 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
 ->setKeywords("office 2007 openxml php")
 ->setCategory("Test result file");
 
// Create the worksheet
$objPHPExcel->setActiveSheetIndex(0);
 
$objPHPExcel->getActiveSheet()->setCellValue('A7', "No")
 ->setCellValue('B7', "Time")
 ->setCellValue('C7', "Temperature")
 ->setCellValue('D7', "pH");

 
$server = "localhost";
$username = "root";
$password = "12345";
$db = "tugas_akhir";
 
$koneksi = mysql_connect($server,$username,$password);
mysql_select_db($db, $koneksi) or die("Cannot connect to database..");
 
$SQL = mysql_query("SELECT * FROM `tbl_dataSensor` ORDER BY `time` Desc");
 
$totJML = mysql_num_rows($SQL);
 
$dataArray= array();
$no=0;
while($row = mysql_fetch_array($SQL, MYSQL_ASSOC)){
 $no++;
 $row_array['no'] = $no;
 $row_array['time'] = $row['time'];
 $row_array['temperature'] = $row['temperature'];
 $row_array['pH'] = $row['pH'];
 
 array_push($dataArray,$row_array);
}
$nox=$no+7;
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A8');
 
// Set page orientation and size
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
 
// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->getFill()->getStartColor()->setARGB('FF808080');
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

// Set autofilter
 // Always include the complete filter range!
 // Excel does support setting only the caption
 // row, but that's not a best practise...
$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
 
$sharedStyle1->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A7:D$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A7:D7')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN
 )
 ),
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
 'rotation' => 90,
 'startcolor' => array(
 'argb' => 'FFA0A0A0'
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
);
 
$objPHPExcel->getActiveSheet()->getStyle('A7:M1000')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A7:M1000')->getFont()->setSize(7);
 
// Merge cells
$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
$objPHPExcel->getActiveSheet()->setCellValue('A2', "Data Hasil Pengukuran Temperature dan pH Air");
$objPHPExcel->getActiveSheet()->mergeCells('A3:D3');
$objPHPExcel->getActiveSheet()->setCellValue('A3', "Project Tugas Akhir");
$objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
$objPHPExcel->getActiveSheet()->setCellValue('A4', "Baius Salam");
$objPHPExcel->getActiveSheet()->mergeCells('A5:D5');
$objPHPExcel->getActiveSheet()->setCellValue('A5', "J3D113002");




$objPHPExcel->getActiveSheet()->getStyle('A2:D6')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A2:D5')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getStyle('A2:D6')->getFont()->setBold(FALSE);
$objPHPExcel->getActiveSheet()->getStyle('A2:D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// Redirect output to a client’s web browser (Excel2007)

// Save Excel 2007 file
#echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data.xls"');
$objWriter->save('php://output');