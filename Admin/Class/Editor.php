<?php


class Editor extends CoreA
{
    protected $img_post;
    protected $brand_content;
    protected $brand_update;
    protected $brand_category;
    protected $models_content;
    protected $models_update;
    protected $errors_engine;
    protected $update_errors_engine;
    //Получение списка фото для указанного урла каталога. Нужно для выбора картинки в админке.
    public function scandir_img($url){
        $this->img_post=scandir($url);
        return $this->img_post;
    }

    //Получаем список категорий для установки при редактировании и публикации модели
    public function brand_category_inmodels(){
        $this->brand_category=$this->db->query("SELECT url_brands,brand_name FROM brands");
        return $this->brand_category;
    }
    //Получаем записи страницы бренда по указанному ключу урлу. За него идет гет запрос по ссылке.
    public function get_brand_select($url){
        $this->brand_content=$this->db->prepare("SELECT * FROM brands WHERE url_brands=:url");
        $this->brand_content->execute(array('url'=>$url));
        return $this->brand_content;
    }
    //Обновляем полученную запись бренда, получая данные из формы в админке.
    public function get_brand_update ($title,$descriptions,$h1,$img_brands,$deviz,$translated,$autor,$director,$date_in,$country,$themes,$history_brands,$error_brands,$video,$brand_name,$url){
        $this->brand_update=$this->db->prepare("UPDATE `brands` SET `title`=:title,`description`=:description,`h1`=:h1,`img_brands`=:img_brands,`deviz`=:deviz,`translate`=:translated,`autor`=:autor,`director`=:director,`date_in`=:date_in,`country`=:country,`themes`=:themes,`history_brands`=:history_brands,`error_brands`=:error_brands,`video`=:video,`brand_name`=:brand_name WHERE `url_brands`=:url");
        $this->brand_update->execute(array('title'=>$title,'description'=>$descriptions,'h1'=>$h1,'img_brands'=>$img_brands,'deviz'=>$deviz,'translated'=>$translated,'autor'=>$autor,'director'=>$director,'date_in'=>$date_in,'country'=>$country,'themes'=>$themes,'history_brands'=>$history_brands,'error_brands'=>$error_brands,'video'=>$video,'brand_name'=>$brand_name,'url'=>$url));
    }
    //Получаем данные контента конкретной модели
    public function select_models($url){
        $this->models_content=$this->db->prepare("SELECT * FROM models WHERE url_models=:url");
        $this->models_content->execute(array('url'=>$url));
        return $this->models_content;
    }
    //Отправка данных модели после редактирования
    public function get_models_update($title,$uniq_lable,$description,$brand_category,$h1,$url_models,$img_model1,$altimg_model1,$img_model2,$altimg_model2,$img_model3,$altimg_model3,$img_model4,$altimg_model4,$class_model,$kuzov_model,$years_model,$text_table_model,$text_model,$url){
        $this->models_update = $this->db->prepare("UPDATE `models` SET `title`=:title,`uniq_lable`=:uniq_lable,`description`=:description,`brand_category`=:brand_category,`h1`=:h1,`url_models`=:url_models,`img_model1`=:img_model1,`altimg_model1`=:altimg_model1,`img_model2`=:img_model2,`altimg_model2`=:altimg_model2,`img_model3`=:img_model3,`altimg_model3`=:altimg_model3,`img_model4`=:img_model4,`altimg_model4`=:altimg_model4,`class_model`=:class_model,`kuzov_model`=:kuzov_model,`years_model`=:years_model,`table_models`=:text_table_model,`text_model`=:text_model WHERE `url_models`=:url");
        $this->models_update->execute(array('title' => $title, 'uniq_lable' => $uniq_lable, 'description' => $description, 'brand_category' => $brand_category, 'h1' => $h1, 'url_models' => $url_models, 'img_model1' => $img_model1, 'altimg_model1' => $altimg_model1, 'img_model2' => $img_model2, 'altimg_model2' => $altimg_model2, 'img_model3' => $img_model3, 'altimg_model3' => $altimg_model3, 'img_model4' => $img_model4, 'altimg_model4' => $altimg_model4, 'class_model' => $class_model, 'kuzov_model' => $kuzov_model, 'years_model' => $years_model, 'text_table_model'=>$text_table_model ,'text_model' => $text_model, 'url' => $url));
    }
    public function all_errors_engine($url){
        $this->errors_engine=$this->db->prepare("SELECT * FROM errors WHERE `url_errors`=:url");
        $this->errors_engine->execute(array('url'=>$url));
        return $this->errors_engine;
    }
    public function get_update_errors($editor5,$editor6,$editor7,$errors_cat,$code_error,$url){
        $this->update_errors_engine=$this->db->prepare("UPDATE `errors` SET `rus_error`=:rus_error,`eng_error`=:eng_error,`reset_error`=:reset_error,`categ_error`=:categ_error,`code_error`=:code_error WHERE url_errors=:url");
        $this->update_errors_engine->execute(array('rus_error'=>$editor5,'eng_error'=>$editor6,'reset_error'=>$editor7,'categ_error'=>$errors_cat,'code_error'=>$code_error,'url'=>$url));
    }
}

