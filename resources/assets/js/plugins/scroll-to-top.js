/**
 * scroll to top
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() { 
		$(document).scroll(function () {
			if ($(document).scrollTop() > 150) {
				$(".scroll-to-top").fadeIn();
			} else {
				$(".scroll-to-top").fadeOut();
			}
		});

		$(".scroll-to-top").click(function () {
			$("html, body").animate({ scrollTop: 0 }, 600);
		});
	});
})(window.jQuery);