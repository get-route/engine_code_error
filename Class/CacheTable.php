<?php
require_once dirname(__DIR__) . '/Admin/vendor/autoload.php';
class CacheTable extends Core
{
    public static $code_error;

    public static function read_cache_xml($filename){
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);
        for ($str_exel = 1; $str_exel <= count(($sheet->toArray(null, true, true, true))); $str_exel++) {

            return $data;
        }
    }
}