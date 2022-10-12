(function($){
	'use strict';
	
	$(function(){
		var controlwpadminbar = $("#wpadminbar").is("div");
		if(controlwpadminbar == "") {
		} else {
			var controlwpadminbarh = $("#wpadminbar").height();

			var headerHeight = $(".mobile-header").height();
	/*		$(".mobile-header").css('top',controlwpadminbarh + 'px');   */
			$("#wpadminbar").addClass('convertFixed');
		}
	});
		
} )( jQuery );