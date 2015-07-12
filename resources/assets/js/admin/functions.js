/**
 * read image, return real local path
 * @param  file   file     
 * @param  Function callback 
 * @return            real local path
 */
function readImage(file, callback) {
	var path = file.val();
	var ext = path.substring(path.lastIndexOf(".") + 1).toLowerCase();
	if(ext != "png" && ext != "jpg" && ext != "jpeg") {
		alert("The file must be picture."); return;
	}

	var srcFile = file[0].files[0];
	var reader = new FileReader();
	reader.readAsDataURL(srcFile);
	reader.onload = function(e) {
    	if (callback && callback instanceof Function) {
			callback(e.target.result);
		}
	}
}