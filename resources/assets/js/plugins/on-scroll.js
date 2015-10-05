/**
 * run handler when scroll 
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($) {
	var scrollHandler = {};
	scrollHandler["fixed-bottom"] = function (self) {
		var isBottomFixed = false;

		$(document).scroll(function () {
			var windowHeight = $(window).height();
			var selfHeight = self.height();
			var scrollTop = $(document).scrollTop();

			if (!isBottomFixed && scrollTop + windowHeight >= selfHeight) {
				isBottomFixed = true;
				self.addClass("fixed");
			} else {
				if (isBottomFixed && scrollTop + windowHeight < selfHeight - 20) {
					isBottomFixed = false;
					self.removeClass("fixed");
				};
			}
		});
	};
	scrollHandler["scroll-to-top"] = function (self) {
		self.click(function () {
			$("html, body").animate({ scrollTop: 0 }, 600);
		});

		$(document).scroll(function () {
			if ($(document).scrollTop() > 150) {
				self.fadeIn();
			} else {
				self.fadeOut();
			}
		});
	}
	// 滚动到指定的元素执行指定的动画
	scrollHandler["reveal-on-scroll"] = function (self) {
		self.click(function () {
			$("html, body").animate({ scrollTop: 0 }, 600);
		});

		$(document).scroll(function () {
			if($(window).scrollTop() + $(window).height() * 1.1 > self.offset().top) {
				self.css("animation", self.data("animation"));
			};
		});
	}

	$(function () {
		$("[data-scroll]").each(function () {
			var self = $(this);

			var type = self.attr("data-scroll");
			if (scrollHandler[type] != undefined) {
				scrollHandler[type](self);
			};
		});
	});
})(window.jQuery);