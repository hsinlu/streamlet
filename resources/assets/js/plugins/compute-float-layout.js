/**
 * auto close alerts
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() { 
		var containerFloat = $(".container-float");
		var sidebar = $(".container-float .sidebar");

		if (containerFloat.height() < sidebar.height()) {
			containerFloat.height(sidebar.height());
		};
	});
})(window.jQuery);