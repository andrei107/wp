<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
	<title><? bloginfo('name') ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header-block">
	<div class="header-block-top">
		<a href="<? echo get_home_url()?>" class="siteNameMini"> Идеальный вкус </a>
		<div>
			<?php the_custom_logo()?>
		</div>
		<div class="siteNameBig">
			Gusto Perfetto		
		</div>
		<div class="misc">
			<div class="search-block">
				<form action="" class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control "placeholder="Рецепты..">
					</div>
					<button class="btn btn-primary searchByName"><i class="fa fa-search"></i>Найти</button>
			</form>
			</div>
			<div class="inst">
				<i class="fa fa-instagram fa-3x"></i>
			</div>
		</div>
	</div>
	
	<div class="header-block-bottom" >	
		<div class="menublock">
      		<div class="collapse navbar-collapse" id="responsive-menu"> 
                <ul class="nav navbar-nav navbar-center myclass">
					<?php 
						wp_nav_menu(array(
							'menu' => 'Меню в header',
							'theme_location' => 'header_menu',	
							'items_wrap' => '%3$s',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'nav navbar-nav',
							'walker' => new wp_bootstrap_navwalker()
							)
						);
					?>   
                </ul>
            </div>  
        </div>
    </div>
</div>	