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
require_once "Class/Models.php";
require_once "Class/Errors.php";
require_once "Class/Index.php";
$obj2=new Brands();
$models=new Models();
$errors=new Errors();
//Получаем урл страницы бренда
$url_modelz=$obj2->url_brand();
$find = '/-all-error/';
$url_models= preg_replace($find, '', $url_modelz);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Cписок неисправностей моделей <?php echo $url_models?>. Самые частые ошибки и коды двигателя <?php echo $url_models?>, которые возникают в процессе работы.">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>Все ошибки бренда <?php echo $url_models ?></title>
</head>
<body class="body">
<?php
$obj=new Index();
$obj->get_body();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1>Ошибки <?php echo $url_models ?> по моделям</h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Все ошибки <?php echo $url_models?></li>
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

        <div class="row">
<?php
foreach ($obj2->get_brand_content($url_models) as $all_brands)
{
    foreach ($models->get_all_models($all_brands['url_brands']) as $all_models)
    { ?>
            <div class="col-4 col-lg-4  col-sm-4 col-md-4">
                <div class="col-12 col-lg-12  col-sm-12 col-md-12 text-left all-error">

                    <img src="<?php echo INDEX."/images/models/".$all_models['img_model2']?>" alt="<?php echo $all_models['altimg_model2']?>" class="all-errors-img">
                    <h2><?php echo $all_models['uniq_lable']?></h2>
                </div>

                <div class="row all-errors text-center all-errors-product">
        <?php foreach ($errors->get_all_errors($all_models['brand_category']) as $all_errors) { ?>

            <div class=" col-12 col-lg-12  col-sm-12 col-md-12">
                        <a href="<?php echo INDEX."/".$all_brands['url_brands']."/".$all_models['url_models'] . "/" . $all_errors['url_errors']?> " target="_blank"><?php echo $all_errors['code_error']?></a>
                    </div>
     <?php   } ?>
                </div>
            </div>
    <?php }
}

?>





        </div>
    </div>
</section>



<footer>
    <?php $obj->get_footer();?>
</footer>
</body>
</html>