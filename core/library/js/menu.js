jQuery(document).ready(function($){
	$('#nav_menu').mobileMenu();
});

jQuery(document).ready(function($){
		
		
	$(".es-carousel img").hover(function(){
		$(this).fadeTo("fast", 0.7); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});

	
});

jQuery(document).ready(function($){

	$("#gallery ul a:hover img").css("opacity", 1);
	$("#portfolio_wrap .portfolio_caption").css("opacity", 0);
	
	$("#portfolio_wrap a").hover(function(){
		$(this).children("img").fadeTo("fast", 0.3);
		
		$(this).children(".portfolio_caption").fadeTo("fast", 1.0);
		
	},function(){
   		$(this).children("img").fadeTo("fast", 1.0);
   		$(this).children(".portfolio_caption").fadeTo("fast", 0);
	});
	
	$(".featured-image img").hover(function(){
		$(this).fadeTo("fast", 0.75); 
	},function(){
   		$(this).fadeTo("fast", 1.0); 
	});
	
});