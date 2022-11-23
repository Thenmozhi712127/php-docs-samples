<?php

/** From File **/
//composer require phpoffice/phpspreadsheet;
require __DIR__.'/../vendor/autoload.php';
//require './vendor/autoload.php';
//$loader->addPsr4('Acme\\Test\\', __DIR__);

$inputFileName = $_FILES['fromexcel']['name'];

/**./sample Data/example1.xls’**/


 
$readspreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);



//change it

$read_sheetData = $readspreadsheet->getActiveSheet();

$read_highestRow = $read_sheetData->getHighestRow(); 

$read_highestColumn = $read_sheetData->getHighestColumn(); 

$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 


/** To File**/

$masterspreadsheet =  $_FILES[“fromexcel”][“name”];

$writespreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($masterspreadsheet);

//change it
$writesheetData = $writerspreadsheet->getActiveSheet();
$writehighestRow = $writesheetData->getHighestRow(); 
$writehighestColumn = $writesheetData->getHighestColumn(); 

$writecol = 0;
$writehighestRow++;

For ($row = 1; $row <= $read_highestRow; ++$row) {


    For ($col = 0; $col <= $highestColumnIndex; ++$col) {

 $Cell_value = $sheetData->getCellByColumnAndRow($col, $row)->getValue();


$writespreadsheet->getActiveSheet()->setCellValueByColumnAndRow($writecol, $writehighestRow, $Cell_value);

$writehighestRow++;
$writecol++;

    }


}
$writer = new Xlsx($writerspreadsheet);

$writer->save(‘yourspreadsheet.xlsx’);

?>

