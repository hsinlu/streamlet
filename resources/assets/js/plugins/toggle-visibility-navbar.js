/**
 * show or hide navbar
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() { 
		$(document).scroll(function () {
			if ($(document).scrollTop() > 50) {
				$(".toggle-visibility-navbar").fadeOut();
			} else {
				$(".toggle-visibility-navbar").fadeIn();
			}
		});
	});
})(window.jQuery);