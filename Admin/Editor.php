<?php
session_start();
require_once "Class/CoreA.php";
require_once "Class/Editor.php";
require_once "Class/InControl.php";
if ((!$_COOKIE['User'])){
    http_response_code(404);
    header('Location:  ../404.php ');
    exit();
}
$editor=new Editor();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <meta name="robots" content="noindex">
    <script src="./ckeditor/ckeditor.js"></script>
    <title>Редактирование страницы <?php echo $_GET['Страницы']?></title>

</head>
<body>
<?php if ($_GET['editor']=="brand") {
    foreach ($editor->get_brand_select($_GET['url']) as $brands_kontent){
    ?>
<div class="container">
<form method="post" class="admin_form_update" action="">
    <div class="row">
        <h2 class="col-lg-12 text-center">Мета-теги для СЕО</h2>
        <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Заголовок Бренда</label>
        <input name="brand-title" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['title']?>">
        <div id="emailHelp" class="form-text">*Title страницы бренда</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Аббревиатура Бренда</label>
        <input name="brand-name" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['brand_name']?>">
        <div id="emailHelp" class="form-text">*На анг.языке. Например BMW</div>
    </div>
        <hr class="hr-info">
        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Описание страницы (Descriptions)</label>
            <input name="brand-description" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['description']?>">
            <div id="emailHelp" class="form-text">*Мета-тег описания страницы</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Девиз компании</label>
            <input name="brand-deviz" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['deviz']?>">
            <div id="emailHelp" class="form-text">*Фирменный слоган</div>
        </div>
        <hr class="hr-info">

        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">H1 заголовок</label>
            <input name="brand-h1" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['h1']?>">
            <div id="emailHelp" class="form-text">*Нужен для поиска. Обязателен.</div>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">Дополнительная информация</h2>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Название в рус.переводе</label>
            <input name="brand-translate" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['translate']?>">
            <div id="emailHelp" class="form-text">*Для уникализации страницы. Перевод на русском.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">ФИО основателя</label>
            <input name="brand-autor" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['autor']?>">
            <div id="emailHelp" class="form-text">*Кто основал компанию</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Директор нынешний</label>
            <input name="brand-director" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['director']?>">
            <div id="emailHelp" class="form-text">*Кто управляет на данный момент.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Дата основания </label>
            <input name="brand-data" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['date_in']?>">
            <div id="emailHelp" class="form-text">*Когда была основана.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Страна производства</label>
            <input name="brand-country" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['country']?>">
            <div id="emailHelp" class="form-text">*Где главный офис.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Продукция</label>
            <input name="brand-themes" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['themes']?>">
            <div id="emailHelp" class="form-text">*Список что производят еще.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Видео</label>
            <input name="brand-video" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['video']?>">
            <div id="emailHelp" class="form-text">*Укажите ID YouTube видео.</div>
        </div>

        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Лого (512х512px)</label>
            <select name="brand-img" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
                <option value="<?php echo $brands_kontent['img_brands']?>"><?php echo $brands_kontent['img_brands']?></option>
                <?php
                foreach ($editor->scandir_img("../images/brands") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
                <?php } ?>
            </select>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">История бренда</h2>
        <div class="mb-3 w-100 form-field-admin">
            <label for="exampleInputEmail" class="form-label">История бренда. На 1-2т знаков</label>
            <textarea name="editor1" type="text" class="form-control" id="editor1" aria-describedby="emailHelp" ><?php echo $brands_kontent['history_brands']?></textarea>
            <div id="emailHelp" class="form-text">*Основная информация о компании.</div>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">Как найти ошибки и неисправности</h2>
        <div class="mb-3 w-100 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Чем искать ошибки. Где и т.д. На 1-2т знаков</label>
            <textarea name="editor2" type="text" class="form-control" id="editor2" aria-describedby="emailHelp"><?php echo $brands_kontent['error_brands']?></textarea>
            <div id="emailHelp" class="form-text">*Основная информация о том где и как находить ошибку.</div>
        </div>
<?php } ?>
        <div class="w-100">

    <button name="brand_update" type="submit" class="btn btn-primary">Обновить</button>
            <?php if (isset($_POST['brand_update'])){
                $editor->get_brand_update($_POST['brand-title'],$_POST['brand-description'],$_POST['brand-h1'],$_POST['brand-img'],$_POST['brand-deviz'],$_POST['brand-translate'],$_POST['brand-autor'],$_POST['brand-director'],$_POST['brand-data'],$_POST['brand-country'],$_POST['brand-themes'],$_POST['editor1'],$_POST['editor2'],$_POST['brand-video'],$_POST['brand-name'],$_GET['url']);?>
                <script type="text/javascript">
                    setTimeout(function(){
                        location = ''
                },100)
            </script>
         <?php   } ?>
    </div>
    </div>
</form>
</div>
<?php } ?>
<?php if ($_GET['editor']=="model"){

    foreach ($editor->select_models($_GET['url']) as $models_kontent){
    ?>
    <div class="container">
<form method="post" class="admin_form_update" action="">
<div class="row">
    <h2 class="col-lg-12 text-center">Мета-теги для СЕО</h2>
    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Заголовок Модели</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['title']?>">
        <div id="emailHelp" class="form-text">*Title страницы модели</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Уникальнное название</label>
        <input name="uniq-lable" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['uniq_lable']?>">
        <div id="emailHelp" class="form-text">*Например БМВ 1 серия</div>
    </div>
    <hr class="hr-info">

    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Description Модели</label>
        <input name="description" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['description']?>">
        <div id="emailHelp" class="form-text">*Description страницы модели</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Выбрать категорию</label>
        <select name="models-cat" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $models_kontent['brand_category']?>"><?php echo $models_kontent['brand_category']?></option>
            <?php
            foreach ($editor->brand_category_inmodels() as $inmodels){
                ?>
                <option value="<?php echo $inmodels['url_brands']; ?>"><?php echo $inmodels['brand_name']; ?></option>
            <?php } ?>
        </select>

        <div id="emailHelp" class="form-text">*Например БМВ 1 серия</div>
    </div>
    <hr class="hr-info">

    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">H1 Модели</label>
        <input name="h1" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['h1']?>">
        <div id="emailHelp" class="form-text">*URL страницы модели</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">URL модели</label>
        <input name="url-models" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['url_models']?>">
        <div id="emailHelp" class="form-text">*Укажите URL страницы модели</div>
    </div>
    <hr class="hr-info">

    <h2 class="col-lg-12 text-center">Фото</h2>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Картинка №1</label>
        <select name="img-model1" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $models_kontent['img_model1']?>"><?php echo $models_kontent['img_model1']?></option>
            <?php
            foreach ($editor->scandir_img("../images/models") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Фото №1. Описание</label>
        <input name="altimg-model1" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['altimg_model1']?>">
        <div id="emailHelp" class="form-text">*Описание для картинки страницы 1</div>
    </div>
    <hr class="hr-info">

    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Картинка №2</label>
        <select name="img-model2" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $models_kontent['img_model2']?>"><?php echo $models_kontent['img_model2']?></option>
            <?php
            foreach ($editor->scandir_img("../images/models") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
            <?php } ?>
        </select>

    </div>
    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Фото №2. Описание</label>
        <input name="altimg-model2" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['altimg_model2']?>">
        <div id="emailHelp" class="form-text">*Описание для картинки страницы 2</div>
    </div>
    <hr class="hr-info">

    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Картинка №3</label>
        <select name="img-model3" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $models_kontent['img_model3']?>"><?php echo $models_kontent['img_model3']?></option>
            <?php
            foreach ($editor->scandir_img("../images/models") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Фото №3. Описание</label>
        <input name="altimg-model3" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['altimg_model3']?>">
        <div id="emailHelp" class="form-text">*Описание для картинки страницы 3</div>
    </div>
    <hr class="hr-info">

    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Картинка №4</label>
        <select name="img-model4" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $models_kontent['img_model4']?>"><?php echo $models_kontent['img_model4']?></option>
            <?php
            foreach ($editor->scandir_img("../images/models") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Фото №4. Описание</label>
        <input name="altimg-model4" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['altimg_model4']?>">
        <div id="emailHelp" class="form-text">*Описание для картинки страницы 4</div>
    </div>
    <hr class="hr-info">

    <h2 class="col-lg-12 text-center">Доп.Информация</h2>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Класс Модели</label>
        <input name="class-model" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['class_model']?>">
        <div id="emailHelp" class="form-text">*Класс модели. Например Внедорожник</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Кузов</label>
        <input name="kuzov-model" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['kuzov_model']?>">
        <div id="emailHelp" class="form-text">*Например Хетчбек</div>
    </div>

    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Год Модели</label>
        <input name="years-model" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $models_kontent['years_model']?>">
        <div id="emailHelp" class="form-text">*Год выпуска</div>
    </div>
    <hr class="hr-info">

    <h2 class="col-lg-12 text-center">Таблица данных</h2>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Таблица</label>
        <textarea name="editor4" type="text" class="form-control" id="editor4" aria-describedby="emailHelp" ><?php echo $models_kontent['table_models']?></textarea>
        <div id="emailHelp" class="form-text">*Список модификаций.</div>
    </div>
    <hr class="hr-info">
    <h2 class="col-lg-12 text-center">Основной текст</h2>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">История модели. На 1т знаков</label>
        <textarea name="editor3" type="text" class="form-control" id="editor3" aria-describedby="emailHelp" ><?php echo $models_kontent['text_model']?></textarea>
        <div id="emailHelp" class="form-text">*Основная информация о модели.</div>
    </div>
    <hr class="hr-info">

    <div class="w-100">
        <button name="models_update" type="submit" class="btn btn-primary">Обновить</button>
        <?php if (isset($_POST['models_update'])){
            $editor->get_models_update($_POST['title'], $_POST['uniq-lable'], $_POST['description'], $_POST['models-cat'], $_POST['h1'], $_POST['url-models'], $_POST['img-model1'], $_POST['altimg-model1'], $_POST['img-model2'], $_POST['altimg-model2'], $_POST['img-model3'], $_POST['altimg-model3'], $_POST['img-model4'], $_POST['altimg-model4'], $_POST['class-model'], $_POST['kuzov-model'], $_POST['years-model'], $_POST['editor4'],$_POST['editor3'], $_GET['url']);
            ?>

            <script type="text/javascript">
                setTimeout(function(){
                    location = ''
                },100)
            </script>
        <?php }
            ?>
    </div>
</div>
</form>

    </div>
<?php } }?>
<?php if ($_GET['editor']=="error"){
foreach ($editor->all_errors_engine($_GET['url']) as $errors_kontent){
?>
    <div class="container">
<form method="post" class="admin_form_update" action="">
<div class="row">
    <h2>Форма редактирования страницы ошибки</h2>
    <p>Метаданные страниц ошибок обрабатываются и формируются автоматически.</p>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Русский перевод</label>
        <textarea name="editor5" type="text" class="form-control" id="editor5" aria-describedby="emailHelp" ><?php echo $errors_kontent['rus_error']?></textarea>
        <div id="emailHelp" class="form-text">*Перевод на русском.</div>
    </div>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Английский перевод</label>
        <textarea name="editor6" type="text" class="form-control" id="editor6" aria-describedby="emailHelp" ><?php echo $errors_kontent['eng_error']?></textarea>
        <div id="emailHelp" class="form-text">*Перевод на английском.</div>
    </div>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Как сбросить ошибку</label>
        <textarea name="editor7" type="text" class="form-control" id="editor7" aria-describedby="emailHelp" ><?php echo $errors_kontent['eng_error']?></textarea>
        <div id="emailHelp" class="form-text">*Как можно сбросить ошибку.</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Выбрать категорию</label>
        <select name="errors_cat" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $errors_kontent['categ_error']?>"><?php echo $errors_kontent['categ_error']?></option>
            <?php
            foreach ($editor->brand_category_inmodels() as $inmodels){
                ?>
                <option value="<?php echo $inmodels['url_brands']; ?>"><?php echo $inmodels['brand_name']; ?></option>
            <?php } ?>
        </select>
        <div id="emailHelp" class="form-text">*Например БМВ</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Код ошибки</label>
        <input name="code_error" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $errors_kontent['code_error']?>">
        <div id="emailHelp" class="form-text">*Укажите код, отвечающий за ошибку</div>
    </div>
    <hr class="hr-info">

    <div class="w-100">
        <button name="errors_update" type="submit" class="btn btn-primary">Обновить</button>
    </div>
    <?php
    if (isset($_POST['errors_update'])){
        $editor->get_update_errors($_POST['editor5'],$_POST['editor6'],$_POST['editor7'],$_POST['errors_cat'],$_POST['code_error'],$_GET['url']);?>
        <script type="text/javascript">
            setTimeout(function(){
                location = ''
            },100)
        </script>
    <?php }

} }?>
</div>
</form>
    </div>

<footer>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );
        CKEDITOR.replace( 'editor5' );
        CKEDITOR.replace( 'editor6' );
        CKEDITOR.replace( 'editor7' );
    </script>
    <script src="<?php echo INDEX;?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INDEX;?>/js/popper.min.js"></script>
    <script src="<?php echo INDEX;?>/js/bootstrap.min.js"></script>
</footer>
</body>
</html>