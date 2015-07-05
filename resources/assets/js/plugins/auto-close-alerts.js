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