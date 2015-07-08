/**
 * generate qrcode
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function ($) {
	$(function() {
		$(".qrcode").qrcode({ width: 200, height:200, text: window.location.href });
	});
})(window.jQuery);