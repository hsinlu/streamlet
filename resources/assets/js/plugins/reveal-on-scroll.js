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