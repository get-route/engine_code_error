<?php


class Brands extends Core
{
    protected $url_brand;
    public $models_brand;
    public $brand_content;
    public $brand_errors;
    public $comment_models;
    protected $all_brands;
public function get_body()
{
    parent::get_body();
}
//Получаем урл для страницы бренда и вывода контента
public function url_brand(){
    $url_brand=$_SERVER['REQUEST_URI'];
    $url_brand=str_replace('/',"",$url_brand);
    return $url_brand;
}
//Получаем урлы всех брендов для SiteMap
public function get_all_brands(){
    $this->all_brands=$this->db->query("SELECT * FROM brands WHERE `public`='yes'");
    return $this->all_brands;
}
//Находим все модели авто относящиеся к бренду. Выводим нужный нам контент для них
public function get_models($urls){
    $this->models_brand=$this->db->prepare("SELECT `h1`,`uniq_lable`,`brand_category`,`altimg_model1`,`img_model1`,`years_model`,`class_model`,`kuzov_model`,`url_models` FROM `models` WHERE `brand_category`=:url_brand AND `public_model`='yes'");
    $this->models_brand->execute(array('url_brand'=>$urls));
    return $this->models_brand;
}
public function get_models_comment($url_mod){
    $this->comment_models=$this->db->prepare("SELECT id FROM comments WHERE public_comment='yes' AND url_comment=:url_models");
    $this->comment_models->execute(array('url_models'=>$url_mod));
    return $this->comment_models->rowCount();
}
//Выводим весь контент бренда для страницы
public function get_brand_content($urls){
    $this->brand_content=$this->db->prepare("SELECT * FROM `brands` WHERE `url_brands`=:url_brands");
    $this->brand_content->execute(array('url_brands'=>$urls));
    return $this->brand_content;
}
public function get_brand_errors($urls){
    $this->brand_errors=$this->db->prepare("SELECT `code_error` FROM `errors` WHERE `categ_error`=:url_brands");
    $this->brand_errors->execute(array('url_brands'=>$urls));
    return $this->brand_errors;
}

}