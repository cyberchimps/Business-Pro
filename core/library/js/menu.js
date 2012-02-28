jQuery(document).ready(function($){
	$('#nav_menu').mobileMenu();
});

jQuery(document).ready(function($){
	
	$("#portfolio_wrap img").hover(function(){
		$(this).fadeTo("fast", 0.4); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});
	
	$(".featured-image img").hover(function(){
		$(this).fadeTo("fast", 0.7); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});
	
	$(".es-carousel img").hover(function(){
		$(this).fadeTo("fast", 0.7); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});

	
});