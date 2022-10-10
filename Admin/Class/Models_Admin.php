<?php


class Models_Admin extends CoreA
{
    private $db_info_models;
    private $approve_models;
    private $delete_models;
    public function get_kontent()
    {
        echo "Управление моделями";
        $this->get_all_models_table();
    }
    public function get_info_table_bd_model(){
        $this->db_info_models=$this->db->query("SELECT `id`,`public_model`,`brand_category`,`url_models`,`uniq_lable` FROM models");
        return $this->db_info_models;
    }
    public function approve_models($url){
        $this->approve_models=$this->db->prepare("UPDATE `models` SET `public_model`='yes' WHERE url_models=:url");
        $this->approve_models->execute(array('url'=>$url));
    }
    public function delete_models($url){
        $this->delete_models=$this->db->prepare("DELETE FROM `models` WHERE url_models=:url");
        $this->delete_models->execute(array('url'=>$url));
    }
    public function get_all_models_table(){?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <input type="text" class="form-control  models-search" id="search" placeholder="Поиск записи">
                    </div>
                </div>
                <div class="col-12">
                    <form method="post">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Одобрена</th>
                            <th scope="col"><a class="btn btn-success" type="button" href="/Admin/Add.php?Добавить=Модель&Option=Model" target="_blank">Добавить+</a> </th>
                        </tr>
                        </thead>
                        <tbody>
        <?php
        $models_table_db=new Models_Admin();
        $num_models=1;
        foreach ($models_table_db->get_info_table_bd_model() as $db_models_table)
        {
            ?>
                        <tr>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input name="<?php echo "brand".$num_models;?>" type="checkbox" class="custom-control-input" id="<?php echo "customCheck".$num_models ?>" value="<?php echo $db_models_table['url_models']?>" >
                                    <label class="custom-control-label" for="<?php echo "customCheck".$num_models ?>"><?php echo $db_models_table['id']?></label>
                                </div>
                            </td>
                            <td><?php echo $db_models_table['uniq_lable']?></td>
                            <td><?php echo $db_models_table['brand_category']?></td>
                            <td><?php echo $db_models_table['public_model']?></td>
                            <td><a href="<?php echo INDEX."/".$db_models_table['brand_category']."/".$db_models_table['url_models']?>" class="button-delete_admin" target="_blank">Посмотреть</a></td>
                            <td><a href="/Admin/Editor.php?editor=model&url=<?php echo $db_models_table['url_models']."&Url-brand=".$db_models_table['brand_category']?>&Страницы=Модели" class="button-delete_admin" target="_blank">Редактировать</a></td>
                        </tr>
        <?php
        //одобрение поста
        if (($_GET['class']=='Models_Admin')&& $_POST['yes-model']=="Одобрить"){
        $models_table_db->approve_models($_POST['brand'.$num_models]);?>
            <script type="text/javascript">
                setTimeout(function(){
                    location = ''
                },100)
            </script>
        <?php }
        //Удаление
        if (($_GET['class']=='Models_Admin')&& $_POST['delete-model']=="Удалить"){
        $models_table_db->delete_models($_POST['brand'.$num_models]); ?>
            <script type="text/javascript">
                setTimeout(function(){
                    location = ''
                },100)
            </script>
        <?php }
             $num_models++;

        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <button type="button" value="selectAll" class="main" onclick="checkAll()">Все</button>
            </div>
            <div class="col-lg-2">
                <button type="button" value="deselectAll" class="main" onclick="uncheckAll()">Отменить </button>
            </div>
            <div class="col-lg-8">
                <div class="dropdown">
                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Действие
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="?class=Models_Admin"><input value="Одобрить" type="submit" name="yes-model"></a>
                        <a class="dropdown-item" href="?class=Models_Admin"><input value="Удалить" type="submit" name="delete-model"></a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    <?php }
}