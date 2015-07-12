/**
 * for settings profile page
 * @param  JQuery $ jquery
 * @return mixed   
 */
(function ($) {
	$(function() {
		var original_cover;
		var original_avatar;

		var cover_file = $("#cover-file");
		var cover_bg = $(".cover");
		var btn_reset_cover = $("#btn-reset-cover");

		var avatar_file = $("#avatar-file");
		var avatar_img = $("#avatar-img");
		var btn_reset_avatar = $("#btn-reset-avatar");

		if (cover_bg.css('background-image')) {
			original_cover = cover_bg.css('background-image');
		};

		if (avatar_img.attr('src')) {
			original_avatar = avatar_img.attr('src');
		};

		$("#btn-change-cover").click(function() {
			cover_file.click();
		});
		$("#btn-change-avatar").click(function() {
			avatar_file.click();
		});

		cover_file.change(function() {
			readImage(cover_file, function(reallocalpath) {
				cover_bg.css("background-image", "url('" + reallocalpath + "')");
				btn_reset_cover.show();
			});
		});

		btn_reset_cover.click(function() {
			cover_file.replaceWith(cover_file = cover_file.clone(true));
			cover_bg.css("background-image", original_cover);
			btn_reset_cover.hide();
		});

		avatar_file.change(function() {
			readImage(avatar_file, function(reallocalpath) {
				avatar_img.attr("src", reallocalpath);
				btn_reset_avatar.show();
			})
		});

		btn_reset_avatar.click(function() {
			avatar_file.replaceWith(avatar_file = avatar_file.clone(true));
			avatar_img.attr("src", original_avatar);
			btn_reset_avatar.hide();
		});
	});
})(window.jQuery);