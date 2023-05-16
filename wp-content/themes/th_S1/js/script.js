(function ($) {
    $(document).ready(function () {
		/*обертка группы элементов для слайдера*/
		let divBestReceipt = $(".best-receipt-item");

		for(let i = 0; i < divBestReceipt.length; i+=3) {
			divBestReceipt.slice(i, i+3).wrapAll("<div class='slider-triple-element'></div>");
		}

		let divFastReceipt = $(".fast-receipt-item");
		
		for(var i = 0; i < divFastReceipt.length; i+=4) {
			divFastReceipt.slice(i, i+4).wrapAll("<div class='slider-quattro-element'></div>");
		}

		//слайдеры
		let slideIndexBest = 1,
			slideIndexFast = 1;

		const slidesBest = $('.slider-triple-element'),
			prevBest = $('.offer__slider-prev'),
			nextBest = $('.offer__slider-next'),
			slidesFast = $('.slider-quattro-element'),
			prevFast = $('.offer__slider-prev-fast'),
			nextFast = $('.offer__slider-next-fast');
			
		showBestSlides(slideIndexBest);
	
		function showBestSlides(n) {
			if (n > slidesBest.length) {
				slideIndexBest = 1;
			}
			if (n < 1) {
				slideIndexBest = slidesBest.length;
			}
	
			slidesBest.each(function(index, value){
				$(value).css('display', 'none')
			});
			$(slidesBest[slideIndexBest - 1]).css('display', 'flex');   
		}
	
		function plusBestSlides (n) {
			showBestSlides(slideIndexBest += n);
		}
		prevBest.on('click', function(){
			plusBestSlides(-1);
		});
		nextBest.on('click', function(){
			plusBestSlides(1);
		});
		
		showFastSlides(slideIndexFast);
	
		function showFastSlides(n) {
			if (n > slidesFast.length) {
				slideIndexFast = 1;
			}
			if (n < 1) {
				slideIndexFast = slidesFast.length;
			}
	
			slidesFast.each(function(index, value){
				$(value).css('display', 'none')
			});
			$(slidesFast[slideIndexFast - 1]).css('display', 'flex');   
		}
	
		function plusFastSlides (n) {
			showFastSlides(slideIndexFast += n);
		}
		prevFast.on('click', function(){
			plusFastSlides(-1);
		});
		nextFast.on('click', function(){
			plusFastSlides(1);
		});
		
		//динамика названий
		if ($(window).width() > 950) {
			$('.dark', this).on('mouseover', function () {
				$('.bestItemName', this).stop().animate({
					marginTop: '200px'		
				}, 500);
		   });
		   $('.dark',this).on('mouseout', function () {
				$('.bestItemName', this).stop().animate({
					marginTop: '225px'		
				}, 500);
		   });
		   
		   $('.dark').on('mouseover', function () {
				$('.fastItemName', this).stop().animate({
				  	marginTop: '160px'		
				}, 500);
		   });
		  $('.dark').on('mouseout', function () {
				$('.fastItemName', this).stop().animate({
					marginTop: '175px'		
				}, 500);
		   });   	
		}	  
		
		//разбиение рецептов
		function divedeReceipts(){
			let divAllReceipt = $(".container-receipt a");

			for(let i = 0; i < divAllReceipt.length; i+=3) {
				divAllReceipt.slice(i, i+3).wrapAll("<div class='triple-element'></div>");
			}
		}

		divedeReceipts();

		//tabs menu
		function hideTabContent() {
			$( ".tabcontent" ).each(function() {
				 $(this).addClass('hide');
				$(this).removeClass('advice-content','fade');
			});
			$( ".advice-header-item" ).each(function() {
				 $(this).removeClass('activeHeader');
			});
		}
	
		function showTabContent(i = 0) {
			var tabcontent = $( ".tabcontent" );
			var firstTab = tabcontent[i];
			$(firstTab).addClass('advice-content','fade');
			$(firstTab).removeClass('hide');
			var adviceHeaderItem =  $( ".advice-header-item" )[i]
			$(adviceHeaderItem).addClass('activeHeader');
		}
	
		hideTabContent();
		showTabContent();
	
		$('.advice-header-item').on('click',function(){
			const target = event.target;
			if(target && target.classList.contains('advice-header-item')) {
				$( ".advice-header-item" ).each(function(index,element) {
					if (target == element) {
						hideTabContent();
						showTabContent(index);
					}
				});
			}
		})
	
		//active menu
		function toggleActive() {
			let location = window.location.href;
			$('.nav.navbar-nav').each(function () {
				var link = $(this).find('.active a').attr('href');
				if (location == link || location == link + '/') {
					$(this).find('.active a').addClass('activeMainMenu');
				} else {
					$(this).find('.active a').removeClass('activeMainMenu');
				}
			});
	
		}
		
		toggleActive();

	});
})(jQuery);