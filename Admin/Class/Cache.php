<?php

namespace Admin;

require_once dirname(__DIR__)."/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Cache extends \CoreA
{
    public function all_xlsx($brand_name)
    {
        $count_error = 1;
            $spreadsheets = new Spreadsheet();
            $sheet = $spreadsheets->getActiveSheet();
            foreach ($this->get_all_errors($brand_name) as $all_error) {

        $sheet->setCellValue('A' . $count_error, $all_error['code_error']);
        $sheet->setCellValue('B' . $count_error, $all_error['categ_error']);
        $sheet->setCellValue('C' . $count_error, $all_error['titlecat_error']);
        $sheet->setCellValue('D' . $count_error, $all_error['rus_error']);
        $sheet->setCellValue('E' . $count_error, $all_error['eng_error']);
        $sheet->setCellValue('F' . $count_error, $all_error['reset_error']);
        $sheet->setCellValue('G' . $count_error, $all_error['url_errors']);

        $count_error++;
    }
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheets, 'Xlsx');
            $writer->save('../Admin/cache/'.$brand_name.'.xlsx');
            $count_error = 1;
        }

    public function all_brands(){
        $all_brand = $this->db->query("SELECT url_brands FROM brands");
        return $all_brand;
    }
    public function get_all_errors($url){
        $this->all_errors=$this->db->prepare("SELECT * FROM errors WHERE `categ_error`=:url");
        $this->all_errors->execute(array('url'=>$url));
        return $this->all_errors;
    }
}