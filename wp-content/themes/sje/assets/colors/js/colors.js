/*=== "use strict" mode on ===*/
"use strict";

(function ($) {   
    
	$('.showcolor').on('click', function(){
		if($('.colors').css('left') == '-120px'){
			$('.colors').css('left', '0px');
		}else{
			$('.colors').css('left', '-120px');
		}
	});
	
	$('.sq-blue').on('click', function(){
		$('head').append('<link rel="stylesheet" type="text/css" href="css/blue.css" />');
	});
	$('.sq-red').on('click', function(){
		$('head').append('<link rel="stylesheet" type="text/css" href="css/red.css" />');
	});
	$('.sq-green').on('click', function(){
		$('head').append('<link rel="stylesheet" type="text/css" href="css/green.css" />');
	});
	
})(jQuery);