<?php


class Models extends Core
{
    public $model_error;
    public $model_content;
    public $table_bd_models;
    public $komment_models_read;
    public $komment_public;
    protected $all_models;
    public $footer_models;
    public function get_body()
    {
        parent::get_body();
    }
    //Получаем все урлы моделей для SiteMap
    public function get_all_models($url){
        $this->all_models=$this->db->prepare("SELECT * FROM models WHERE `public_model`='yes' AND `brand_category`=:url");
        $this->all_models->execute(array('url'=>$url));
        return $this->all_models;
    }
    public function url_models(){
        $url_brand=$_SERVER['REQUEST_URI'];
        $url_brand=explode("/",$url_brand);
        return $url_brand;
    }
    public function get_model_errors($urls){
        $this->model_errors=$this->db->prepare("SELECT `code_error`,`url_errors` FROM `errors` WHERE `categ_error`=:url_brands");
        $this->model_errors->execute(array('url_brands'=>$urls));
        return $this->model_errors;
    }
    //Выводим весь контент модели для страницы
    public function get_model_content($urls){
        $this->model_content=$this->db->prepare("SELECT * FROM `models` WHERE `url_models`=:url_models");
        $this->model_content->execute(array('url_models'=>$urls));
        return $this->model_content;
    }
    //Получаем комментарии к конкретной модели
    public function get_models_comment_read($urls){
        $this->komment_models_read=$this->db->prepare("SELECT `name`,`comment` FROM comments WHERE `url_comment`=:url_com AND `public_comment`='yes'");
        $this->komment_models_read->execute(array('url_com'=>$urls));
        return $this->komment_models_read;
    }
    //Отправка комментария в БД
    public function get_public_komment_models($urls){
        $this->komment_public=$this->db->prepare("INSERT INTO comments (`name`,`email`,`comment`,`url_comment`,`public_comment`) VALUES (:name,:email,:comment,:url_comment,:public_comment)");
        $this->komment_public->execute(array(':name'=>$_POST['name'],':email'=>$_POST['email'],':comment'=>$_POST['message'],':url_comment'=>$urls,':public_comment'=>"no"));
        return $this->komment_public;
    }
    //Рандомная модель в ошибках
    public function get_rand_error_model(){
        $this->footer_models=$this->db->query("SELECT img_model2,altimg_model2,uniq_lable,url_models,brand_category FROM models WHERE `public_model`='yes' ORDER BY RAND() LIMIT 6");
        return $this->footer_models;
    }
}