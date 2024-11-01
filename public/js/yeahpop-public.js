(function( $ ) {
	'use strict';

	$(document).ready(function () {
		var yp_count = yeahpop_object.orders.length - 1;
		var visible = false;
		$('#ypop-customer').text(yeahpop_object.orders[yp_count].name);
		$('#ypop-location').text(yeahpop_object.orders[yp_count].location);
		$('#ypop-time').text(yeahpop_object.orders[yp_count].date);
		$('#ypop-product-name').text(yeahpop_object.product_title);
		$('.custom-notification-image-wrapper').html(yeahpop_object.product_image);

		setTimeout( function() {
			$(".custom-social-proof").stop().slideToggle('slow');
			visible = true;
			yp_count -= 1;
				
			setTimeout( function() {
				$(".custom-social-proof").stop().slideToggle('slow');
				visible = true;

				setInterval(function () {

					if (yp_count >= 0) {
						visible = true;
						$(".custom-social-proof").stop().slideToggle('slow');
						$('#ypop-customer').text(yeahpop_object.orders[yp_count].name);
						$('#ypop-location').text(yeahpop_object.orders[yp_count].location);
						$('#ypop-time').text(yeahpop_object.orders[yp_count].date);
						$('.custom-notification-image-wrapper').html(yeahpop_object.product_image);
						yp_count -= 1;
						
						setTimeout( function() {
							$(".custom-social-proof").stop().slideToggle('slow');
							visible = true;
						}, 8000);
					}

				}, 16000);
			}, 8000);
		}, 2000);

		$(".custom-close").click(function() {
			$(".custom-social-proof").stop().slideToggle('slow');
		});
	});

})( jQuery );
