<?php
/*
Template Name: allReceiptPage
*/
?>
<?php get_header(); ?>

<? 
$data = $wpdb->get_results( "SELECT * FROM wp_receipt_table" );
?>

<div id="wrapper-receipts">
    <div class="sidebar">
        <h2 class="current-name" >Выберите категорию</h2>
		<?php get_sidebar(); ?>
    </div>
    <div class="all-receipts">
        <h2 class="current-name"> Все рецепты </h2>
        <div class="container-receipt">
			<?php foreach($data as $key => $value ) 
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

<?php get_footer(); ?>