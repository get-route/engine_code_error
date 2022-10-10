<?php 
$modified_date = getlastmod();
header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modified_date).' GMT');

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified_date) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
require_once "Admin/Config/config.php";
require_once "Class/Models.php";
require_once "Class/CacheTable.php";
$cache_tables = new CacheTable();
$models=new Models();
$url_array=$models->url_models();
foreach ($models->get_model_content($url_array[2]) as $models_kontent){
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $models_kontent['description']?>">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
	<title><?php echo $models_kontent['title']?></title>
<script async src="//ddyipu.com/1ai17l291/vilm0p/03yq8h867vqu/867/kypklph.php"></script>
</head>
<body class="body">
<?php
$obj=new Index();
$obj->get_body();
$obj->get_adv_content();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1><?php echo $models_kontent['h1']?></h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo INDEX."/".$models_kontent['brand_category'] ;?>"><?php echo $models_kontent['title_brcategory']?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $models_kontent['uniq_lable']?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 text-center">
                <div class="col-lg-12 text-center">
                    <?php
                    //Рекламный блок.
                    echo $obj->adv_bloks[0]['modelsadv_h1'];
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="models-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 text-center">
                <ul class="models-menu">
                    <li><a href="#info">О модели</a> </li>
                    <li><a href="#error">Ошибки</a> </li>
                    <li><a href="#comment">Отзывы</a> </li>
                </ul>
            </div>
            <div class="col-lg-5 foto">
                <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model1']?>" data-fancybox="gallery"><img src="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model1']."-320.jpg"?>" alt="<?php echo $models_kontent['altimg_model1']?>" class="foto-galery"></a>
                </div>
                <div class="col-4 col-lg-4  col-sm-4 col-md-4">
                    <a href="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model2']?>" data-fancybox="gallery"><img src="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model2']."-100.jpg"?>" alt="<?php echo $models_kontent['altimg_model2']?>" class="foto-galery-two"></a>
                </div>
                <div class="col-4 col-lg-4  col-sm-4 col-md-4">
                    <a href="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model3']?>" data-fancybox="gallery"><img src="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model3']."-100.jpg"?>" alt="<?php echo $models_kontent['altimg_model3']?>" class="foto-galery-two"></a>
                </div>
                <div class="col-4 col-lg-4  col-sm-4 col-md-4">
                    <a href="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model4']?>" data-fancybox="gallery"><img src="<?php echo INDEX."/"."images"."/"."models"."/".$models_kontent['img_model4']."-100.jpg"?>" alt="<?php echo $models_kontent['altimg_model4']?>" class="foto-galery-two"></a>
                </div>
                </div>
            </div>
            <div class="col-lg-5 models-header-text">
                <?php echo $models_kontent['text_model']?>
            </div>
        </div>
        <?php require_once "social-button.php"?>
    </div>

</section>
<section class="models-table">
    <div class="container">
    <div class="row">
        <div class="text-center col-lg-12">
            <hr class="hr-info">
            <img src="/images/models/engine.webp" class="brands-image-hr">
        </div>
        <h2 id="info" class="col-lg-12 text-center">Общие характеристики <?php echo $models_kontent['uniq_lable']?></h2>
        <div class="col-lg-12 text-center">
            <?php
            //Рекламный блок.
            echo $obj->adv_bloks[0]['modelsadv_options'];
            ?>
        </div>
        <div class="col-lg-12 text-center">

                <?php echo $models_kontent['table_models']?>

        </div>
    </div>
    </div>
</section>
<section class="models-error">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/models/engine.webp" class="brands-image-hr">
            </div>
<?php } ?>
            <div class="col-lg-12">
                <h2 id="error" class="text-center">Ошибки</h2>
            </div>
            <div class="col-lg-12 text-center">
            <?php
            //Рекламный блок.
            $obj->adv_bloks[0]['modelsadv_error'];
            ?>

            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="text" class="form-control  models-search" id="search" placeholder="Укажите в поле код ошибки">
                </div>
            </div>
                <div class="col-lg-8 text-center">
                    <table id="mytable" class="table-error table table-bordered table-striped table-Secondary table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Код ошибки</th>
                            <th scope="col">Расшифровка</th>
                            <th scope="col">Посмотреть</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //Узнаем количество строк ошибок для заполнения таблицы номером столбца
			           $file = "./Admin/cache/$url_array[1].xlsx";
					   
	
                        if (file_exists($file)){
                        foreach ($cache_tables::read_cache_xml($file) as $error_all=>$models_error){
                            $number_tr = $number_tr + 1;
                            ?>
                        <tr>
                            <th scope="row"><?php echo $number_tr;?></th>
                            <td><?php echo $models_error['A']?></td>
                            <td><img src="/images/config/plus.png" width="40px" height="50px" alt="Ошибка расшифрована"></td>
                            <td><a class="models-link" target="_blank" href="<?php echo INDEX."/".$url_array[1]."/".$url_array[2]."/".$models_error['G'] ?>">Расшифровка</a> </td>
                        </tr>
                        <?php } } ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 models-error-info">
                    <div class="col-lg-12 video-promo-error">
                    <video class="promo-video-error" controls poster = "/images/video/what-error.webp">
                        <source src = "<?php echo INDEX?>/images/video/what-error.mp4" type = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                        <source src="<?php echo INDEX?>/images/video/what-error.webm" type='video/webm; codecs="vp8, vorbis"'>
                    </video>
                    </div>
                    <ol>
                        <li>Введите код ошибки в поле поиска.</li>
                        <li>Выберите в таблице нужное Вам значение.</li>
                        <li>Нажмите кнопку "Открыть", чтобы увидеть расшифровку.</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="comments">
    <div class="text-center col-lg-12">
        <hr class="hr-info">
        <img src="/images/models/engine.webp" class="brands-image-hr">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 id="comment" class="text-center">Комментарии:</h2>
            </div>
            <?php foreach ($models->get_models_comment_read($url_array[2]) as $komments){ ?>
            <div class="col-lg-2">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="/images/config/user.webp" alt="Комментарий Имя" class="models-user-img">
                        <p class="models-name-comment"><?php echo $komments['name']?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 models-text-coment">
                <?php echo $komments['comment']?>
            </div>
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/models/engine.webp" class="brands-image-hr">
            </div>
            <?php } ?>
                <form class="comment_form" action="#" method="post" name="contact_form">
                    <ul>
                        <li>
                            <h3 class="text-center">Оставить комментарий:</h3>
                            <span class="required_notification">* Обязательные поля</span>
                        </li>
                        <li>
                            <label for="name">Имя*:</label>
                            <input type="text"  placeholder="Иван" name="name" required />
                        </li>
                        <li>
                            <label for="email">Email*:</label>
                            <input type="email" name="email" placeholder="ivan@example.ru" required />
                            <span class="form_hint">Формат почты "name@something.ru"</span>
                        </li>
                        <li>
                            <label for="message">Комментарий*:</label>
                            <textarea name="message" cols="40" rows="6" required ></textarea>
                        </li>
                        <li>
                            <button class="submit" name="submit_komment" type="submit" >Отправить</button>
                        </li>
                    </ul>
                    <?php if (isset($_POST['submit_komment'])){
                        $models->get_public_komment_models($url_array[2]);
                        ?>
                        <div class="col-lg-12 text-center">
                            <h4>Комментарий отправлен!...</h4>
                            <p>Спасибо! Ваш комментарий отправлен и появится на сайте после проверки администрацией.</p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>
<footer>
    <?php $obj->get_footer(); ?>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable tbody tr"), function() {
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>
</footer>
</body>
</html>