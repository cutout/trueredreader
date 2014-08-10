	var body 		= $('body'),
		page 		= body.find('.container'),
		navToggle 	= body.find('#nav-toggle'),
		overlay 	= body.find('.overlay'),
		viewportHt 	= $(window).innerHeight();

	navToggle.on('click', function(){
		
		body
			.removeClass('loading')
			.toggleClass('nav-open');

		if ( body.hasClass('nav-open') ) {
			page.css('height', viewportHt);
		} else {
			page.css('height', 'auto');
		}	

	});

	overlay.on('click', function(){
		body.removeClass('nav-open');
	});