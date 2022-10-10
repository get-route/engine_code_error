<?php


class Errors_Admin extends CoreA
{
    private $info_table_errors;
    private $delete_errors;
    public function get_kontent()
    {
        echo "Управление ошибками";
        $this->get_all_errors_table();
    }
    public function get_info_table_bd_errors(){
        $this->info_table_errors=$this->db->query("SELECT `id_error`,`categ_error`,`code_error`,`url_errors` FROM errors");
        return $this->info_table_errors;
    }
    public function delete_errors($url){
        $this->delete_errors=$this->db->prepare("DELETE FROM `errors` WHERE url_errors=:url");
        $this->delete_errors->execute(array('url'=>$url));
    }
    public function get_all_errors_table(){?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" class="form-control  models-search" id="search" placeholder="Поиск записи">
                    </div>
                </div>
                <div class="col-12">
                    <form method="post">
                    <table class="table-error table table-bordered table-striped table-Secondary table-responsive" id="mytable">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Код ошибки</th>
                            <th scope="col">Категория</th>
                            <th scope="col"><a class="btn btn-success" type="button" href="/Admin/Add.php?Добавить=Ошибки&Option=Errors" target="_blank">Добавить+</a> </th>
                        </tr>
                        </thead>
                        <tbody>
        <?php
        $errors_table_bd=new Errors_Admin();
        $num_errors=1;
        foreach ($errors_table_bd->get_info_table_bd_errors() as $db_errors_table)
        {
            ?>
                        <tr>
                            <td >
                                <div class="custom-control custom-checkbox">
                                    <input name="<?php echo "brand".$num_errors?>"  type="checkbox" class="custom-control-input" id="<?php echo "customCheck".$num_errors ?>" value="<?php echo $db_errors_table['url_errors']?>">
                                    <label class="custom-control-label" for="<?php echo "customCheck".$num_errors ?>"><?php echo $db_errors_table['id_error'] ?></label>
                                </div>
                            </td>
                            <td><?php echo $db_errors_table['code_error'] ?></td>
                            <td><?php echo $db_errors_table['categ_error'] ?></td>
                            <td><a href="<?php echo INDEX."/".$db_errors_table['categ_error'] ?>" class="button-delete_admin" target="_blank">Просмотр</a></td>
                            <td><a href="Editor.php?editor=error&url=<?php echo $db_errors_table['url_errors']."&url-category=".$db_errors_table['categ_error']."&Страницы=Ошибки"?>" class="button-delete_admin" target="_blank">Редактировать</a></td>
                        </tr>
    <?php
    //Удаление
    if (($_GET['class']=='Errors_Admin')&& $_POST['delete-errors']=="Удалить"){
    $errors_table_bd->delete_errors($_POST['brand'.$num_errors]); ?>
        <script type="text/javascript">
            setTimeout(function(){
                location = ''
            },100)
        </script>
    <?php }
             $num_errors++;

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
                        <a class="dropdown-item" href="?class=Errors_Admin"><input value="Удалить" type="submit" name="delete-errors"></a>
                    </div>
                </div>
            </div>
        </div>
</form>
        <form action=""></form>
    <?php }
}