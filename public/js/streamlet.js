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
				$(".toggle-visibility-navbar").fadeOut();
			} else {
				$(".toggle-visibility-navbar").fadeIn();
			}

			previousScrollTop = currentScrollTop;
		});
	});
})(window.jQuery);
/**
 * run animation when scroll to 
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($) {
	function revealOnScroll() {
		$(".reveal-on-scroll:not(.animation)").each(function () {
			var self = $(this);

			if($(window).scrollTop() + $(window).height() * 1.1 > self.offset().top) {
				self.css("animation", self.data("animation"));
			};
		});
	};

	$(document).scroll(revealOnScroll);
	revealOnScroll();
})(window.jQuery);
/**
 * auto close alerts
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() { 
		setTimeout(function () {
			$(".alert-success").each(function () {
				var self = $(this);
				self.fadeOut(3000);
			});
		}, 5000);
	});
})(window.jQuery);
//# sourceMappingURL=streamlet.js.map