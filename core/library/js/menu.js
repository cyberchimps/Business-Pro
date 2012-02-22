jQuery(document).ready(function($){
	$('#nav_menu').mobileMenu();
});

jQuery(document).ready(function($){
	

	$(".portfolio_image img").hover(function(){
		$(this).fadeTo("slow", 0.2); // This should set the opacity to 100% on hover
	},function(){
   		$(this).fadeTo("slow", 1.0); // This should set the opacity back to 60% on mouseout
	});
});