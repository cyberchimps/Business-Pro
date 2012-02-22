jQuery(document).ready(function($){
	$('#nav_menu').mobileMenu();
});

jQuery(document).ready(function($){
	
	$("#portfolio_wrap img").hover(function(){
		$(this).fadeTo("fast", 0.2); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});
	
	$("#portfolio_wrap .portfolio_caption").hover(function(){
		$(this).fadeTo("fast", 1.0); 
	},function(){
   		$(this).fadeTo("fast", 0); 
	});

});