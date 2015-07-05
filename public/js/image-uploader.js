/**
 * image uploader
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
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
			var path = file.val();
     		var ext = path.substring(path.lastIndexOf(".") + 1).toLowerCase();
     		// gif在IE浏览器暂时无法显示
     		if(ext != "png" && ext != "jpg" && ext != "jpeg"){
         		alert("文件必须为图片！"); return;
     		}
     		// IE浏览器
     		if (document.all) {
        		file.select();
        		var reallocalpath = document.selection.createRange().text;
         		var ie6 = /msie 6/i.test(navigator.userAgent);
         		// IE6浏览器设置img的src为本地路径可以直接显示图片
         		if (ie6) img.src = reallocalpath;
         		else {
             		// 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
             		img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
            		// 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
            		img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==";
        		}
     		} else {
				var srcFile = file[0].files[0];
	    		var reader = new FileReader();
	    		reader.readAsDataURL(srcFile);
	    		reader.onload = function(e) {
	        		img.attr("src", e.target.result);
	        		img.css("opacity", "1");
	        		close.show();
	     		}
     		}
		});
	});
})(window.jQuery);
//# sourceMappingURL=image-uploader.js.map