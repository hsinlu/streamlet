/**
 * for articles page
 * @param  JQuery $ jquery
 * @return mixed   
 */
(function ($) {
	$(function() {
		var img = $(".image-uploader img");
		var file = $(".image-uploader input[type=file]");
		var close = $(".image-uploader .close");

		if (img.attr('src')) {
			img.css("opacity", "1");
			close.show();
		};

		close.click(function() {
			file.replaceWith(file = file.clone(true));
			img.css("opacity", "0");
			close.hide();
		});

		img.click(function () {
			file.click();
		});

		file.change(function() {
			readImage(file, function(reallocalpath) {
	     		img.attr("src", reallocalpath);
        		img.css("opacity", "1");
        		close.show();
			});
		});
	});
})(window.jQuery);