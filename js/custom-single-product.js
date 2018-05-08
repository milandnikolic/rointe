(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
			//$(".custom-product-fields iframe").hide();
			$('.video-link').on('click', function(ev) {
			 	$(".custom-product-fields .video-container").addClass('flexy');
			    $(".custom-product-fields iframe")[0].src += "&autoplay=1&rel=0&enablejsapi=1";
			    $(".custom-product-fields iframe").show();
			    ev.preventDefault();
			 
			 });
			$('.close-video').on('click', function(ev) {
			 	//$(".custom-product-fields iframe").stopVideo();
			    $(".custom-product-fields .video-container").removeClass('flexy');
			    $('.custom-product-fields iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
			    ev.preventDefault();
			 
			 });
				/* $('.close-video').on('click', function() {
				   // $('#popup-youtube-player').stopVideo();
				$('#popup-youtube-player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');    
				});*/

			$('.flex-viewport span.attribute-badge').clone().appendTo('.woocommerce-product-gallery');



	});
	
})(jQuery, this);