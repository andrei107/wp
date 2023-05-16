<?php
/*
Template Name: main
*/
?>

<?php get_header(); ?>

<div id="index">
	<div id="base-block">
		<h2 class="heading"> Лучшие рецепты </h2>
		<div class="best-receipt-block">
			<div class="offer__slider-prev">
				<i class="fa fa-2x fa-arrow-circle-left" aria-hidden="true"></i>
			</div>
			<div class="slider-block">
				<? $best_receipt = get_posts(array(
						'numberposts' => -1,
						'category_name' => 'best-receipt-rubric',
						'post_type'   => 'post',
						'suppress_filters' => true
					));

					global $post;

					foreach( $best_receipt as $post ){
						setup_postdata( $post );
				?>
					<div class="best-receipt-item" style="background-image: url('<? the_field('bg-img')?> ')">
						<a href="<? the_field('best-link')?>">
							<div class="dark">
								<div class="bestItemName">
									<p> <? the_field('best-receipt-name')?> 
										<br><i class="fa fa-clock-o"> <? the_field('time-best')?> </i> 
									</p>
								</div>
							</div>
						</a>
					</div>
				<?
					}
					wp_reset_postdata();
				?>		
			</div>	
			<div class="offer__slider-next">
				<i class="fa fa-2x fa-arrow-circle-right" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div id="base-block">
		<h2 class="heading"> Блюдо дня </h2>
		<div class="day-receipt-block" style="background-image: url('<? the_field('center-img')?> ')">
			<div class="dark-mask">
				<div class="day-receipt-name"><? the_field('main-title')?></div>
			</div>
		</div>
	</div>
	<div id="base-block">
		<h2 class="heading"> Быстрые рецепты </h2>
		<div class="fast-receipt-block">
			<div class="offer__slider-prev-fast">
				<i class="fa fa-2x fa-arrow-circle-left" aria-hidden="true"></i>
			</div>
			<div class="slider-block">
				<? $fast_receipt = get_posts(array(
						'numberposts' => -1,
						'category_name' => 'fast-receipt-rubric',
						'post_type'   => 'post',
						'suppress_filters' => true
					));

					global $post;

					foreach( $fast_receipt as $post ){
						setup_postdata( $post );
				?>
					<div class="fast-receipt-item" style="background-image: url('<? the_field('bg-img')?> ')">
						<a href="<? the_field('link-fast')?>">
							<div class="dark">
								<div class="fastItemName">
									<p> <? the_field('receipt-fast-name')?> 
										<br><i class="fa fa-clock-o"> <? the_field('time-fast')?> </i> 
									</p>
								</div>
							</div>
						</a>
					</div>
				<?
					}
					wp_reset_postdata();
				?>		
			</div>	
			<div class="offer__slider-next-fast">
				<i class="fa fa-2x fa-arrow-circle-right" aria-hidden="true"></i>
			</div>
		</div>
	</div>	
	<div id="articles-on-main">
		<h2 class="heading">Полезные советы</h2>
		<div class="advice-block">
			<div class="advice-container">
				<div class="advice-content">
                	<a href="#">
                    	<div class="tabcontent" style="background-image: url('/wp-content/uploads/img/coldBig.jpg')">
                        	<div class="tabcontent-descr" >
                            	<p> Что лучше съесть, чтобы согреться? И такое бывает? Да! И речь не о блюдах, пышущих жаром </p>
                        	</div>
                    	</div>
                	</a>
					<a href="#">
                    	<div class="tabcontent" style="background-image: url('/wp-content/uploads/img/vinovino.jpg')">
                        	<div class="tabcontent-descr" >
                            	<p> На что обращать внимание при выборе вина? </p>
                        	</div>
                    	</div>
                	</a>
					<a href="#">
                    	<div class="tabcontent" style="background-image: url('/wp-content/uploads/img/speziaBig.jpg')">
                        	<div class="tabcontent-descr" >
                            	<p> Но что ты знаешь о специях, которые добавляешь в мясо или овощи? </p>
                        	</div>
                    	</div>
                	</a>
		 		</div>
		 		<div class="advice-header">
					<div>
                        <div class="advice-header-item"> Согреваемся в непогоду </div>
						<div class="advice-header-item"> Как выбрать вино </div>
						<div class="advice-header-item"> Факты о специях </div>
             		</div>
		 		</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>