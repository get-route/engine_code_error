<?php
$modified_date = getlastmod();
header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modified_date).' GMT');

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified_date) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/config.php";
require_once "Class/Index.php";
require_once "Class/Errors.php";
require_once "Class/Models.php";
require_once "Class/CacheTable.php";
require_once "Class/Brands.php";
$config=new config();
$errors = new Errors();
$models = new Models();
$brands= new Brands();
$url = $_SERVER['REQUEST_URI'];
$url_arr = explode("/",$url);
$count_url = count($url_arr);
foreach ($models->get_model_content($url_arr[2]) as $models_kontents){

}
foreach ($errors->kontent_errors($url_arr[1],$url_arr[3]) as $kontent_errors){

}
foreach ($brands->get_brand_content($url_arr[1]) as $brands_kontent){

}
foreach ($config->get_routes() as $url_adress) {
           $brand = "/" . $url_adress;
            if ($url == "/") {
                break;
            }
            elseif ($url == $brand) {
                include "brands.php";
                exit();
            } elseif ($count_url == 3 && $models_kontents['title']!==null && $brands_kontent['title'] !==null) {
                include "models.php";
                exit();
            } elseif ($count_url == 4 && $kontent_errors['code_error']!==null && $models_kontents['title']!==null) {
                include "errors.php";
                exit();
            } elseif ($url == $brand."-all-error") {
                include "all-errors.php";
                exit();

       }
}
if (($url !=="/")) {
    http_response_code(404);
    include_once '404.php';
    exit();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Сервис поиска и расшифровки кодов ошибок автомобилей. Диагностические ошибки двигателей всех моделей и брендов. Obd2 неисправности">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
   <title>Расшифровка кодов ошибок авто онлайн - Check engine, OBD2</title>
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
            <div class="col-lg-12 pretext text-center">
                <h1>Расшифровка кодов ошибок автомобилей</h1>
                <p>*Выберите нужную Вам марку и модель авто. Получите данные кодов ошибки Check Engine.</p>
            </div>
            <div class="col-lg-6">
                <div class="row text-center car-menu">
                    <?php foreach ($obj->get_brand_index() as $index_brands) {?>
                        <div class="col-4 col-lg-3  col-sm-3 col-md-3">
                            <a target="_blank" href="<?php echo INDEX."/".$index_brands['url_brands']?>"> <img src="images/brands/<?php echo $index_brands['img_brands']?>" class="car-icon" alt="иконка <?php echo $index_brands['brand_name']?>">
                                <p class="text-menu"><?php echo $index_brands['brand_name']?></p>
                            </a>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="col-lg-8">
                    <img  src="<?php echo INDEX."/"?>images/config/check-engine.webp" alt="Check-engine анимация" class="no">
                </div>
                <img class="header-check" src="/images/config/header.webp" alt="расшифровка Check Engine автомобилей">
            </div>
        </div>
    </div>
</section>

<section class="statistic">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Горит чек двигателя? - Farn-Avto.Ru Вам в помощь</h2>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-12 text-center">
                    <img src="./images/config/logo.webp" alt="Портал проверки кодов ошибки двигателя" width="100" height="100">
                </div>

                <p>"Портал Farn-Avto.Ru - это база данных всех кодов ошибок автомобилей большинства популярных брендов.</p>
                <p>У нас Вы без особых проблем сможете выбрать нужную Вам марку и модель авто, получив при этом возможные варианты решения проблемы.</p>
                <p>Сообщество портала собрала исключительно с целью поддержки автолюбителей при проблемах связанных с чеком двигателя. </p>
                <p>Мы надеемся, что материалы сайта будут полезных всем, кто столнется с подобной проблемой."</p>
            </div>
            <div class=" video-promo d-none d-lg-block d-xl-blockcol-lg-6 text-center">
                <video class="promo-video" controls poster = "./images/video/what-servis.webp">
                    <source src = "<?php echo INDEX?>/images/video/avto-code.mp4" type = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src = "<?php echo INDEX?>/images/video/avto-code.ogg" type = 'video/ogg; codecs="theora, vorbis"'>
                    <source src="<?php echo INDEX?>/images/video/avto-code.webm" type='video/webm; codecs="vp8, vorbis"'>
                </video>
            </div>
        </div>
    </div>
</section>
<section class="sliders">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 id="otzyv" class="text-center col-lg-12">Реальные истории автовладельцев</h2>
            </div>
            <div class="col-lg-2">
                <img src="images/config/avto-bacground.webp" class="sliders-avto" alt="Проверка чека автомобиля">
            </div>
            <div class="col-lg-10 text-center slider">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <h3>История №1. Как я сбрасывал Чек раз в 2 дня</h3>
                            <p>"Был у меня однажды Ваз 2114. К счастью уже продал его.</p>
                            <p>Ничего не имею против отечественного производителя, но конкретно с этой машиной натерпелся.</p>
                            <p>Как-то после заправки загорелся чек двигателя. </p>
                            <p>Я не придал этому значение и так проездил наверное с неделю. </p>
                            <p>Когда обнаружил неисправность,то загнал на сервис, сказали сбросить ошибки. Отдал парнишке 500 рублей, он все почистил.</p>
                            <p>Выехал из сервиса и на утро чек опять загорелся. Иногда даже начал моргать.</p>
                            <p>Загнал своего железного коня к знакомому на диагностику, выдал ошибку check engine и что-то там. </p>
                            <p>Неисправность была в пробитии провода на габаритах. Все обмотал изолентой и теперь катаюсь спокойно.</p>
                            <p>На тот момент этой ошибки в сети не было, помог только этот сервис. За что ему спасибо."</p>
                        </div>
                        <div class="carousel-item">
                            <h3>История №2. Чек двигателя это серьезный признак неисправности</h3>
                            <p>"В этом я убедился за долгие годы нахождения зарулем.</p>
                            <p>На тот момент у меня опыта не было и катался на Форд Фокус 2007 года.</p>
                            <p>Ресурсов по ошибкам двигателя не существовало и если и можно было что-то выудить, то только через иностранные форумы.</p>
                            <p>В один прекрасный момент замигал чек и я не придал этому значение. В итоге попал на переборку двигателя и заплатил почти 50% машины за весь кап.ремонт.</p>
                            <p>Сейчас катаюсь на Киа Рио и у нее также частенько Check Engine теребит мозг. </p>
                            <p>Его я не игнорирую, т.к не хочется переплатить больше. Купил себе небольшой приборчик для диагностики и постоянно его использую.</p>
                            <p>Ошибки проверяю на Вашем сайте, т.к это удобно и можно конкретно по своей модели посмотреть все."</p>
                        </div>
                        <div class="carousel-item v">
                            <h3>История №3. Каждый автовладелец рано или поздно поедет на диагностику.</h3>
                            <p>"С этим утверждением я столкнулся прямо в лоб, когда встал в 3-00 ночи по дороге на Крым.</p>
                            <p>Check Engine на моей Ауди Q5 загорелся за несколько дней до начала отдыха.</p>
                            <p>Я не придал этому значение, хотя нужно было рулить почти 2000км.</p>
                            <p>В итоге переплатил за эвакуатор почти 20 000 рублей и еще сейчас вставшую коробку отдал ремоентировать на 70 000 рублей.</p>
                            <p>В сервисе сказали, что если бы я хотя бы тогда заехал, то возможно удалось бы свести к минимуму затраты хотя бы на 30 000 рублей.</p>
                            <p>Однако пренебрег всеми сигналами мой ласточки и поехал. В итоге и отпуск испортил и на деньги встрял.</p>
                            <p>Ваш сервис очень полезен в вопросах решения проблем с ошибками. Хорошо все отсортировано, можно выбирать по модели автомобиля.</p>
                            <p>Надеюсь, что обращаться к Вашему ресурсу буду не часто, но если понадобится, то буду находить нужную мне неисправность."</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="stat-numbers">
    <div class="container">
        <div class="row icon-statistic text-center">
            <div class="col-lg-3 ">
                <h3>Расшифровано:</h3>
                <img src="images/statistic/number1.webp" alt="Сколько кодов опубликовано" class="number1">
                <p><?php echo $config->get_num_errors(); ?> кодов</p>
            </div>
            <div class="col-lg-3">
                <h3>Брендов:</h3>

                <img src="images/statistic/number2.webp" alt="Сколько брендов авто на сайте" class="number1">
                <p><?php echo $config->get_num_brands(); ?></p>
            </div>
            <div class="col-lg-3">
                <h3>Моделей:</h3>
                <img src="images/statistic/number3.webp" alt="Колличество моделей на сайте" class="number1">
                <p><?php echo $config->get_num_models(); ?></p>

            </div>
            <div class="col-lg-3">
                <h3>Помогли:</h3>
                <img src="images/statistic/number4.webp" alt="Уже помогли" class="number1">
                <p><?php echo $config->get_num_comments(); ?> раз</p>
            </div>
        </div>
    </div>
</section>
<footer>
    <?php $obj->get_footer(); ?>
</footer>
</body>
</html>