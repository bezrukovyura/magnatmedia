function competenciesClick(){
	jQuery('.competencies-col p').click(function(){
		if(!jQuery( this ).hasClass('active')){
			var $thisDivShow = jQuery( this ).attr('class').replace( 'tab-', 'div-' );
			var $thisDivHide = jQuery('.competencies-col p.active').attr('class').replace( 'tab-', 'div-' ).replace( ' active', '' );
			jQuery( '.'+$thisDivHide ).fadeOut(0);
			jQuery( '.'+$thisDivShow ).fadeIn(400);
			jQuery('.competencies-col p.active').removeClass('active');
			jQuery( this ).addClass('active');
		}
	});
}

function pbShowGrid(){
	jQuery('.entry-content>.panel-layout>.panel-grid,.job-items>.job-item,.about-bottom-div,.waypoint').waypoint(function(direction) {
		jQuery( this ).addClass( 'show-grid' );
	}, {
		offset: '85%'
	});	 
}	
pbShowGrid();
	
competenciesClick();
menuOpen();
jQuery('.job-item-title .job-item-table h3').click(function(){
	jQuery(this).parents('.job-item-title').next().slideToggle();
	jQuery(this).toggleClass('clicked');
});

jQuery(window).load( function(){
	counterValuePartEvent();
});

function counterValuePartEvent(){
	jQuery('.cl-counter-value-part.type_number').waypoint(function(direction) {
		counterValuePart( jQuery( this ) );
	}, {
		offset: '100%'
	});	 
}

function counterValuePart( $this ){
	var $duration = $this.parents('.cl-counter').attr('data-duration'),
		$max = $this.attr('data-final');
	$this.animate({ num: $max }, {
		duration: $duration,
		step: function (num){
			this.innerHTML = num.toFixed(0);
		}
	});
}

function menuOpen(){
	jQuery('.mobile-menu-open-btn').click(function(){
		jQuery( 'body' ).toggleClass('menuOpen');
	});
}

function liteboxWhenReload(){
	jQuery(".litebox").liteBox();		
	jQuery("div[id^=gallery] a").liteBox();	

	jQuery('div.gallery a').attr('data-litebox-group', 'galone');
}

jQuery('body').on('click', '.ajax-load a', function() {
	jQuery('body').append('<div class="page-loading"><div class="load-bar"><div class="bar"></div><div class="bar"></div><div class="bar"></div></div></div>');
	jQuery('.page-loading').slideDown( "slow" );
	jQuery('div[data-class="body-classes"].home .m-slide-items-fp').width(jQuery('body').width());
	jQuery('body').css('overflow-x','hidden');
	jQuery('body').css('overflow-y','scroll');
	var $url = jQuery(this).attr('href');
	jQuery('#loading').delay( 300 ).load( $url + ' #body' , function() {
		jQuery(this).slideDown( "slow" ).delay( 300, function(){
			jQuery('.grid').masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				transitionDuration: '0s',
			});
			jQuery('.page-loading').remove();
			jQuery('body>#body').remove();
			jQuery('#body').unwrap();
			jQuery('body').append('<div id="loading"></div>');
			scrollTopHeaderEvent();
			owlNews();
			counterValuePartEvent();
			competenciesClick();
			svgReloader();
			pbShowGrid();
			liteboxWhenReload();
			single_nagigation();
			history.pushState( { pop :  'push' } , '' ,  $url );
			window.scrollTo(0, 0);
		});
		jQuery('#loading .preloader').remove();
		jQuery("img.lazyload").lazyload();
		portfolioArchive_bg();
		menuOpen();
		jQuery('.job-item-title .job-item-table h3').click(function(){
			jQuery(this).parents('.job-item-title').next().slideToggle();
			jQuery(this).toggleClass('clicked');
		});
		jQuery(document).ready(function() {
			plusWidth();
			if (window.history && window.history.pushState) {
				jQuery(window).on('popstate', function() {
					location.reload();
				});
			}
		});
	});
	return false;
});

jQuery('body').on('click', '.tag-load a', function() {
	// console.log('tag-load');
	var $url = jQuery(this).attr('href');
	jQuery('#primary').load( $url + ' #primary' , function() {
		jQuery('#primary>#primary').unwrap();
		jQuery("img.lazyload").lazyload();
		jQuery('.grid').masonry({
			itemSelector: '.grid-item',
			columnWidth: '.grid-sizer',
			transitionDuration: '0s',
		});
		portfolioArchive_bg();
		owlNews();
		pbShowGrid();
		liteboxWhenReload();
		single_nagigation();
		history.pushState( { pop :  'push' } , '' ,  $url );
		jQuery( window ).scrollTop( 0 );
		jQuery(document).ready(function() {
			plusWidth();
			if (window.history && window.history.pushState) {
				jQuery(window).on('popstate', function() {
					location.reload();
				});
			}
		});
	});
	return false;
});

jQuery('body').on('click', 'div[data-class="body-classes"]:not(.home) .m-slide-items-nav .m-slide-items-nav-item:not(.ajax-load) a', function() {
	jQuery('body').removeClass('loaded');
	var $url = jQuery(this).attr('href');
	history.pushState( { pop :  'push' } , '' ,  $url );
	jQuery('body').removeClass('menuOpen');
	jQuery('#loading').css('top','-1px');
	jQuery('#loading').css('bottom','auto');
	jQuery('#m-slide-items').css('opacity','0');
	jQuery('#loading').delay( 300 ).load( $url + ' #body' , function() {
		jQuery('body>#body').css({
			'-webkit-transition': 'all .4s linear',
			'-moz-transition': 'all .4s linear',
			'transition': 'all .4s linear',
			'-moz-transform': 'translateY(100vh)',
			'-ms-transform': 'translateY(100vh)',
			'-webkit-transform': 'translateY(100vh)',
			'-o-transform': 'translateY(100vh)',
			'transform': 'translateY(100vh)'
		});
		jQuery('#m-slide-items').css('opacity','0');
		jQuery('#m-slide-items').css('transition','.2s');
		jQuery(this).slideDown( 400, 'linear' ).delay( 300, function(){
			jQuery('.page-loading').remove();
			jQuery('body>#body').remove();
			jQuery('#body').unwrap();
			jQuery('body').append('<div id="loading"></div>');
			svgReloader();
			swipeDownToUp();
			fHome();
			jQuery('#m-slide-items').css('opacity','1');
			jQuery('body').addClass('loaded');
			plusWidth();
		});
		jQuery('#loading .preloader').remove();
		jQuery(document).ready(function() {
			if (window.history && window.history.pushState) {
				jQuery(window).on('popstate', function() {
					location.reload();
				});
			}
		});
	});
	return false;
});