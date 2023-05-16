<?php

function receipt_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "receipt_table";

    $menu_table = "wp_my_sidebar_menu_table";
    $rowsMenu = $wpdb->get_results("SELECT id, menu_id, name_ru from $menu_table ");
   
    $update = isset($_POST['update']) ? $_POST['update'] : null;
    $delete = isset($_POST['delete']) ? $_POST['delete'] : null;
    
    if ($update) {
        $name = $_POST['name'];
        if($_FILES['img_path']['name']) {
            $img_path = $_FILES['img_path']['name'];
        } else {
            $img_path = $_POST['name_img'];
        }
        $time_prepare = $_POST['time_prepare'];
        $calories = $_POST['calories'];
        $ingridients = $_POST['ingridients'];
        $receipt = $_POST['receipt'];
        $persons = $_POST['persons'];
        $formenu = $_POST['formenu'];

        $wpdb->update(
                $table_name,
                array( 
                    'name' => $name,
                    'img_path' => $img_path,
                    'time_prepare' => $time_prepare,
                    'calories' => $calories,
                    'ingridients' => $ingridients,
                    'receipt' => $receipt,
                    'persons' => $persons,
                    'formenu' => $formenu,
            ), 
                array('id' => $_GET['id']), 
                array('%s'),
                array('%s')
        );
    } else if ($delete) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $_GET['id']));
    } else {
        $receipts = $wpdb->get_results($wpdb->prepare("SELECT id, name, img_path, time_prepare, calories, ingridients, receipt, persons, formenu from $table_name where id=%s", $_GET['id']));
       
        foreach ($receipts as $item) {
            $name = $item->name;
            $img_path = $item->img_path;
            $time_prepare = $item->time_prepare;
            $calories = $item->calories;
            $ingridients = $item->ingridients;
            $receipt = $item->receipt;
            $persons = $item->persons;
            $formenu = $item->formenu;
        }
    }

    $heading = isset($name) ? $name : '';
    ?>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/receipt-maker/style-admin.css" rel="stylesheet" />
  
    <div class="wrap">
        <h2 class="nameBlock">Редактируемый рецепт - <?php echo $heading; ?> </h2>

        <?php if ($delete) { ?>
            <div class="updated"><p>Рецепт удален</p></div>
            <a class="btn btn-success" href="<?php echo admin_url('admin.php?page=receipt_list') ?>">&laquo; назад к списку рецептов</a>
        <?php } else if ($update) { ?>
            <div class="updated"><p>Рецепт обновлен</p></div>
            <a class="btn btn-success" href="<?php echo admin_url('admin.php?page=receipt_list') ?>">&laquo; назад к списку рецептов</a>
        <?php } else { ?>
            <div class="formPosition">
                <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label>Раздел меню</label>
                        <select name="formenu" class="selectpicker form-control for_menu-field" id="for_menu">
                            <?php foreach ($rowsMenu as $row) { ?>
                                <option value="<?php echo $row->menu_id?>"><?php echo $row->name_ru?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Текущее фото</label><br>
                        <input type="text" name="name_img" class="form-control" value="<?php echo $img_path; ?>">
                        <label>Выберете новое фото или оставте существующее</label><br>
                        <input type="file" value="<?php echo $img_path; ?>" name="img_path" id="img_path" class="form-control-file" multiple="false"><br>
                    </div>
                    <div class="short-info-block">
                        <div class="form-group">
                            <label>Калории</label><br>
                            <input type="text" name="calories" class="form-control" value="<?php echo $calories; ?>">
                        </div>
                        <div class="form-group">
                            <label>Кол-во человек</label><br>
                            <input type="text" name="persons" class="form-control" value="<?php echo $persons; ?>">
                        </div>
                        <div class="form-group">
                            <label>Время</label><br>
                            <input type="text" name="time_prepare" class="form-control"  value="<?php echo $time_prepare; ?>">
                        </div>
                    </div>
                    <div class="full-receipt-block w-75">
                        <label>Ингридиенты</label><br>
                        <textarea class="txt-ingridient" name="ingridients" rows="3" ><?php echo $ingridients; ?>
                        </textarea><br>
                        <label>Рецепт</label><br>
                        <textarea class="txt-receipt" name="receipt" rows="20"><?php echo $receipt; ?>
                        </textarea>
                    </div>
                    
                    <input class="btn btn-success" type='submit' name="update" value='Сохранить' class='button'> &nbsp;&nbsp;
                    <input class="btn btn-danger" type='submit' name="delete" value='Удалить' class='button' onclick="return confirm('Подтвердите действие')">
            </form>
            </div>
        <?php } ?>

    </div>
    <?php
}