jQuery(window).on('load', function(){
	jQuery('body').addClass('loaded');
	jQuery('.preloader').fadeOut();
	
	jQuery('h1.sitelogo').on("click", function(){
		el = document.getElementById('msn2');
		etype = 'click';
	  if (el.fireEvent) {
    	el.fireEvent('on' + etype);
	  } else {
		var evObj = document.createEvent('Events');
		evObj.initEvent(etype, true, false);
		el.dispatchEvent(evObj);
	  }
	});
	
});