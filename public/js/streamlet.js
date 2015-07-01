/**
 * scroll to top
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
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
})(window.jQuery);

/**
 * show or hide navbar
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(document).scroll(function () {
		if ($(document).scrollTop() > 50) {
			$(".navbar").fadeOut();
		} else {
			$(".navbar").fadeIn();
		}
	});
})(window.jQuery);

//# sourceMappingURL=streamlet.js.map