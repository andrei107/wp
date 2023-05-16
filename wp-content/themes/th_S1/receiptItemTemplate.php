<?php
/*
Template Name: receiptItemTemplate
*/
?>
<?php get_header(); ?>

<?php
    $id = $args['id'];
    $data = $wpdb->get_results( "SELECT * FROM wp_receipt_table WHERE id=$id" );
    $codeMenu = $data[0]->formenu;
    $nameMenu =  $wpdb->get_results( "SELECT name_ru FROM wp_my_sidebar_menu_table WHERE menu_id=$codeMenu" );
    $related = $wpdb->get_results( "SELECT * FROM wp_receipt_table WHERE formenu=$codeMenu AND id!=$id LIMIT 3" );
?>

<div id="wrapper-receipts">
    <div class="sidebar">
        <h2 class="current-name">Выберите категорию</h2>
		<?php get_sidebar(); ?>
    </div>
    <div class="all-receipts">
        <?php foreach($data as $key => $value ) 
			{
		?>
        <div class="border-receipt">
            <div class="general-receipt-block">
                <div class="info-part">
                    <div class="name-receipt">
                        <p> <?php echo $value->name?></p>
                    </div>
                    <div class="add-info-receipt">
                        <div class="add-top-info">
                            <div> <i class="fa fa-bars" aria-hidden="true"></i> Категория:</div>
                            <div> <i class="fa fa-clock-o" aria-hidden="true"></i> Время:</div>
                            <div><i class="fa fa-users" aria-hidden="true"></i> Кол-во человек:</div>
                            <div><i class="fa fa-cutlery" aria-hidden="true"></i> Калории:</div>
                        </div>
                        <div class="add-bottom-info">
                            <div><?php echo $nameMenu[0]->name_ru?></div>
                            <div><?php echo $value->time_prepare?></div>
                            <div><?php echo $value->persons?></div>
                            <div><?php echo $value->calories?></div>
                        </div>
                    </div>
                </div>
                <div class="img-part" style="background-image: url('<?php echo wp_upload_dir()['baseurl'] . "/img/" . $value->img_path;?> ')">
                </div>
            </div>
            <div class="full-descr-receipt">
                <div class="ingridients-receipt-block">
                    <h3>Ингридиенты</h3>
                    <?php echo $value->ingridients?>
                </div>
                <div class="descr-receipt-block">
                    <h3>Приготовление</h3>
                    <?php echo $value->receipt?>
                </div>
            </div>
        </div>
        <?php 
			} 
		?>
        <div class="related-receipts">
            <h2 class="current-name"> Другие рецепты </h2>
            <div class="container-receipt">
                <?php foreach($related as $key => $value ) 
                    {
                ?>
                    <a href="<?php echo 'http://cmanager/receipts/' . $value->id ?>" >
                        <div class="receipt-item" style="background-image: url('<?php echo wp_upload_dir()['baseurl'] . "/img/" . $value->img_path;?> ')">
                            <div class="dark-m">
                                <div class="item-name">
                                <?php echo $value->name?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php 
                    } 
                ?>
            </div>
        </div> 
    </div> 
</div>

<?php get_footer(); ?>