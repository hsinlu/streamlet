/**
 * compute float layout height
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() { 
		var content = $(".container-float .content");
		var sidebar = $(".container-float .sidebar .sidebar-content");

		if (content.height() < sidebar.height()) {
			content.height(sidebar.height());
		};
	});
})(window.jQuery);