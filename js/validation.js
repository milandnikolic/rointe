(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
			$("form.register").validate({
				rules: {
					billing_first_name: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					email: {
						required: true,
						email: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					billing_last_name: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					password: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					password2: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					termscheck: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					}
				}
			});


			$("#filter").validate({

				rules: {
					uk_area: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					categoryradiator: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					area_width: {
						required: true,
						number: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
					area_length: {
						required: true,
						number: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					}
					
				}
			});

	});
	
})(jQuery, this);
