<?php

function receipt_create() 
{
    if (isset($_POST['insert'])) {
        global $wpdb;
        global $message;

        $table_name = $wpdb->prefix . "receipt_table";
        
        $name = $_POST['name'];
        $img_path = $_FILES['img_path']['name'];
        $time_prepare = $_POST['time_prepare'];
        $calories = $_POST['calories'];
        $ingridients = $_POST['ingridients'];
        $receipt = $_POST['receipt'];
        $persons = $_POST['persons'];
        $formenu = $_POST['formenu'];

    require_once( ABSPATH . 'wp-admin/includes/image.php' );
	  require_once( ABSPATH . 'wp-admin/includes/file.php' );
	  require_once( ABSPATH . 'wp-admin/includes/media.php' );

	  media_handle_upload( 'img_path', $_POST['name'] );

    $wpdb->insert(
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
            array('%s', '%s') 		
        );

        $message = "Добавлен новый рецепт";
    }
    ?>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/receipt-maker/style-admin.css" rel="stylesheet" />
    
    <?php 
      global $wpdb;
      $menu_table = "wp_my_sidebar_menu_table";
      $rowsMenu = $wpdb->get_results("SELECT id, menu_id, name_ru from $menu_table ");
    ?>

    <div class="wrap">
        <h2 class="nameBlock" >Добавить новый рецепт</h2>

        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>

        <div class="formPosition">
          <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="form-group">
              <label>Название</label>
              <input type="text" name="name" class="form-control">
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
              <label>Фотография</label><br>
              <input type="file" name="img_path" id="img_path" class="form-control-file" multiple="false"><br>
            </div>
            <div class="short-info-block">
              <div class="form-group">
                <label>Калории</label><br>
                <input type="text" name="calories" class="form-control">
              </div>
              <div class="form-group">
                <label>Кол-во человек</label><br>
                <input type="text" name="persons" class="form-control">
              </div>
              <div class="form-group">
                <label>Время</label><br>
                <input type="text" name="time_prepare" class="form-control">
              </div>
            </div>
            <div class="full-receipt-block w-75">
              <label>Ингридиенты</label><br>
              <textarea class="txt-ingridient" name="ingridients" rows="3" ></textarea><br>
              <label>Рецепт</label><br>
              <textarea class="txt-receipt" name="receipt" rows="20"></textarea>
            </div>
            <input type='submit' name="insert" value='Сохранить' class='btn btn-success'>
          </form>
        </div>
    </div>
    
    <?php
}