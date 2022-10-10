<?php
$modified_date = getlastmod();
header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modified_date).' GMT');

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified_date) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/Brands.php";
require_once "Class/CacheTable.php";
$cache_table = new CacheTable();
$obj2=new Brands();
//Получаем урл страницы бренда
$url_models=$obj2->url_brand();
//Выводим инфу о бренде
foreach ($obj2->get_brand_content($url_models) as $all_info_brand){?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $all_info_brand['description']?>">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">    <link rel="icon" href="/favicon.png" type="image/png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
	<title><?php echo $all_info_brand['title']?></title>
<script async src="//ddyipu.com/1ai17l291/vilm0p/03yq8h867vqu/867/kypklph.php"></script>
</head>
<body class="body">
<?php
$obj=new Index();
$obj->get_body();
$obj->get_adv_content(); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1><?php echo $all_info_brand['h1']?></h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $all_info_brand['brand_name']?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок под заголовком.
                echo $obj->adv_bloks[0]['h1adv_brands'];
                ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image">
            </div>
            <div class="col-lg-6">
                <table class="table-brand table-responsive table-hover">
                    <tr>
                        <th>Перевод:</th>
                        <td><?php echo $all_info_brand['translate']?></td>
                    </tr>
                    <tr>
                        <th>Основатель:</th>
                        <td><?php echo $all_info_brand['autor']?></td>
                    </tr>
                    <tr>
                        <th>Председатель:</th>
                        <td><?php echo $all_info_brand['director']?></td>
                    </tr>
                    <tr>
                        <th>Дата основания:</th>
                        <td><?php echo $all_info_brand['date_in']?></td>
                    </tr>
                    <tr>
                        <th>Страна:</th>
                        <td><?php echo $all_info_brand['country']?></td>
                    </tr>
                    <tr>
                        <th>Производят:</th>
                        <td><?php echo $all_info_brand['themes']?></td>
                    </tr>
                    <tr>
                        <th>Моделей:</th>
                        <td><a href="#models"> <?php echo $obj2->get_models($url_models)->rowCount(); ?></a></td>
                    </tr>
                    <tr>
                        <th>Кодов ошибок:</th>
                        <td><a href="#errors"> <?php echo $obj2->get_brand_errors($url_models)->rowCount(); ?></a></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-2">
                <p class="blockquote-p">"<?php echo $all_info_brand['deviz']?>"</p>
            </div>
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12 text-center">
                    <?php
                    //Рекламный блок.
                    echo $obj->adv_bloks[0]['historyadv_brands'];
                    ?>
                </div>
                <?php echo $all_info_brand['history_brands']?>
                <div class="col-lg-12 text-center">
                    <?php
                    //Рекламный блок.
                    echo $obj->adv_bloks[0]['erroradv_brands'];
                    ?>
                </div>
                <?php echo $all_info_brand['error_brands']?>
            </div>
            <div class="col-lg-12">
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                    <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
                </div>
                <h3>Видео:</h3>
                <div class="text-center video-post">
                    <iframe
                            class="video"
                            width="100%"
                            height=350px
                            src="//www.youtube.com/embed/<?php echo $all_info_brand['video']?>"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=//www.youtube.com/embed/<?php echo $all_info_brand['video']?>?autoplay=1><img src=//img.youtube.com/vi/<?php echo $all_info_brand['video']?>/hqdefault.jpg alt='Видео о проверке подлинности' class='video img-fluid'><span>▶</span></a>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            title="Видео-отзыв"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 models">
                <h2 id="models" class="text-center">Все модели <?php echo $all_info_brand['brand_name']?></h2>
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                    <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
                </div>
                <div class="row kard-models">
                    <?php foreach ($obj2->get_models($url_models) as $marka){?>

                    <div class="col-lg-12 text-center">
                        <a class="link-models" href="<?php echo INDEX . "/".$marka['brand_category']."/".$marka['url_models'] ?>"><h3><?php echo $marka['uniq_lable']?></h3></a>
                    </div>
                    <div class="col-lg-4">
                        <img src="images/models/<?php echo $marka['img_model1']."-320.jpg"?>" alt="<?php echo $marka['altimg_model1']?>" class="avto-models">
                    </div>
                    <div class="col-lg-8">
                        <div class="col-lg-6">
                            <table class="table-models  table-hover">
                                <tr>
                                    <th>Год:</th>
                                    <td><?php echo $marka['years_model']?></td>
                                </tr>
                                <tr>
                                    <th>Класс:</th>
                                    <td><?php echo $marka['class_model']?></td>
                                </tr>
                                <tr>
                                    <th>Кузов:</th>
                                    <td><?php echo $marka['kuzov_model']?></td>
                                </tr>
                                <tr>
                                    <th>Отзывов: </th>
                                    <td><a class="link-models-komment" href="<?php echo INDEX . "/".$marka['brand_category']."/".$marka['url_models'] ?>#comment"><?php echo $obj2->get_models_comment($marka['url_models'])?></a></td>
                                </tr>
                            </table>
                            <div class="col-lg-12 text-center button-models">
                                <a href="<?php echo INDEX . "/".$marka['brand_category']."/".$marka['url_models'] ?>" target="_blank">
                                    <button class="btn btn-info ">Ошибки модели</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center col-lg-12">
                        <hr class="hr-info">
                        <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
                    </div>
                    <?php } ?>
                </div>


            </div>
            <div class="line-vertikal"></div>
            <div class="col-lg-4">
                <h2 id="errors" class="text-center">Ошибки <?php echo $all_info_brand['brand_name']?></h2>
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                </div>

                <div class="row errors text-center">
                    <?php
                    foreach ($obj2->get_brand_errors($url_models) as $all_brand_errors) {
                    ?>
                    <div class="col-lg-6 ">
                            <img src="images/models/errors.png" alt="ошибка заголовок" class="errors-models">
                    </div>
                    <div class="col-lg-6 ">
                        <p><?php echo $all_brand_errors['code_error'] ?></p>
                    </div>
                    <hr class="hr-info">
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</section>

<footer>
    <?php $obj->get_footer();?>
</footer>
</body>
</html>