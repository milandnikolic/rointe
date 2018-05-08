(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		

			//ajax for products on homepage
			$('#filter').submit(function(){
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('img').css('display', 'block'); // changing the button label
				},
				success:function(data){
					filter.find('img').css('display', 'none');
					//filter.find('button').text('Apply filter'); // changing the button label back
					$('#response').html(data); // insert data
				}
			});
			return false;
			});



			$('#filter .selected-cat').on('change', function(){
				//$('#filter .applyfilter').trigger('click');	
				$('#filter').submit();
			});



			$('#response').children().not('.woocommerce').remove();

			$('#filter .selected-cat').click(function () {
		      $('#filter .selected-cat').parent().removeClass('checkedradio');
		      $(this).parent(this).addClass('checkedradio');
		  	});


			$(document).ready(function() {
				$('.variations tr:first-child > td.value > div').click(function(){
					$('.variations tr:first-child > td.value > div').removeClass('clicked-swatch');
					$(this).addClass('clicked-swatch');
				});
				$('.variations tr:nth-child(2) > td.value > div').click(function(){
					$('.variations :nth-child(2) > td.value > div').removeClass('clicked-swatch');
					$(this).addClass('clicked-swatch');
				});
				$('.variations tr:nth-child(3) > td.value > div').click(function(){
					$('.variations :nth-child(3) > td.value > div').removeClass('clicked-swatch');
					$(this).addClass('clicked-swatch');
				});
			
				$('a.reset_variations').click(function(){
					$('.thwepo-extra-options').removeClass('show');
					$('.ral-desc').removeClass('show');
					$('td.value > div').removeClass('clicked-swatch');
				
				});

				//$('input#finish_v_RAL').parent().closest('tr').hide();
				$('input[value="RAL Colour"], input[value="ral-colour"]').parent().closest('div').click(function(){
					$('.thwepo-extra-options').addClass('show');
					$('.ral-desc').addClass('show');
				});
				$('input[value="RAL Colour"], input[value="ral-colour"]').parent().closest('div').prevAll().click(function(){
					$('.thwepo-extra-options').removeClass('show');
					$('.ral-desc').removeClass('show');
					$('.thwepo-extra-options #ral').val('');
				});


				$('.woocommerce-cart dd.variation- p:contains("RAL colour")').parent().addClass("hide-div");
				$('.woocommerce-cart dd.variation- p:contains("RAL colour")').parent().prev().addClass("hide-div");

				$('.woocommerce-checkout-review-order dd.variation- p:contains("RAL colour")').parent().addClass("hide-div");
				$('.woocommerce-checkout-review-order dd.variation- p:contains("RAL colour")').parent().prev().addClass("hide-div");

				$("#ral option:first").val('');
			});


			$('.vendor-single span').click(function(){
				$('.vendor-single span').removeClass('clicked-vendor');
				$(this).addClass('clicked-vendor');
			});



			$(".vendors-menu, .distributors-submenu").hover(function(){
			    $('.distributors-submenu').addClass('show-div');
			    }, function(){
			    $('.distributors-submenu').removeClass('show-div');
			   // e.stopPropagation();
			});
			$('section').click(function() {
				 $('.distributors-submenu').removeClass('show-div');
			 });


			//bottom to top
			$(window).scroll(function() {
				if ($(this).scrollTop() >= 50) {        
					$('#return-to-top').fadeIn(200);    
				} else {
					$('#return-to-top').fadeOut(200);   
				}
			});
			$('#return-to-top').click(function() {      
				$('body,html').animate({
					scrollTop : 0                      
				}, 500);
			});




			 $('.from-tab').clone().appendTo('#vendors-wrapper-others');

			  $('.the_champ_login_ul').clone().appendTo('.socials-register-wrapper');
			  $('.woocommerce-form-login .the_champ_login_ul').clone().appendTo('.socials-login-wrapper');


			 //mobile menu
			 $("#menu-bars .fa").click(function(){
			 	$(this).toggleClass('fa-bars');
			 	$(this).toggleClass('fa-times');
			    $("nav.nav").toggleClass('open-menu');
			    $(".sign-in-out").toggleClass('show');
			    $(".order-tracking").toggleClass('show');
				//$(".header-middle").toggleClass('hide-div');
			});




			 	

	});
	
})(jQuery, this);
