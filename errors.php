<?php
$modified_date = getlastmod();
header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modified_date).' GMT');

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified_date) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/Errors.php";
require_once "Class/Models.php";

$url_errors=new Errors();
$url_error=$url_errors->url_errors();
foreach ($url_errors->kontent_errors($url_error[1],$url_error[3]) as $kontent_errors){
//Для формирования уникального тайтла и контента страницы получаем данные по модели и добавляем их к ошибке.
$models_error=new Models();
$url_comment = $url_error[2]."/".$url_error[3];
foreach ($models_error->get_model_content($url_error[2]) as $model_info){
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo "Варианты расшифровки ошибки ".$kontent_errors['code_error']." для модели ".$model_info['uniq_lable']." C ".$model_info['years_model']." года выпуска. Процедура сброса ошибки и причины на русском и английском языках если загорелся Check Engine."?>">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
	<title><?php echo $kontent_errors['code_error']." - "."Расшифровка ошибки двигателя ".$model_info['uniq_lable']?></title>
<script async src="//ddyipu.com/1ai17l291/vilm0p/03yq8h867vqu/867/kypklph.php"></script>
</head>
<body class="body">
<?php
$obj=new Errors();
$obj->get_body();
$obj->get_adv_content();
?><section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1>Ошибкa <?php echo $kontent_errors['code_error']." - ".$model_info['uniq_lable']?></h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo INDEX."/".$url_error[1] ;?>"><?php echo $url_error[1]?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo INDEX."/".$url_error[1]."/".$url_error[2] ;?>"><?php echo $model_info['uniq_lable']?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $kontent_errors['code_error']?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок.
                echo $obj->adv_bloks[0]['erroradv_h1'];
                ?>
            </div>
        </div>
    </div>
</section>
<section class="models-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center">
                <ul class="models-menu">
                    <li><a href="#errors">Расшифровка</a> </li>
                    <li><a href="#reset">Как скинуть</a> </li>
                    <li><a href="#comment">Мнения</a> </li>
                </ul>
            </div>
            <div class="col-lg-9 ">
                <h2 id="errors" class="text-center"><?php echo $kontent_errors['code_error'] ?></h2>
                <table class="errors-table table table-bordered table-striped table-Secondary table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Перевод</th>
                        <th scope="col">Что означает для <?php echo $model_info['uniq_lable']?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Русский:</td>
                        <td>"Ошибка двигателя для <?php echo $model_info['uniq_lable'].". ".$kontent_errors['rus_error']?>"</td>
                    </tr>
                    <tr>
                        <td>Английский:</td>
                        <td>"<?php echo $kontent_errors['eng_error']?>"</td>
                    </tr>
                    </tbody>
                </table>
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
            <h2 id="reset" class="col-lg-12 text-center">Как сбросить <?php echo $kontent_errors['code_error'] ?>?</h2>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок.
                echo $obj->adv_bloks[0]['erroradv_reset'];
                ?>
            </div>
            <div class="col-lg-12 text-center">
                <p><?php echo "Сброс ошибки для ".$model_info['uniq_lable']." осуществляется следующим образом. ".$kontent_errors['reset_error'] ?></p>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<section class="random-models">
    <div class="container">
        <div class="row text-center">
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/models/engine.webp" class="brands-image-hr">
            </div>
            <div class="col-lg-12">
                <h3>Популярные модели:</h3>
            </div>
            <?php foreach ($models_error->get_rand_error_model() as $rand_models_error) { ?>
            <div class="col-lg-4">
                <a href="<?php echo INDEX."/".$rand_models_error['brand_category']."/".$rand_models_error['url_models']?>" target="_blank"> <img src="<?php echo "/images/models/".$rand_models_error['img_model2']."-320.jpg" ?>" alt="<?php echo $rand_models_error['altimg_model2']?>" class="avto-models-cards">
                <h4><?php echo $rand_models_error['uniq_lable']?></h4></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="random-errors">
    <div class="container">
        <div class="row text-center">
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/models/engine.webp" class="brands-image-hr">
            </div>
            <div class="col-lg-12">
                <h3>Просматриваемые ошибки:</h3>
            </div>
            <?php foreach ($url_errors->kontent_errors_rand($url_error[1]) as $rand_error_brand){  ?>
            <div class="col-lg-3 col-3 col-sm-3 col-md-3 col-xl-3">
                <a href="<?php echo INDEX."/".$url_error[1]."/".$url_error[2]."/".$rand_error_brand['url_errors']?>" target="_blank">
                    <h4><?php echo $rand_error_brand['code_error']?></h4></a>
            </div>
<?php } ?>
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
                <h2 id="comment" class="text-center">Просматриваемые ошибки:</h2>
            </div>
            <?php foreach ($url_errors->get_errors_comment_read($url_comment) as $comment_error ){
                ?>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="/images/config/user.webp" alt="<?php echo "Аватарка комментатора ".$comment_error['name']?>" class="models-user-img">
                            <p class="models-name-comment"><?php echo $comment_error['name']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 models-text-coment">
                    <p>"<?php echo $comment_error['comment']?>"</p>
                </div>
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                    <img src="/images/models/engine.webp" class="brands-image-hr">
                </div>
            <?php } ?>
            <div class="col-lg-12">
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
                        $url_errors->get_public_komment_errors($url_comment)?>
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
</footer>
</body>
</html>
