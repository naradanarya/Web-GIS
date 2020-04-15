<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Load library phpspreadsheet
require('./assets/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet


class Download extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		// PROTEKSI SESSION
        $this->simple_login->cek_login();
		$this->load->model('datapoint_model');
        

    }
    
    // Main page
    public function index()
    {
        $datapoint = $this->datapoint_model->listing();

        $data = array( 'title' => 'Laporan Exel - GIS',
                        'datapoint' => $datapoint,
                        'content' 	=> 'backend/datapoint/download'
                    );
        $this->load->view('backend/layout/wrapper', $data, FALSE);
    }
	
	// Export ke excel
public function export()
{
$datapoint = $this->datapoint_model->listing();
// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
->setLastModifiedBy('Andoyo - Java Web Medi')
->setTitle('Office 2007 XLSX Test Document')
->setSubject('Office 2007 XLSX Test Document')
->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
->setKeywords('office 2007 openxml php')
->setCategory('Test result file');

// Add some data
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A1', 'Nama SPBU')
->setCellValue('B1', 'Latitude')
->setCellValue('C1', 'Longitude')
;

// Miscellaneous glyphs, UTF-8
$i=2; foreach($datapoint as $datapoint) {

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $datapoint->nama_spbu)
    ->setCellValue('B'.$i, $datapoint->latitude)
    ->setCellValue('C'.$i, $datapoint->longitude);
    $i++;
    }

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
}

}
