<?php


class Add extends CoreA
{
    protected $add_brands;
    protected $add_models;
    protected $add_errors;
    //Добавляем новый бренд в БД
    public function get_add_brand_bd($title, $descriptions, $h1, $img_brands, $deviz, $translated, $autor, $director, $date_in, $country, $themes, $history_brands, $error_brands, $video, $brand_name, $url)
    {
        $this->add_brands = $this->db->prepare("INSERT INTO `brands` SET `title`=:title,`description`=:description,`h1`=:h1,`img_brands`=:img_brands,`deviz`=:deviz,`translate`=:translated,`autor`=:autor,`director`=:director,`date_in`=:date_in,`country`=:country,`themes`=:themes,`history_brands`=:history_brands,`error_brands`=:error_brands,`video`=:video,`brand_name`=:brand_name,`url_brands`=:url");
        $this->add_brands->execute(array('title' => $title, 'description' => $descriptions, 'h1' => $h1, 'img_brands' => $img_brands, 'deviz' => $deviz, 'translated' => $translated, 'autor' => $autor, 'director' => $director, 'date_in' => $date_in, 'country' => $country, 'themes' => $themes, 'history_brands' => $history_brands, 'error_brands' => $error_brands, 'video' => $video, 'brand_name' => $brand_name, 'url' => $url));
    }

    //Добавляем новую модель
    public function get_add_model_bd($title, $uniq_lable, $description, $brand_category,$title_category, $h1, $url_models, $img_model1, $altimg_model1, $img_model2, $altimg_model2, $img_model3, $altimg_model3, $img_model4, $altimg_model4, $class_model, $kuzov_model, $years_model, $text_table_model, $text_model)
    {
        $this->add_models = $this->db->prepare("INSERT INTO `models` SET `title`=:title,`uniq_lable`=:uniq_lable,`description`=:description,`brand_category`=:brand_category,`title_brcategory`=:title_brcategory,`h1`=:h1,`url_models`=:url_models,`img_model1`=:img_model1,`altimg_model1`=:altimg_model1,`img_model2`=:img_model2,`altimg_model2`=:altimg_model2,`img_model3`=:img_model3,`altimg_model3`=:altimg_model3,`img_model4`=:img_model4,`altimg_model4`=:altimg_model4,`class_model`=:class_model,`kuzov_model`=:kuzov_model,`years_model`=:years_model,`table_models`=:text_table_model,`text_model`=:text_model");
        $this->add_models->execute(array('title' => $title, 'uniq_lable' => $uniq_lable, 'description' => $description, 'brand_category' => $brand_category,'title_brcategory'=>$title_category, 'h1' => $h1, 'url_models' => $url_models, 'img_model1' => $img_model1, 'altimg_model1' => $altimg_model1, 'img_model2' => $img_model2, 'altimg_model2' => $altimg_model2, 'img_model3' => $img_model3, 'altimg_model3' => $altimg_model3, 'img_model4' => $img_model4, 'altimg_model4' => $altimg_model4, 'class_model' => $class_model, 'kuzov_model' => $kuzov_model, 'years_model' => $years_model, 'text_table_model' => $text_table_model, 'text_model' => $text_model));
    }
    //Добавление новых ошибок из Excel файла
    public function get_add_errors($editor5,$editor6,$editor7,$errors_cat,$errors_title_cat,$code_error,$url){
            $this->add_errors=$this->db->prepare("INSERT INTO `errors` SET `rus_error`=:rus_error,`eng_error`=:eng_error,`reset_error`=:reset_error,`categ_error`=:categ_error,`titlecat_error`=:titlecat_error,`code_error`=:code_error,url_errors=:url");
            $this->add_errors->execute(array('rus_error'=>$editor5,'eng_error'=>$editor6,'reset_error'=>$editor7,'categ_error'=>$errors_cat,'titlecat_error'=>$errors_title_cat,'code_error'=>$code_error,'url'=>$url));
        }
}