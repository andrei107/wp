<?php

function receipt_list() {
    ?>

    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/receipt-maker/style-admin.css" rel="stylesheet" />
    
    <div class="wrap">
        <h2 class="nameBlock"> Все рецепты </h2>
        <div class="tablenav top padding10">
            <div class="alignleft actions">
                <a class="btn btn-success" href="<?php echo admin_url('admin.php?page=receipt_create'); ?>"> Добавить новый рецепт</a>
            </div>
            <br class="clear">
        </div>

    <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "receipt_table";
        $menu_table = "wp_my_sidebar_menu_table";
        $rows = $wpdb->get_results("SELECT $table_name.id as id, name, formenu, name_ru from $table_name INNER JOIN $menu_table ON $table_name.formenu = $menu_table.menu_id");
    ?>

        <table class='wp-list-table widefat fixed striped posts'>
            <tr id="tableHeader">
                <th class="manage-column mini">id</th>
                <th class="manage-column big ss-list-width">Название</th>
               
                <th class="manage-column big">Раздел меню</th>
                <th  class="manage-column big"> Действия </th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column mini"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width"><?php echo $row->name; ?></td>
                 
                    <td class="manage-column ss-list-width"><?php echo $row->name_ru; ?></td>
                    <td><a class="btn btn-warning" href="<?php echo admin_url('admin.php?page=receipt_update&id=' . $row->id); ?>">Редактировать</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}