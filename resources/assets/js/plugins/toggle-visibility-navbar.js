/**
 * show or hide navbar
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() {
		var previousScrollTop = 0;
		var currentScrollTop = 0;

		$(document).scroll(function () {
			currentScrollTop = $(document).scrollTop();

			if (currentScrollTop > 50 && currentScrollTop > previousScrollTop) {
				$(".toggle-visibility-navbar").slideUp();
			} else {
				$(".toggle-visibility-navbar").slideDown();
			}

			previousScrollTop = currentScrollTop;
		});
	});
})(window.jQuery);