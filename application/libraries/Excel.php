<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Autoload dari Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{

    public function __construct()
    {
        // kosongkan jika tidak perlu
    }

    public function createSpreadsheet()
    {
        return new Spreadsheet();
    }

    public function createWriter($spreadsheet, $type = 'Xls')
    {
        switch ($type) {
            case 'Xls':
                return new Xlsx($spreadsheet);
                // Tambah writer lain kalau mau dukung format lain
            default:
                throw new \Exception("Writer type not supported");
        }
    }
}
