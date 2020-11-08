$(document).ready(function(){
	$('.top').click(function(){
		$('body, html').animate({
			scrollTop: '0'
		}, 300);
	});
	$(window).scroll(function(){
		if( $(this).scrollTop() > 414 ){
			$('.top').fadeIn(250);
		}else {
			$('.top').fadeOut(250);
		}
	});
});