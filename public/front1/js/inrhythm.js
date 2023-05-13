$(document).ready(function(){
						
			/*  GET IN TOUCH  */
		  	$('.login-trigger').click(function(){
				$(this).next('.login-content').slideToggle();
				$(this).toggleClass('active');
				if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
			  	else $(this).find('span').html('&#x25BC;')
			});		
			$('.login-content h1 span').click(function(){
				$('.login-content').slideUp(500);
			});
			
			
			/*  ABOUT US SHOW HIDE  */		
			$('.show-hide').click(function(){
				$(this).closest('div.show-content').find('p').toggle('slow');
				$(this).toggleClass('show-minus');
			});				
			
			
			/* Video Popup */
			$('.video-popup').on('shown.bs.modal', function() {
				$(this).find('.modal-dialog').css({
					'margin-top': function () {
						return -($(this).outerHeight() / 2);
					},
					'margin-left': function () {
						return -($(this).outerWidth() / 2);
					}
				});
			});
});


/* HOME PAGE ICON ROTATION ON SCROLL*/
$(window).scroll(function() {    
    		var scroll = $(window).scrollTop();
    		if (scroll >= 250) {
	        $(".hmicon-rotation").addClass("img-box");
    }
});