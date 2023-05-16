<? 
    $data = $wpdb->get_results( "SELECT * FROM wp_my_sidebar_menu_table" );
?>

<ul>
    <?php foreach($data as $key => $value ) 
	    {
    ?>
    <li> 
        <a href="<?php echo 'http://cmanager/menu/' . $value->menu_id ?>"><?php echo $value->name_ru?></a>
    </li>
    <?php 
	    } 
    ?>
</ul>    

