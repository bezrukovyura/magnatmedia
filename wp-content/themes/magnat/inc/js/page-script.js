function trCords(deg){
	var $theta1 = deg+60, $theta2 = $theta1+120, $theta3 = $theta2+120,
		$theta1rad = $theta1 * Math.PI / 180, $theta2rad = $theta2 * Math.PI / 180, $theta3rad = $theta3 * Math.PI / 180,
		$radius = 50, $centerX = 50, $centerY = 50,
		$p1x, $p2x, $p3x, $p1y, $p2y, $p3y;
	$p1x = $centerX + $radius * Math.cos($theta1rad);
	$p1y = $centerY - $radius * Math.sin($theta1rad);
	$p2x = $centerX + $radius * Math.cos($theta2rad);
	$p2y = $centerY - $radius * Math.sin($theta2rad);
	$p3x = $centerX + $radius * Math.cos($theta3rad);
	$p3y = $centerY - $radius * Math.sin($theta3rad);
	return 'polygon('+$p1x+'% '+$p1y+'%, '+$p2x+'% '+$p2y+'%, '+$p3x+'% '+$p3y+'%)';
};
function fHome(){
	var $device = 'desctop',
		video1 = document.getElementById('load-slide'),
		video2 = document.getElementById('showreal'),
		owl = jQuery('.m-slide-items.owl-carousel'),
		portfoliOwl = jQuery('.portfolio-slider-owl');
	jQuery( '.portfolio-slider-nav-prev' ).click(function(){
		portfoliOwl.goToPrevSlide();
	});
	jQuery( '.portfolio-slider-nav-next,.portfolio-slider-next span' ).click(function(){
		portfoliOwl.goToNextSlide();
	});
	if( navigator.userAgent.match(/(iPod|iPhone|iPad)/) ) {
		$device = 'iOS';
	} else if(navigator.userAgent.match(/Android|webOS|iPhone|iPod|Blackberry/i) ) {
		$device = 'android';
	}
	var $ch = jQuery('.m-slide-items').height(),
		$cw = jQuery('.m-slide-items').width(),
		$wh = jQuery(window).height(),
		$ww = jQuery(window).width(),
		$co = $cw/$ch,
		$wo = $ww/$wh,
		$coVideo = 1920/1080,
		$str = trCords(0);
	jQuery('.portfolio-slider-mask').css({
		'-webkit-clip-path': $str,
		'-moz-clip-path': $str,
		'-o-clip-path': $str,
		'-ms-clip-path': $str,
		'clip-path': $str
	});
	if($coVideo>$wo){
		jQuery('.video-about').width($wh*$coVideo);	
		jQuery('.video-about').height($wh);	
	} else {
		jQuery('.video-about').width($ww);
		jQuery('.video-about').height($ww/$coVideo);
	}
			
	if($co>$wo){
		jQuery('.m-slide-items').width($wh*$co);
		jQuery('.m-slide-items').height($wh);
		jQuery('.triangle-bg-confrotate').css('background-size',$wh*$co+'px '+$wh+'px');
	} else {
		jQuery('.m-slide-items').width($ww);
		jQuery('.m-slide-items').height($ww/$co);
		jQuery('.triangle-bg-confrotate').css('background-size',$ww+'px '+$ww/$co+'px');
	}	
	jQuery('.m-slide-content').height($wh);
	jQuery('.m-slide-content').width($ww);
	owl.owlCarousel({
		nav:false,
		dots:false,
		loop:true,
		items:1,
		onTranslated : counter,
		onTranslate : translater
	});
	/*portfoliOwl.owlCarousel({
		//nav:false,
		//dots:true,
		items:1,
		loop:true,
		margin:0,
		onTranslate : clickBtn,
		onTranslated : clickedBtn,
		responsive : {
			0 : {
				autoplay:false,
				// autoplayTimeout:1500,
				// autoplayHoverPause:false,
			},
			768 : {
				autoplay:true,
				autoplayTimeout:1500,
				// autoplayHoverPause:true,
			}
		}
	});
	portfoliOwl.trigger('refresh.owl.carousel');*/
	portfoliOwl.lightSlider({
        item:1,
        loop:true,
		auto:true,
		onBeforeSlide: function (el) {
			jQuery('.portfolio-slider-title-div').removeClass('swipe');
		},
		// clickBtn,
		onAfterSlide: function (el) {
			var item = jQuery('.portfolio-slider-item.active').index();
			// console.log(item);
			var $url = jQuery('.portfolio-slider .portfolio-slider-item:nth-child('+item+')').attr('data-url');
			var $str = '<a class="portfolio-slider-title" href="'+$url+'">'+jQuery('.portfolio-slider .portfolio-slider-item:nth-child('+item+')').attr('data-title')+'</a>';
			var $str2 = jQuery('.portfolio-slider .portfolio-slider-item:nth-child('+item+')').attr('data-description');
			if($str2) $str = $str+'<a class="portfolio-slider-description" href="'+$url+'">'+$str2+'</a>';
			jQuery('.portfolio-slider-title-div').html($str);
			jQuery('.portfolio-slider-title-div').addClass('swipe');
			jQuery('.circle-more-text a').attr('href',$url);
		},
		// clickedBtn,
        responsive : [
            {
                breakpoint:767,
                settings: {
					auto:false,
				}
            },
        ]
    });  
	jQuery('.m-slide-items-nav .m-slide-items-nav-item a[href*="'+jQuery('.owl-item.active').find('.m-slide-item').attr('data-tag')+'"]').addClass('active');
	owl.on('translated.owl.carousel', function(event) {
		jQuery('.m-slide-items-nav .m-slide-items-nav-item a.active').removeClass('active');
		jQuery('.m-slide-items-nav .m-slide-items-nav-item a[href*="'+jQuery('.owl-item.active').find('.m-slide-item').attr('data-tag')+'"]').addClass('active');
		window.location.hash = '#'+jQuery('.owl-item.active').find('.m-slide-item').attr('data-tag');
	});
	jQuery(document).keydown( function(eventObject) {
		if(eventObject.which==37) {
			owl.trigger('prev.owl.carousel');
		} else 
		if(eventObject.which==39) {
			owl.trigger('next.owl.carousel');
		}
	});
	portfolioSlider_bg();
	portfolioArchive_bg();
	jQuery('#msn1').click(function(){
		owl.trigger("to.owl.carousel", 0); 
	});
	jQuery('#msn2').click(function(){
		owl.trigger("to.owl.carousel", 1); 
	});
	jQuery('#msn3').click(function(){
		owl.trigger("to.owl.carousel", 2); 
	});
	jQuery('#msn4').click(function(){
		owl.trigger("to.owl.carousel", 3); 
	});
	jQuery('.portfolio-slider-dot').click(function(){
		jQuery('.portfolio-slider-dot.active').removeClass('active');
		jQuery( this ).addClass('active');
		jQuery('.portfolio-slider .owl-dots .owl-dot:nth-child('+jQuery( this ).attr('data-dot')+')').click();
	});
	var $hash = window.location.hash;
	if($hash) {
		jQuery('.m-slide-items-nav-item a[href*="'+$hash+'"]').click();
	}
	jQuery( document ).on( "mousemove", function( event ) {
		var $whh = $wh/2,
			$wwh = $ww/2,
			$pX = event.pageX,
			$pY = event.pageY,
			$w = ($wwh-$pX)/33,
			$h = ($whh-$pY)*$wo/33,
			$deg = (($wwh-$pX)*-36/$wwh)-6,
			$psX = ($wwh-$pX)*4/$wwh,
			$psY = ($whh-$pY)*2/$whh,
			$str = trCords(-$deg);
		jQuery('.contacts-bg img').css('margin',$h+'px '+$w*(-1)+'px '+$h*(-1)+'px '+$w+'px');
		jQuery('.triangles').rotate($deg);
		jQuery('.triangle-bg-confrotate').rotate(-$deg);
		jQuery('body:not(.p-more) .portfolio-slider-container').css('margin',$psY+'% '+$psX*(-1)+'% '+$psY*(-1)+'% '+$psX+'%');
		jQuery('body:not(.p-more) .portfolio-slider-mask').css({
			'-webkit-clip-path': $str,
			'-moz-clip-path': $str,
			'-o-clip-path': $str,
			'-ms-clip-path': $str,
			'clip-path': $str
		});
	});
	jQuery( '.circle-more,.portfolio-slider-title-div' ).on( 'mouseenter', function() {
		var $start = rotate_degree( jQuery( '#circle1' ) );
		jQuery( '.circle-more' ).addClass('hover');
		jQuery( 'body' ).addClass( 'p-more' );
		jQuery( '#circle1 .circle-confrotate' ).rotate({ 	angle: $start, 				animateTo:359.99 	});
		jQuery( '#circle2 .circle-confrotate' ).rotate({ 	angle: 359.99 - $start, 	animateTo:0 		});
		jQuery( '#circle3 .circle-confrotate' ).rotate({ 	angle: $start, 				animateTo:359.99 	});
		jQuery( '#circle1 .circle-confrotate' ).css( 'margin', '-8%' );
		jQuery( '#circle2 .circle-confrotate' ).css( 'margin', '-5%' );
		jQuery( '#circle3 .circle-confrotate' ).css( 'margin', '-2%' );
		jQuery( '.portfolio-slider-container' ).css( 'transition', '.3s' ); 
		if(window.outerWidth>767){
			portfoliOwl.pause();
		}
	});
	jQuery( '.circle-more,.portfolio-slider-title-div' ).on( 'mouseleave', function() {
		jQuery( '#circle1 .circle-confrotate' ).rotate( 0 );
		jQuery( '#circle2 .circle-confrotate' ).rotate( 0 );
		jQuery( '#circle3 .circle-confrotate' ).rotate( 0 );
		jQuery( '.circle-more' ).removeClass('hover');
		jQuery( 'body' ).removeClass( 'p-more' );
		jQuery( '#circle1 .circle-confrotate' ).css( 'margin', '0' );
		jQuery( '#circle2 .circle-confrotate' ).css( 'margin', '0' );
		jQuery( '#circle3 .circle-confrotate' ).css( 'margin', '0' );
		jQuery( '.portfolio-slider-container' ).css( 'transition', '.0s' );
		if(window.outerWidth>767){
			portfoliOwl.play();
		}
	});
	var elem = document.getElementById('m-slide-items');
	if (elem){
		if (elem.addEventListener) {
			if ('onwheel' in document) {
				elem.addEventListener("wheel", onWheel);
			} else if ('onmousewheel' in document) {
				elem.addEventListener("mousewheel", onWheel);
			} else {
				elem.addEventListener("MozMousePixelScroll", onWheel);
			}
		} else {
			elem.attachEvent("onmousewheel", onWheel);
		}
	}
	if($device == 'desctop') {
		if (video1) { video1.addEventListener('ended',viodeoEvent1,false); }
		if (video2) { video2.addEventListener('ended',viodeoEvent2,false); }
	}
	var parser = new UAParser();
	if($device == 'android' || $device == 'iOS' ) {
		jQuery('.msi2-mobile-before').click(function(){
			if( parser.getBrowser()['name'] != 'MIUI Browser' ){	
				jQuery(this).addClass('loading');
				video2.play();
				jQuery('.video-down').css('z-index','2');
				jQuery('.video-down').css('opacity','1');
				video2 = document.getElementById('showreal');
				jQuery('.msi2-mobile').css('z-index','1');
			} else {
				var win = window.open('https://www.youtube.com/watch?v=JKiPrHkgSic', '_blank');
				win.focus();
			}
		});
		video2.addEventListener('ended',viodeoEvent2,false);
	}
	if( parser.getBrowser()['name'] == 'Yandex' ) jQuery('.portfolio-slider-mask').addClass('ya');
	single_nagigation();
	
	var parser = new UAParser();
	
	if( parser.getBrowser()['name'] != 'MIUI Browser' ){
		jQuery('#showreal').attr( 'playsinline', 'true' );
		jQuery('#showreal').attr( 'webkit-playsinline', 'true' );
	} else {
		jQuery('.msi2-mobile-before').addClass('miui');
	}
	jQuery( window ).resize(function() {
		portfolioSlider_bg();
		portfolioArchive_bg();
		$ch = jQuery('.m-slide-items').height();
		$cw = jQuery('.m-slide-items').width();
		$wh = jQuery(window).height();
		$ww = jQuery(window).width();
		jQuery('.m-slide-content').height($wh);
		jQuery('.m-slide-content').width($ww);
		if( parser.getBrowser()['name'] == 'MIUI Browser' ){
			if($wh>$ww){
				jQuery('#showreal').width('100vw');	
				jQuery('#showreal').height('56.25vw');	
			} else {
				jQuery('#showreal').width('100vw');	
				jQuery('#showreal').height('100vh');
			}
		}
		$co = $cw/$ch;
		$wo = $ww/$wh;
		$coVideo = 1920/1080;
		if($coVideo>$wo){
			jQuery('.video-about').width($wh*$coVideo);	
			jQuery('.video-about').height($wh);
		} else {
			jQuery('.video-about').width($ww);
			jQuery('.video-about').height($ww/$coVideo);
		}
		if($co>$wo){
			jQuery('.m-slide-items').width($wh*$co);
			jQuery('.m-slide-items').height($wh);
			jQuery('.triangle-bg-confrotate').css('background-size',$wh*$co+'px '+$wh+'px');
		} else {
			jQuery('.m-slide-items').width($ww);
			jQuery('.m-slide-items').height($ww/$co);
			jQuery('.triangle-bg-confrotate').css('background-size',$ww+'px '+$ww/$co+'px');
		}
		jQuery(document).on('ready', function(){
			plusWidth();
		});
	});
}
stopWheel = true;
function onWheel(e) {
	e = e || window.event;
	var delta = e.deltaY || e.detail || e.wheelDelta*(-1),
		owl = jQuery('.m-slide-items.owl-carousel');
	if (stopWheel) {
	var TimeWheel = setTimeout(function() {
	stopWheel = true;
	},1000);
	if(delta>0){
		// console.log('next');
		owl.trigger('next.owl.carousel');
	} else  {
		// console.log('prev');
		owl.trigger('prev.owl.carousel');
	}
	stopWheel = false;
	}
	e.preventDefault ? e.preventDefault() : (e.returnValue = false);
}
function viodeoEvent1(e) {
	jQuery('.video-up').css('z-index','1');
	jQuery('.video-down').css('z-index','2');
	jQuery('.video-down').css('opacity','1');
	video2 = document.getElementById('showreal');
	video2.play(); 
}
function viodeoEvent2(e) {
	video2 = document.getElementById('showreal');
	video2.play(); 
}
function translater(event) {
	jQuery('.m-slide-social').removeClass('loaded');
	jQuery('.object-show-div').fadeOut();
}
function counter(event) {
	var item = (event.item.index+3)%4,
		$device = 'desctop',
		video1 = document.getElementById('load-slide'),
		video2 = document.getElementById('showreal');
	if( navigator.userAgent.match(/(iPod|iPhone|iPad)/) ) {
		$device = 'iOS';
	} else if(navigator.userAgent.match(/Android|webOS|iPhone|iPod|Blackberry/i) ) {
		$device = 'android';
	}
	jQuery('.m-slide-social').removeClass('loaded');
	if($device == 'desctop') {
		if(item == 2){ 
			jQuery('.video-up').css('transition','.2s');
			jQuery('.video-up').css('opacity','1');
			video1.play();
		} else {
			video1.pause();
			video2.pause();
			video1.load();
			video2.load();
			jQuery('.video-up').css('transition','0');
			jQuery('.video-up').css('opacity','0');
			jQuery('.video-up').css('z-index','2');
			jQuery('.video-down').css('z-index','1');
			jQuery('.video-down').css('opacity','0');
		}
	}
	if(item == '0'){ 
		jQuery('.m-slide-social').addClass('loaded');
	}
}
function swipeDownToUp(){
	jQuery('#body').on('swipeup', function() {
			// jQuery( '.owl-item.active .more-url.ajax-load a' ).delay( 300 ).click(); // Переход внутрь по свайпу вверх
		}	
	);
}
function scrollTopHeaderEvent(){	
	var $scrollHeight = jQuery('.not-home-top-bg').height();
	var $scrollMargin = parseInt(jQuery('.not-home-top-bg').css('margin-top'));
	var lastScrollTop = 0;
	jQuery(window).scroll(function(event){
		var st = jQuery(this).scrollTop();
		if(st<0) st = 0;
		var $delta = lastScrollTop - st;
		$scrollMargin = $scrollMargin + $delta;
		if($scrollMargin<-$scrollHeight) $scrollMargin = -$scrollHeight;
		if($scrollMargin>0) $scrollMargin = 0;
		lastScrollTop = st;
		jQuery('.not-home-top-bg,.m-slide-items-nav-r,.mobile-logo-svg').css('margin-top',$scrollMargin+'px');
		jQuery('body').removeClass('menuOpen');
	});
}
function owlNews(){
	var owlNews = jQuery('.news-gal');
	if( window.outerWidth<768 ){
		owlNews.addClass('owl-carousel');
		owlNews.owlCarousel({
			autoHeight: true,
			nav:true,
			dots:false,
			loop:true,
			items:1
		});
		owlNews.trigger('refresh.owl.carousel');
	} else {
		if(owlNews.hasClass('owl-carousel')){
			owlNews.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
		}
	};
}
function portfolioSlider_bg() {
	jQuery( '.portfolio-slider-item' ).each(function( index ) {
		var $mbg = jQuery( this ).attr('data-mbg'),
			$dbg = jQuery( this ).attr('data-dbg');
		if(window.outerWidth<768 && $mbg ){
			jQuery( this ).css('background-image','url("'+$mbg+'")');
		} else {
			jQuery( this ).css('background-image','url("'+$dbg+'")');
		}
	});
}
function portfolioArchive_bg() {
	jQuery( '.portfolio-archive-template .archive-bg' ).each(function( index ) {
		var $mbg = jQuery( this ).attr('data-mbg'),
			$dbg = jQuery( this ).attr('data-dbg');
		if( $mbg ){
			jQuery( this ).css('background-image','url("'+$mbg+'")');
		} else {
			jQuery( this ).css('background-image','url("'+$dbg+'")');
		}
	});
}
function rotate_degree(obj) {
    var matrix = obj.css("-webkit-transform") ||
		obj.css("-moz-transform") ||
		obj.css("-ms-transform") ||
		obj.css("-o-transform") ||
		obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(','),
			a = values[0],
			b = values[1],
			angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { 
		var angle = 0; 
	}
    return (angle < 0) ? angle +=360 : angle;
}
function plusWidth(){
	jQuery('.m-slide-items-nav .m-slide-items-nav-item,.project-tags a').each(function(){
		var $plus = 15;
		if(jQuery(window).width()>480) {
			$plus = $plus+5;
		}
		if(jQuery(window).width()>600) {
			$plus = $plus+5;
		}
		if(jQuery(window).width()>767) {
			$plus = $plus+5;
		}
		jQuery(this).css('width','auto');
		// console.log( jQuery(this).width() );
		jQuery(this).css( 'width', jQuery(this).width() + $plus + 'px' );
	});
}
function svgReloader(){
	jQuery('.m-slide-social a img,.sitelogo img').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		jQuery.get(imgURL, function(data) {
			var $svg = jQuery(data).find('svg');
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}
			$svg = $svg.removeAttr('xmlns:a');
			if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}
			$img.replaceWith($svg);
		}, 'xml');
	});
}
function contactsPopUp(){
	jQuery('.contact-modal').click(function(){
		jQuery('.object-show-div').fadeIn();
		jQuery('.object-show-div').height(jQuery('.obj-pu-padding').height()+40);
	});
	jQuery('.obj-pu-div-close').click(function(){
		jQuery('.object-show-div').fadeOut();
	});
	jQuery(document).mouseup(function(e){
		var container = jQuery('.object-show-div');
		if (!container.is(e.target) && container.has(e.target).length === 0){
			jQuery('.object-show-div').fadeOut();
		}
	});
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		jQuery('.object-show-div').delay( 1000 ).fadeOut();
	}, false );
}	

jQuery(document).ready(function($) {
	fHome();
	scrollTopHeaderEvent();
	svgReloader();
	jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		transitionDuration: '0s',
	});
	jQuery("img.lazyload").lazyload();
	contactsPopUp();
	jQuery(document).on('ready', function(){
		plusWidth();
	});
});

jQuery(window).load( function(){
	owlNews();
	jQuery( window ).resize(function() {
		owlNews();
	});
});

function single_nagigation(){
	if( jQuery('div[data-class="body-classes"]').hasClass('single') ){
		jQuery(document).keydown( function(eventObject) {
			if(eventObject.which==37) {
				jQuery('.news-loop a:first-child').click();
			} else 
			if(eventObject.which==39) {
				jQuery('.news-loop a:last-child').click();
			}
		});
	}
}