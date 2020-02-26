jQuery(function($){
$(document).ready( function(){
		$("#photos").fileinput({
			maxFileCount: 6, 
			maxFileSize: 2000,
			mainClass: "input-group-lg",
			theme: 'fa',
			uploadUrl: '#',
			allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg']
		});
	});
});