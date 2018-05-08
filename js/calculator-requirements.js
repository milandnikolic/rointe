(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		$(document).ready(function() {
				$('.js-example-basic-single').select2({
					placeholder: "Select your area",
   					 allowClear: true,
				});
				$('.category-radiators').select2({
					placeholder: "Select our collection",
   					 allowClear: true,
				});

				$('.js-example-basic-single, .area-width, .area-length').on('change', function(){
					
					
					var selectedCoef = ($(this).val());
					//var selectedCoef = $('.js-example-basic-single').val();
					//console.log(selectedCoef);

					
					var test = selectedCoef * 2;
					/*console.log(test);
					$(' .area-width').on('change', function(){
						var widthArea = $('.area-width').val();
						console.log(widthArea);
					});*/

					var selectedLength = $('.area-length').val();


				});
				    
				$('.area-width').on('change', function(){
					var selectedWidth = ($(this).val());
					//console.log(selectedWidth);
				});

				$('.area-length').on('change', function(){
					var selectedLength = ($(this).val());
					
					//console.log(selectedLength);
				});

				$('button.calculate').on('click', function(){
					var one = $('.js-example-basic-single').val();
					var secondCoef = 0;
					var two = $('.area-width').val();
					var three = $('.area-length').val();
					var four = $('.area-height').val();

					if( four <=3 ) {
						var calculate = one * two * three;
						console.log(one);
						console.log(two);
						console.log(three);
						console.log(calculate);
					} else {
						if ( one == 0.75 ) {
							secondCoef = 0.23;
						} else if ( one == 0.80 ){
							secondCoef = 0.26;
						} else if ( one == 0.85 ) {
							secondCoef = 0.30;
						} else if ( one == 0.90 ) {
							secondCoef = 0.33;
						}

						var calculate = secondCoef * two * three * four;
						console.log(secondCoef);
						console.log(two);
						console.log(three);
						console.log(four);
						console.log(calculate);
					}
					/*if (calculate > 27 && calculate <= 30 ){
						$('.counter-recommend').text(2);
					}else if (calculate > 42 && calculate <= 45) {
						$('.counter-recommend').text(3);
					} else if (calculate > 57 && calculate <= 60) {
						$('.counter-recommend').text(4);
					} else if (calculate > 72 && calculate <= 75) {
						$('.counter-recommend').text(5);
					} else if (calculate > 87 && calculate <= 90) {
						$('.counter-recommend').text(6);
					} */
					if (calculate > 15 && calculate <= 30 ) {
						$('.counter-recommend').text(2);
					} else if (calculate > 30 && calculate <= 45) {
						$('.counter-recommend').text(3); 
					} else if (calculate > 45 && calculate <= 60) {
						$('.counter-recommend').text(4); 
					} else if (calculate > 60 && calculate <= 75) {
						$('.counter-recommend').text(5); 
					} else if (calculate > 75 && calculate <= 90) {
						$('.counter-recommend').text(6); 
					} else if (calculate > 90 && calculate <= 105) {
						$('.counter-recommend').text(7); 
					} else if (calculate > 105 && calculate <= 120) {
						$('.counter-recommend').text(8); 
					} else if (calculate > 120 && calculate <= 135) {
						$('.counter-recommend').text(9); 
					} else if (calculate > 135 && calculate <= 150) {
						$('.counter-recommend').text(10); 
					} else if (calculate > 150 && calculate <= 165) {
						$('.counter-recommend').text(11); 
					} else if (calculate > 165 && calculate <= 180) {
						$('.counter-recommend').text(12); 
					} else if (calculate > 180 && calculate <= 195) {
						$('.counter-recommend').text(13); 
					} else if (calculate > 195 && calculate <= 210) {
						$('.counter-recommend').text(14); 
					} else if (calculate > 210 && calculate <= 225) {
						$('.counter-recommend').text(15); 
					} else if (calculate > 225 && calculate <= 240) {
						$('.counter-recommend').text(16); 
					} else if (calculate > 240 && calculate <= 255) {
						$('.counter-recommend').text(17); 
					} else if (calculate > 255 && calculate <= 270) {
						$('.counter-recommend').text(18); 
					} else if (calculate > 270 && calculate <= 285) {
						$('.counter-recommend').text(19); 
					} else if (calculate > 285 && calculate <= 300) {
						$('.counter-recommend').text(20); 
					}
				
					$('.recommended-radiator').addClass('show');
					
				});

				$('.calculate').attr('disabled',true);
				$('.area-width').keyup(function(){
				        if($(this).val().length !=0)
				            $('.calculate').attr('disabled', false);            
				        else
				            $('.calculate').attr('disabled',true);
				});
				

				$('.counter-recommend').clone().appendTo('.calculate-fields .products li');
		});

	});
	
})(jQuery, this);