/**
 * show or hide navbar
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() {
		var self = $(".toggle-visibility-navbar");

		var previousScrollTop = 0;
		var currentScrollTop = 0;

		var currentAnimation = "";

		function needRunAnimation(animation) {
			if (currentAnimation === "") {
				return true;
			}

			if (animation === currentAnimation) {
				return false;
			} else {
				self.stop();
				return true;
			}
		}

		$(document).scroll(function () {
			currentScrollTop = $(document).scrollTop();

			if (currentScrollTop <= 150) {
				return;
			}

			if (currentScrollTop > 150 && currentScrollTop > previousScrollTop) {
				if (needRunAnimation("fadeOut")) {
					currentAnimation = "fadeOut";
					self.fadeOut(function () {
						currentAnimation === "";
					});
				};
			} else {
				if (needRunAnimation("fadeIn")) {
					currentAnimation = "fadeIn";
					self.fadeIn(function () {
						currentAnimation === "";
					});
				}
			}

			previousScrollTop = currentScrollTop;
		});
	});
})(window.jQuery);